<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerExtensionMRPstocklocWO extends Controller
{
	private $error = array();


	public function index(){
		$this->load->language('extension/MRP/stockloc');
		$this->load->model('extension/MRP/MRPproduct');
		$title = '<i class="fa '.$this->language->get('heading_icon').'"></i>&nbsp;'.'MRP stock on Works orders report';
		$this->document->setTitle($title);
		$data['title']		= $title;
	
	// BREADCRUMBS
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),		'href' => $this->url->link('common/dashboard',			'user_token=' . $this->session->data['user_token'], true)	);
		$data['breadcrumbs'][] = array(	'text' => $title,									'href' => $this->url->link('extension/MRP/stocklocWO',	'user_token=' . $this->session->data['user_token'], true)	);
	// DATA
		$data['ajax_route'] = 'index.php?route=extension/MRP/stocklocWO/getTable&user_token=' . $this->session->data['user_token'];
		$data['type']		= 'Works order';
		
		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');
	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/MRP/stockloc', $data));
	}
	public function getTable(){
		$this->load->model('extension/MRP/MRPstock');

		$columns = array();
		$columns[] = array(	'db'	=> 'locationref',	'dt'	=> 0,	);
		$columns[] = array(	'db'	=> 'product_id',	'dt'	=> 1,	);
		$columns[] = array(	'db'	=> 'product_rev',	'dt'	=> 2,	);
		$columns[] = array(	'db'	=> 'locationref',	
							'join'=> array(
								'table' => DB_PREFIX . 'mrp_stock_Transaction',
								'on'   => 'toLocRef',
								'alias' => 't',
								'select' => 'fromLocRef',
							),
							'dt'	=> 3,	);
		$columns[] = array(	'db'	=> 'locationref',	
							'join'=> array(
								'table' => DB_PREFIX . 'mrp_stock_Transaction',
								'on'   => 'toLocRef',
								'alias' => 't',
								'select' => 'qty',
							),
							'dt'	=> 4,	);
		
		$data = $this->model_extension_MRP_MRPstock->get_stock_history_for_loc(6,$this->request->get,$columns);

		//echo "<pre>".var_export($data,true)."</pre>";
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}










