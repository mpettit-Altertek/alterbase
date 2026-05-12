<?php 
class ModelExtensionMRPMRPsupplier extends Model {
	private $tablesupplier	= DB_PREFIX . 'mrp_supplier';
	private $tablelog		= DB_PREFIX . 'mrp_supplier_log';
	
	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tablesupplier ."` (
			`id`			INT(11)			NOT NULL AUTO_INCREMENT,
			`name`			VARCHAR(100)	NOT NULL,
			 PRIMARY KEY (`id`))
		");
		
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tablelog ."` (
			`id`			INT(11)			NOT NULL AUTO_INCREMENT ,
			`supplier_id`	INT(11)			NOT NULL,
			`date`			DATETIME		NULL DEFAULT NULL,
			`user`			INT NULL		DEFAULT NULL,
			`field`			VARCHAR(255)	NOT NULL,
			`oldval`		VARCHAR(255)	NULL,
			`newval`		VARCHAR(255)	NULL,
			PRIMARY KEY (`id`)
			);
		");
	}
	
	public function uninstall() {
		$this->db->query("DROP TABLE `" . $this->tablesupplier ."`;");
		$this->db->query("DROP TABLE `" . $this->tablelog ."`;");
	}
	
	public function modifyTable($fields) {
		foreach ($fields as $field) {
			$this->db->query("ALTER TABLE `" . $this->tablesupplier ."` ADD COLUMN IF NOT EXISTS `" . $this->db->escape($field['name']) .                           "` VARCHAR(255)");
			$this->db->query("ALTER TABLE `" . $this->tablesupplier ."` CHANGE `" . $this->db->escape($field['name']) . "` `" . $this->db->escape($field['name']) . "` VARCHAR(255) COMMENT '" . $this->db->escape(json_encode($field)) . "'");
		}
	}	
	public function getTableCustomColumns(){
		$query = $this->db->query("
			SELECT COLUMN_NAME, COLUMN_COMMENT
				FROM information_schema.COLUMNS
				WHERE TABLE_SCHEMA = '".DB_DATABASE."'
					AND TABLE_NAME = '" . $this->tablesupplier  ."'
					AND ORDINAL_POSITION > 2
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
					AND TABLE_NAME = '" . $this->tablesupplier  ."'
					AND ORDINAL_POSITION > 2
		");
		$data = array();
		foreach ($query->rows as $row) {
			$data[$row['COLUMN_NAME']] = json_decode($row['COLUMN_COMMENT'],true);
		}
		return($data);
	}
	public function getTableByPage($get = array(),$columns = array()){

		require( 'ssp.class.php' );
		$options = array(
			'table' => $this->tablesupplier,
			'alias' => 'l',
			'primaryKey' => 'id',
			'columns' => $columns,
		);
		return (SSP::process($get,$this->db, $options));
	}
	
	public function addlog($id,$field,$oldval,$newval){
		$sql	 = "INSERT INTO `" . $this->tablelog ."`";
		$sql	.= "(supplier_id,date,user,field,oldval,newval)";
		$sql	.= "VALUES('".$id."',UTC_TIMESTAMP,".$this->user->getId().",'".$field."','".$oldval."','".$newval."')";		
		return ($this->db->query($sql));
	}
	public function getlogs($id,$get = array(),$columns = array()){

		require( 'ssp.class.php' );
		
		$options = array(
			'table' => $this->tablelog,
			'alias' => 'l',
			'primaryKey' => 'id',
			'columns' => $columns,
			'where' => array(
				array(
					'db' => "supplier_id",
					'op' => "=",
					'value' => $id
				),
			),
		);
		return (SSP::process($get,$this->db, $options));
	}
	
	public function getsupplierSearch($data){
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablesupplier ."` as data";
		$sql .="	WHERE id LIKE '%".$data."%'";
		$sql .="		OR name LIKE '%".$data."%'";
		
		return ($this->db->query($sql));
	}
	
	public function getRecord($id,$cols=NULL) {
		$sql  ="SELECT ";
		if(is_null($cols)){
			$sql .="data.* ";
		}
		else{
			foreach($cols as $col){
				$sql .="data.".$col->name.',';
			}
			$sql	= substr($sql , 0, -1);
		}
		$sql .="	FROM `" . $this->tablesupplier ."` as data";
		$sql .="	WHERE data.id = '".$id."'";
		$ret = $this->db->query($sql);
		return ($ret);
	}
	public function getidByName($name) {
		$sql  ="SELECT id ";
		$sql .="	FROM `" . $this->tablesupplier ."`";
		$sql .="	WHERE name = '".$name."'";
		return ($this->db->query($sql)->row['id']);
	}
	
	public function editRecord($id,$data) {
		var_dump($id);
		if($id==''){
			$sql  = "INSERT INTO `" . $this->tablesupplier ."`";
			
			$col	= "(";
			$values	= "(";
			foreach($data as $key=>$val){
				$col	.= "`".$key."`,";
				$values	.= "'".$val."',";
				$this->addlog($id,$key,NULL,$val);
			}
			
			$col	= substr($col		, 0, -1);
			$values	= substr($values	, 0, -1);
			$col	.=	")";
			$values	.=	")";
			
			$sql .= $col . " VALUES " . $values;
			
			return ($this->db->query($sql));
		}
		else{
			$sql  ="SELECT *";
			$sql .="	FROM `" . $this->tablesupplier ."` as data";
			$sql .="	WHERE id = '".$id."'";
			$original = $this->db->query($sql);
		
			$sql  = "UPDATE `" . $this->tablesupplier ."` SET";
			
			foreach($data as $key=>$val){
				$sql .= "`".$key."` = '".$val."',";
				$this->addlog($id,$key,$original->row[$key],$val);
			}
			$sql	= substr($sql	, 0, -1);
			$sql .= "WHERE `id` = ".$id;
			return ($this->db->query($sql));
		}
	}
}
