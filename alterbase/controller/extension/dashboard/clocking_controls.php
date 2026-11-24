<?php
class Controllerextensiondashboardclockingcontrols extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/dashboard/clocking_controls');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->model_setting_setting->editSetting('dashboard_clocking_controls', $this->request->post);

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
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('heading_title'),	'href' => $this->url->link('extension/dashboard/clocking_controls', 'user_token=' . $this->session->data['user_token'])			);
		$data['action'] = $this->url->link('extension/dashboard/clocking_controls', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard', true);

		if (isset($this->request->post['dashboard_clocking_controls_width'])) {
			$data['dashboard_clocking_controls_width'] = $this->request->post['dashboard_clocking_controls_width'];
		} else {
			$data['dashboard_clocking_controls_width'] = $this->config->get('dashboard_clocking_controls_width');
		}
		
		$data['columns'] = array();
		
		for ($i = 3; $i <= 12; $i++) {
			$data['columns'][] = $i;
		}
		
		if (isset($this->request->post['dashboard_clocking_controls_status'])) {
			$data['dashboard_clocking_controls_status'] = $this->request->post['dashboard_clocking_controls_status'];
		} else {
			$data['dashboard_clocking_controls_status'] = $this->config->get('dashboard_clocking_controls_status');
		}

		if (isset($this->request->post['dashboard_clocking_controls_sort_order'])) {
			$data['dashboard_clocking_controls_sort_order'] = $this->request->post['dashboard_clocking_controls_sort_order'];
		} else {
			$data['dashboard_clocking_controls_sort_order'] = $this->config->get('dashboard_clocking_controls_sort_order');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/dashboard/clocking_controls_form', $data));
	}
	
	public function dashboard() {
		$this->load->language('extension/dashboard/clocking_controls');
		$this->load->model('extension/module/clocking');
		$this->load->model('tool/image');

		$this->load->model('extension/module/clocking');
		
		$data['buttons'] = "
			<style>
				#myclkbuttonstbl {
					width: 100%;
					border-spacing: 0px 17px;
					border-collapse: initial;
					padding: 10px;
				}
				#myclkbuttonstbl td {
					font-size: 20px;
					line-height: 17px;
					padding: 17px;
					border-radius: 10px;
					font-family: 'Times New Roman', Times, serif;
					font-weight: normal;
					text-decoration: none;
					font-style: normal;
					font-variant: normal;
					text-transform: uppercase;
					box-shadow: rgb(0, 0, 0) 3px 3px 3px 3px;
					margin: 10px;
					text-align: center;
				}
			</style>
		";
		$tos = $this->model_extension_module_clocking->getToButtons($this->user->getId());
		$data['buttons'] .= "<table id='myclkbuttonstbl'>";
		foreach($tos as $to){
			$data['buttons'] .= "<tr>
							<td>
								<a href=".$this->url->link('extension/module/clocking/actionEvent', 'user_token=' . $this->session->data['user_token'] . '&type='.$to['type'].'&calid='.$to['calid'].'&user_id='.$this->user->getId()).">
									".$to['text']."
								</a>
							</td>
						</tr>
			";
		}
		$data['buttons'] .= "</table>";
		
		
		return $this->load->view('extension/dashboard/clocking_controls_dash', $data);
	}
}









