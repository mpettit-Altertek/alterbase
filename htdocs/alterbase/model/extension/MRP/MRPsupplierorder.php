<?php 
class ModelExtensionMRPMRPsupplierorder extends Model {
	private $tablename = DB_PREFIX . 'mrp_supplierorder';
	
	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tablename ."` (
			`id`			INT		NOT NULL AUTO_INCREMENT,
			`product_id`	VARCHAR(10)	NOT NULL,
			`product_rev`	VARCHAR(10)	NOT NULL,
			`supplier_id`	INT		NOT NULL,
			 PRIMARY KEY (`id`))
		");
	}
	
	public function uninstall() {
		$this->db->query("DROP TABLE `" . $this->tablename ."`;");
	}
	public function modifyTable($fields) {
		foreach ($fields as $field) {
			$this->db->query("ALTER TABLE `" . $this->tablename ."` ADD COLUMN IF NOT EXISTS `" . $this->db->escape($field['name']) .                           "` VARCHAR(255)");
			$this->db->query("ALTER TABLE `" . $this->tablename ."` CHANGE `" . $this->db->escape($field['name']) . "` `" . $this->db->escape($field['name']) . "` VARCHAR(255) COMMENT '" . $this->db->escape(json_encode($field)) . "'");
		}
	}	
	public function getTableCustomColumns(){
		$query = $this->db->query("
			SELECT COLUMN_NAME, COLUMN_COMMENT
				FROM information_schema.COLUMNS
				WHERE TABLE_SCHEMA = '".DB_DATABASE."'
					AND TABLE_NAME = '" . $this->tablename  ."'
					AND ORDINAL_POSITION > 4
		");
		$data = array();
		foreach ($query->rows as $row) {
			$data[$row['COLUMN_NAME']] = json_decode($row['COLUMN_COMMENT']);
		}
		return($data);
	}
	public function getTableCustomColumnsAssoc(){
		$query = $this->db->query("
			SELECT COLUMN_NAME, COLUMN_COMMENT
				FROM information_schema.COLUMNS
				WHERE TABLE_SCHEMA = '".DB_DATABASE."'
					AND TABLE_NAME = '" . $this->tablename  ."'
					AND ORDINAL_POSITION > 4
		");
		$data = array();
		foreach ($query->rows as $row) {
			$data[$row['COLUMN_NAME']] = json_decode($row['COLUMN_COMMENT'],true);
		}
		return($data);
	}

	public function duplicate($id,$rev,$newid,$newrev){
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablename ."`";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$data = $this->db->query($sql)->rows;
		
		foreach ($data as $d) {
			
			unset($d['id']);
			unset($d['product_id']);
			unset($d['product_rev']);
			
			$sql  = "INSERT INTO `" . $this->tablename ."`";
			$col	= "(";
			$values	= "(";
			foreach($d as $key=>$val){
				$col	.= "`".$key."`,";
				$values	.= "'".$val."',";
			}
			$col	.=	"`product_id`,`product_rev`)";
			$values	.=	"'".$newid."','".$newrev."')";
			
			$sql .= $col . " VALUES " . $values;
			$this->db->query($sql);
		}
		
	}


	public function getRecord($id,$rev,$cols=NULL) {
		$sql  ="SELECT ";
		if(is_null($cols)){
			$sql .="data.* ";
		}
		else{
			foreach($cols as $col){
				$sql .= $col['name'].',';
			}
			$sql	= substr($sql , 0, -1);
		}
		$sql .="	FROM `" . $this->tablename ."` as data";
		$sql .="	JOIN " . DB_PREFIX . "mrp_supplier AS sup ON data.supplier_id = sup.id";
		$sql .="	WHERE data.product_id = '".$id."'";
		$sql .="		AND data.product_rev = '".$rev."'";
		return ($this->db->query($sql));
	}
	
	public function addlog($id,$rev,$field,$oldval,$newval){
		$sql	 = "INSERT INTO `" . DB_PREFIX . "mrp_product_log`";
		$sql	.= "(product_id,product_rev,date,user,field,oldval,newval)";
		$sql	.= "VALUES('".$id."','".$rev."',UTC_TIMESTAMP,".$this->user->getId().",'supplier / ".$field."','".$oldval."','".$newval."')";		
		return ($this->db->query($sql));
	}
	
	public function editRecord($id,$rev,$data) {
		
		foreach ($data as $d) {
			
			$supplier_id = $d['supplier_id'];
			unset($d['supplier_id']);
			
			$sql  ="SELECT name ";
			$sql .="	FROM `".DB_PREFIX . "mrp_supplier`";
			$sql .="	WHERE id = '".$supplier_id."'";
			$supplier_name = $this->db->query($sql)->row['name'];
				
			if (array_key_exists("remove",$d)){
				$this->addlog($id,$rev,'remove '.$supplier_name,NULL,NULL);
				$sql  ="DELETE";
				$sql .= "	FROM `" . $this->tablename ."`";
				$sql .="	WHERE product_id = '".$id."'";
				$sql .="		AND product_rev = '".$rev."'";
				$sql .= "		AND supplier_id = '".$supplier_id."'";
				$this->db->query($sql);
				continue;
			}
			
			$sql  ="SELECT *";
			$sql .= "	FROM `" . $this->tablename ."`";
			$sql .="	WHERE product_id = '".$id."'";
			$sql .="		AND product_rev = '".$rev."'";
			$sql .= "		AND supplier_id = '".$supplier_id."'";
			$original = $this->db->query($sql);
			if($original->num_rows==0){


				$sql  = "INSERT INTO `" . $this->tablename ."`";
				$col	= "(";
				$values	= "(";
				foreach($d as $key=>$val){
					$col	.= "`".$key."`,";
					$values	.= "'".$val."',";
					$this->addlog($id,$rev,$supplier_name.' / '.$key,NULL,$val);
				}
				$col	.=	"`product_id`,`product_rev`,`supplier_id`)";
				$values	.=	"'".$id."','".$rev."','".$supplier_id."')";
				
				$sql .= $col . " VALUES " . $values;
				$this->db->query($sql);
				continue;
			}
			
			$sql  = "UPDATE `" . $this->tablename ."` SET";
			
			unset($d['product_id']);
			unset($d['supplier_id']);
			
			foreach($d as $key=>$val){
				$sql .= "`".$key."` = '".$val."',";
				$this->addlog($id,$rev,$supplier_name.' / '.$key,$original->row[$key],$val);
			}
			$sql = substr($sql, 0, -1);
			$sql .= "WHERE `product_id` = '".$id."'";
			$sql .="	AND product_rev = '".$rev."'";
			$sql .= "	AND `supplier_id` = '".$supplier_id."'";
			$this->db->query($sql);
		}
	}
}
