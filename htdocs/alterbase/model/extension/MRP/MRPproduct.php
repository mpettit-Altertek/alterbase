<?php 
class ModelExtensionMRPMRPproduct extends Model {
	private $tableproduct	= DB_PREFIX . 'mrp_product';
	private $tablelog		= DB_PREFIX . 'mrp_product_log';
	
	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tableproduct ."` (
			`id`			VARCHAR(10)		NOT NULL,
			`rev`			VARCHAR(10)		NOT NULL,
			`name`			VARCHAR(255)	NOT NULL,
			`date_created`	DATETIME		NULL DEFAULT NULL,
			`user_created`	INT NULL		DEFAULT NULL,
			);
		");
		$this->db->query("ALTER TABLE `" . $this->tableproduct ."` ADD UNIQUE KEY `partno` (`id`,`rev`);");
		
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tablelog ."` (
			`id`			INT				NOT NULL AUTO_INCREMENT ,
			`product_id`	VARCHAR(10)		NOT NULL,
			`product_rev`	VARCHAR(10)		NOT NULL,
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
		$this->db->query("DROP TABLE `" . $this->tableproduct ."`;");
		$this->db->query("DROP TABLE `" . $this->tablelog ."`;");
	}
	public function modifyTable($fields) {
		foreach ($fields as $field) {
			$this->db->query("ALTER TABLE `" . $this->tableproduct ."` ADD COLUMN IF NOT EXISTS `" . $this->db->escape($field['name']) .                           "` VARCHAR(255)");
			$this->db->query("ALTER TABLE `" . $this->tableproduct ."` CHANGE `" . $this->db->escape($field['name']) . "` `" . $this->db->escape($field['name']) . "` VARCHAR(255) COMMENT '" . $this->db->escape(json_encode($field)) . "'");
		}
	}
	public function getTableCustomColumns($colname=NULL){
		if(is_null($colname)){
			$query = $this->db->query("
				SELECT COLUMN_NAME, COLUMN_COMMENT
					FROM information_schema.COLUMNS
					WHERE TABLE_SCHEMA = '".DB_DATABASE."'
						AND TABLE_NAME = '" . $this->tableproduct ."'
						AND ORDINAL_POSITION > 5
			");
			$data = array();
			foreach ($query->rows as $row) {
				$data[] = json_decode($row['COLUMN_COMMENT']);
			}
			return($data);
		}
		else{
			$query = $this->db->query("
				SELECT COLUMN_NAME, COLUMN_COMMENT
					FROM information_schema.COLUMNS
					WHERE TABLE_SCHEMA = '".DB_DATABASE."'
						AND TABLE_NAME = '" . $this->tableproduct ."'
						AND COLUMN_NAME = '" . $colname ."'
						
			");
			return(json_decode($query->row['COLUMN_COMMENT']));
			
		}
		
	}
	
	public function addlog($id,$rev,$field,$oldval,$newval){
		$sql	 = "INSERT INTO `" . $this->tablelog ."`";
		$sql	.= "(product_id,product_rev,date,user,field,oldval,newval)";
		$sql	.= "VALUES('".$id."','".$rev."',UTC_TIMESTAMP,".$this->user->getId().",'PRODUCT / ".$field."','".$oldval."','".$newval."')";		
		return ($this->db->query($sql));
	}
	public function getlogs($id,$rev,$get = array(),$columns = array()){

		require( 'ssp.class.php' );
		
		$options = array(
			'table' => $this->tablelog,
			'alias' => 'l',
			'primaryKey' => 'id',
			'columns' => $columns,
			'where' => array(
				array(
					'db' => "product_id",
					'op' => "=",
					'value' => $id
				),
				array(
					'db' => "product_rev",
					'op' => "=",
					'value' => $rev
				)
			),
		);
		return (SSP::process($get,$this->db, $options));
	}
	
	
	public function getTableByPage($get = array(),$columns = array()){

		require( 'ssp.class.php' );
		
		$options = array(
			'table' => $this->tableproduct,
			'alias' => 'p',
			'primaryKey' => 'id',
			'columns' => $columns,
		);
		if($get['latest_only'] =='true'){
			$options['join']= array(
				'statment' => "INNER JOIN ( SELECT id, max(rev) as rev from `".$this->tableproduct."` group by `id` ) as l on l.id=p.id and l.rev=p.rev",
				'alias' => 'l',
			);
		}
		return (SSP::process($get,$this->db, $options));
	}

	public function getProductSearch($data){
		$sql  ="SELECT data.id,data.name,GROUP_CONCAT(data.rev)as revs";
		$sql .="	FROM `" . $this->tableproduct ."` as data";
		$sql .="	WHERE data.id LIKE '%".$data."%'";
		$sql .="		OR data.name LIKE '%".$data."%'";
		$sql .="	GROUP BY data.id,data.name";
		return ($this->db->query($sql));
	}
	
	public function duplicate($id,$rev,$newid,$newrev){
		$sql  ="SELECT id";
		$sql .="	FROM `" . $this->tableproduct ."`";
		$sql .="	WHERE id = '".$newid."'";
		$sql .="		AND rev = '".$newrev."'";
		if($this->db->query($sql)->num_rows){return 'exist';}
		
		$this->addlog($newid,$newrev,'part duplicate',$id.':'.$rev,$newid.':'.$newrev);
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tableproduct ."`";
		$sql .="	WHERE id = '".$id."'";
		$sql .="		AND rev = '".$rev."'";
		$data = $this->db->query($sql)->row;
		unset($data['id']);
		unset($data['rev']);
		unset($data['date_created']);
		unset($data['user_created']);

		$this->editRecord($newid,$newrev,$data);
		return 'OK';
	}

	public function getRecord($id,$rev,$cols=NULL) {
		$sql  ="SELECT ";
		if(is_null($cols)){
			$sql .="data.*,ISNULL(bom.id)as hasBOM, ";
		}
		else{
			foreach($cols as $col){
				$sql .="data.`".$col->name.'`, ';
			}
		}
		$sql .="	CONCAT(createuser.firstname,' ', createuser.lastname) as createuser";
		$sql .="	FROM `" . $this->tableproduct ."` as data";
		$sql .="	LEFT JOIN `".DB_PREFIX . "user` as createuser ON createuser.user_id = `user_created`";
		$sql .="	LEFT JOIN `".DB_PREFIX . "mrp_bom` as bom on (data.id=bom.parent_id AND data.rev=parent_rev)";
		$sql .="	WHERE data.id = '".$id."'";
		$sql .="		AND data.rev = '".$rev."'";
		return ($this->db->query($sql));
	}
	public function getNextID($min,$max) {
		$sql  ="SELECT MAX(id) as max";
		$sql .="	FROM `" . $this->tableproduct ."` as data";
		$sql .="	WHERE id BETWEEN '".$min."' AND '".$max."'";
		
		$a = (int)str_replace('-','',$this->db->query($sql)->row['max']);
		$b = $a+1;
		return (sprintf("%04u-%03u",($b/1000),($b%1000)));
		
		
	}
	public function editRecord($id,$rev,$data) {
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tableproduct ."` as data";
		$sql .="	WHERE id = '".$id."'";
		$sql .="		AND rev = '".$rev."'";
		$original = $this->db->query($sql);
		if($original->num_rows==0){
			$sql  = "INSERT INTO `" . $this->tableproduct ."`";
			
			$col	= "(";
			$values	= "(";
			foreach($data as $key=>$val){
				$col	.= "`".$key."`,";
				$values	.= "'".$val."',";
				$this->addlog($id,$rev,$key,NULL,$val);
				
			}
			$col	.=	"`id`,`rev`,`date_created`,`user_created`)";
			$values	.=	"'".$id."','".$rev."',UTC_TIMESTAMP,".$this->user->getId().")";
			
			$sql .= $col . " VALUES " . $values;
			
			return ($this->db->query($sql));
		}
		else{
			$sql  = "UPDATE `" . $this->tableproduct ."` SET";
			
			foreach($data as $key=>$val){
				$sql .= "`".$key."` = '".$val."',";
				$this->addlog($id,$rev,$key,$original->row[$key],$val);
			}
			$sql	= substr($sql , 0, -1);
			$sql .= "WHERE `id` = '".$id."'";
			$sql .="		AND rev = '".$rev."'";
			return ($this->db->query($sql));
		}
	}
}
