<?php 
class ModelExtensionMRPMRPweee extends Model {
	private $tableproduct	= DB_PREFIX . 'mrp_product';
	
	public function install() {
		$this->db->query("ALTER TABLE `" . $this->tableproduct ."` ADD COLUMN IF NOT EXISTS `WEEE_Weight`    FLOAT COMMENT '{\"name\":\"WEEE_Weight\",\"type\":\"2\",\"options\":[\"Kg\"],\"tooltip\":\"This weight will override the calculated BOM weight\"}'");
	}
	public function uninstall() {
	}
}