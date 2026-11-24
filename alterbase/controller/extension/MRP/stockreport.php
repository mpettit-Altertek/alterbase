<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerExtensionMRPstockreport extends Controller
{
	private $error = array();


	public function index(){
		$this->load->language('extension/MRP/stockreport');
		$this->load->model('extension/MRP/MRPproduct');
		$title = '<i class="fa '.$this->language->get('heading_icon').'"></i>&nbsp;'.$this->language->get('heading_title');
		$this->document->setTitle($this->language->get('heading_title'));
	
	// BREADCRUMBS
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),		'href' => $this->url->link('common/dashboard',			'user_token=' . $this->session->data['user_token'], true)	);
		$data['breadcrumbs'][] = array(	'text' => $title,									'href' => $this->url->link('extension/MRP/stockreport',	'user_token=' . $this->session->data['user_token'], true)	);
	// DATA
		
		$data['searchproducturl']	= htmlspecialchars_decode($this->url->link('extension/MRP/stockreport/searchproduct', 'user_token=' . $this->session->data['user_token'], true));
		$data['ajax_route'] 		= 'index.php?route=extension/MRP/stockreport/generate&user_token=' . $this->session->data['user_token'];
		$data['ajax_boms_route'] 		= 'index.php?route=extension/MRP/stockreport/boms&user_token=' . $this->session->data['user_token'];
		
		$this->document->addScript('view/javascript/jquery/jquery-ui.js');
		$this->document->addStyle('view/javascript/jquery/jquery-ui.css');
		
		$this->document->addScript('view/javascript/jquery/csvExport.min.js');
		
		$this->document->addScript('view/javascript/jquery/jquery.treetable.js');
		$this->document->addStyle('view/javascript/jquery/jquery.treetable.css');
		$this->document->addStyle('view/javascript/jquery/jquery.treetable.theme.default.css');
		
		$this->document->addScript('view/javascript/jquery/magnific-popup/jquery.magnific-popup.min.js');
		$this->document->addStyle('view/javascript/jquery/magnific-popup/magnific-popup.css');
		
		$this->document->addScript('view/javascript/DataTables/datatables.min.js');
		$this->document->addStyle('view/javascript/DataTables/datatables.css');
		
	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/MRP/stockreport', $data));
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
				'name'	=> $row['name'],
				'revs'	=> explode(',',$row['revs']),
			);
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
	
	public function boms(){
		$this->load->model('extension/MRP/MRPbom');
		$rootid = $this->request->get['root'];
		$rootrev = $this->request->get['rootrev'];
		$bom  = $this->model_extension_MRP_MRPbom->getfullBOM($rootid,$rootrev);
		
		$items = array();
		foreach ($bom as $k=>$v){
			if(($v['cls']=='branch')){
				$items[$k] = $v;
			}
		}
		$data = '';
		foreach ($items as $k=>$v){
			$data .= '<tr data-tt-id="'.$v['id'].'" data-tt-parent-id="'.$v['parid'].'" class="'.$v['cls'].'">';
			$data .= '	<td>';
			$data .= '		<img src="view/image/assembly24.png" />'.$v['partno'];
			$data .= '	</td>';
			$data .= '	<td>';
			$data .= $v['data']['child']['rev'];
			$data .= '	</td>';
			$data .= '	<td>';
			$data .= $v['data']['child']['name'];
			$data .= '	</td>';
			$data .= '</tr>';
		}
		$this->response->setOutput($data);
	}
	
	public function generate(){
		$this->load->language('extension/MRP/stockreport');
		$this->load->model('extension/MRP/MRPproduct');
		$this->load->model('extension/MRP/MRPbom');
		$this->load->model('extension/MRP/MRPstock');
		$rootid		= $this->request->post['root'];
		$rootrev	= $this->request->post['rootrev'];
		$rootqty	= $this->request->post['rootqty'];
		$bom  = $this->model_extension_MRP_MRPbom->getfullBOM($rootid,$rootrev);

		$locs = $this->model_extension_MRP_MRPstock->get_stockLocations();
		
		$toexpand = isset($this->request->post['expand'])?$this->request->post['expand']:NULL;
		foreach ($bom as $k=>$b){
			if($b['parid']!=''){
				if(!isset($toexpand[$b['parid']])){
					unset($bom[$k]);
				}
			}
		}
		
		$flat = array();
		foreach ($bom as $b){
			
			if(!isset($toexpand[$b['id']])){	// to remove expanded items
				$ids = explode('-',$b['id']);
				$idtree = array();
				$ids_len = count($ids);
				$qty = 1;
				for ($i = 0; $i < $ids_len; $i++) {
					$id = implode('-',$ids);
					$qty *= $bom[$id]['data']['Quantity'];
					unset($ids[count($ids)-1]);
				}
				$qty *= $rootqty;
				$currentpartno	= $b['partno'].":".$b['data']['child']['rev'];
				
				if(isset($flat[$currentpartno])){
					$flat[$currentpartno]['Quantity'] += $qty;
				}
				else{
					$flat[$currentpartno] = array(
						'row_cls'							=> ($b['data']['child']['Ready_for_Manufacture_Procurement']?'cls_ready':'cls_notready'),
						'hasbom'							=> ($b['cls']=='branch'),
						'partno'							=> $b['partno'],
						'rev'								=> $b['data']['child_rev'],
						'crev'								=> $b['data']['child']['rev'],
						'name'								=> $b['data']['child']['name'],
						'Quantity'							=> $qty,
						'Ready_for_Manufacture_Procurement'	=> ($b['data']['child']['Ready_for_Manufacture_Procurement']?'YES':'NO'),
					);
				}
			}
		}
		
		
		foreach ($flat as $key=>$val){
			$stock = $this->model_extension_MRP_MRPstock->get_total_stock($val['partno'],$val['crev'],true);
			$total_stock = 0;
			foreach ($stock as $s){
				$flat[$key]['stock_'.$s['location']] = $s['qty'];
				$total_stock += $s['qty'];
			}
			$flat[$key]['stock_surplus']  = ($total_stock-$flat[$key]['Quantity']);
			$flat[$key]['stock_to_order'] = (0-$flat[$key]['stock_surplus']);
			
			if($flat[$key]['stock_to_order']<0)	{$flat[$key]['stock_to_order']=0;}
			if($flat[$key]['stock_surplus']<0)	{$flat[$key]['stock_surplus']=0;}
			
		}
		
		$data['bom']		= $flat;
		$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_partno'),	'datapath'=>'partno',	'class'=>'fixed');
		$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_rev'),		'datapath'=>'rev',		'class'=>'shrink');
		$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_name'),	'datapath'=>'name',		'class'=>'ellipsis');
		$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_qty'),		'datapath'=>'Quantity',	'class'=>'shrink');
		foreach ($locs as $l){
			if($l['isstock']){
				$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_qty_on').$l['name'],	'datapath'=>'stock_'.$l['id'],	'class'=>'shrink');
			}
		}
		$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_stock_to_order'),	'datapath'=>'stock_to_order',						'class'=>'shrink');
		$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_stock_surplus'),	'datapath'=>'stock_surplus',						'class'=>'shrink');
		$data['bomcols'][]	= array( 'name' => $this->language->get('tbl_ready'),			'datapath'=>'Ready_for_Manufacture_Procurement',	'class'=>'shrink');
		
		$data['id'] = $rootid;
		$data['rev'] = $rootrev;
		
		$this->response->setOutput($this->load->view('extension/MRP/stockreport_report', $data));
	}
}










