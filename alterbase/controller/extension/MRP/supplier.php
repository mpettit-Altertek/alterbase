<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerExtensionMRPsupplier extends Controller
{
	private $error = array();

	public function index(){
		$this->load->language('extension/MRP/supplier');
		$this->load->model('extension/MRP/MRPsupplier');
		$title = '<i class="fa '.$this->language->get('heading_icon').'"></i>&nbsp;'.$this->language->get('heading_title');
		$this->document->setTitle($this->language->get('heading_title'));
	
	// BREADCRUMBS
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),		'href' => $this->url->link('common/dashboard',			'user_token=' . $this->session->data['user_token'], true)	);
		$data['breadcrumbs'][] = array(	'text' => $title,									'href' => $this->url->link('extension/MRP/supplier/list','user_token=' . $this->session->data['user_token'], true)	);
		$data['new'] = $this->url->link('extension/MRP/supplier/view','user_token=' . $this->session->data['user_token'], true);
	// DATA
		$data['fields'] = $this->model_extension_MRP_MRPsupplier->getTableCustomColumns();

		$data['viewpath'] = $this->url->link('extension/MRP/supplier/view',	'user_token=' . $this->session->data['user_token'], true);
		$data['ajax_route'] = 'index.php?route=extension/MRP/supplier/getTable&user_token=' . $this->session->data['user_token'];
		
		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');
	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/MRP/supplierlist', $data));
	}
	public function getTable(){
		$this->load->model('extension/MRP/MRPsupplier');

		$fields = $this->model_extension_MRP_MRPsupplier->getTableCustomColumns();

		$columns = array();
		$columns[] = array(	'db'	=> 'id',	'dt'	=> 0,	);
		$columns[] = array(	'db'	=> 'name',	'dt'	=> 1,	);
		$ix = 2;
		foreach ($fields as $field) {
			$columns[] = array(	'db'	=> $field->name,
								'dt'	=> $ix,
								);
			$ix+=1;
		}
		$data = $this->model_extension_MRP_MRPsupplier->getTableByPage($this->request->get,$columns);
		
		foreach($data['data'] as $key=>$val){
			$ix = 2;
			foreach ($fields as $field) {
				if($field->type == 3){
					if(isset($field->options[$val[$ix]])){
						$data['data'][$key][$ix] = $field->options[$val[$ix]];
					}
				}
				$ix+=1;
			}
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}

	public function editsupplier(){
		$this->load->language('extension/MRP/supplier');
		$this->load->model('extension/MRP/MRPsupplier');
		
		if 		(isset($this->request->post['id']))	{ $id = $this->request->post['id']; }
		else if (isset($this->request->get['id']))	{ $id = $this->request->get['id']; }
		else										{ $id = NULL; }
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$ret = $this->model_extension_MRP_MRPsupplier->editRecord($id,$this->request->post['fields']);
			if($ret){
				$this->session->data['success'] = $this->language->get('text_success');
				if($id==NULL){
					$id = $this->model_extension_MRP_MRPsupplier->getidByName($this->request->post['fields']['name']);
				}
			}
		}
		$this->response->redirect($this->url->link('extension/MRP/supplier/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id, true));
	}

	public function view(){
		$this->load->language('extension/MRP/supplier');
		$this->load->model('extension/MRP/MRPsupplier');
		
		if 		(isset($this->request->post['id']))	{ $id = $this->request->post['id']; }
		else if (isset($this->request->get['id']))	{ $id = $this->request->get['id']; }
		else										{ $id = NULL; }
		
		$title = $this->language->get('text_view');
		if(!is_null($id)){$title .=$id;}
		
		$this->document->setTitle($title);
	
	// BREADCRUMBS
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),																			'href' => $this->url->link('common/dashboard',			'user_token=' . $this->session->data['user_token'], true)	);
		$data['breadcrumbs'][] = array(	'text' => '<i class="fa '.$this->language->get('heading_icon').'"></i>&nbsp;'.$this->language->get('heading_title'),	'href' => $this->url->link('extension/MRP/supplier',		'user_token=' . $this->session->data['user_token'], true)	);
		
		if(!is_null($id)){
			$data['action'] = $this->url->link('extension/MRP/supplier/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id, true);
		}
		else{
			$data['action'] = $this->url->link('extension/MRP/supplier/view'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		}
		$data['breadcrumbs'][] = array(	'text' => $title,	'href' => $data['action'] );

		$data['action'] = $this->url->link('extension/MRP/supplier/editsupplier'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('extension/MRP/supplier','user_token=' . $this->session->data['user_token'], true);
		
		$data['fields'] = $this->model_extension_MRP_MRPsupplier->getTableCustomColumns();
		
		$data['id'] = $id;
		if(!is_null($id)){
			$data['dispid'] =$id;
			$data['field_data'] = $this->model_extension_MRP_MRPsupplier->getRecord($id,$data['fields'])->row;

			$query = $this->model_extension_MRP_MRPsupplier->getRecord($id)->row;
			$data['name'] = $query['name'];
		}
		$data['ajax_route_history']				= 'index.php?route=extension/MRP/supplier/getTablehistory&user_token=' . $this->session->data['user_token']. '&id=' . $id;
		
		$this->document->addScript('view/javascript/jquery/jquery.inputmask.min.js');
		
		$this->document->addScript('view/javascript/jquery/magnific-popup/jquery.magnific-popup.min.js');
		$this->document->addStyle('view/javascript/jquery/magnific-popup/magnific-popup.css');
		
		$this->document->addScript('view/javascript/jquery/jquery-ui/jquery-ui.min.js');
		$this->document->addStyle('view/javascript/jquery/jquery-ui/jquery-ui.min.css');
		
		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/MRP/supplierview', $data));
	}

	public function searchsupplier(){
		$this->load->model('extension/MRP/MRPsupplier');
		$query = $this->model_extension_MRP_MRPsupplier->getsupplierSearch($this->request->get['term']);
		$data = array();
		foreach ($query->rows as $row) {
			$data[] = array(
				'id'	=> $row['id'],
				'label'	=> sprintf ("%s",	$row['name']),
				'value'	=> sprintf ("%s",	$row['name']),
			);
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
	public function editsuppliersorders(){
		$this->load->model('extension/MRP/MRPsupplier');
		$this->load->model('extension/MRP/MRPsupplierorder');
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$id = $this->request->post['id'];
			$rev = $this->request->post['rev'];
			
			foreach($this->request->post['suppliers'] as $index => $entry) {
				if(isset($this->request->post['suppliers'][$index]['supplier_name'])){
					$this->request->post['suppliers'][$index]['supplier_id'] =	$this->model_extension_MRP_MRPsupplier->getidByName($this->request->post['suppliers'][$index]['supplier_name']);
					unset($this->request->post['suppliers'][$index]['supplier_name']);
				}
				if(count($this->request->post['suppliers'][$index])==1){
					unset($this->request->post['suppliers'][$index]);
				}
			}
			$this->model_extension_MRP_MRPsupplierorder->editRecord($id,$rev,$this->request->post['suppliers']);
		}
		$this->response->redirect($this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev, true));
	}
	public function action_duplicate(){
		$this->load->model('extension/MRP/MRPsupplierorder');
		$this->model_extension_MRP_MRPsupplierorder->duplicate($id,$rev,$newid,$newrev);
	}
	public function productview_suppliers(){
		$this->load->model('extension/MRP/MRPsupplier');
		$this->load->model('extension/MRP/MRPsupplierorder');
		
		if 		(isset($this->request->post['id']))	{ $id = $this->request->post['id']; }
		else if (isset($this->request->get['id']))	{ $id = $this->request->get['id']; }
		else										{ $id = NULL; }
		
		if 		(isset($this->request->post['rev']))	{ $rev = $this->request->post['rev']; }
		else if (isset($this->request->get['rev']))		{ $rev = $this->request->get['rev']; }
		else											{ $rev = NULL; }
	
		$data['id'] = $id;
		$data['rev'] = $rev;
		
		$data['action_suppliers'] = $this->url->link('extension/MRP/supplier/editsuppliersorders'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$data['suppfields']		= $this->model_extension_MRP_MRPsupplierorder->getTableCustomColumnsAssoc();
		$data['suppfields']['Goods_In_Inspection_Level']	= $this->model_extension_MRP_MRPsupplier->getTableCustomColumnsAssoc()['Goods_In_Inspection_Level'];

		foreach ($data['suppfields'] as $key => $value){
			$data['suppfields'][$key]['readonly'] = False;
		}
		$data['suppfields']['Goods_In_Inspection_Level']['readonly'] = True;

		$data['suppliers'] = $this->model_extension_MRP_MRPsupplierorder->getRecord($id,$rev,array(array('name'=>"data.*"),array('name'=>"sup.name"),array('name'=>"sup.Goods_In_Inspection_Level")))->rows;

		$data['searchurlsupplier'] = htmlspecialchars_decode($this->url->link('extension/MRP/supplier/searchsupplier', 'user_token=' . $this->session->data['user_token'], true));

		return ($this->load->view('extension/MRP/productview_suppliers', $data));
	}
	
	public function getTablehistory(){
		$this->load->language('extension/MRP/supplier');
		$this->load->model('extension/MRP/MRPsupplier');
		$id = $this->request->get['id'];
		$columns = array();
		$columns[] = array(	'db'	=> 'date',			'dt'	=> 0,	);
		$columns[] = array(	'db'	=> 'user',			'dt'	=> 1,	);
		$columns[] = array(	'db'	=> 'field',			'dt'	=> 2,	);
		$columns[] = array(	'db'	=> 'oldval',		'dt'	=> 3,	);
		$columns[] = array(	'db'	=> 'newval',		'dt'	=> 4,	);
		$data = $this->model_extension_MRP_MRPsupplier->getlogs($id,$this->request->get,$columns);
		
		foreach ($data['data'] as $key => $value){
			$data['data'][$key][1] = $this->db->query("SELECT CONCAT(firstname,' ', lastname) as user FROM `".DB_PREFIX . "user` WHERE user_id = '" . $data['data'][$key][1] . "'")->row['user'];
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}
