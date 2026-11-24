<?php
class ControllerExtensionModuleMRPsupplier extends Controller
{
	private $code = 'MRPsupplier';
	private $error = array();

	protected function validate(){
		if (!$this->user->hasPermission('modify', 'extension/module/'.$this->code)) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		return !$this->error;
	}

	public function index(){
		$this->load->language('extension/module/'.$this->code);
		$this->load->model('extension/MRP/'.$this->code);
		
		$title = '<i class="fa '.$this->language->get('heading_icon').'"></i>&nbsp;'.$this->language->get('heading_title');
		$this->document->setTitle($title);
		$this->load->model('setting/module');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			foreach ($this->request->post['fields'] as $k=>$v) {
				$this->request->post['fields'][$k]['options'] = explode("\r\n", $this->request->post['fields'][$k]['options']);
			}
			$this->model_extension_MRP_MRPsupplier->modifyTable($this->request->post['fields']);
			$this->session->data['success'] = $this->language->get('text_success');
		}
		$data['error_name'] = '';
		$data['error_warning'] = '';
		if (isset($this->error['warning']))	{ $data['error_warning'] = $this->error['warning'];	}
		if (isset($this->error['name']))	{ $data['error_name'] = $this->error['name'];		}
	
	// BREADCRUMBS
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),		'href' => $this->url->link('common/dashboard', 		'user_token=' . $this->session->data['user_token'], true)					);
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_extension'),	'href' => $this->url->link('marketplace/extension',	'user_token=' . $this->session->data['user_token'] . '&type=module', true)	);
		$data['breadcrumbs'][] = array(	'text' => $title,									'href' => $this->url->link('extension/module/'.$this->code,	'user_token=' . $this->session->data['user_token'], true)			);

		$data['action'] = $this->url->link('extension/module/'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);
	// DATA

		$data['fields'] = $this->model_extension_MRP_MRPsupplier->getTableCustomColumns();
		foreach ($data['fields'] as $k=>$v) {
			$data['fields'][$k]->options = implode("\r\n", $data['fields'][$k]->options);
		}
		$data['types'] = array();
		$data['types'][1] = array('name'=>'Text',		'optionsneeded'=>false	);
		$data['types'][2] = array('name'=>'Number',		'optionsneeded'=>false	);
		$data['types'][3] = array('name'=>'Combo',		'optionsneeded'=>true	);
		$data['types'][4] = array('name'=>'Date/Time',	'optionsneeded'=>false	);
		$data['types'][5] = array('name'=>'Currency',	'optionsneeded'=>false	);
		
		$this->document->addScript('view/javascript/jquery/dynamiclist/jquery.dynamiclist.js');
			
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/module/MRPtableedit', $data));
	}

	public function install(){
		$this->load->model('extension/MRP/MRPsupplier');
		$this->model_extension_MRP_MRPsupplier->install();
		
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_MRPsupplier', ['module_MRPsupplier_status' => 1]);
	}

	public function uninstall(){
		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('module_MRPsupplier');
		
		$this->load->model('extension/MRP/MRPsupplier');
		$this->model_extension_MRP_MRPsupplier->uninstall();
	}
	
}
