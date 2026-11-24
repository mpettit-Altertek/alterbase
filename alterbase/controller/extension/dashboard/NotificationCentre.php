<?php
class Controllerextensiondashboardnotificationcentre extends Controller {
	private $error = array();

	private $sqlOperators = array(
		'equal'				=> array( 'op'=> ' = ?'																),
		'not_equal'			=> array( 'op'=> ' != ?'															),
		'in'				=> array( 'op'=> ' IN(?)',			'sep'=>', '										),
		'not_in'			=> array( 'op'=> ' NOT IN(?)',		'sep'=>', '										),
		'less'				=> array( 'op'=> ' < ?'																),
		'less_or_equal'		=> array( 'op'=> ' <= ?'															),
		'greater'			=> array( 'op'=> ' > ?'																),
		'greater_or_equal'	=> array( 'op'=> ' >= ?'															),
		'between'			=> array( 'op'=> ' BETWEEN ?',		'sep'=>' AND '									),
		'not_between'		=> array( 'op'=> ' NOT BETWEEN ?',	'sep'=>' AND '									),
		'begins_with'		=> array( 'op'=> ' LIKE(?)',						'premod'=>'',	'postmod'=>'%'	),
		'not_begins_with'	=> array( 'op'=> ' NOT LIKE(?)',					'premod'=>'',	'postmod'=>'%'	),
		'contains'			=> array( 'op'=> ' LIKE(?)',						'premod'=>'%',	'postmod'=>'%'	),
		'not_contains'		=> array( 'op'=> ' NOT LIKE(?)',					'premod'=>'%',	'postmod'=>'%'	),
		'ends_with'			=> array( 'op'=> ' LIKE(?)',						'premod'=>'%',	'postmod'=>''	),
		'not_ends_with'		=> array( 'op'=> ' NOT LIKE(?)',					'premod'=>'%',	'postmod'=>''	),
		'is_empty'			=> array( 'op'=> ' = \'\''															),
		'is_not_empty'		=> array( 'op'=> ' != \'\''															),
		'is_null'			=> array( 'op'=> ' IS NULL'															),
		'is_not_null'		=> array( 'op'=> ' IS NOT NULL'														)
	);

	private function build_statistics_tables(){
		$this->db->query("DROP TABLE IF EXISTS  tmp_table_today");
		$this->db->query("DROP TABLE IF EXISTS  tmp_statistics_today");
		$this->db->query("DROP TABLE IF EXISTS  tmp_table_week");
		$this->db->query("DROP TABLE IF EXISTS  tmp_statistics_week");
		$sql = "
			CREATE TEMPORARY TABLE IF NOT EXISTS tmp_table_today
				SELECT	ADDTIME( DATE(NOW()), '00:00:00') as date,data.type,SUM(data.time) as length,t.name ,max(data.running) as running,data.user_id
				FROM(
					# start today
					# no end
					SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(NOW(),start_date))) as time,1 as running,user_id
					FROM `alt_clk_calendar`
					WHERE	start_date	BETWEEN ADDTIME( DATE(now()),'00:00:00') AND ADDTIME( DATE(now()),'23:59:59')
						AND	end_date	= start_date
					GROUP BY user_id,type
					
					# start today
					# ends after
					UNION
					SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(ADDDATE(ADDTIME( DATE(NOW()), '23:59:59'),INTERVAL 1.0 SECOND_MICROSECOND),start_date))) as time,0 as running,user_id
					FROM `alt_clk_calendar`
					WHERE	start_date	BETWEEN ADDTIME( DATE(now()),'00:00:00') AND ADDTIME( DATE(now()),'23:59:59')
						AND	end_date	>= ADDDATE(ADDTIME( DATE(NOW()), '23:59:59'),INTERVAL 1.0 SECOND_MICROSECOND)
					GROUP BY user_id,type
					
					# start today
					# ends today
					UNION
						SELECT type,SUM(TIME_TO_SEC(TIMEDIFF(end_date,start_date))) as time,0 as running,user_id
						FROM `alt_clk_calendar`
						WHERE	start_date	BETWEEN ADDTIME( DATE(now()),'00:00:00') AND ADDTIME( DATE(now()),'23:59:59')
							AND	end_date	BETWEEN ADDTIME( DATE(now()),'00:00:00') AND ADDTIME( DATE(now()),'23:59:59')
						GROUP BY user_id,type
					
					# start before
					# ends today
					UNION
						SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(end_date,ADDTIME( DATE(NOW()), '00:00:00')))) as time,0 as running,user_id
						FROM `alt_clk_calendar`
						WHERE	start_date	<= ADDTIME( DATE(NOW()), '00:00:00')
							AND end_date	BETWEEN ADDTIME( DATE(now()),'00:00:00') AND ADDTIME( DATE(now()),'23:59:59')
						GROUP BY user_id,type
					
					# start before
					# ends after
					UNION
						SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(ADDDATE(ADDTIME( DATE(NOW()), '23:59:59'),INTERVAL 1.0 SECOND_MICROSECOND),ADDTIME( DATE(NOW()), '00:00:00')))) as time,0 as running,user_id
						FROM `alt_clk_calendar`
						WHERE	start_date	<= ADDTIME( DATE(NOW()), '00:00:00')
							AND end_date	>= ADDDATE(ADDTIME( DATE(NOW()), '23:59:59'),INTERVAL 1.0 SECOND_MICROSECOND)
						GROUP BY user_id,type
				)as data
				JOIN `alt_clk_event_types` as t on (data.type=t.id)
				GROUP BY data.user_id,data.type;
		";
		$this->db->query($sql);
		
		$sql = "
			CREATE TEMPORARY TABLE IF NOT EXISTS tmp_statistics_today 
			SELECT date,type,(length/3600) as length,name ,running,user_id
			FROM(
				SELECT	*	FROM tmp_table_today
				UNION
					SELECT	ADDTIME( DATE(NOW()), '00:00:00') as date,999999 as type,CASE WHEN break.length IS NULL THEN work.length ELSE (work.length - break.length) END as length,'Worked Hours' as name ,0 as running, work.user_id
						FROM (	SELECT	*	FROM tmp_table_today	WHERE	type = 10	) as work
						LEFT JOIN (	SELECT	*	FROM tmp_table_today	WHERE	type = 9	) as break on work.user_id = break.user_id
			)g;
		";
		$this->db->query($sql);
		
		$sql = "
			CREATE TEMPORARY TABLE IF NOT EXISTS tmp_table_week
				SELECT	data.type,SUM(data.time) as length,t.name ,max(data.running) as running,data.user_id
				FROM(
					# start this
					# no end
					SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(DATE(NOW()),start_date))) as time,1 as running,user_id
					FROM `alt_clk_calendar`
					WHERE	start_date	BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)
						AND	end_date	= start_date
					GROUP BY user_id,type
					
					# start this
					# ends after
					UNION
					SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(ADDDATE(ADDTIME( DATE(DATE(NOW())), '23:59:59'),INTERVAL 1.0 SECOND_MICROSECOND),start_date))) as time,0 as running,user_id
					FROM `alt_clk_calendar`
					WHERE	start_date	BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)
						AND	end_date	>= DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)
					GROUP BY user_id,type
					
					# start this
					# ends this
					UNION
						SELECT type,SUM(TIME_TO_SEC(TIMEDIFF(end_date,start_date))) as time,0 as running,user_id
						FROM `alt_clk_calendar`
						WHERE	start_date	BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)
							AND end_date	BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)
						GROUP BY user_id,type
					
					# start before
					# ends this
					UNION
						SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(end_date,ADDTIME( DATE(DATE(NOW())), '00:00:00')))) as time,0 as running,user_id
						FROM `alt_clk_calendar`
						WHERE	start_date	<= DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY)
							AND end_date	BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)
						GROUP BY user_id,type
					
					# start before
					# ends after
					UNION
						SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(ADDDATE(ADDTIME( DATE(DATE(NOW())), '23:59:59'),INTERVAL 1.0 SECOND_MICROSECOND),ADDTIME( DATE(DATE(NOW())), '00:00:00')))) as time,0 as running,user_id
						FROM `alt_clk_calendar`
						WHERE	start_date	<= DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY)
							AND end_date	>= DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)
						GROUP BY user_id,type
				)as data
				JOIN `alt_clk_event_types` as t on (data.type=t.id)
				GROUP BY data.user_id,data.type;
		";
		$this->db->query($sql);
		
		$sql = "
			CREATE TEMPORARY TABLE IF NOT EXISTS tmp_statistics_week 
				SELECT type,(length/3600) as length,name ,running,user_id
				FROM(
					SELECT	*	FROM tmp_table_week
					UNION
						SELECT	999999 as type,CASE WHEN break.length IS NULL THEN work.length ELSE (work.length - break.length) END as length,'Worked Hours' as name ,0 as running, work.user_id
						FROM (	SELECT	*	FROM tmp_table_week	WHERE	type = 10	) as work
						JOIN (	SELECT	*	FROM tmp_table_week	WHERE	type = 9	) as break on work.user_id = break.user_id
				)g;
		";
		$this->db->query($sql);
		
	}
	
	private $sqltables_to_alltables = array(
		DB_PREFIX . 'clk_calendar'			=> 'calendar',
		'tmp_statistics_today'				=> 'statistics_today',
		'tmp_statistics_week'				=> 'statistics_week',
		DB_PREFIX . 'clk_event_types'		=> 'event_types',
		DB_PREFIX . 'user'					=> 'user',
	);
	private function alltables(){
		$arr = array();
		
		$arr['calendar'] = array(
			'tbl'			=> DB_PREFIX . 'clk_calendar',
			'index'			=> 'id',
			'cols'			=> array(
				array('COLUMN_NAME'=>'id',			'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'start_date',	'DATA_TYPE'=>'datetime'	),
				array('COLUMN_NAME'=>'end_date',	'DATA_TYPE'=>'datetime'	),
				array('COLUMN_NAME'=>'text',		'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'user_id',		'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'source',		'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'source_id',	'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'type',		'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'timestamp',	'DATA_TYPE'=>'datetime'	),
				array('COLUMN_NAME'=>'delta',		'DATA_TYPE'=>'double'	),
			),
			'joinable'		=> array(
				'user_id'	=> 'user',
				'type'		=> 'event_types'
			),
		);
		$arr['statistics_today'] = array(
			'tbl'			=> 'tmp_statistics_today',
			'index'			=> 'type',
			'cols'			=> array(
				array('COLUMN_NAME'=>'date',	'DATA_TYPE'=>'datetime'	),
				array('COLUMN_NAME'=>'type',	'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'length',	'DATA_TYPE'=>'double'	),
				array('COLUMN_NAME'=>'name',	'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'running',	'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'user_id',	'DATA_TYPE'=>'int'		),
			),
			'joinable'		=> array(
				'user_id'	=> 'user',
			),
		);
		$arr['statistics_week'] = array(
			'tbl'			=> 'tmp_statistics_week',
			'index'			=> 'type',
			'cols'			=> array(
				array('COLUMN_NAME'=>'type',	'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'length',	'DATA_TYPE'=>'double'	),
				array('COLUMN_NAME'=>'name',	'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'running',	'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'user_id',	'DATA_TYPE'=>'int'		),
			),
			'joinable'		=> array(
				'user_id'	=> 'user',
			),
		);
		$arr['event_types'] = array(
			'tbl'			=> DB_PREFIX . 'clk_event_types',
			'cols'			=> array(
				array('COLUMN_NAME'=>'id',		'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'name',	'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'rule',	'DATA_TYPE'=>'varchar'	),
			),
			'index'			=> 'id',
			'joinable'		=> array(),
		);
		$arr['user'] = array(
			'tbl'			=> DB_PREFIX . 'user',
			'cols'			=> array(
				array('COLUMN_NAME'=>'user_id',			'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'user_group_id',	'DATA_TYPE'=>'int'		),
				array('COLUMN_NAME'=>'username',		'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'firstname',		'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'lastname',		'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'email',			'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'image',			'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'code',			'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'ip',				'DATA_TYPE'=>'varchar'	),
				array('COLUMN_NAME'=>'status',			'DATA_TYPE'=>'tinyint'	),
				array('COLUMN_NAME'=>'date_added',		'DATA_TYPE'=>'datetime'	),
				array('COLUMN_NAME'=>'linemgr',			'DATA_TYPE'=>'int'		),
			),
			'index'			=> 'user_id',
			'joinable'		=> array(),
		);
		return $arr;
	}

	private function GetAlllinmgrBelow($user) {
		$arr = $this->db->query("	SELECT u.user_id, CONCAT(u.firstname,' ',u.lastname) as name, u.linemgr
									FROM `" . DB_PREFIX . "user` as u
									WHERE u.linemgr = ".$user."
								")->rows;
		foreach($arr as $a){
			$arr = array_merge($arr,$this->GetAlllinmgrBelow($a['user_id']));
		}
		return $arr;
	}
	public function GetAllUsersBelow($user) {
		$arr = $this->db->query("	SELECT u.user_id, CONCAT(u.firstname,' ',u.lastname) as name, u.linemgr
									FROM `" . DB_PREFIX . "user` as u
									WHERE u.user_id = ".$user."
								")->rows;
								
		$arr = array_merge($arr,$this->GetAlllinmgrBelow($user));
		return $arr;
	}

	private function getSqlSelect($db) {
		$sql  = " ";
		
		$this->load->model('extension/dashboard/NotificationCentre');
		$result = array();
		$tablesused = $this->gettablesused($db);

		foreach($tablesused as $tblkey=>$tblval){
			$cols = $tblval['cols'];
		
			foreach($cols as $colkey=>$colval){
				$field	= $tblval['as'].'.'.$colval['COLUMN_NAME'];
				$sql .= $field.' AS `'.$field.'`,';
			}
		}
		
		return substr($sql, 0, -1);
	}
	private function getSqlFrom($stmt) {
		$sql  = " ";
		$sql .= $this->alltables()[$stmt['prime']]['tbl'] .' AS '.$stmt['prime'];
		
		foreach($stmt['join'] as $item){
			$sql .= ' '.$item;
		}
		return $sql;
	}
	private function getSqlWhere($stmt) {
		$sql		= " ";
		if($stmt['not']){ $sql = "NOT";}
		$sql		.= " (";
		$seperator	= " ".$stmt['condition']." ";
		
		foreach($stmt['rules'] as $item){
			
			if(isset($item['condition'])){
				$sql .= $this->getSqlWhere($item);
			}else{
				
				$sel	= $item['field'];
				$sql .= " (";
				$sql .= $sel;
				if(isset($this->sqlOperators[$item['operator']])){
					$op		= $this->sqlOperators[$item['operator']];
					if(isset($op['sep']))			{ $sql .= str_replace('?','\''.implode('\''.$op['sep'].'\'',$item['value']).'\'',$op['op']);	}
					elseif(isset($op['premod']))	{ $sql .= str_replace('?','\''.$op['premod'].$item['value'].$op['postmod'].'\'',$op['op']);		}
					else							{ $sql .= str_replace('?','\''.$item['value'].'\'',$op['op']);									}
				}
				elseif($item['operator'] == 'today()'){
					$sql .=" BETWEEN ADDTIME( DATE(now()),'00:00:00') AND ADDTIME( DATE(now()),'23:59:59')";
				}
				elseif($item['operator'] == 'this_week()'){
					$sql .=" BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 0-WEEKDAY(DATE(NOW())) DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 6-WEEKDAY(DATE(NOW())) DAY)";
				}
				elseif($item['operator'] == 'is_currentUser()'){
					$sql .=" = '".$this->user->getId()."'";
				}
				elseif($item['operator'] == 'is_subordinateUser()'){
					
					$below = $this->GetAllUsersBelow($this->user->getId());
					$sql .=" IN (";
					foreach($below as $user){
						$sql .= $user['user_id'].",";
					}
					$sql = substr($sql, 0, (-1));
					$sql .=")";
				}
				$sql .=")";
			}
			$sql .= $seperator;
		}
		$sql = substr($sql, 0, (0-strlen($seperator)));
		$sql .=")";
		return $sql;
	}
	private function rulesql($rule){
		$sql = "";
		$r = json_decode(html_entity_decode($rule),true);
		//echo "<pre>".var_export($r,true)."</pre>";
		$sql .=	"SELECT".$this->getSqlSelect($r['db']);
		$sql .=	" FROM".$this->getSqlFrom($r['db']);
		$sql .=	" WHERE".$this->getSqlWhere($r['rule']);
		
		return $sql;
	}

	public function getjoins(){
		$result = $this->alltables();
		
		$data = array();
		
		$tblkey = $this->request->post['prime'];
		$tblval = $result[$tblkey];
		foreach($tblval['joinable'] as $tblJkey=>$tblJval){
			
			$join  = 'JOIN '.$result[$tblJval]['tbl'].' AS '.$tblkey.'_'.$tblJval.'_'.$tblJkey;
			$join .= ' ON ( '.$tblkey.'_'.$tblJval.'_'.$tblJkey.'.'.$result[$tblJval]['index'].' = '.$tblkey.'.'.$tblJkey.' )';
			
			$data[] = array(
				'val'	=>	$join,
				'text'	=>	$tblJval.' ON '.$tblJkey,
				'tbl'	=> $result[$tblJval]['tbl'],
			);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
	
	private function gettablesused($db){
		$data = array();
		$result = $this->alltables();
		
		$tblkey = $db['prime'];
		$tblval = $result[$tblkey];
		$data[$tblval['tbl']] =array(
			'on'	=> '',
			'tbl'	=> $tblval['tbl'],
			'as'	=> $tblkey,
			'cols'	=> $tblval['cols'],
		);
		if(isset($db['join'])){
			foreach($db['join'] as $tblJkey=>$tblJval){
				
				preg_match_all('/JOIN (\S*) AS (\S*) ON \( (\S*)\.(\S*) = (\S*)\.(\S*) \)/m', $tblJval, $matches, PREG_SET_ORDER, 0);
				
				$data[$matches[0][1]] = array(
						'on'	=> $matches[0][4],
						'tbl'	=> $matches[0][1],
						'as'	=> $matches[0][2],
						'cols'	=> $result[$this->sqltables_to_alltables[$matches[0][1]]]['cols'],
					);
			}
		}
		return $data;
	}
	
	public function getfilters(){
		$this->load->model('extension/dashboard/NotificationCentre');
		$result = array();
		
		$this->alltables();
		$tablesused	= $this->gettablesused($this->request->post);
		
		foreach($tablesused as $tblkey=>$tblval){
			$cols = $tblval['cols'];
		
			foreach($cols as $colkey=>$colval){
				$id		= $tblval['tbl'].'('.$tblval['on'].')_'.$colval['COLUMN_NAME'];
				$field	= $tblval['as'].'.'.$colval['COLUMN_NAME'];
				if(strlen($tblval['on'])){
					$label	= $tblkey .' ON('.$tblval['on'].') '.$colval['COLUMN_NAME'];
				}else{
					$label	= $tblkey.' '.$colval['COLUMN_NAME'];
				}
				
				if($colval['COLUMN_NAME'] == 'user_id'){
					$result[] = array(
						'id'		=> $id,
						'field'		=> $field,
						'label'		=> $label,
						'type'		=> 'string',
						'operators'	=> ['is_currentUser()','is_subordinateUser()','equal','not_equal','in','not_in','less','less_or_equal','greater','greater_or_equal','between','not_between','begins_with','not_begins_with','contains','not_contains','ends_with','not_ends_with','is_empty','is_not_empty','is_null','is_not_null'],
						
					);
				}
				else{
					switch($colval['DATA_TYPE']){
						case 'int':{
							$result[] = array(
								'id'	=> $id,
								'field'	=> $field,
								'label'	=> $label,
								'type'	=> 'integer',
							);
							break;
						}
						case 'double':{
							$result[] = array(
								'id'	=> $id,
								'field'	=> $field,
								'label'	=> $label,
								'type'	=> 'double',
							);
							break;
						}
						case 'varchar':{
							$result[] = array(
								'id'	=> $id,
								'field'	=> $field,
								'label'	=> $label,
								'type'	=> 'string',
							);
							break;
						}
						case 'datetime':{
							$result[] = array(
								'id'	=> $id,
								'field'	=> $field,
								'label'	=> $label,
								'type'	=> 'datetime',
								'operators'	=> ['today()','this_week()','equal','not_equal','in','not_in','less','less_or_equal','greater','greater_or_equal','between','not_between','is_null','is_not_null',],
								'placeholder'	=> 'YYYY-MM-DD HH:mm:ss',
								'validation'	=> array(
									'format'	=> 'YYYY-MM-DD HH:mm:ss'
								),
								'plugin'	=> 'daterangepicker',
								'plugin_config'	=> array(
									'singleDatePicker'	=> true,
									'timePicker'		=> true,
									'timePicker24Hour'	=> true,
									'timePickerSeconds'	=> true,
									'locale'			=> array(
										'format'	=> 'YYYY-MM-DD HH:mm:ss',
									),
									'ranges'			=> array(
										'Today'				=> array(	date('Y-m-d H:i:s', strtotime('today')),
																		date('Y-m-d H:i:s', strtotime('tomorrow - 1sec')),
																	),
										'Yesterday'			=> array(	date('Y-m-d H:i:s', strtotime('yesterday')),
																		date('Y-m-d H:i:s', strtotime('today - 1sec')),
																	),
									),
								)
							);
							break;
						}
					}
				}
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}

	public function getvariables(){
		$this->load->model('extension/dashboard/NotificationCentre');
		$result = array();

		$this->alltables();
		$tablesused	= $this->gettablesused($this->request->post);
		
		
		foreach($tablesused as $tblkey=>$tblval){
			$cols = $tblval['cols'];
		
			foreach($cols as $colkey=>$colval){
				$id		= $tblval['tbl'].'('.$tblval['on'].')_'.$colval['COLUMN_NAME'];
				$field	= $tblval['as'].'.'.$colval['COLUMN_NAME'];
				$result[] = $field;
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}

	public function index() {
		$this->load->language('extension/dashboard/NotificationCentre');
		$this->load->model('extension/dashboard/NotificationCentre');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->model_extension_dashboard_NotificationCentre->clearNotificationSetup();
			if(isset($this->request->post['items'])){
				$this->model_extension_dashboard_NotificationCentre->setNotificationSetup($this->request->post['items']);
				unset($this->request->post['items']);
			}
			
			$this->model_setting_setting->editSetting('dashboard_NotificationCentre', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard',true));
		}

		if (isset($this->error['warning']))	{ $data['error_warning'] = $this->error['warning'];	}
		else								{ $data['error_warning'] = '';	}

		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_home'),		'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])							);
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('text_extension'),	'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard')	);
		$data['breadcrumbs'][] = array(	'text' => $this->language->get('heading_title'),	'href' => $this->url->link('extension/dashboard/NotificationCentre', 'user_token=' . $this->session->data['user_token'])			);
		$data['action'] = $this->url->link('extension/dashboard/NotificationCentre', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard', true);

		$data['columns'] = array();
		for ($i = 3; $i <= 12; $i++) {
			$data['columns'][] = $i;
		}
		$data['dashboard_NotificationCentre_width']			= $this->config->get('dashboard_NotificationCentre_width');
		$data['dashboard_NotificationCentre_status']		= $this->config->get('dashboard_NotificationCentre_status');
		$data['dashboard_NotificationCentre_sort_order']	= $this->config->get('dashboard_NotificationCentre_sort_order');
//-------------------------------------------------------------------------------------------------------------------------------------
		$data['CRON']			= $this->url->link('extension/dashboard/NotificationCentre/CRON');
		
		$data['tables'] = $this->alltables();
		$data['ajax_joins']		= 'index.php?route=extension/dashboard/NotificationCentre/getjoins&user_token=' . $this->session->data['user_token'];
		$data['ajax_filters']	= 'index.php?route=extension/dashboard/NotificationCentre/getfilters&user_token=' . $this->session->data['user_token'];
		$data['ajax_variables']	= 'index.php?route=extension/dashboard/NotificationCentre/getvariables&user_token=' . $this->session->data['user_token'];
//-------------------------------------------------------------------------------------------------------------------------------------
		$data['items'] = $this->model_extension_dashboard_NotificationCentre->getNotificationSetup();

		$this->document->addScript('view/javascript/jquery/dynamiclist/jquery.dynamiclist.js');
		$this->document->addScript('view/javascript/jquery/magnific-popup/jquery.magnific-popup.min.js');
		$this->document->addScript('view/javascript/jquery/querybuilder/js/query-builder.standalone.js');
		$this->document->addScript('view/javascript/daterangepicker.js');
		$this->document->addScript('view/javascript/nicEdit.js');
		$this->document->addStyle( 'view/javascript/jquery/magnific-popup/magnific-popup.css');
		$this->document->addStyle( 'view/javascript/jquery/querybuilder/css/query-builder.default.css');
		$this->document->addStyle( 'view/javascript/daterangepicker.css');
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/dashboard/NotificationCentre_form', $data));
	}
	

	public function dashboard() {
		$this->load->language('extension/dashboard/NotificationCentre');
		$this->load->model('extension/dashboard/NotificationCentre');
		
		$setups = $this->model_extension_dashboard_NotificationCentre->getNotificationSetup();
		$this->build_statistics_tables();
		
		$data['Notifications'] = array();
		$str =	"";
		foreach($setups as $setup){
			echo	"<div style='display:none'>";
			echo 	"	<pre>".var_export($setup,true)."</pre>";
	//		if(($setup['route']==0) || ($setup['route']==3) || ($setup['route']==4)){
				$sql = $this->rulesql($setup['rule']);
				echo 	"	<pre>".var_export($sql,true)."</pre>";
				$results = $this->model_extension_dashboard_NotificationCentre->exesql($sql);
				echo	"	<pre>".var_export($results,true)."</pre>";
				
				if(count($results)){
					foreach($results as $result){
						$out = html_entity_decode($setup['notification']);
						foreach($result as $arg=>$val){
							$out = str_replace('{'.$arg.'}',$val,$out);
						}
						$data['Notifications'][] =	"<pre>".$out."</pre>";
					}
				}
	//		}
			echo	"</div>";
			echo	"<div style='display:none'><pre>".var_export($data['Notifications'],true)."</pre></div>";
		}
		
		return $this->load->view('extension/dashboard/NotificationCentre_dash', $data);
	}
}










