<?php
class ControllerExtensionModuleMRPlithium extends Controller
{
	private $error = array();


	public function index(){
		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
	}

	public function install(){
		$this->load->model('extension/MRP/MRPlithium');
		$this->model_extension_MRP_MRPlithium->install();
		
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_MRPlithium', ['module_MRPlithium_status' => 1]);
	}

	public function uninstall(){
		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('module_MRPlithium');
		
		$this->load->model('extension/MRP/MRPlithium');
		$this->model_extension_MRP_MRPlithium->uninstall();
	}
	
}
