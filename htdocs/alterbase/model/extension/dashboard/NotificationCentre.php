<?php 
class ModelExtensionDashboardNotificationCentre extends Model {
	private $tableNotificationSetup		= DB_PREFIX . 'notificationsetup';

	public function install() {
		$this->db->query("	CREATE TABLE `" . $this->tableNotificationSetup ."` (
								`id` int(11) NOT NULL,
								`rule` mediumtext NOT NULL,
								`notification` mediumtext NOT NULL,
								`route` mediumtext NOT NULL,
								PRIMARY KEY (`id`)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1
						");
	}
	public function uninstall() {
		$this->db->query("DROP TABLE `" . $this->tableNotificationSetup ."`");
	}
	
	//--------------------------------------------------------------------------------------------------------------------
	public function getNotificationSetup(){
		return $this->db->query("SELECT * FROM `" . $this->tableNotificationSetup ."`")->rows;
	}
	public function clearNotificationSetup(){
		$this->db->query("TRUNCATE `" . $this->tableNotificationSetup ."`");
	}
	public function setNotificationSetup($data){
		
		$sql = "INSERT INTO `".$this->tableNotificationSetup."`  (`id`, `rule`, `notification`,`route`) VALUES ";
		foreach($data as $key=>$value){
			$sql .= "('".$key."','".$value['rule']."','".$value['notification']."','".$value['route']."'),";
		}
		$sql = substr($sql, 0, -1);
		$this->db->query($sql);
	}
	public function exesql($sql){
		return $this->db->query($sql)->rows;
		
	}
	
}

