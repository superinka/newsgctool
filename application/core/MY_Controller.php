<?php

Class MY_Controller extends CI_Controller {
	
	public $data_layout = array();
	function __construct() {
		parent::__construct();
		$new_url = $this->uri->segment(1);
		switch ($new_url) {
			case 'admin' : {
				$this->load->helper('admin');
				break;
			}
			
			default: {
				//du lieu trang ngoai
			}
		}

		$this->CI = & get_instance();


		$this->load->model('request/request_model');
		$this->load->model('home/home_model');
		$this->load->model('home/department_model');
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('project/project_model');
		$this->load->model('project/project_user_model');
		$this->load->model('project/mission_model');
		$this->load->model('project/task_model');
		$this->load->model('project/mission_user_model');
		$this->load->model('project/proportion_department_model');
		$this->load->model('my_mission/my_mission_model');
		$this->load->model('my_report/my_report_model');

		global $account_type;

		date_default_timezone_set('Asia/Ho_Chi_Minh');

		if( $this->uri->segment(1) =='login'){

		}

		else{
			if($this->session->userdata('logged_in'))
		    {
		      $session_data = $this->session->userdata('logged_in');
		      $this->data_layout['username'] = $session_data['username'];
		      $this->data_layout['account_type'] = $session_data['account_type'];
		      $this->data_layout['id'] = $session_data['id'];
		      $id = $this->data_layout['id'];
		      //echo '0';
		    }
		    else
		    {
		      //If no session, redirect to login page
		      redirect(base_url('login'), 'refresh');
			}		
		} 


	}

	function get_my_avatar() {

		$my_id = $this->data_layout['id'];
		$input['where'] = array('user_id'=>$my_id);
		//$input_request['limit'] = array('10' ,'0');
		$my_avatar = $this->home_model->get_list($input);

		if($my_avatar!=null) {
			return $my_avatar[0]->avatar;
		}
		//$this->data_layout['list_request_by_me'] = $list_request_by_me;
		else {
			return null;
		}
	}

	function get_list_notification(){
		return 100;
	}

	function get_my_fullname() {
		$my_id = $this->data_layout['id'];
		if($my_id == 1){
			return 'Administrator';
		}
		else {
			$input['where'] = array('user_id'=>$my_id);
			$my_name = $this->home_model->get_info_rule($where=array('user_id'=>$my_id));
			return $my_name->fullname;
		}

	}

	function get_my_request() {

		$list_request_by_me = null;
		$my_id = $this->data_layout['id'];
		$input_request['where'] = array('create_by'=>$my_id, 'review_status'=>0);
		//$input_request['limit'] = array('10' ,'0');
		$list_request_by_me = $this->request_model->get_list($input_request);
		//$this->data_layout['list_request_by_me'] = $list_request_by_me;
		return $list_request_by_me;
	}


	function get_my_order(){
		$my_id = $this->data_layout['id'];
		$my_account_level = $this->data_layout['account_type'];

		$list_order_for_me = array();

		if($my_account_level==3) {
			$input_room['where'] = array('user_id'=>$my_id);
			//$input_room['limit'] = array('10' ,'0');
			$list_my_room = $this->role_model->get_list($input_room);
			$list_order_for_me = array();
			foreach ($list_my_room as $key => $value) {
				$input_request['where'] = array('department_id'=>$value->department_id,'review_status'=>0);
				$list_request = $this->request_model->get_list($input_request);
				foreach ($list_request as $k => $v) {
					if($v->create_by == $my_id){
						unset($list_request[$k]);
					}
					else {
						$i = $this->home_model->get_fullname_employee($v->create_by);
						$v->creater_name = $i[0]->fullname;
						$list_order_for_me[] = $v;
					}
				}
			}
		}

		if($my_account_level==2 || $my_account_level == 1) {
			$list_order_for_me = array();
			
			$input_request['where'] = array('level_creater'=>3, 'review_status'=>0);
			//$input_request['limit'] = array('10' ,'0');
			$list_request = $this->request_model->get_list($input_request);
			foreach ($list_request as $k => $v) {
				if($v->create_by == $my_id){
					unset($list_request[$k]);
				}
				else {
					$i = $this->home_model->get_fullname_employee($v->create_by);
					if($i){
						$v->creater_name = $i[0]->fullname;
						$list_order_for_me[] = $v;
					}
				}
			}
			
		}
		return $list_order_for_me;
	}

	function get_my_room_id(){

		$my_id = $this->data_layout['id'];
		$my_account_level = $this->data_layout['account_type'];

		$my_room = array();

		if($my_account_level == 1 || $my_account_level == 2 ){
			for ($i=1; $i <= 15 ; $i++) { 
				$my_room[] = $i;
			}
		}

		if($my_account_level == 3 || $my_account_level ==4){
			$input_depart = array();
			$input_depart['where']['user_id'] = $my_id;
			$list_depart = $this->role_model->get_list($input_depart);

			foreach ($list_depart as $key => $value) {
				$my_room[] = $value->department_id;
			}
		}

		return $my_room;

	}

	function get_report_by_room($type =0){

		$my_id = $this->data_layout['id'];
		$my_account_level = $this->data_layout['account_type'];

		$my_room = array();

		if($my_account_level == 1 || $my_account_level == 2 ){
			for ($i=1; $i <= 15 ; $i++) { 
				$my_room[] = $i;
			}
		}

		if($my_account_level == 3 || $my_account_level ==4){
			$input_depart = array();
			$input_depart['where']['user_id'] = $my_id;
			$list_depart = $this->role_model->get_list($input_depart);

			foreach ($list_depart as $key => $value) {
				$my_room[] = $value->department_id;
			}
		}


		$final = array();

		foreach ($my_room as $key => $value) {
			$input_mission = array();
			$input_mission['where']['department_id'] = $value;
			$list_mission = $this->mission_model->get_list($input_mission);
			if($list_mission!=null){
				

				foreach ($list_mission as $k => $v) {
					$mission_id = $v->id;

					$input_task = array();
					$input_task['where']['mission_id'] = $mission_id;
					$list_task = $this->task_model->get_list($input_task);

					if($list_task!=null){
						foreach ($list_task as $ka => $va) {
							$input_report = array();
							$input_report['where']['task_id'] = $va->id;
							$input_report['where']['review_status'] = $type;
							$list_report = $this->my_report_model->get_list($input_report);

							if($list_report!=null){
								foreach ($list_report as $x => $y) {
									$final[] = $y;
								}
							}
						}
					}

				}							
			}
			
		}

		$input_bonus = array();
		$input_bonus['where']['task_id'] = 0;
		$input_bonus['where']['review_status'] = $type;
		$list_report_bonus = $this->my_report_model->get_list($input_bonus);
		if($list_report_bonus!=null){
			foreach ($list_report_bonus as $x => $y) {
				$final[] = $y;
			}
		}
		return $final;
	}

	function get_report_by_room_non_leader(){

		$my_id = $this->data_layout['id'];
		$my_account_level = $this->data_layout['account_type'];

		$my_room = array();

		if($my_account_level == 1 || $my_account_level == 2 ){
			for ($i=1; $i <= 15 ; $i++) { 
				$my_room[] = $i;
			}
		}

		if($my_account_level == 3 || $my_account_level ==4){
			$input_depart = array();
			$input_depart['where']['user_id'] = $my_id;
			$list_depart = $this->role_model->get_list($input_depart);

			foreach ($list_depart as $key => $value) {
				$my_room[] = $value->department_id;
			}
		}


		$final = array();

		foreach ($my_room as $key => $value) {
			$input_mission = array();
			$input_mission['where']['department_id'] = $value;
			$input_mission['where']['level'] = 4;
			$list_mission = $this->mission_model->get_list($input_mission);
			if($list_mission!=null){
				

				foreach ($list_mission as $k => $v) {
					$mission_id = $v->id;

					$input_task = array();
					$input_task['where']['mission_id'] = $mission_id;
					$list_task = $this->task_model->get_list($input_task);

					if($list_task!=null){
						foreach ($list_task as $ka => $va) {
							$input_report = array();
							$input_report['where']['task_id'] = $va->id;
							$input_report['where']['review_status'] = 0;
							$list_report = $this->my_report_model->get_list($input_report);

							if($list_report!=null){
								foreach ($list_report as $x => $y) {
									$final[] = $y;
								}
							}
						}
					}

				}							
			}
			
		}

		$input_bonus = array();
		$input_bonus['where']['task_id'] = 0;
		$input_bonus['where']['review_status'] = 0;
		$list_report_bonus = $this->my_report_model->get_list($input_bonus);
		if($list_report_bonus!=null){
			foreach ($list_report_bonus as $x => $y) {
				$final[] = $y;
			}
		}
		return $final;
	}

	function list_report_by_me($type =0){

		$my_id = $this->data_layout['id'];
		$my_account_level = $this->data_layout['account_type'];

		$my_room = array();

		if($my_account_level == 1 || $my_account_level == 2 ){
			for ($i=1; $i <= 15 ; $i++) { 
				$my_room[] = $i;
			}
		}

		if($my_account_level == 3 || $my_account_level ==4){
			$input_depart = array();
			$input_depart['where']['user_id'] = $my_id;
			$list_depart = $this->role_model->get_list($input_depart);

			foreach ($list_depart as $key => $value) {

				$info_depart = $this->department_model->get_info($value->department_id);

				$my_room[] = array(
					'department_id'=>$value->department_id,
					'department_name' => $info_depart->name
				);
			}
		}

		//pre($my_room);


		$final = array();

		foreach ($my_room as $key => $value) {
			$input_mission = array();
			$input_mission['where']['department_id'] = $value['department_id'];
			$list_mission = $this->mission_model->get_list($input_mission);
			//pre($list_mission);
			if($list_mission!=null){
				

				foreach ($list_mission as $k => $v) {
					$mission_id = $v->id;

					$input_task = array();
					$input_task['where']['mission_id'] = 29;
					$list_task = $this->task_model->get_list($input_task);

					// pre($list_task);

					if($list_task!=null){
						foreach ($list_task as $ka => $va) {
							$input_report = array();
							$input_report['where']['task_id'] = $va->id;
							$input_report['where']['review_status'] = $type;
							$list_report = $this->my_report_model->get_list($input_report);

							if($list_report!=null){

							//$my_room[$key]['list_report'][] = $list_report;

								foreach ($list_report as $x => $y) {
									$create_id = $y->create_by;
									$info_user = $this->home_model->get_info_rule($where = array('user_id'=>$create_id));
									$create_name = $info_user->fullname;
									$y->create_name = $create_name;

									$task_id = $y->task_id;

									$info_task = $this->task_model->get_info_rule($where = array('id'=>$task_id));

									if($info_task == null){
										$task_name = 'Không có thông tin';
									}

									if($info_task != null){
										$task_name = $info_task->name;
										$mission_id = $info_task->mission_id;
										$info_mission = $this->mission_model->get_info_rule($where = array('id'=>$mission_id));

										if($info_mission == null){
											$mission_name = 'Không có thông tin';
										}

										if($info_mission != null){
											$mission_name = $info_mission->name;
											$y->mission_name = $mission_name;

											$project_id = $info_mission->project_id;
											$info_project = $this->project_model->get_info_rule($where = array('id'=>$project_id));

											if($info_project == null){
												$project_name = 'Không có thông tin';
											}
											if($info_project != null){
												$project_name = $info_project->project_name;
												$y->project_name = $project_name;
											}

										}
									}

									$y->task_name = $task_name;




									//$final[] = $y;

								}
								//$va[$ka] = $y;
							}


						}
					}

				}							
			}
			
		}

		$input_bonus = array();
		$input_bonus['where']['task_id'] = 0;
		$input_bonus['where']['review_status'] = $type;
		$list_report_bonus = $this->my_report_model->get_list($input_bonus);
		if($list_report_bonus!=null){
			foreach ($list_report_bonus as $x => $y) {
				$final[] = $y;
			}

			$my_room['bonus'] = $list_report_bonus;
		}
		return $final;
	}	

	function logout()
    {
	    $this->session->unset_userdata('logged_in');
	    session_destroy();
	    redirect(base_url('login'), 'refresh');
    }

}
