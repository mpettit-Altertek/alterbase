<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerExtensionMRPproduct extends Controller
{
	private $error = array();

	function dsprintf($str, array $args) {
		$i = 1;
		foreach ($args as $k => $v) {
			$str = str_replace("%{$k}$", "%{$i}$", $str);
			$i++;
		}
		return vsprintf($str, array_values($args));
	}

	public function index(){
		$this->load->language('extension/MRP/product');
		$this->load->model('extension/MRP/MRPproduct');
		$title = '<i class="fa '.$this->language->get('heading_icon').'"></i>&nbsp;'.$this->language->get('heading_title');
		$this->document->setTitle($this->language->get('heading_title'));
	
	// BREADCRUMBS
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),		'href' => $this->url->link('common/dashboard',			'user_token=' . $this->session->data['user_token'], true)	);
		$data['breadcrumbs'][] = array(	'text' => $title,									'href' => $this->url->link('extension/MRP/product/list','user_token=' . $this->session->data['user_token'], true)	);
		$data['new'] = $this->url->link('extension/MRP/product/view','user_token=' . $this->session->data['user_token'], true);
	// DATA	
		$data['fields']		= $this->model_extension_MRP_MRPproduct->getTableCustomColumns();
		
		$data['viewpath'] = $this->url->link('extension/MRP/product/view',	'user_token=' . $this->session->data['user_token'], true);
		$data['ajax_route'] = 'index.php?route=extension/MRP/product/getTable&user_token=' . $this->session->data['user_token'];
		
		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');
	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/MRP/productlist', $data));
	}
	public function getTable(){
		$this->load->model('extension/MRP/MRPproduct');
		$this->load->model('extension/MRP/MRPbom');
		
		$fields	= $this->model_extension_MRP_MRPproduct->getTableCustomColumns();

		$columns = array();
		$columns[] = array(	'db'	=> 'id',	'dt'	=> 0,	);
		$columns[] = array(	'db'	=> 'id',	'dt'	=> 1,	);
		$columns[] = array(	'db'	=> 'rev',	'dt'	=> 2,	);
		$columns[] = array(	'db'	=> 'name',	'dt'	=> 3,	);
		
		$ix = 4;
		foreach ($fields as $field) {
			$columns[] = array(	'db'		=> $field->name,
								'dt'		=> $ix,
								);
			$ix+=1;
		}
		
		$data = $this->model_extension_MRP_MRPproduct->getTableByPage($this->request->get,$columns);
		foreach($data['data'] as $key=>$val){
			if($this->model_extension_MRP_MRPbom->hasBOM($val[0],$val[2]))	{$icon = '<img  src="view/image/assembly24.png" />'; }
			else															{$icon = '<img  src="view/image/part24.png" />'; 	}
			$data['data'][$key][0] = $icon;
			
			$ix = 4;
			foreach ($fields as $field) {
				if($field->type == 3){
					if(isset($field->options[$val[$ix]])){
						$data['data'][$key][$ix] = $field->options[$val[$ix]];
					}
					else{
						echo "<pre>";
						echo "<pre>".var_export($val,true)."</pre>";
						echo "<pre>".var_export($ix,true)."</pre>";
						echo "<pre>".var_export($field->options,true)."</pre>";
						echo "</pre>";
					}
				}
				$ix+=1;
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}

	public function searchproduct(){
		$this->load->model('extension/MRP/MRPproduct');

		$query = $this->model_extension_MRP_MRPproduct->getProductSearch($this->request->get['term']);
		
		$data = array();
		foreach ($query->rows as $row) {
			$data[] = array(
				'id'	=> $row['id'],
				'label'	=> sprintf ("%s - %s",	$row['id'],$row['name']),
				'value'	=> $row['id'],
				'revs'	=> explode(',',$row['revs']),
			);
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}

	public function action_editpart(){
		$this->load->model('extension/MRP/MRPproduct');
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$id = $this->request->post['id'];
			$rev = $this->request->post['rev'];
			$this->model_extension_MRP_MRPproduct->editRecord($id,$rev,$this->request->post['fields']);
		}
		$this->response->redirect($this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev, true));
	}
	public function action_editbom(){
		$this->load->model('extension/MRP/MRPbom');
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$id = $this->request->post['id'];
			$rev = $this->request->post['rev'];
			foreach($this->request->post['rootbom'] as $index => $entry) {
				if(count($this->request->post['rootbom'][$index])<=2){
					unset($this->request->post['rootbom'][$index]);
				}
			}
			
			
			$this->model_extension_MRP_MRPbom->editbom($id,$rev,$this->request->post['rootbom']);
		}
		$this->response->redirect($this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev. '&start_unlocked=1', true));
	}

	public function action_duplicate(){
		$this->load->language('extension/MRP/product');
		$this->load->model('extension/MRP/MRPproduct');
		$this->load->model('extension/MRP/MRPbom');
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$id = $this->request->post['id'];
			$rev = $this->request->post['rev'];
			$newid = $this->request->post['newid'];
			$newrev = $this->request->post['newrev'];
			$notes = $this->request->post['notes'];
			
			if($this->model_extension_MRP_MRPproduct->duplicate($id,$rev,$newid,$newrev)=='exist'){
				$this->session->data['error'] = $this->dsprintf($this->language->get('error_exist'),		$this->request->post);
				$this->response->redirect($this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev, true));
			}
			$this->model_extension_MRP_MRPproduct->addlog($newid,$newrev,'notes','',$notes);
			$this->model_extension_MRP_MRPbom->duplicate($id,$rev,$newid,$newrev);
			
			$this->response->redirect($this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $newid. '&rev=' . $newrev. '&start_unlocked=1', true));
		}
		$this->response->redirect($this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev, true));
	}

	public function view(){
		$this->load->language('extension/MRP/product');
		$this->load->model('extension/MRP/MRPproduct');
		$this->load->model('extension/MRP/MRPbom');
		
		if 		(isset($this->request->post['id']))	{ $id = $this->request->post['id']; }
		else if (isset($this->request->get['id']))	{ $id = $this->request->get['id']; }
		else										{ $id = NULL; }
		
		if 		(isset($this->request->post['rev']))	{ $rev = $this->request->post['rev']; }
		else if (isset($this->request->get['rev']))		{ $rev = $this->request->get['rev']; }
		else											{ $rev = NULL; }
	
		if 		(isset($this->request->post['start_unlocked']))	{ $start_unlocked = 1; }
		else if (isset($this->request->get['start_unlocked']))	{ $start_unlocked = 1; }
		else													{ $start_unlocked = 0; }
		$data['start_unlocked'] = $start_unlocked;
		
		$title = $this->language->get('text_view');
		if(!is_null($id)){
			$query = $this->model_extension_MRP_MRPproduct->getRecord($id,$rev)->row;
			$title .= $id .' Rev'.$rev. ' - '.$query['name'];
		}
		$this->document->setTitle($title);
	// BREADCRUMBS
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),																			'href' => $this->url->link('common/dashboard',			'user_token=' . $this->session->data['user_token'], true)	);
		$data['breadcrumbs'][] = array(	'text' => '<i class="fa '.$this->language->get('heading_icon').'"></i>&nbsp;'.$this->language->get('heading_title'),	'href' => $this->url->link('extension/MRP/product',		'user_token=' . $this->session->data['user_token'], true)	);
		
		if(!is_null($id)){
			$data['action'] = $this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev, true);
		}
		else{
			$data['action'] = $this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		}
		$data['breadcrumbs'][] = array(	'text' => $title,	'href' => $data['action'] );

		$data['action_part']		= $this->url->link('extension/MRP/product/action_editpart'.		$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$data['action_bom']			= $this->url->link('extension/MRP/product/action_editbom'.		$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$data['action_duplicate']	= $this->url->link('extension/MRP/product/action_duplicate'.	$this->code, 'user_token=' . $this->session->data['user_token'], true);
		
		$data['cancel'] = $this->url->link('extension/MRP/product','user_token=' . $this->session->data['user_token'], true);
		
		$data['fields']		= $this->model_extension_MRP_MRPproduct->getTableCustomColumns();
		
		$data['id'] = $id;
		$data['rev'] = $rev;
		
		
		$data['statmodules'] = array();
		
		$data['nextids'] = array();
		if(!is_null($id)){
			$data['dispidrev'] =$id." Rev".$rev;
			$data['nextids'][] = array(	'text' => $this->language->get('uprev').$id,	'val' => $id );
			
			
			$data['field_data'] = $this->model_extension_MRP_MRPproduct->getRecord($id,$rev,$data['fields'])->row;

			$query = $this->model_extension_MRP_MRPproduct->getRecord($id,$rev)->row;
			$data['name']				= $query['name'];
			$data['record_created']		= $query['date_created'];
			$data['record_created_by']	= $query['createuser'];
			
			$usedon = $this->model_extension_MRP_MRPbom->getusedon($id,$rev);
			$data['usedon'] = $usedon;
			$data['usedoncols'] = array();
			$data['usedoncols'][] = array( 'name' => $this->language->get('entry_partno'),	'datapath' => 'parent_id');
			$data['usedoncols'][] = array( 'name' => $this->language->get('entry_rev'),		'datapath' => 'parent_rev');
			$data['usedoncols'][] = array( 'name' => $this->language->get('entry_name'),	'datapath' => 'name');
			$data['usedoncols'][] = array( 'name' => $this->language->get('entry_qty'),		'datapath' => 'Quantity');


			$rootbom = $this->model_extension_MRP_MRPbom->getsingleBOM($id,$rev);
			$data['rootbom'] = $rootbom;
			
			$fullbom = $this->model_extension_MRP_MRPbom->getfullBOM($id,$rev);
			$data['fullbom'] = $fullbom;
			//echo "<pre>".var_export($fullbom,true)."</pre>";
			
			$data['bomcols'] = array();
			$data['bomcols'][] = array( 'name' => $this->language->get('entry_revonbom'),	'datapath' => 'child_rev');
			$data['bomcols'][] = array( 'name' => $this->language->get('entry_revdisp'),	'datapath' => 'child.rev');
			$data['bomcols'][] = array( 'name' => $this->language->get('entry_name'),		'datapath' => 'child.name');
			
			$data['editbomcols'] = $this->model_extension_MRP_MRPbom->getTableCustomColumns();
			foreach ($data['editbomcols'] as $value){
				$data['bomcols'][] = array( 'name' => $value->name,	'datapath' => $value->name);
			}
			/* INSTER STATMODULES HERE */
			
		}else{
			$data['fullbom'] = array();
		}
		$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."1000-### - consumables",		'val' => $this->model_extension_MRP_MRPproduct->getNextID("1000-000","1999-999")	);
		$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."2000-### - components",		'val' => $this->model_extension_MRP_MRPproduct->getNextID("2000-000","2999-999")	);
		//$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."3000-###",						'val' => $this->model_extension_MRP_MRPproduct->getNextID("3000-000","3999-999")	);
		$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."4000-### - services",			'val' => $this->model_extension_MRP_MRPproduct->getNextID("4000-000","4999-999")	);
		$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."5000-### - sub-assemblies",	'val' => $this->model_extension_MRP_MRPproduct->getNextID("5000-000","5999-999")	);
		//$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."6000-###",						'val' => $this->model_extension_MRP_MRPproduct->getNextID("6000-000","6999-999")	);
		//$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."7000-###",						'val' => $this->model_extension_MRP_MRPproduct->getNextID("7000-000","7999-999")	);
		$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."8000-### - products",			'val' => $this->model_extension_MRP_MRPproduct->getNextID("8000-000","8999-999")	);
		$data['nextids'][] =	array(	'text' => $this->language->get('newseries')."9000-### - equipment",			'val' => $this->model_extension_MRP_MRPproduct->getNextID("9000-000","9999-999")	);
		$data['searchproducturl'] = htmlspecialchars_decode($this->url->link('extension/MRP/product/searchproduct', 'user_token=' . $this->session->data['user_token'], true));

		$data['RW_permission']		= $this->user->hasPermission('modify', 'extension/MRP/product');
		
		$data['ajax_route_history']				= 'index.php?route=extension/MRP/product/getTablehistory&user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev;
		
		if (isset($this->session->data['error']))	{ $data['error'] = $this->session->data['error']; unset($this->session->data['error']);}
		
		$data['modules'] = array();
		
		
		$this->document->addScript('view/javascript/jquery/jquery.inputmask.min.js');
		
		$this->document->addScript('view/javascript/jquery/dynamiclist/jquery.dynamiclist.js');
		
		
		$this->document->addScript('view/javascript/jquery/jquery.treetable.js');
		$this->document->addStyle('view/javascript/jquery/jquery.treetable.css');
		$this->document->addStyle('view/javascript/jquery/jquery.treetable.theme.default.css');
		
		$this->document->addScript('view/javascript/jquery/magnific-popup/jquery.magnific-popup.min.js');
		$this->document->addStyle('view/javascript/jquery/magnific-popup/magnific-popup.css');
		
		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');
		
		$this->document->addScript('view/javascript/bootstrap-datepicker.js');
		$this->document->addStyle('view/javascript/bootstrap-datepicker.css');
		
		$this->document->addScript('view/javascript/bootstrap-dialog.min.js');
		$this->document->addStyle('view/javascript/bootstrap-dialog.css');
		
		$this->document->addScript('view/javascript/jquery/jquery-ui.js');
		$this->document->addStyle('view/javascript/jquery/jquery-ui.css');
		
		$data['popups'] = $this->load->view('extension/MRP/productview_popups', $data);
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/MRP/productview', $data));
	}
	public function getTablehistory(){
		$this->load->language('extension/MRP/product');
		$this->load->model('extension/MRP/MRPproduct');
		$id = $this->request->get['id'];
		$rev = $this->request->get['rev'];
		
		$columns = array();
		$columns[] = array(	'db'	=> 'date',			'dt'	=> 0,	);
		$columns[] = array(	'db'	=> 'user',			'dt'	=> 1,	);
		$columns[] = array(	'db'	=> 'field',			'dt'	=> 2,	);
		$columns[] = array(	'db'	=> 'oldval',		'dt'	=> 3,	);
		$columns[] = array(	'db'	=> 'newval',		'dt'	=> 4,	);
		$data = $this->model_extension_MRP_MRPproduct->getlogs($id,$rev,$this->request->get,$columns);
		
		foreach ($data['data'] as $key => $value){
			$data['data'][$key][1] = $this->db->query("SELECT CONCAT(firstname,' ', lastname) as user FROM `".DB_PREFIX . "user` WHERE user_id = '" . $data['data'][$key][1] . "'")->row['user'];
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}