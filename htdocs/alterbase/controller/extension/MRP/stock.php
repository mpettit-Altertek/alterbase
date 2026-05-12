<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerextensionMRPstock extends Controller
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
		$this->load->model('extension/MRP/MRPstock');
		if 		(isset($this->request->post['id']))	{ $id = $this->request->post['id']; }
		else if (isset($this->request->get['id']))	{ $id = $this->request->get['id']; }
		else										{ $id = NULL; }
		
		if 		(isset($this->request->post['rev']))	{ $rev = $this->request->post['rev']; }
		else if (isset($this->request->get['rev']))		{ $rev = $this->request->get['rev']; }
		else											{ $rev = NULL; }
		$data['stockLocations'] = $this->model_extension_MRP_MRPstock->get_stockLocations();
		
		$data['addstock']						= 'index.php?route=extension/MRP/stock/stockadd&user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev;
		$data['ajax_route_stock'] 				= 'index.php?route=extension/MRP/stock/getTableStock&user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev;
		$data['ajax_route_stocktransaction']	= 'index.php?route=extension/MRP/stock/getTableStockTransaction&user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev;

		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');

		return $this->load->view('extension/MRP/productview_stock', $data);
	}

	public function action_stock(){
		$this->load->language('extension/MRP/stock');
		$this->load->model('extension/MRP/MRPstock');
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$id = $this->request->post['id'];
			$rev = $this->request->post['rev'];
			$action = $this->request->post['action'];
			echo "<pre>".var_export($this->request->post,true)."</pre>";
			
			switch($action){
				case 'add':
					$data = $this->model_extension_MRP_MRPstock->add_stock($id,$rev,$this->request->post['newlocation'],$this->request->post['newref'],$this->request->post['qty']);
					if($data!="OK"){
						$locs = $this->model_extension_MRP_MRPstock->get_stockLocations();
						$this->request->post['newlocation'] = $locs[$this->request->post['newlocation']]['name'];
						if($data=="DESTUSED")	{$this->session->data['error'] = $this->dsprintf($this->language->get('error_destused'),		$this->request->post);}
					}
					break;
				case 'move':
					$data = $this->model_extension_MRP_MRPstock->move_stock($id,$rev,$this->request->post['oldlocation'],$this->request->post['oldref'],$this->request->post['newlocation'],$this->request->post['newref'],$this->request->post['qty']);
					if($data!="OK"){
						$locs = $this->model_extension_MRP_MRPstock->get_stockLocations();
						$this->request->post['oldqty'] = $this->model_extension_MRP_MRPstock->get_stock_in_loc($id,$rev,$this->request->post['oldlocation'],$this->request->post['oldref'])['qty'];
						$this->request->post['newlocation'] = $this->model_extension_MRP_MRPstock->get_stockLocation_info($this->request->post['newlocation'])['name'];
						$this->request->post['oldlocation'] = $this->model_extension_MRP_MRPstock->get_stockLocation_info($this->request->post['oldlocation'])['name'];
						if($data=="NOSTOCK")	{$this->session->data['error'] = $this->dsprintf($this->language->get('error_nostocktomove'),	$this->request->post);}
					}
					break;
				case 'edit':
					$data = $this->model_extension_MRP_MRPstock->edit_stock($id,$rev,$this->request->post['oldlocation'],$this->request->post['oldref'],$this->request->post['qty']);
					break;
			}
		
		}
		$this->response->redirect($this->url->link('extension/MRP/product/view'.$this->code, 'user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev, true));
	}

	public function stockedit() {
		$this->load->language('extension/MRP/stock');
		$this->load->model('extension/MRP/MRPstock');
		//var_dump($this->request->get);
		$id = $this->request->get['id'];
		$rev = $this->request->get['rev'];
			
		$data['stockLocations'] = $this->model_extension_MRP_MRPstock->get_stockLocations();
		
		$data['id']		= $this->request->get['id'];
		$data['rev']	= $this->request->get['rev'];
		$data['oldloc']	= $this->request->get['loc'];
		$data['oldref']	= $this->request->get['ref'];
		$data['oldqty']	= $this->request->get['qty'];
		$data['action']	= $this->url->link('extension/MRP/stock/action_stock'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$this->response->setOutput($this->load->view('extension/MRP/productview_stockedit', $data));
	}
	public function stockmove() {
		$this->load->language('extension/MRP/stock');
		$this->load->model('extension/MRP/MRPstock');
		//var_dump($this->request->get);
		$id = $this->request->get['id'];
		$rev = $this->request->get['rev'];
			
		$data['stockLocations'] = $this->model_extension_MRP_MRPstock->get_stockLocations();
		
		$data['id']		= $this->request->get['id'];
		$data['rev']	= $this->request->get['rev'];
		$data['oldloc']	= $this->request->get['loc'];
		$data['oldref']	= $this->request->get['ref'];
		$data['oldqty']	= $this->request->get['qty'];
		$data['action']	= $this->url->link('extension/MRP/stock/action_stock'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$this->response->setOutput($this->load->view('extension/MRP/productview_stockmove', $data));
	}
	public function stockadd() {
		$this->load->language('extension/MRP/stock');
		$this->load->model('extension/MRP/MRPstock');
		//var_dump($this->request->get);
		$id = $this->request->get['id'];
		$rev = $this->request->get['rev'];
		
		$data['id']		= $this->request->get['id'];
		$data['rev']	= $this->request->get['rev'];
			
		$data['stockLocations'] = $this->model_extension_MRP_MRPstock->get_stockLocations();
		
		$data['action_stock']	= $this->url->link('extension/MRP/stock/action_stock'.$this->code, 'user_token=' . $this->session->data['user_token'], true);
		$this->response->setOutput($this->load->view('extension/MRP/productview_stockadd', $data));
	}
	public function getTableStock(){
		$this->load->language('extension/MRP/stock');
		$this->load->model('extension/MRP/MRPstock');

		$id = $this->request->get['id'];
		$rev = $this->request->get['rev'];
		
		$columns = array();
		$columns[] = array(	'db'	=> 'location',		'dt'	=> 0,	);
		$columns[] = array(	'db'	=> 'locationref',	'dt'	=> 1,	);
		$columns[] = array(	'db'	=> 'qty',			'dt'	=> 2,	);
		$columns[] = array(	'db'	=> 'id',			'dt'	=> 3,	);

		$data = $this->model_extension_MRP_MRPstock->get_stock_table($id,$rev,$this->request->get,$columns);
		
		$locs = $this->model_extension_MRP_MRPstock->get_stockLocations();
		foreach ($locs as $value){
			$stockLocations[$value['id']] = $value['name'];
		}
		
		foreach ($data['data'] as $key => $val){
			$data['data'][$key][0] = $stockLocations[$val[0]];
			
			$stockmovepath = 'index.php?route=extension/MRP/stock/stockmove&user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev.'&loc=' . $val[0]. '&ref=' . $val[1]. '&qty=' . $val[2];
			$stockeditpath = 'index.php?route=extension/MRP/stock/stockedit&user_token=' . $this->session->data['user_token']. '&id=' . $id. '&rev=' . $rev.'&loc=' . $val[0]. '&ref=' . $val[1]. '&qty=' . $val[2];
			
			$data['data'][$key][3] = '
				<a href="'.$stockmovepath.'" data-toggle="tooltip" title="'.$this->language->get('button_stock_move').'"	class="btn btn-primary open-popup-ajax"><i class="fa '.$this->language->get('button_stock_move_icon').'"></i></a>
				<a href="'.$stockeditpath.'" data-toggle="tooltip" title="'.$this->language->get('button_stock_edit').'"	class="btn btn-primary open-popup-ajax"><i class="fa '.$this->language->get('button_stock_edit_icon').'"></i></a>
			';
			
			
			
		}
		

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
	public function getTableStockTransaction(){
		$this->load->language('extension/MRP/stock');
		$this->load->model('extension/MRP/MRPstock');

		$id = $this->request->get['id'];
		$rev = $this->request->get['rev'];
		
		$columns = array();
		$columns[] = array(	'db'	=> 'date',			'dt'	=> 0,	);
		$columns[] = array(	'db'	=> 'fromLoc',		'dt'	=> 1,	);
		$columns[] = array(	'db'	=> 'fromLocRef',	'dt'	=> 2,	);
		$columns[] = array(	'db'	=> 'toLoc',			'dt'	=> 3,	);
		$columns[] = array(	'db'	=> 'toLocRef',		'dt'	=> 4,	);
		$columns[] = array(	'db'	=> 'qty',			'dt'	=> 5,	);
		$columns[] = array(	'db'	=> 'user',			'dt'	=> 6,	);

		$data = $this->model_extension_MRP_MRPstock->get_transactions($id,$rev,$this->request->get,$columns);
		
		$locs = $this->model_extension_MRP_MRPstock->get_stockLocations();
		foreach ($locs as $value){
			$stockLocations[$value['id']] = $value['name'];
		}
		
		foreach ($data['data'] as $key => $value){
			if($data['data'][$key][1]>0)	{ $data['data'][$key][1] = $stockLocations[$data['data'][$key][1]]; }
			else							{ $data['data'][$key][1] = '';}
			if($data['data'][$key][3]>0)	{ $data['data'][$key][3] = $stockLocations[$data['data'][$key][3]]; }
			else							{ $data['data'][$key][3] = '';}
			$data['data'][$key][6] = $this->db->query("SELECT CONCAT(firstname,' ', lastname) as user FROM `".DB_PREFIX . "user` WHERE user_id = '" . $data['data'][$key][6] . "'")->row['user'];
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}