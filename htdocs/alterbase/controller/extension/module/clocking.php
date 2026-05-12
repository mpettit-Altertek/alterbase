<?php
class ControllerExtensionModuleClocking extends Controller
{
	private $error = array();
// administration
	public function index(){
		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
	}
	public function install(){
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_clocking', ['module_clocking_status' => 1]);
		
		$this->load->model('extension/module/clocking');
		$this->model_extension_module_clocking->install();
		
	}
	public function uninstall(){
		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('module_clocking');
		
		$this->load->model('extension/module/clocking');
		$this->model_extension_module_clocking->uninstall();
	}
// global
	public function actionEvent(){
		$this->load->model('extension/module/clocking');
		$this->model_extension_module_clocking->actionEvent($this->request->get);
		$this->response->redirect($this->request->server['HTTP_REFERER']);
	}
	public function buttons(){
		$this->load->model('extension/module/clocking');
		
		$output = "
			<style>
				.mybutton {
					font-size: 20px;
					line-height: 0px;
					padding: 17px;
					border-radius: 10px;
					font-family: 'Times New Roman', Times, serif;
					font-weight: normal;
					text-decoration: none;
					font-style: normal;
					font-variant: normal;
					text-transform: uppercase;
					box-shadow: rgb(0, 0, 0) 3px 3px 3px 3px;
					display: inline-block;
					min-width:200px;
					margin: 10px;
					text-align: center;
					white-space: nowrap;
				}
			</style>
		";
		$tos = $this->model_extension_module_clocking->getToButtons($this->user->getId());
		foreach($tos as $to){
			$output .= "<a style='display: inline-block;' href=".$this->url->link('extension/module/clocking/actionEvent', 'user_token=' . $this->session->data['user_token'] . '&type='.$to['type'].'&calid='.$to['calid'].'&user_id='.$this->user->getId()).">
						<div class='mybutton'>
							".$to['text']."
						</div>
					</a>
			";
		}
		return $output;
		
		
	}
// history
	public function history(){
		$this->load->language('extension/module/clocking');
		$this->load->model('extension/module/clocking');
		$this->document->setTitle($this->language->get('heading_title'));
		
		$data['columns'] = array();
		$data['columns'][] = array('text'	=> 'Timestamp',		'search' =>'daterange'	);
		$data['columns'][] = array('text'	=> 'User',			'search' =>'select',	'optionskey'=>'name',	'options'=>$this->model_extension_module_clocking->GetAllUsersBelow($this->user->getId())	);
		$data['columns'][] = array('text'	=> 'Event ID',		'search' =>'text',		);
		$data['columns'][] = array('text'	=> 'Field',			'search' =>'select',	'optionskey'=>'state',	'options'=>array('state'=>' ')+$this->model_extension_module_clocking->getEventTypes()	);
		$data['columns'][] = array('text'	=> 'Original value','search' =>'text',		);
		$data['columns'][] = array('text'	=> 'New value',		'search' =>'text',		);
		$data['columns'][] = array('text'	=> 'Modified by',	'search' =>'select',	'optionskey'=>'name',	'options'=>array('name'=>' ')+$this->model_extension_module_clocking->GetAllUsers()	);
		
		
		
		$data['ajax_route'] = 'index.php?route=extension/module/clocking/getTablehistory&user_token=' . $this->session->data['user_token'];
		
		$this->document->addScript('view/javascript/daterangepicker.js');
		$this->document->addStyle('view/javascript/daterangepicker.css');
		
		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');
	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		return $this->response->setOutput($this->load->view('extension/module/clocking/history', $data));
		
	}
	public function getTablehistory(){
		$this->load->model('extension/module/clocking');
		$get = $this->request->get;
		$daterange = explode(' - ',$get['columns'][0]['search']['value']);
		
		$get['columns'][0]['search']['value'] = "";
		
		$columns = array();
		
		$columns[] = array(	'db'	=> 'modified_date',
							'dt'	=> 0,	
							);
		$columns[] = array(	'db'	=> 'user_id',
							'dt'	=> 1,	
							'join'	=> [
								'table'	=> '(SELECT user_id, CONCAT(firstname," ",lastname) as name FROM '.DB_PREFIX . 'user)',
								'on' 	=> 'user_id',
								'select'=> 'name',
								'alias'	=> 'u',
								'as'	=> 'name',
								]
							);
		$columns[] = array(	'db'	=> 'calendar_id',
							'dt'	=> 2,	
							);
		$columns[] = array(	'db'	=> 'field',
							'dt'	=> 3,	
							);
		$columns[] = array(	'db'	=> 'original',
							'dt'	=> 4,	
							);
		$columns[] = array(	'db'	=> 'new',
							'dt'	=> 5,	
							);
		$columns[] = array(	'db'	=> 'modified_user_id',
							'dt'	=> 6,	
							'join'	=> [
								'table'	=> '(SELECT user_id, CONCAT(firstname," ",lastname) as name FROM '.DB_PREFIX . 'user)',
								'on' 	=> 'user_id',
								'select'=> 'name',
								'alias'	=> 'u',
								'as'	=> 'modified_user',
								]
							);
							
							
		$options = array();
		$options['table']		= DB_PREFIX . 'clk_calendar_history';
		$options['alias']		= 'e';
		$options['primaryKey']	= 'id';
		$options['columns']		=  $columns;
		if(count($daterange)>1){
			$options['where']		= array();
			$options['where'][]	= array(	'db' => 'modified_date',
											'op' => 'BETWEEN',
											'value' => 'str_to_date("'.$daterange[0].' 00:00:00", "%d/%m/%Y %T") AND str_to_date("'.$daterange[1].' 23:59:59", "%d/%m/%Y %T")'
											);
		}
		$data = $this->model_extension_module_clocking->getTableBySSP($get,$columns,$options);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
// calendar
	public function calendar(){
		$this->load->language('extension/module/clocking');
		$this->load->model('extension/module/clocking');
		$this->document->setTitle($this->language->get('heading_title'));
		
		$data['users']				= $this->model_extension_module_clocking->GetAllUsersBelow($this->user->getId());
		$data['allusers']			= $this->model_extension_module_clocking->GetAllUsers();
		$data['sources']			= $this->model_extension_module_clocking->GetSources();
		$data['types']				= $this->model_extension_module_clocking->getEventTypes();
		
		$data['myid'] = $this->user->getId();
		$data['ajax_Calendar'] = 'index.php?route=extension/module/clocking/getCalendar&user_token=' . $this->session->data['user_token'];
		$data['ajax_getcumulativeEventTime'] = 'index.php?route=extension/module/clocking/getcumulativeEventTime&user_token=' . $this->session->data['user_token'];
		
		
		$data['scheduler_imgs'] = ('view/javascript/scheduler/imgs/');
		$this->document->addStyle('view/javascript/scheduler/dhtmlxscheduler.css');
		$this->document->addScript('view/javascript/scheduler/dhtmlxscheduler.js');
		$this->document->addScript('view/javascript/scheduler/ext/dhtmlxscheduler_readonly.js');
		$this->document->addScript('view/javascript/scheduler/ext/dhtmlxscheduler_editors.js');
		$this->document->addScript('view/javascript/scheduler/ext/dhtmlxscheduler_minical.js');
		$this->document->addScript('view/javascript/scheduler/ext/dhtmlxscheduler_all_timed.js');
			
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		return $this->response->setOutput($this->load->view('extension/module/clocking/calendar', $data));
		
	}
	public function getcumulativeEventTime(){
		$this->load->model('extension/module/clocking');
		if($this->request->server["REQUEST_METHOD"]=="GET"){
			$result = $this->model_extension_module_clocking->getcumulativeEventTime($this->request->get);
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}
	public function getCalendar(){
		$this->load->model('extension/module/clocking');
		if($this->request->server["REQUEST_METHOD"]=="GET"){
			$result = $this->model_extension_module_clocking->calendarRead($this->request->get);
		}
		else
		{
			$requestPayload = json_decode(file_get_contents("php://input"));
			$id = $requestPayload->id;
			$action = $requestPayload->action;
			$body = (array) $requestPayload->data;

			$body['source_id'] = $this->user->getId();

			$result = [
				"action" => $action
			];

			if ($action == "inserted") {
				$body['source'] = 1;
				$result["tid"] = $this->model_extension_module_clocking->calendarCreate($body);
			} elseif($action == "updated") {
				$body['source'] = 2;
				$this->model_extension_module_clocking->calendarUpdate($id,$body);
			} elseif($action == "deleted") {
				$body['source'] = 2;
				$this->model_extension_module_clocking->calendarDelete($id,$body);
			}
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}
}
