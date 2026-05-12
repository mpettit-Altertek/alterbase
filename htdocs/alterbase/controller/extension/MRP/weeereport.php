<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerExtensionMRPweeereport extends Controller
{
	private $error = array();

	function startsWith ($string, $startString) {
		$len = strlen($startString); 
		return (substr($string, 0, $len) === $startString); 
	}

	public function index(){
		$this->load->language('extension/MRP/weeereport');
		$this->load->model('extension/MRP/MRPproduct');
		$this->load->model('extension/MRP/MRPbom');
		$this->load->model('extension/MRP/MRPweee');
		
		
		if 		(isset($this->request->post['id']))		{ $rootid = $this->request->post['id']; }
		else if (isset($this->request->get['id']))		{ $rootid = $this->request->get['id']; }
		if 		(isset($this->request->post['rev']))	{ $rootrev = $this->request->post['rev']; }
		else if (isset($this->request->get['rev']))		{ $rootrev = $this->request->get['rev']; }
		$rootqty	= 1;
		
		
		$weight_units	= $this->model_extension_MRP_MRPproduct->getTableCustomColumns('WEEE_Weight')->options[0];
		
		$bom  = $this->model_extension_MRP_MRPbom->getfullBOM($rootid,$rootrev);
		
		
		foreach ($bom as $k=>$b){
			if($b['cls'] == 'branch'){
				if(is_numeric($b['data']['child']['WEEE_Weight'])){
					foreach($bom as $k2=>$b2){								// remove decendants
						if($this->startsWith($k2,$b['id'].'-')){
							unset($bom[$k2]);
						}
					}
				}
			}
		}
		
		$flat = array();
		foreach ($bom as $b){
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
					'partno'							=> $b['partno'],
					'rev'								=> $b['data']['child_rev'],
					'crev'								=> $b['data']['child']['rev'],
					'name'								=> $b['data']['child']['name'],
					'WEEE_Weight'						=> floatval($b['data']['child']['WEEE_Weight']),
					'Quantity'							=> $qty,
				);
			}
		}
		
		$totalWEEEweight = 0.0;
		foreach ($flat as $k=>$v){
			if($v['WEEE_Weight']>0.000){
				$totalWEEEweight += ($v['WEEE_Weight'] * $v['Quantity']);
				$flat[$k]['SubTotal_WEEE_Weight'] =	sprintf("%0.3f%s",($v['WEEE_Weight'] * $v['Quantity']),$weight_units);
				$flat[$k]['WEEE_Weight'] = 			sprintf("%0.3f%s", $v['WEEE_Weight'],$weight_units);
			}else{
				unset($flat[$k]);
			}
		}
		
		$data['dtable'] = array(
			'cols' => array(
						array( 'header' => $this->language->get('tbl_partno'),		'footer'=> '',													'datapath'	=> 'partno'					),
						array( 'header' => $this->language->get('tbl_rev'),			'footer'=> '',													'datapath'	=> 'crev'					),
						array( 'header' => $this->language->get('tbl_name'),		'footer'=> '',													'datapath'	=> 'name'					),
						array( 'header' => $this->language->get('tbl_qty'),			'footer'=> '',													'datapath'	=> 'Quantity'				),
						array( 'header' => $this->language->get('ind_WEEE'),		'footer'=> '',													'datapath'	=> 'WEEE_Weight'			),
						array( 'header' => $this->language->get('subTotal_WEEE'),	'footer'=> sprintf("%0.3f%s", $totalWEEEweight,$weight_units),	'datapath'	=> 'SubTotal_WEEE_Weight'	),
			),
			'rows' => $flat,
		);
		
		$data['totalWEEEweight'] = $totalWEEEweight;
		$data['id'] = $rootid;
		$data['rev'] = $rootrev;
		
		return($this->load->view('extension/MRP/productview_weee', $data));
	}
}










