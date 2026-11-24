<?php
class ControllerExtensionModuleMRPproductweight extends Controller
{
	private $error = array();


	public function index(){
		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
	}

	public function install(){
		$this->load->model('extension/MRP/MRPproductweight');
		$this->model_extension_MRP_MRPproductweight->install();
		
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_MRPproductweight', ['module_MRPproductweight_status' => 1]);
	}

	public function uninstall(){
		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('module_MRPproductweight');
		
		$this->load->model('extension/MRP/MRPproductweight');
		$this->model_extension_MRP_MRPproductweight->uninstall();
	}
	
}
