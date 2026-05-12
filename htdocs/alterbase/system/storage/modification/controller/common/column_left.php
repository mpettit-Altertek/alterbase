<?php
class ControllerCommonColumnLeft extends Controller {
	public function index() {
		if (isset($this->request->get['user_token']) && isset($this->session->data['user_token']) && ($this->request->get['user_token'] == $this->session->data['user_token'])) {
			$this->load->language('common/column_left');

			// Create a 3 level menu array
			// Level 2 can not have children
			
			// Menu
			$data['menus'][] = array(
				'id'       => 'menu-dashboard',
				'icon'	   => 'fa-tachometer-alt',
				'name'	   => $this->language->get('text_dashboard'),
				'href'     => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true),
				'children' => array()
			);
			

				$CLKmenu = array();
				$CLKmenu[] = array(
					'name'		=> 'Calendar',
					'href'		=> $this->url->link('extension/module/clocking/Calendar','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);
				$CLKmenu[] = array(
					'name'		=> 'History',
					'href'		=> $this->url->link('extension/module/clocking/history','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);
				$data['menus'][] = array(
					'id'		=> 'MRP',
					'icon'		=> 'fa-clock',
					'name'		=> 'Clocking System',
					'href'		=> '',
					'children'	=> $CLKmenu,
				);
			

				$MRPmenu = array();
				$MRPrpt = array();

				$MRPrpt[] = array(
					'name'		=> 'Stock report',
					'href'		=> $this->url->link('extension/MRP/stockreport','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);	
				$MRPrpt[] = array(
					'name'		=> 'Stock on Build Sheet',
					'href'		=> $this->url->link('extension/MRP/stocklocBS','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);	
				$MRPrpt[] = array(
					'name'		=> 'Stock on Works Orders',
					'href'		=> $this->url->link('extension/MRP/stocklocWO','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);	
				$MRPrpt[] = array(
					'name'		=> 'Stock on Sales Orders',
					'href'		=> $this->url->link('extension/MRP/stocklocSO','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);	
			
				/* INSERT_MRP_REPORTS_MENU */
				$MRPmenu[] = array(
					'name'		=> 'Reports',
					'href'		=> '',
					'children'	=> $MRPrpt
				);

				$MRPmenu[] = array(
					'name'		=> 'Products',
					'href'		=> $this->url->link('extension/MRP/product','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);
			

				$MRPmenu[] = array(
					'name'		=> 'Suppliers',
					'href'		=> $this->url->link('extension/MRP/supplier','user_token=' . $this->session->data['user_token'], true),
					'children'	=> array()
				);
			
				/* INSERT_MRP_MENU */
				$data['menus'][] = array(
					'id'		=> 'MRP',
					'icon'		=> 'fa-industry',
					'name'		=> 'Materials Planning',
					'href'		=> '',
					'children'	=> $MRPmenu,
				);
			
			// System
			$system = array();
			
			// Extension
			$marketplace = array();
			
			if ($this->user->hasPermission('access', 'marketplace/installer')) {		
				$marketplace[] = array(
					'name'	   => $this->language->get('text_installer'),
					'href'     => $this->url->link('marketplace/installer', 'user_token=' . $this->session->data['user_token'], true),
					'children' => array()		
				);					
			}	
			
			if ($this->user->hasPermission('access', 'marketplace/extension')) {		
				$marketplace[] = array(
					'name'	   => $this->language->get('text_extension'),
					'href'     => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true),
					'children' => array()
				);
			}
								
			if ($this->user->hasPermission('access', 'marketplace/modification')) {
				$marketplace[] = array(
					'name'	   => $this->language->get('text_modification'),
					'href'     => $this->url->link('marketplace/modification', 'user_token=' . $this->session->data['user_token'], true),
					'children' => array()		
				);
			}
			
			if ($this->user->hasPermission('access', 'marketplace/event')) {
				$marketplace[] = array(
					'name'	   => $this->language->get('text_event'),
					'href'     => $this->url->link('marketplace/event', 'user_token=' . $this->session->data['user_token'], true),
					'children' => array()		
				);
			}
			if ($marketplace) {
				$system[] = array(
					'name'	   => $this->language->get('text_extension'),
					'href'     => '',
					'children' => $marketplace
				);
			}
		
			// Users
			$user = array();
			
			if ($this->user->hasPermission('access', 'user/user')) {
				$user[] = array(
					'name'	   => $this->language->get('text_users'),
					'href'     => $this->url->link('user/user', 'user_token=' . $this->session->data['user_token'], true),
					'children' => array()		
				);	
			}
			
			if ($this->user->hasPermission('access', 'user/user_permission')) {	
				$user[] = array(
					'name'	   => $this->language->get('text_user_group'),
					'href'     => $this->url->link('user/user_permission', 'user_token=' . $this->session->data['user_token'], true),
					'children' => array()		
				);	
			}
			if ($user) {
				$system[] = array(
					'name'	   => $this->language->get('text_users'),
					'href'     => '',
					'children' => $user		
				);
			}
			
			if ($system) {
				$data['menus'][] = array(
					'id'       => 'menu-system',
					'icon'	   => 'fa-cogs', 
					'name'	   => $this->language->get('text_system'),
					'href'     => '',
					'children' => $system
				);
			}
			
			return $this->load->view('common/column_left', $data);
		}
	}
}