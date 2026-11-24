<?php
class Controllerextensiondashboardclockingstatus extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/dashboard/clocking_status');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->model_setting_setting->editSetting('dashboard_clocking_status', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard',true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = ''; 
		}

		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),		'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])							);
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_extension'),	'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard')	);
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('heading_title'),	'href' => $this->url->link('extension/dashboard/clocking_status', 'user_token=' . $this->session->data['user_token'])			);
		$data['action'] = $this->url->link('extension/dashboard/clocking_status', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard', true);

		if (isset($this->request->post['dashboard_clocking_status_width'])) {
			$data['dashboard_clocking_status_width'] = $this->request->post['dashboard_clocking_status_width'];
		} else {
			$data['dashboard_clocking_status_width'] = $this->config->get('dashboard_clocking_status_width');
		}
		
		$data['columns'] = array();
		
		for ($i = 3; $i <= 12; $i++) {
			$data['columns'][] = $i;
		}
		
		if (isset($this->request->post['dashboard_clocking_status_status'])) {
			$data['dashboard_clocking_status_status'] = $this->request->post['dashboard_clocking_status_status'];
		} else {
			$data['dashboard_clocking_status_status'] = $this->config->get('dashboard_clocking_status_status');
		}

		if (isset($this->request->post['dashboard_clocking_status_sort_order'])) {
			$data['dashboard_clocking_status_sort_order'] = $this->request->post['dashboard_clocking_status_sort_order'];
		} else {
			$data['dashboard_clocking_status_sort_order'] = $this->config->get('dashboard_clocking_status_sort_order');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/dashboard/clocking_status_form', $data));
	}
	
	public function dashboard() {
		$this->load->language('extension/dashboard/clocking_status');
		$this->load->model('extension/module/clocking');
		$this->load->model('tool/image');
		
		$usersbelow = $this->model_extension_module_clocking->GetAllUsersBelow_associative($this->user->getId());
	
		$data['usersCurrentStatus'] = $this->model_extension_module_clocking->GetAllUsersCurrentStatus();
		foreach($data['usersCurrentStatus'] as $key => $value){
			if (is_file(DIR_IMAGE . $value['image']))	{ $data['usersCurrentStatus'][$key]['image'] = $this->model_tool_image->resize($value['image'],	45, 45);	}
			else										{ $data['usersCurrentStatus'][$key]['image'] = $this->model_tool_image->resize('profile.png',	45, 45);	}
			
			$requestParams = array(
				'date'		=> date('Y-m-d'),
				'user_id'	=> $value['user_id'],
				'period'	=> 'day'
			);
			if(array_key_exists($value['user_id'],$usersbelow)){
				$data['usersCurrentStatus'][$key]['times']	= $this->model_extension_module_clocking->getcumulativeEventTime($requestParams);;
			}
		
		}
		return $this->load->view('extension/dashboard/clocking_status_dash', $data);
	}
}









