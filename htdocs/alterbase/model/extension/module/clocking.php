<?php 
class ModelExtensionModuleClocking extends Model {
	private $tableevent_types		= DB_PREFIX . 'clk_event_types';
	private $tablecalendar			= DB_PREFIX . 'clk_calendar';
	private $tablecalendar_history	= DB_PREFIX . 'clk_calendar_history';
	private $tableuser				= DB_PREFIX . 'user';
	
	public function install() {
		$this->db->query("	CREATE TABLE `" . $this->tablecalendar."` (
								`id` int(11) NOT NULL AUTO_INCREMENT,
								`start_date` datetime NOT NULL,
								`end_date` datetime NOT NULL,
								`text` varchar(255) DEFAULT NULL,
								`user_id` int(11) NOT NULL,
								`source` int(11) NOT NULL,
								`source_id` int(11) NOT NULL,
								`type` int(11) NOT NULL,
								`timestamp` datetime NOT NULL,
								`delta` double NOT NULL,
								PRIMARY KEY (`id`)
							) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1
						");
						
		$this->db->query("	CREATE TABLE `" . $this->tablecalendar_history."` (
								`id` int(11) NOT NULL AUTO_INCREMENT,
								`calendar_id` int(11) NOT NULL,
								`field` varchar(255) NOT NULL,
								`original` varchar(255) NOT NULL,
								`new` varchar(255) NOT NULL,
								`modified_user_id` int(11) NOT NULL,
								`modified_date` datetime NOT NULL,
								UNIQUE KEY `id` (`id`)
							) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1
						");
		$this->db->query("	CREATE TABLE `" . $this->tableevent_types."` (
								`id` int(11) NOT NULL,
								`name` varchar(255) NOT NULL,
								`rule` varchar(255) NOT NULL,
								`stop_button` varchar(255) NOT NULL,
								`start_button` varchar(255) NOT NULL,
								`style` varchar(255) NOT NULL DEFAULT 'color:#FFFFFF; background-color:#000000;'
							) ENGINE=InnoDB DEFAULT CHARSET=latin1;
						");
		$this->db->query("	INSERT INTO `" . $this->tableevent_types."` (`id`, `name`, `rule`, `stop_button`, `start_button`, `style`) VALUES
								(0, 'Annual Leave', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(1, 'TOIL', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(2, 'Public holidays', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(3, 'Sick leave', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(4, 'Maternity leave', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(5, 'Paternity leave', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(6, 'Adoptive leave', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(7, 'Carer’s leave', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(8, 'Parental leave', '', '', '', 'color:#000000; background-color:#FFFFFF;'),
								(9, 'break', '[10]', 'return from break', 'go on break', 'color:#000000; background-color:#FFFFFF;'),
								(10, 'Signed In', '', 'sign out', 'sign in', 'color:#000000; background-color:#00FF00;');
						");
	}
	public function uninstall() {
		$this->db->query("DROP TABLE `" . $this->tablecalendar."`");
		$this->db->query("DROP TABLE `" . $this->tablecalendar_history ."`");
		$this->db->query("DROP TABLE `" . $this->tableevent_types ."`");
	}

	private function GetAlllinmgrBelow($user) {
		$arr = $this->db->query("	SELECT u.user_id as id, CONCAT(u.firstname,' ',u.lastname) as name, u.linemgr
									FROM `" . $this->tableuser			."` as u
									WHERE u.linemgr = ".$user."
										AND u.status=1
								")->rows;
		foreach($arr as $a){
			$arr = array_merge($arr,$this->GetAlllinmgrBelow($a['id']));
		}
		return $arr;
	}
	public function GetAllUsersBelow($user) {
		$arr = $this->db->query("	SELECT u.user_id as id, CONCAT(u.firstname,' ',u.lastname) as name, u.linemgr
									FROM `" . $this->tableuser			."` as u
									WHERE u.user_id = ".$user."
										AND u.status=1
								")->rows;
								
		$arr = array_merge($arr,$this->GetAlllinmgrBelow($user));
		return $arr;
	}
	
	public function GetAllUsersBelow_associative($user) {
		$users = $this->GetAllUsersBelow($user);
		$arr = array();
		foreach($users as $u){
			$arr[$u['id']] = $u;
		}
		return $arr;
	}
	
	public function GetAllUsers() {
		return $this->db->query("	SELECT u.user_id as id, CONCAT(u.firstname,' ',u.lastname) as name, u.linemgr
									FROM `" . $this->tableuser			."` as u
									WHERE u.status=1
								")->rows;
	}

	public function GetAllUsersCurrentStatus() {
		$ret = $this->db->query("	
			/* select running current event */
			SELECT u.user_id, t.name as state, u.firstname,u.lastname,u.image,t.style
				FROM `alt_user` as u
				left JOIN `alt_clk_calendar` as c on (
					u.user_id=c.user_id
					AND c.end_date = c.start_date
					AND c.timestamp = (
						SELECT MAX(timestamp)
						FROM `alt_clk_calendar`as c2
						WHERE c.user_id = c2.user_id
							AND c2.end_date = c2.start_date
					)
				)
				left JOIN `alt_clk_event_types` as t on (c.type=t.id)
				where u.status=1
		")->rows;
		
		
		foreach( $ret as $k=>$v){
			if(is_null($v['state'])){
				$ret[$k]['state'] = 'Signed Out';
				$ret[$k]['style'] = 'color:#FFFFFF; background-color:#000000; opacity:25%;';
			}
		}
		
		
		return $ret;
	}
	public function getOpenEvents($user) {
		return $this->db->query("	SELECT c.*,t.name as state
									FROM `" . $this->tablecalendar		."` as c
									JOIN `" . $this->tableevent_types	."` as t on (c.type=t.id)
									JOIN `" . $this->tableuser			."` as u on (u.user_id=c.user_id)
									WHERE	c.user_id	= ".$user."
										AND u.status=1
										AND	c.end_date = c.start_date
								")->rows;
	}
	public function getOpenEventof($user,$type) {
		return $this->db->query("	SELECT c.*,t.name as state
									FROM `" . $this->tablecalendar		."` as c
									JOIN `" . $this->tableevent_types	."` as t on (c.type=t.id)
									JOIN `" . $this->tableuser			."` as u on (u.user_id=c.user_id)
									WHERE	c.user_id	= ".$user."
										AND u.status=1
										AND type = '".$type."'
										AND	c.end_date = c.start_date
								")->row;
	}

	public function getTableBySSP($get = array(),$columns = array(),$options){
		require( 'ssp.class.php' );
		return (SSP::process($get,$this->db, $options));
	}

	private function sec_to_time($seconds) {
		$hours		 = floor($seconds/3600);
		$seconds	-= $hours*3600;
		$minutes	 = floor($seconds/60);
		$seconds	-= $minutes*60;
		return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
	}
	
	private function getcumulativeEventTime_day($requestParams){
		$sql = "
			SELECT	'".$requestParams['date']." 00:00:00' as date,data.type,SUM(data.time) as length,t.name ,max(running) as running
			FROM(
				# start today
				# no end
				SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(NOW(),start_date))) as time,1 as running
				FROM `".$this->tablecalendar."`
				WHERE	user_id		= '".$requestParams['user_id']."'
					AND start_date	>= '".$requestParams['date']." 00:00:00'
					AND start_date	<= ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND)
					AND	end_date	= start_date
				GROUP BY type
				
				# start today
				# ends after
				UNION
				SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND),start_date))) as time,0 as running
				FROM `".$this->tablecalendar."`
				WHERE	user_id		= '".$requestParams['user_id']."'
					AND start_date	>= '".$requestParams['date']." 00:00:00'
					AND start_date	<= ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND)
					AND	end_date	>= ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND)
				GROUP BY type
				
				# start today
				# ends today
				UNION
					SELECT type,SUM(TIME_TO_SEC(TIMEDIFF(end_date,start_date))) as time,0 as running
					FROM `".$this->tablecalendar."`
					WHERE	user_id		= '".$requestParams['user_id']."'
						AND start_date	>= '".$requestParams['date']." 00:00:00'
						AND	end_date	<= ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND)
					GROUP BY type
				
				# start before
				# ends today
				UNION
					SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(end_date,'".$requestParams['date']." 00:00:00'))) as time,0 as running
					FROM `".$this->tablecalendar."`
					WHERE	user_id		= '".$requestParams['user_id']."'
						AND start_date	<= '".$requestParams['date']." 00:00:00'
						AND end_date	>= '".$requestParams['date']." 00:00:00'
						AND	end_date	<= ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND)
					GROUP BY type
				
				# start before
				# ends after
				UNION
					SELECT	type,SUM(TIME_TO_SEC(TIMEDIFF(ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND),'".$requestParams['date']." 00:00:00'))) as time,0 as running
					FROM `".$this->tablecalendar."`
					WHERE	user_id		= '".$requestParams['user_id']."'
						AND start_date	<= '".$requestParams['date']." 00:00:00'
						AND end_date	>= ADDDATE('".$requestParams['date']." 23:59:59',INTERVAL 1.0 SECOND_MICROSECOND)
					GROUP BY type
			)as data
			JOIN `alt_clk_event_types` as t on (data.type=t.id)
			GROUP BY data.type
			";
		$res = $this->db->query($sql)->rows;
		
		$worksec = 0;
		$worksecrunning = 0;
		foreach( $res as $k=>$v){
			if($v['type']==10)	{
				$worksec += $v['length'];
				if($v['running']=='1') {
					$worksecrunning = $v['running'];
				}
			}
			if($v['type']==9)	{ $worksec -= $v['length']; }
		}

		$sumsec = 0;
		foreach( $res as $k=>$v){
			if($v['type']==9)	{ $sumsec -= $v['length']; }
			else				{ $sumsec += $v['length']; }
		}

		foreach( $res as $k=>$v){
			if($v['type']==10)	{unset($res[$k]);
				$res = array_diff_key($res,[$k => "xy"]);
			}
		}
		
		
		$res[] = array(
			'date'		=> $requestParams['date'].' 00:00:00',
			'type'		=> 999998,
			'length'	=> $worksec,
			'running'	=> $worksecrunning,
			'name'		=> "Worked Hours"
		);
		$res[] = array(
			'date'		=> $requestParams['date'].' 00:00:00',
			'type'		=> 999999,
			'length'	=> $sumsec,
			'running'	=> False,
			'name'		=> "Sum of Hours"
		);
		
		return $res;
	}
	
	
	
	public function getcumulativeEventTime($requestParams){
		$user_id	= $requestParams['user_id'];
		$date		= $requestParams['date'];
		
		if($requestParams['period']=='day'){
			$params = array(
				'user_id'	=>	$user_id,
				'date'		=>	$date
			);
			$ret = $this->getcumulativeEventTime_day($params);
			foreach($ret as $k=>$v){
				$ret[$k]['length'] = $this->sec_to_time($ret[$k]['length']);
			}
			return $ret;
		}
		if($requestParams['period']=='week'){
			
			$datearr = array(
				date('Y-m-d', strtotime('last sunday +1 day', strtotime($date))),
				date('Y-m-d', strtotime('last sunday +2 day', strtotime($date))),
				date('Y-m-d', strtotime('last sunday +3 day', strtotime($date))),
				date('Y-m-d', strtotime('last sunday +4 day', strtotime($date))),
				date('Y-m-d', strtotime('last sunday +5 day', strtotime($date))),
				date('Y-m-d', strtotime('last sunday +6 day', strtotime($date))),
				date('Y-m-d', strtotime('last sunday +7 day', strtotime($date))),
			);
			$ret = array();
			foreach($datearr as $v){
				$params = array(
					'user_id'	=>	$user_id,
					'date'		=>	$v
				);
				$got = $this->getcumulativeEventTime_day($params);
				foreach($got as $gk=>$gv){
					
					if(array_key_exists($gv['type'],$ret)){
						$ret[$gv['type']]['length']	+= $gv['length'];
						if($gv['running']=='1') {
							$ret[$gv['type']]['running'] = $gv['running'];
						}
					}else{
						$ret[$gv['type']] = array(
							'name'		=> $gv['name'],
							'length'	=> $gv['length'],
							'running'	=> $gv['running'],
						);
					}
				}
			}
			
			foreach($ret as $k=>$v){
				$ret[$k]['length'] = $this->sec_to_time($ret[$k]['length']);
			}
			return $ret;
		}
	}

	public function GetSources(){
		return array(
				0=>array("id"=>0,"name"=>"auto-generated"	,"color"=> "#1796b0",	"textColor"=>"#ffffff"),
				1=>array("id"=>1,"name"=>"Manual entry"		,"color"=> "#ffbc00",	"textColor"=>"#ffffff"),
				2=>array("id"=>2,"name"=>"Manual amendment"	,"color"=> "#5cb64c",	"textColor"=>"#ffffff"),
			);
	}
	

	public function getEventType($id) {
		$arr = $this->db->query("	SELECT *
									FROM `" . $this->tableevent_types ."`
									WHERE id=".$id."
								")->row;
		return $arr;
	}
	public function getEventTypes() {
		$arr = $this->db->query("	SELECT *
									FROM `" . $this->tableevent_types ."`
								")->rows;
		return $arr;
	}
	public function getToButtons($user) {
		$last = array();
		
		foreach ($this->getOpenEvents($user) as $k=>$v){
			$last[$v['type']] = $v;
		}
		$types = $this->getEventTypes();
		
		$arr = array();
		foreach($types as $k=>$v){
			if(array_key_exists($v['id'],$last))	{ $btn = 'stop_button';		$calid = $last[$v['id']]['id'];}
			else									{ $btn = 'start_button';	$calid = 0;}
			
			
			if(strlen($v['rule'])){
				$json = json_decode($v['rule']);
				$req = false;
				foreach($json as $v2){
					if(array_key_exists($v2,$last)){
						$req = true;
					}
				}
			}
			else{$req = true;}

			if($req){
				if(strlen($v[$btn])){
					$arr[] = array(
						'type'	=> $v['id'],
						'text'	=> $v[$btn],
						'calid'	=> $calid,
						'rule'	=> $v['rule'],
					);
				}
			}
		}
		return $arr;
	}


	public function actionEvent($get){
		$user	= $get['user_id'];
		$calid	= $get['calid'];
		$type	= $get['type'];
		
		if($calid!=0){
			$this->db->query("UPDATE `".$this->tablecalendar."` SET 
								`end_date`=NOW(),
								`timestamp`= NOW()
								WHERE `id`='".$calid."'
							");
							
			$this->db->query("	
								UPDATE	`".$this->tablecalendar."` t1,
										`".$this->tablecalendar."` t2
								SET 	t1.delta = (TIME_TO_SEC( TIMEDIFF(t2.end_date,t2.start_date) )/3600) 
								WHERE	t1.id = t2.id
									AND	t1.id = ".$calid."
							");
			
		}else{
			$e = $this->getEventType($type);
			$this->db->query("	INSERT INTO `".$this->tablecalendar."` SET
								`start_date`=NOW(),
								`end_date`=NOW(),
								`text`='',
								`source`	=0,
								`source_id`	=".$user.",
								`type`= ".$type." ,
								`user_id`=".$user.",
								`timestamp`= NOW()
						");
		}
	}

	public function calendarAddHistory($event_id,$operation,$newEvent){
		
		$sqlpre   = "INSERT INTO `".$this->tablecalendar_history."` SET ";
		$sqlpre  .= "`calendar_id`='".$event_id."',";
		$sqlpost  = "`modified_user_id`='".$this->user->getId()."',";
		$sqlpost .= "`modified_date`=NOW()";
		
		switch($operation){
			case 'update':{
				$original = $this->db->query("	SELECT * FROM `".$this->tablecalendar."` WHERE `id`='".$event_id."'")->row;
				foreach($newEvent as $k=>$v){
					if($original[$k] != $newEvent[$k]){
						$sql  = "`field`='".$k."',";
						$sql .= "`original`='".$original[$k]."',";
						$sql .= "`new`='".$newEvent[$k]."',";
						$this->db->query($sqlpre . $sql . $sqlpost);
					}
				}
				break;
			}
			case 'insert':{
				$sql  = "`field`='new Record',";
				$sql .= "`original`='',";
				$sql .= "`new`='".json_encode($newEvent)."',";
				$this->db->query($sqlpre . $sql . $sqlpost);
				break;
			}
			case 'delete':{
				$original = $this->db->query("	SELECT * FROM `".$this->tablecalendar."` WHERE `id`='".$event_id."'")->row;
				$sql  = "`field`='delete Record',";
				$sql .= "`original`='".json_encode($original)."',";
				$sql .= "`new`='',";
				$this->db->query($sqlpre . $sql . $sqlpost);
				break;
			}
		}
	}

	function decimalhrs_to_time($decimal) {
		$seconds = ($decimal*60*60);
		return sprintf('%02d:%02d:%02d', ($seconds/ 3600),($seconds/ 60 % 60), $seconds% 60);
	}
	public function calendarRead($requestParams){
		$queryParams = [];
		$sql = "SELECT * FROM `".$this->tablecalendar."`";
		$sql .= " WHERE `user_id` =".$requestParams["user_id"];
		if (isset($requestParams["from"]) && isset($requestParams["to"])) {
			$sql .= " AND `end_date`>='".$requestParams["from"]."' AND `start_date` < '".$requestParams["to"]."'";
		}
		
		$sources = $this->GetSources();
		$events = $this->db->query($sql)->rows;
		foreach($events as $index=>$event){
			$events[$index]["delta"] = $this->decimalhrs_to_time($event["delta"]);
			$events[$index]["text"] = htmlentities($event["text"]);
			$events[$index]["color"] = $sources[$event["source"]]["color"];
			$events[$index]["textColor"] = $sources[$event["source"]]["textColor"];
			if((new DateTime($event["start_date"])) == (new DateTime($event["end_date"]))){
				$events[$index]["readonly"] = true;
			}
		}
		return $events;
	}
	public function calendarCreate($event){
		$sql = "INSERT INTO `".$this->tablecalendar."` SET ";
		foreach($event as $key=>$value){
			$sql .= "`".$key."`='".$value."',";
		}
		$sql .= "`timestamp`= NOW()";
		$this->db->query($sql);
		
		$id = $this->db->getLastId();
		$this->calendarAddHistory($id,'insert',$event);
		
		
		$this->db->query("	
							UPDATE	`".$this->tablecalendar."` t1,
									`".$this->tablecalendar."` t2
							SET 	t1.delta = (TIME_TO_SEC( TIMEDIFF(t2.end_date,t2.start_date) )/3600) 
							WHERE	t1.id = t2.id
								AND	t1.id = ".$id."
						");
		
		return $id;
	}
	public function calendarUpdate($id,$event){
		unset($event['color']);
		unset($event['textColor']);
		unset($event['delta']);
		$sql = "UPDATE `".$this->tablecalendar."` SET ";
		foreach($event as $key=>$value){
			$sql .= "`".$key."`='".$value."',";
		}
		$sql .= "`timestamp`= NOW()";
		$sql .= " WHERE `id`='".$id."'";
		$this->calendarAddHistory($id,'update',$event);
		$this->db->query($sql);
		
		$this->db->query("	
							UPDATE	`".$this->tablecalendar."` t1,
									`".$this->tablecalendar."` t2
							SET 	t1.delta = (TIME_TO_SEC( TIMEDIFF(t2.end_date,t2.start_date) )/3600) 
							WHERE	t1.id = t2.id
								AND	t1.id = ".$id."
						");
		
	}
	public function calendarDelete($id,$event){
		$this->calendarAddHistory($id,'delete',array());
		$sql = "DELETE FROM `".$this->tablecalendar."` WHERE `id`='".$id."' ;";
		$this->db->query($sql);
	}









}
