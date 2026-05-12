<?php
class ControllerExtensionModuleMRPstock extends Controller
{
	private $code = 'MRPstock';
	private $error = array();


	public function index(){
		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
	}

	public function install(){
		$this->load->model('extension/MRP/MRPstock');
		$this->model_extension_MRP_MRPstock->install();
		
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_MRPstock', ['module_MRPstock_status' => 1]);
	}

	public function uninstall(){
		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('module_MRPstock');
		
		$this->load->model('extension/MRP/MRPstock');
		$this->model_extension_MRP_MRPstock->uninstall();
	}
	
}
