<?php
class ControllerExtensionModulePPC extends Controller
{
	private $error = array();


	public function index(){
		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
	}

	public function install(){
		$this->load->model('extension/PPC/PPC');
		$this->model_extension_PPC_PPC->install();
		
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_PPC', ['module_PPC_status' => 1]);
	}

	public function uninstall(){
		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('module_PPC');
		
		$this->load->model('extension/PPC/PPC');
		$this->model_extension_PPC_PPC->uninstall();
	}
	
}
