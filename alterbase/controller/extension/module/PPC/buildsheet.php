<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerExtensionModulePPCbuildsheet extends Controller
{
	public function index(){
		$this->load->language('extension/PPC/PPC');
		$this->load->model('extension/PPC/PPC');
		$data = array();


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/PPC/buildsheet', $data));
	}
}










