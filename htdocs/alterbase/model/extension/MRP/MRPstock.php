<?php 
class ModelExtensionMRPMRPstock extends Model {
	private $tablestock			= DB_PREFIX . 'mrp_stock';
	private $tabletransaction	= DB_PREFIX . 'mrp_stock_Transaction';
	private $tablelocation		= DB_PREFIX . 'mrp_stock_location';
	
	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tablestock ."` (
			`id`			INT				NOT NULL AUTO_INCREMENT,
			`product_id`	VARCHAR(10)		NOT NULL,
			`product_rev`	VARCHAR(10)		NOT NULL,
			`location`		INT NOT NULL,
			`locationref`	VARCHAR(10)		NOT NULL,
			`qty`			INT NOT NULL,
			PRIMARY KEY (`id`),
			UNIQUE `abslocation` (`locationref`, `location`)
			);
		");
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tabletransaction ."` (
			`id`			INT				NOT NULL AUTO_INCREMENT ,
			`product_id`	VARCHAR(10)		NOT NULL,
			`product_rev`	VARCHAR(10)		NOT NULL,
			`fromLoc`		INT NOT NULL,
			`fromLocRef`	VARCHAR(10)		NOT NULL,
			`toLoc`			INT NOT NULL,
			`toLocRef`		VARCHAR(10)		NOT NULL,
			`qty`			INT NOT NULL,
			`date`			DATETIME		NULL DEFAULT NULL,
			`user`			INT NULL		DEFAULT NULL,
			PRIMARY KEY (`id`)
			);
		");
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . $this->tablelocation ."` (
			`id`			INT NOT NULL AUTO_INCREMENT,
			`name`			VARCHAR(255)	NOT NULL,
			`isstock`		INT(1),
			`ref_name`		VARCHAR(255)	NOT NULL,
			PRIMARY KEY (`id`)
			);
		");
		$this->db->query("INSERT INTO `" . $this->tablelocation ."`
			(`id`, `name`, `isstock`, `ref_name`) VALUES
			(1, 'PRF',					1,	'PRF No.'),
			(2, 'Awaiting_inspection',	1,	'Reference No.'),
			(3, 'Stores',				1,	'Batch No.'),
			(4, 'Scrap',				0,	'Reference No.'),
			(5, 'Sales order',			0,	'Sales Order No.'),
			(6, 'Works order',			0,	'Works Order No.'),
			(7, 'Build Sheet',			0,	'Build Sheet No.');
		");
	}
	public function uninstall() {
		$this->db->query("DROP TABLE `" . $this->tablestock ."`;");
		$this->db->query("DROP TABLE `" . $this->tabletransaction ."`;");
	}
	public function modifyTable($fields) {
		foreach ($fields as $field) {
			$this->db->query("ALTER TABLE `" . $this->tablestock ."` ADD COLUMN IF NOT EXISTS `" . $this->db->escape($field['name']) .                           "` VARCHAR(255)");
			$this->db->query("ALTER TABLE `" . $this->tablestock ."` CHANGE `" . $this->db->escape($field['name']) . "` `" . $this->db->escape($field['name']) . "` VARCHAR(255) COMMENT '" . $this->db->escape(json_encode($field)) . "'");
		}
	}
	public function getTableCustomColumns(){
		$query = $this->db->query("
			SELECT COLUMN_NAME, COLUMN_COMMENT
				FROM information_schema.COLUMNS
				WHERE TABLE_SCHEMA = '".DB_DATABASE."'
					AND TABLE_NAME = '" . $this->tablestock  ."'
					AND ORDINAL_POSITION > 7
		");
		$data = array();
		foreach ($query->rows as $row) {
			$data[] = json_decode($row['COLUMN_COMMENT']);
		}
		return($data);
	}
	public function get_stockLocations(){
		$data = $this->db->query("SELECT * FROM `" . $this->tablelocation ."`")->rows;
	
		return ($data);
	}
	public function get_stockLocation_info($id){
		$data = $this->db->query("SELECT * FROM `" . $this->tablelocation ."` WHERE `id`=".$id)->row;
	
		return ($data);
	}

	public function get_transactions($id,$rev,$get = array(),$columns = array()){

		require( 'ssp.class.php' );
		$options = array(
			'table' => $this->tabletransaction,
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

	public function add_transactions($id,$rev,$fromloc,$fromref,$toloc,$toref,$qty){
		$sql  = "INSERT INTO `" . $this->tabletransaction ."`";
		$sql	.=	"(`product_id`,`product_rev`,`fromLoc`,`fromLocRef`,`toLoc`,`toLocRef`,`qty`, `date`, `user`)";
		$sql	.=	"VALUES ('".$id."','".$rev."','".$fromloc."','".$fromref."','".$toloc."','".$toref."','".$qty."',UTC_TIMESTAMP,".$this->user->getId().")";
		return ($this->db->query($sql));
	}
	public function get_stock_in_loc($id,$rev,$loc,$ref){
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablestock ."`";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$sql .="		AND location = '".$loc."'";
		$sql .="		AND locationref = '".$ref."'";
		return($this->db->query($sql)->row);
	}
	public function get_stock($id,$rev){
		$sql  = "SELECT *";
		$sql .= "	FROM `" . $this->tablestock ."`";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$sql .="		AND isstock = '1'";
		$data = $this->db->query($sql)->rows;
		return ($data);
	}
	
	public function get_total_stock($id,$rev){
		$sql  = "SELECT product_id,product_rev,location,SUM(qty) as qty";
		$sql .= "	FROM `" . $this->tablestock ."`";
		$sql .="	JOIN `" . $this->tablelocation ."` loc ON loc.id=location";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$sql .="		AND loc.isstock = '1'";
		$sql .="	GROUP BY location";
		$data = $this->db->query($sql)->rows;
		return ($data);
	}
	
	public function get_stock_history_for_loc($loc,$get = array(),$columns = array()){
		
		require( 'ssp.class.php' );
		$options = array(
			'table' => $this->tablestock,
			'alias' => 's',
			'primaryKey' => 'id',
			'columns' => $columns,
			'where' => array(
				array(
					'alias'	=> 's',
					'db'	=> 'location',
					'op'	=> '=',
					'value'	=> $loc
				),
			),
		);
		return (SSP::process($get,$this->db, $options));
	}
	
	public function get_stock_table($id,$rev,$get = array(),$columns = array()){
		
		require( 'ssp.class.php' );
		$options = array(
			'table' => $this->tablestock,
			'alias' => 'l',
			'primaryKey' => 'id',
			'columns' => $columns,
			'join'=> array(
				'statment' => "JOIN `" . $this->tablelocation ."` loc ON loc.id=location",
				'alias' => 'loc',
			),
			'where' => array(
				array(
					'alias'	=> 'loc',
					'db'	=> 'isstock',
					'op'	=> '=',
					'value'	=> 1
				),
				array(
					'db'	=> 'product_id',
					'op'	=> '=',
					'value'	=> $id
				),
				array(
					'db'	=> 'product_rev',
					'op'	=> '=',
					'value'	=> $rev
				)
			),
		);
		return (SSP::process($get,$this->db, $options));
	}

	public function add_stock($id,$rev,$toloc,$toref,$qty){
		
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablestock ."`";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$sql .="		AND location = '".$toloc."'";
		$sql .="		AND locationref = '".$toref."'";
		if($this->db->query($sql)->num_rows>0){return "DESTUSED";}
		
		$sql  = "INSERT INTO `" . $this->tablestock ."`";
		$sql .=	"(`product_id`,`product_rev`,`location`,`locationref`,`qty`)";
		$sql .=	"VALUES ('".$id."','".$rev."','".$toloc."','".$toref."','".$qty."')";
		$ret = $this->db->query($sql);
		
		$this->add_transactions($id,$rev,'','',$toloc,$toref,$qty);
		return "OK";
	}
	
	public function move_stock($id,$rev,$fromloc,$fromref,$toloc,$toref,$qty){
		
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablestock ."`";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$sql .="		AND location = '".$toloc."'";
		$sql .="		AND locationref = '".$toref."'";
		$exsisting = $this->db->query($sql);
		
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablestock ."`";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$sql .="		AND location = '".$fromloc."'";
		$sql .="		AND locationref = '".$fromref."'";
		$data = $this->db->query($sql)->row;
		if($qty>$data['qty']){return "NOSTOCK";}
		
		$data['qty'] = $data['qty'] - $qty;
		
		if($data['qty']>0){
			$sql  ="UPDATE `" . $this->tablestock ."` SET";
			$sql .="	qty='".$data['qty']."'";
			$sql .="	WHERE product_id = '".$id."'";
			$sql .="		AND product_rev = '".$rev."'";
			$sql .="		AND location = '".$fromloc."'";
			$sql .="		AND locationref = '".$fromref."'";
		}else{
			$sql  ="DELETE";
			$sql .= "	FROM `" . $this->tablestock ."`";
			$sql .="	WHERE product_id = '".$id."'";
			$sql .="		AND product_rev = '".$rev."'";
			$sql .="		AND location = '".$fromloc."'";
			$sql .="		AND locationref = '".$fromref."'";
		}
		$this->db->query($sql);

		if($exsisting->num_rows>0){
			$sql  ="UPDATE `" . $this->tablestock ."` SET";
			$sql .="	qty='".($qty+$exsisting->row['qty'])."'";
			$sql .="	WHERE product_id = '".$id."'";
			$sql .="		AND product_rev = '".$rev."'";
			$sql .="		AND location = '".$toloc."'";
			$sql .="		AND locationref = '".$toref."'";
		}else{
			$sql  = "INSERT INTO `" . $this->tablestock ."`";
			$sql .=	"(`product_id`,`product_rev`,`location`,`locationref`,`qty`)";
			$sql .=	"VALUES ('".$id."','".$rev."','".$toloc."','".$toref."','".$qty."')";
		}
		$this->db->query($sql);
			
		
		$this->add_transactions($id,$rev,$fromloc,$fromref,$toloc,$toref,$qty);
		
		return "OK";
	}
	public function edit_stock($id,$rev,$loc,$ref,$qty){
		
		$sql  ="SELECT *";
		$sql .="	FROM `" . $this->tablestock ."`";
		$sql .="	WHERE product_id = '".$id."'";
		$sql .="		AND product_rev = '".$rev."'";
		$sql .="		AND location = '".$loc."'";
		$sql .="		AND locationref = '".$ref."'";
		$data = $this->db->query($sql)->row;

		if($qty>0){
			$sql  ="UPDATE `" . $this->tablestock ."` SET";
			$sql .="	qty='".$qty."'";
			$sql .="	WHERE product_id = '".$id."'";
			$sql .="		AND product_rev = '".$rev."'";
			$sql .="		AND location = '".$loc."'";
			$sql .="		AND locationref = '".$ref."'";
		}else{
			$sql  ="DELETE";
			$sql .= "	FROM `" . $this->tablestock ."`";
			$sql .="	WHERE product_id = '".$id."'";
			$sql .="		AND product_rev = '".$rev."'";
			$sql .="		AND location = '".$loc."'";
			$sql .="		AND locationref = '".$ref."'";
		}
		$this->db->query($sql);

		$this->add_transactions($id,$rev,$loc,$ref,$loc,$ref,$qty);
		
		return "OK";
	}
}
