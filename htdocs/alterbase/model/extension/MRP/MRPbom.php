<?php 
class ModelExtensionMRPMRPbom extends Model {
	private $tablename = DB_PREFIX . 'mrp_bom';
	
	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tablename ."` (
			`id`			INT(11)			NOT NULL AUTO_INCREMENT,
			`parent_id`		VARCHAR(10)		NOT NULL,
			`parent_rev`	VARCHAR(10)		NOT NULL,
			`child_id`		VARCHAR(10)		NOT NULL,
			`child_rev`		VARCHAR(10)		NOT NULL,
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
					AND ORDINAL_POSITION > 5
		");
		$data = array();
		foreach ($query->rows as $row) {
			$data[] = json_decode($row['COLUMN_COMMENT']);
		}
		return($data);
	}
	public function duplicate($id,$rev,$newid,$newrev){
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablename ."`";
		$sql .="	WHERE parent_id = '".$id."'";
		$sql .="		AND parent_rev = '".$rev."'";
		$data = $this->db->query($sql)->rows;
		
		foreach ($data as $d) {
			
			unset($d['id']);
			unset($d['parent_id']);
			unset($d['parent_rev']);
			
			$sql  = "INSERT INTO `" . $this->tablename ."`";

			$col	= "(";
			$values	= "(";
			foreach($d as $key=>$val){
				$col	.= "`".$key."`,";
				$values	.= "'".$val."',";
			}
			$col	.=	"`parent_id`,`parent_rev`)";
			$values	.=	"'".$newid."','".$newrev."')";
				
			$sql .= $col . " VALUES " . $values;
			$this->db->query($sql);
		}
		
		
	}

	public function getusedon($root,$rev){
		$data = array();
		$sql  = "SELECT *, parent.name";
		$sql .= "	FROM `" . $this->tablename ."` as b";
		$sql .= "	JOIN ".DB_PREFIX ."mrp_product as parent on ((b.parent_id = parent.id) AND b.parent_rev = parent.rev)";
		$sql .= "	WHERE `child_id` = '".$root."'";
		$query = $this->db->query($sql);
		
		foreach ($query->rows as $v) {
			if( ($v['child_rev']=='+') || ($v['child_rev']==$rev) ){
				$data[] = $v;
			}
		}

		return($data);
	}
	
	private function prefixed_table_fields_wildcard($table, $alias){
		$columns = $this->db->query("SHOW COLUMNS FROM ". $table)->rows;

		$field_names = array();
		foreach ($columns as $column){
			$field_names[] = $column["Field"];
		}
		$prefixed = array();
		foreach ($field_names as $field_name){
			$prefixed[] = "`{$alias}`.`{$field_name}` AS `{$alias}.{$field_name}`";
		}
		return implode(", ", $prefixed);
	}
	private function prefixed_table_fields_wildcard_to_array($results){
		
		$out_array = array();
		foreach ($results as $k=>$v){
			
			$keys = explode(".", $k);
			$l = count($keys);
			$tmp = array();
			$ptr = &$tmp;
			$i = 0;
			for (; $i < $l-1; $i++){
				$ptr[$keys[$i]] = array();
				$ptr = &$ptr[$keys[$i]];
			}
			$ptr[$keys[$i]] = $v;
			$out_array = array_replace_recursive($out_array, $tmp);
			
		}
		return($out_array);
	}

	public function getsingleBOM($root,$rev,$selectsql = NULL){
		$data = array();
		$sql  = "SELECT * FROM `" . $this->tablename ."`";
		$sql .= "	WHERE `parent_id` = '".$root."'";
		$sql .="		AND `parent_rev` = '".$rev."'";
		$query = $this->db->query($sql);
		
		if(is_null($selectsql)){
			$selectsql  = "SELECT b.*, ".$this->prefixed_table_fields_wildcard(DB_PREFIX ."mrp_product","child");
			$selectsql .= "	FROM `" . $this->tablename ."` as b";
		}
		foreach ($query->rows as $row) {
			
			if($row['child_rev'] == '+'){
				
				$sql  = "SELECT rev FROM `alt_mrp_product` WHERE id='".$row['child_id']."'";
				$revs = $this->db->query($sql)->rows;
				
				$test = array();
				foreach($revs as $k=>$v){
					if(preg_match('#^[a-zA-Z]#', $v['rev']) === 1){
						$test[' 0'.$v['rev']] = $k;
					}
					else{
						$test[' '.$v['rev']] = $k;
					}
				}
				$crev = $revs[$test[max(array_keys($test))]]['rev'];
				
			}
			else{
				$crev = $row['child_rev'];
			}
			$sql  = $selectsql;
			$sql .="	JOIN ".DB_PREFIX ."mrp_product as child on ((b.child_id = child.id) AND child.rev = '".$crev."')";
			$sql .="	WHERE	b.`parent_id` = '".$root."'";
			$sql .="		AND b.`parent_rev` = '".$rev."'";
			$sql .="		AND b.`child_id` = '".$row['child_id']."'";
			$sql .="		AND b.`child_rev` = '".$row['child_rev']."'";
			$sql .="	ORDER By b.`Line_item` ASC";
			
			//echo "<pre>";
			//echo "	<pre>".var_export($sql,true)."</pre>";
			//echo "	<pre>".var_export($this->db->query($sql),true)."</pre>";
			//echo "</pre>";
			
			$data[] = $this->prefixed_table_fields_wildcard_to_array($this->db->query($sql)->row);
		}
		return($data);
	}
	

	public function getmultiBOM($root,$path=array(),$selectsql=NULL){
		static $recursion_counter = 0;
		$ret = array();
		$recursion_counter++;
		if($recursion_counter>50){
			return($ret);
		}
		$me = array();
		$me['parid'] = 	implode("-", $path);
		$path[]=$root['id'];
		$me['id'] = 		implode("-", $path);

		$me['cls'] = 'leaf';
		$me['icon']	= "view/image/part24.png";
		$me['partno']		= $root['child_id'];
		$me['data'] = $root;
		
		$sin = $this->getsingleBOM($root['child_id'],$root['child']['rev'],$selectsql);
		
		if(count($sin)){
			$me['cls'] = 'branch';
			$me['icon'] = "view/image/assembly24.png";
		}
		$ret[$me['id']] = $me;
		if(count($sin)){
			foreach ($sin as $v) {
				$ret += $this->getmultiBOM($v,$path,$selectsql);
			}
		}
		
		
		$recursion_counter--;
		return($ret);
	}
	public function getfullBOM($root,$rev){
		$selectsql  = "SELECT b.*, ".$this->prefixed_table_fields_wildcard(DB_PREFIX ."mrp_product","child");
		$selectsql .= "	FROM `" . $this->tablename ."` as b";
		
		$ret = array();
		$rootbom = $this->getsingleBOM($root,$rev,$selectsql);
		foreach ($rootbom as $v) {
			$ret += $this->getmultiBOM($v,array(),$selectsql);
		}
		return($ret);
	}


	public function hasBOM($root,$rev) {
		$sql  ="SELECT id";
		$sql .= "	FROM `" . $this->tablename ."`";
		$sql .="	WHERE parent_id = '".$root."'";
		$sql .="		AND `parent_rev` = '".$rev."'";
		return($this->db->query($sql)->num_rows>0);
	}
	
	public function addlog($id,$rev,$field,$oldval,$newval){
		$sql	 = "INSERT INTO `" . DB_PREFIX . "mrp_product_log`";
		$sql	.= "(product_id,product_rev,date,user,field,oldval,newval)";
		$sql	.= "VALUES('".$id."','".$rev."',UTC_TIMESTAMP,".$this->user->getId().",'BOM / ".$field."','".$oldval."','".$newval."')";		
		return ($this->db->query($sql));
	}
	
	public function editbom($root,$rev,$data) {
		
		foreach ($data as $d) {
			$child_id = $d['child_id'];
			$child_rev = $d['child_rev'];
			
			if (array_key_exists("remove",$d)){
				
				$this->addlog($root,$rev,'remove '.$child_id.":".$child_rev,NULL,NULL);
				$sql  ="DELETE";
				$sql .= "	FROM `" . $this->tablename ."`";
				$sql .="	WHERE parent_id = '".$root."'";
				$sql .="		AND parent_rev = '".$rev."'";
				$sql .= "		AND child_id = '".$child_id."'";
				$sql .="		AND child_rev = '".$child_rev."'";
				$this->db->query($sql);
				continue;
			}
			
			
			$sql  ="SELECT *";
			$sql .= "	FROM `" . $this->tablename ."`";
			$sql .="	WHERE parent_id = '".$root."'";
			$sql .="		AND parent_rev = '".$rev."'";
			$sql .= "		AND child_id = '".$child_id."'";
			$sql .="		AND child_rev = '".$child_rev."'";
			$original = $this->db->query($sql);
			if($original->num_rows==0){
				$sql  = "INSERT INTO `" . $this->tablename ."`";

				$col	= "(";
				$values	= "(";
				foreach($d as $key=>$val){
					$col	.= "`".$key."`,";
					$values	.= "'".$val."',";
					$this->addlog($root,$rev,$child_id.":".$child_rev." / ".$key,NULL,$val);
				}
				$col	.=	"`parent_id`,`parent_rev`)";
				$values	.=	"'".$root."','".$rev."')";
				
				$sql .= $col . " VALUES " . $values;
				$this->db->query($sql);
				continue;
			}
			
			$sql  = "UPDATE `" . $this->tablename ."` SET";
			
			unset($d['child_id']);
			unset($d['child_rev']);
			unset($d['name']);
			
			foreach($d as $key=>$val){
				$sql .= "`".$key."` = '".$val."',";
				$this->addlog($root,$rev,$child_id.":".$child_rev." / ".$key,$original->row[$key],$val);
			}
			$sql = substr($sql, 0, -1);
			$sql .= "WHERE `parent_id` = '".$root."'";
			$sql .="	AND parent_rev = '".$rev."'";
			$sql .= "	AND child_id = '".$child_id."'";
			$sql .="	AND child_rev = '".$child_rev."'";
			$this->db->query($sql);
		}
	}











}


























