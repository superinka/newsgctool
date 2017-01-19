<?php
Class My_Report extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/department_model');
		$this->load->model('project/project_model');
		$this->load->model('project/project_user_model');
		$this->load->model('project/mission_model');
		$this->load->model('project/task_model');
		$this->load->model('project/mission_user_model');
		$this->load->model('project/proportion_department_model');
		$this->load->model('my_mission/my_mission_model');
		$this->load->model('my_report_model');
		$this->load->library('upload');

	}
	
	function index() {
		//$this->load->view('home/index');

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $where = array('user_id' => $my_id);
	    $input = array();
	    $input['where']['user_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if($this->data_layout['account_type'] < 3){
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('view_report/index'));	    	
	    }

	    if($this->data_layout['account_type']==4){
	    	$department = $this->role_model->get_column('tb_role', 'department_id', $where=array('user_id'=>$my_id));
	    	foreach ($department as $key => $value) {
	    	$department_id = $department[0]->department_id;
	    	$department_name_info = $this->department_model->get_info($department_id);

	    	$list_room_by_me['department'][$key]['name'] = $department_name_info->name;
	    	$list_room_by_me['department'][$key]['id'] = $department_id;

			$list_miss = $this->mission_model->get_columns('tb_mission',$where=array('department_id'=>$department_id, 'level'=>4));
	    		if($list_miss!=null){
	    			foreach ($list_miss as $k => $v) {
	    				$mission_id = $v->id;
	    				$project_id = $v->project_id;
	    				$project = $this->project_model->get_info($project_id);

	    				if($project) {
		    				$project_name = $project->project_name;
		    				$v->project_name = $project_name;

		    				if($v->end_date >= $today) {
			    				$list_task = $this->mission_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>0));
			    				foreach ($list_task as $x => $y) {
			    					if($y->end_date < $today){
			    						// /pre($list_task[$x]);
			    						unset($list_task[$x]);
			    					}

			    					if($y->start_date > $today){
			    						unset($list_task[$x]);
			    					}
			    				}
			    				$list_task = array_values($list_task);

			    				foreach ($list_task as $x => $y) {

			    					$list_reported_today =  $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>1));

			    					if($list_reported_today!=null){
			    						$list_task[$x]->list_reported_today = $list_reported_today;
			    					}

			    					$list_un_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>0));

			    					if($list_un_report_today!=null){
			    						$list_task[$x]->list_un_report_today = $list_un_report_today;
			    					}

			    					$list_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id));

			    					if($list_report_today!=null){
			    						$list_task[$x]->list_report_today = $list_report_today;
			    					}
			    					
			    				}
			    				$v->list_task = $list_task;	    					
		    				}
	    				}


	    			}

	    			$list_room_by_me['department'][$key]['list_miss'] = $list_miss;
	    		}
	    		}


	    } 

	    else if($this->data_layout['account_type']==3){
	    	$department = $this->role_model->get_column('tb_role', 'department_id', $where=array('user_id'=>$my_id));
	    	foreach ($department as $key => $value) {
	    		$department_id = $value->department_id;
	    		$department_name_info = $this->department_model->get_info($department_id);
	    		$list_room_by_me['department'][$key]['name'] = $department_name_info->name;
	    		$list_room_by_me['department'][$key]['id'] = $department_id;

	    		$list_miss = $this->mission_model->get_columns('tb_mission',$where=array('department_id'=>$department_id, 'level'=>3));
	    		if($list_miss!=null){
	    			foreach ($list_miss as $k => $v) {
	    				$mission_id = $v->id;
	    				$project_id = $v->project_id;
	    				$project = $this->project_model->get_info($project_id);

	    				if($project!=null){
		    				$project_name = $project->project_name;
		    				$v->project_name = $project_name;

		    				if($v->end_date >= $today) {
			    				$list_task = $this->mission_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>0));
			    				foreach ($list_task as $x => $y) {
			    					if($y->end_date < $today){
			    						// /pre($list_task[$x]);
			    						unset($list_task[$x]);
			    					}

			    					if($y->start_date > $today){
			    						unset($list_task[$x]);
			    					}
			    				}
			    				$list_task = array_values($list_task);

			    				foreach ($list_task as $x => $y) {

			    					$list_reported_today =  $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>1));

			    					if($list_reported_today!=null){
			    						$list_task[$x]->list_reported_today = $list_reported_today;
			    					}

			    					$list_un_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id, 'review_status'=>0));

			    					if($list_un_report_today!=null){
			    						$list_task[$x]->list_un_report_today = $list_un_report_today;
			    					}

			    					$list_report_today = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$y->id, 'create_date'=>$today,'create_by'=>$my_id));

			    					if($list_report_today!=null){
			    						$list_task[$x]->list_report_today = $list_report_today;
			    					}
			    					
			    				}
			    				$v->list_task = $list_task;	    					
		    				}	    					
	    				}


	    			}

	    			$list_room_by_me['department'][$key]['list_miss'] = $list_miss;
	    		}
	    	}

	 	}

	 	$all_report_by_me = null;

	 	$input_my_report['where'] = array('create_by'=>$my_id);
	 	$input_my_report['order'] = array('id','ASC');
	 	$all_report_by_me = $this->my_report_model->get_list($input_my_report); 

	 	//pre($all_report_by_me);
	 	$task_name = $mission_name = $project_name = 'chưa rõ'; $department_name='chưa rõ';

	 	foreach ($all_report_by_me as $key => $value) {
	 		$task_id = $value->task_id;
	 		$task_id = intval($task_id);
	 		if($task_id == 0){
		 		$value->task_name = 'Công việc phát sinh';
		 		$value->mission_name = 'Công việc phát sinh';
		 		$value->project_name = 'Công việc phát sinh';
		 		$value->department_name = 'Tất cả phòng ban'; 
	 		}
	 		else {
		 		$task_info = $this->task_model->get_info($task_id);
		 		if($task_info) {
		 			$task_name = $task_info->name;
		 			$mission_id = $task_info->mission_id;
		 			$mission_id = intval($mission_id);
					$mission_info = $this->mission_model->get_info($mission_id);
					if($mission_info) {
						$mission_name = $mission_info->name;
				 		$project_id = $mission_info->project_id;
				 		$project_id = intval($project_id);
				 		$department_id = $mission_info->department_id;
				 		$department_id = intval($department_id);
				 		$department_info = $this->department_model->get_info($department_id);
				 		$department_name = $department_info->name;
				 		$project_info = $this->project_model->get_info($project_id);
				 		if($project_info){
				 			$project_name = $project_info->project_name;
				 		}
				 							
					}
			 		
		 		}

			 	$value->task_name = $task_name;
		 		$value->mission_name = $mission_name;
		 		$value->project_name = $project_name;
		 		$value->department_name = $department_name; 	 			
	 		}

	 		

	 	}

	 	//pre($all_report_by_me);
	 	$this->data_layout['all_report_by_me'] = $all_report_by_me;

	 	//pre($list_room_by_me);
	 	$this->data_layout['list_room_by_me'] = $list_room_by_me;



		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function add_report() {

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    //echo $today; 

	    $input = array();
	    $input['where']['create_by'] = $my_id;
	    $input['where']['create_date'] = $today;

	    $list_report_today = $this->my_report_model->get_list($input);
	    //pre($list_report_today);

	    $this->data_layout['list_report_today'] = $list_report_today;

	    $input_task = array();
	    $input_task['where']['create_by'] = $my_id;
	    $input_task['where']['status'] = 0;

	    $list_task_active  = $this->task_model->get_list($input_task);

		//pre($list_task_active);

	    foreach ($list_task_active as $key => $value) {
	    	if($value->end_date < $today) {
	    		unset($list_task_active[$key]);
	    	}
	    }

	    foreach ($list_task_active as $key => $value) {
	    	$mission_id = $value->mission_id;
	    	$mission = $this->mission_model->get_info($mission_id);
	    	if($mission){
	    		if($mission->end_date < $today) {
	    			unset($list_task_active[$key]);
	    		}
	    	}
	    }

	    //pre($list_task_active);

	    //$list_task_active = array_unique($list_task_active);

	    //pre($list_task_active);

	    $this->data_layout['list_task_active'] = $list_task_active;

	    if($this->input->post()){
			$this->form_validation->set_rules('description', 'description', 'trim');
			$this->form_validation->set_rules('message', 'Mô tả', 'trim');
			$this->form_validation->set_rules('progress', 'Tình Trạng');

			$this->form_validation->set_rules('time_spend', 'Thời gian làm');
			$this->form_validation->set_rules('pro', 'Phần trăm tiến độ', 'numeric|callback_check_percent_task',array('numeric' => '%s Phải là số','check_percent_task'=>'Phần trăm mới không được nhỏ hơn phần trăm cũ'));

			$this->form_validation->set_rules('userfile', 'File Đính Kèm');

			if($this->form_validation->run()){
				$description = $this->input->post('description');
				$message = $this->input->post('message');
				$progress = $this->input->post('progress');
				$time_spend = $this->input->post('time_spend');
				$task = $this->input->post('task');

				$new_completion = $this->input->post('pro');

				//pre($this->input->post('report_file'));

				$this->load->library('upload_library');

				$upload_path = './public/upload/report';



				
				

				//pre($data_upload);

				if($new_completion < 0 ){
					$new_completion =0;
				}

				if($new_completion > 100 ) {
					$new_completion = 100;
				}

				if($task ==0 ){
					$project_id = 0;
					$mission_id = 0;
					$new_completion = 100;
				}

				else {


					$mission_id = $this->task_model->get_info($task,'mission_id');

					//pre($mission_id);

					$mission_id = $mission_id->mission_id;

					$project_id = $this->mission_model->get_info($mission_id,'project_id');

					$project_id = $project_id->project_id;
			
				}



				$code = $project_id. $mission_id .rand(0,9999). md5($task.generateRandomString(8));
				$code = strtolower($code);

				$account_type = $this->data_layout['account_type'] ;

				if($this->data_layout['account_type'] == 3 ) {
					$rvstt = 1;
				}

				else if ($this->data_layout['account_type'] == 4) {
					$rvstt = 0;
				}

				$data_task = array('completion'=>$new_completion);

				//pre($data_task);

				if (empty($_FILES['userfile']['name'])) { 
					$data_report = array(
						'description'   => $description,
						'note'          => $message,
						'status'        => '1',
						'time_spend'    => $time_spend,
						'task_id'       => $task,
						'create_by'     => $my_id,
						'create_date'   => date_create('now')->format('Y-m-d'),
						'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
						'create_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
						'progress'      => $progress,
						'review_by'     => $my_id,
						'review_status' => $rvstt,
						'code'          => $code

					);
				}

				else {
					$data_upload = $this->upload_library->upload($upload_path, 'userfile');
					$data_report = array(
						'description'   => $description,
						'note'          => $message,
						'status'        => '1',
						'time_spend'    => $time_spend,
						'task_id'       => $task,
						'create_by'     => $my_id,
						'create_date'   => date_create('now')->format('Y-m-d'),
						'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
						'create_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
						'progress'      => $progress,
						'review_by'     => $my_id,
						'review_status' => $rvstt,
						'code'          => $code,
						'file_att'      => $data_upload['file_name']

					);


				}

				//pre($data_report);

				if($this->my_report_model->create($data_report)) {
					$this->session->set_flashdata('message','Tạo dữ liệu thành công');

					//$data_task = array('completion'=>$new_completion);
					$this->task_model->update_rule($where=array('id'=>$task), $data_task);

				}
				else {
					$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
				}
				redirect(base_url('my_report/index'));

			}
	    }

	    //pre($list_task_active);

		$this->data_layout['temp'] = 'add_report';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function check_percent_task(){
		$new_completion = $this->input->post('pro');
		$task_id = $this->input->post('task');

		$task_info = $this->task_model->get_info($task_id);
		if($task_info==null) {
			$old_completion = 0;
		}
		if($task_info!=null) {
			$old_completion = $task_info->completion;
		}
		

		if($new_completion >=   $old_completion) {
			return true;
		}
		else {
			return false;
			$this->form_validation->set_message('check_percent_task', 'Phần trăm mới không được nhỏ hơn phần trăm cũ');
		}
	}

	function check_percent_task_only(){
		$task_id = $this->uri->segment(3);
		$new_completion = $this->input->post('pro');


		$task_info = $this->task_model->get_info($task_id);
		$old_completion = $task_info->completion;

		if($new_completion >=   $old_completion) {
			return true;
		}
		else {
			return false;
			$this->form_validation->set_message('check_percent_task', 'Phần trăm mới không được nhỏ hơn phần trăm cũ');
		}
	}

	function check_report(){
		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 3) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {


			$input = array();
		    $input['where']['review_status'] = 0;
		    $input['where']['create_date'] = $today;
			$list_report_nid_check_today = $this->my_report_model->get_list($input);

			$list_room_manager = array();

			$list_report_checked_today = array();

			$input_checked = array();
		    $input_checked['where']['review_status'] = 1;
		    $input_checked['where']['create_date'] = $today;
		    //$list_report_checked_today = $this->my_report_model->get_list($input_checked);

		    $input_checked_all = array();
		    $input_checked_all['where']['review_status'] = 1;
		    $list_report_checked_all = $this->my_report_model->get_list($input_checked_all);

		    $input_unchecked_all = array();
		    $input_unchecked_all['where']['review_status'] = 0;
		    $list_report_un_checked_all = $this->my_report_model->get_list($input_unchecked_all);

		    $count_uncheck_all = count($list_report_un_checked_all);
		    $this->data_layout['count_uncheck_all'] = $count_uncheck_all;

		    $count_uncheck = 0;
		    $count_checked = 0;

		    $count_checked_all = count($list_report_checked_all);
		    $this->data_layout['count_checked_all'] = $count_checked_all;


			if($this->data_layout['account_type'] = 3) {
				$list_room = $this->role_model->get_columns('tb_role',$where = array('user_id'=>$my_id));
				if ($list_room==null) {
					$this->session->set_flashdata('message','Bạn không quản lí phòng ban nào !');
					redirect(base_url('my_report/index'));
				}
				//pre($list_room);

				if ($list_room!=null) {
					foreach ($list_room as $key => $value) {
						$department_id = $value->department_id;
						$department_name = $this->department_model->get_info($department_id,'name');
						$department_name = $department_name->name;
						$list_room_manager[$key]['department_name'] = $department_name;
						$list_room_manager[$key]['department_id'] = $department_id;


						$list_miss = $this->mission_model->get_columns('tb_mission',$where = array('department_id'=>$department_id, 'status'=>'1'));

						//pre($list_miss);

						if($list_miss!=null) {
							for ($i=0;  $i < count($list_miss)  ; $i++)  { 
								$mission_id = $list_miss[$i]->id;
								$uid = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_id));
								//pre($uid);
								$uid = $uid[0]->user_id;

								if($this->role_model->check_exists($where=array('user_id'=>$uid, 'department_id'=>$department_id))==true){
									$mission_for_id = $uid;
									$mission_for_name = $this->home_model->get_column('tb_employee','fullname',$where=array('user_id'=>$mission_for_id));
									$list_miss[$i]->mission_for = $mission_for_name[0]->fullname;
									$list_task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>'0'));
									//pre($list_task);
									
									foreach ($list_task as $x => $z) {
										$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'0', 
												'create_date'=>$today
											));
										$list_report_all = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'0'
											));

										if($list_report!=null) {
											$z->list_report = $list_report;
										}
										
										if($list_report_all!=null) {
											$z->list_report_all = $list_report_all;
											$count_uncheck ++ ;
										}										
									}
									//$list_report = 
									$list_miss[$i]->task = $list_task;
									$v->list_miss[] = $list_miss[$i];
								}
							}
						$list_room_manager[$key]['list_miss'] = $list_miss;
						}

						//pre($list_room_manager);

						//pre($count_uncheck);

						$input_bonus = array();
					    $input_bonus['where']['review_status'] = 0;
					    $input_bonus['where']['task_id'] = 0;

						$list_report_bonus = $this->my_report_model->get_list($input_bonus);
						//pre($list_report_bonus);
						$count_uncheck_bonus =0;
						if($list_report_bonus!=null){

							array_push($list_room_manager, array('department_name'=>'Công việc phát sinh', 'report'=>$list_report_bonus));
						}

						$count_uncheck_bonus = count($list_report_bonus);

						$count_uncheck = $count_uncheck + count($list_report_bonus);

						//pre($list_room_manager);
						//

						$this->data_layout['count_uncheck'] = $count_uncheck;
					}

					//pre($list_room_manager);

					foreach ($list_room as $key => $value) {
						$department_id = $value->department_id;
						$department_name = $this->department_model->get_info($department_id,'name');
						$department_name = $department_name->name;
						$list_report_checked_today[$key]['department_name'] = $department_name;
						$list_report_checked_today[$key]['department_id'] = $department_id;

						$list_miss = $this->mission_model->get_columns('tb_mission',$where = array('department_id'=>$department_id, 'status'=>'1'));

						//pre($list_miss);

						if($list_miss!=null) {
							for ($i=0;  $i < count($list_miss)  ; $i++)  { 
								$mission_id = $list_miss[$i]->id;
								$uid = $this->mission_user_model->get_columns('tb_mission_user',$where=array('mission_id'=>$mission_id));
								//pre($uid);
								$uid = $uid[0]->user_id;

								if($this->role_model->check_exists($where=array('user_id'=>$uid, 'department_id'=>$department_id))==true){
									$mission_for_id = $uid;
									$mission_for_name = $this->home_model->get_column('tb_employee','fullname',$where=array('user_id'=>$mission_for_id));
									$list_miss[$i]->mission_for = $mission_for_name[0]->fullname;
									$list_task = $this->task_model->get_columns('tb_task',$where=array('mission_id'=>$mission_id, 'status'=>'0'));
									//pre($list_task);
									
									foreach ($list_task as $x => $z) {
										$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'1', 
												'create_date'=>$today
											));
										$list_report_all = $this->my_report_model->get_columns('tb_daily_report',$where=array(
												'task_id'=>$z->id, 
												'review_status'=>'1'
											));

										if($list_report!=null) {
											$z->list_report = $list_report;
										}
										if($list_report_all!=null) {
											$z->list_report_all = $list_report_all;

											$count_checked ++;
										}
										
									}
									//$list_report = 
									$list_miss[$i]->task = $list_task;
									$v->list_miss[] = $list_miss[$i];
								}
							}
						$list_report_checked_today[$key]['list_miss'] = $list_miss;
						}

						$input_bonus_checked = array();
					    $input_bonus_checked['where']['review_status'] = 1;
					    $input_bonus_checked['where']['task_id'] = 0;

						$list_report_bonus_checked = $this->my_report_model->get_list($input_bonus_checked);
						//pre($list_report_bonus);
						$count_uncheck_bonus =0;
						if($list_report_bonus_checked!=null){

							array_push($list_report_checked_today, array('department_name'=>'Công việc phát sinh', 'report'=>$list_report_bonus_checked));
						}

						$count_checked_bonus = count($list_report_bonus_checked);

						$count_checked = $count_checked + count($count_checked_bonus);
						
						$this->data_layout['count_checked'] = $count_checked;

					}
				}
			//pre($list_room_manager);
			$this->data_layout['list_room_manager'] = $list_room_manager;
			$this->data_layout['list_report_checked_today'] = $list_report_checked_today;

			//pre($list_report_checked_today);
			}
			
		}

		$this->data_layout['temp'] = 'check_report';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function check(){
		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 3) {
	    	echo $this->data_layout['account_type'];
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {
			$report_id = $this->uri->segment(3);
			$report_id = intval($report_id);

			//lay thong tin report

			$info_report = $this->my_report_model->get_info($report_id);

			if(!$info_report) {
				$this->session->set_flashdata('message','Không tồn tại thông tin report');
				redirect(base_url('my_report/index'));
			}
			else {
				if($my_id==1) {$i = '53';}
				else {$i = $my_id;}
				$data_report = array ('review_status'=>'1','review_by'=>$i);

				if ($this->data_layout['account_type'] == 3){
					//pre($info_report);
					$create_by = $info_report->create_by;
					if ($create_by == $my_id) {
						$this->session->set_flashdata('message','Bạn không check được report của chính mình');
						redirect(base_url('my_report/check_report'));
					}
					else {
						if($this->my_report_model->update($report_id,$data_report)){
							$this->session->set_flashdata('message','Update thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
						else {
							$this->session->set_flashdata('message','Update không thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
					}
				}

				else if($this->data_layout['account_type'] < 3){

					if($this->my_report_model->update($report_id,$data_report)){
						$this->session->set_flashdata('message','Update thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}
					else {
						$this->session->set_flashdata('message','Update không thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}					
				}


			}
		}
	}

	function uncheck(){
		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 3) {
			$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {
			$report_id = $this->uri->segment(3);
			$report_id = intval($report_id);

			//lay thong tin report

			$info_report = $this->my_report_model->get_info($report_id);

			if(!$info_report) {
				$this->session->set_flashdata('message','Không tồn tại thông tin report');
				redirect(base_url('my_report/index'));
			}
			else {
				if($my_id==1) {$i = '53';}
				else {$i = $my_id;}
				$data_report = array ('review_status'=>'0','review_by'=>$i);

				if ($this->data_layout['account_type'] == 3){
					//pre($info_report);
					$create_by = $info_report->create_by;
					if ($create_by == $my_id) {
						$this->session->set_flashdata('message','Bạn không check được report của chính mình');
						redirect(base_url('my_report/check_report'));
					}
					else {
						if($this->my_report_model->update($report_id,$data_report)){
							$this->session->set_flashdata('message','Update thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
						else {
							$this->session->set_flashdata('message','Update không thành công');
							redirect(base_url('my_report/check_report'), 'refresh');
						}
					}
				}

				else if($this->data_layout['account_type'] < 3){
					
					if($this->my_report_model->update($report_id,$data_report)){
						$this->session->set_flashdata('message','Update thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}
					else {
						$this->session->set_flashdata('message','Update không thành công');
						redirect(base_url('view_report/index'), 'refresh');
					}					
				}
			}
		}
	}

	function check_report_leader(){
		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    if ($this->data_layout['account_type'] > 2) {
			//$this->session->set_flashdata('message','Bạn không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}
		else {
			$list_mission_leader = $this->mission_model->get_columns('tb_mission', $where=array('level'=>3,'status'=>1));
			foreach ($list_mission_leader as $key => $value) {
				if($value->end_date >= $today) {
					$list_mission_leader_today[] = $value;
				}
			}

			//pre($list_mission_leader_today);

			foreach ($list_mission_leader_today as $key => $value) {
				$list_task = $this->task_model->get_columns('tb_task', $where = array('mission_id'=>$value->id,'status'=>0));
				$department_id = $value->department_id;
				$department_name = $this->department_model->get_info($department_id,'name');
				$department_name = $department_name->name;
				$value->department_name = $department_name;

				$project_id = $value->project_id;
				$project_name = $this->project_model->get_info($project_id,'project_name');
				if($project_name){
					$project_name = $project_name->project_name;
					$value->project_name = $project_name;

					foreach ($list_task as $k => $v) {
						if($v->end_date >= $today){
							$list_task_today[] = $v;
							$value->list_task_today[] = $v;
						}
					}
				}


				//$list_mission_leader_today[$key]->list_task_today = $list_task_today;

			}

			foreach ($list_mission_leader_today as $key => $value) {
				if(array_key_exists('list_task_today',$value)){

					foreach ($value->list_task_today as $k => $v) {
						$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$v->id, 'review_status'=>0));
						//pre($list_report);
						foreach ($list_report as $m => $n) {
							if($n->create_date == $today){
								$list_report_today[] = $n;
								$v->list_report_today[] = $n;
							}
						}
						//$value->list_task_today[$k]->list_report_today = $list_report_today;						
					}
					
				}

				
			}

			//pre($list_mission_leader_today);

			// list report uncheck
			$list_mission_leader_checked = $this->mission_model->get_columns('tb_mission', $where=array('level'=>3,'status'=>1));
			//pre($list_mission_leader_uncheck);
			foreach ($list_mission_leader_checked as $key => $value) {
				if($value->end_date >= $today) {
					$list_mission_leader_checked_today[] = $value;
				}
			}

			//pre($list_mission_leader_uncheck_today);

			foreach ($list_mission_leader_checked_today as $key => $value) {
				$list_task = $this->task_model->get_columns('tb_task', $where = array('mission_id'=>$value->id,'status'=>0));
				$department_id = $value->department_id;
				$department_name = $this->department_model->get_info($department_id,'name');
				$department_name = $department_name->name;
				$value->department_name = $department_name;

				$project_id = $value->project_id;
				$project_name = $this->project_model->get_info($project_id,'project_name');
				if($project_name) {
					$project_name = $project_name->project_name;
					$value->project_name = $project_name;

					foreach ($list_task as $k => $v) {
						if($v->end_date >= $today){
							$list_task_checked_today[] = $v;
							$value->list_task_checked_today[] = $v;
						}
					}					
				}


				//$list_mission_leader_today[$key]->list_task_today = $list_task_today;

			}
			//pre($list_mission_leader_uncheck_today);

			foreach ($list_mission_leader_checked_today as $key => $value) {
				if(array_key_exists('list_task_checked_today',$value)){

					foreach ($value->list_task_checked_today as $k => $v) {
						$list_report = $this->my_report_model->get_columns('tb_daily_report',$where=array('task_id'=>$v->id, 'review_status'=>'1'));
						//pre($list_report);
						foreach ($list_report as $m => $n) {
							if($n->create_date == $today){
								$list_report_checked_today[] = $n;
								$v->list_report_checked_today[] = $n;
							}
						}
						//$value->list_task_today[$k]->list_report_today = $list_report_today;						
					}
					
				}

				
			}

			//pre($list_mission_leader_checked_today);
			$this->data_layout['list_mission_leader_today'] = $list_mission_leader_today;
			$this->data_layout['list_mission_leader_checked_today'] = $list_mission_leader_checked_today;
		}
		$this->data_layout['temp'] = 'check_report_leader';
	    $this->load->view('layout/main', $this->data_layout);
	}

	function edit() {


		$report_id = $this->uri->segment(3);

		$report_info = $this->my_report_model->get_info($report_id);

		$this->data_layout['report_info'] = $report_info;

		$today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

		if(!$report_info) {
			$this->session->set_flashdata('message','Không tồn tại thông tin');
			redirect(base_url('my_report/index'));	
		}

		else {
			//pre($my_id);
			$my_id = $this->data_layout['id'];
	    	$this->data_layout['my_id'] = $my_id;

			if ($report_info->create_by!= $my_id){
				$this->session->set_flashdata('message','Không phải report của bạn');
				redirect(base_url('my_report/index'));	
			}
			else {
				if ($report_info->review_status== 1 && $this->data_layout['account_type'] == 4){
					$this->session->set_flashdata('message','Không thể sửa vì đã được duyệt !');
					redirect(base_url('my_report/index'));	
				}
				else{

					$old_note = $report_info->note;

					$input_task = array();
				    $input_task['where']['create_by'] = $my_id;
				    $input_task['where']['status'] = 0;

				    $list_task_active  = $this->task_model->get_list($input_task);

					//pre($list_task_active);

				    foreach ($list_task_active as $key => $value) {
				    	if($value->end_date < $today) {
				    		unset($list_task_active[$key]);
				    	}
				    }

				    foreach ($list_task_active as $key => $value) {
				    	$mission_id = $value->mission_id;
				    	$mission = $this->mission_model->get_info($mission_id);
				    	if($mission){
				    		if($mission->end_date < $today) {
				    			unset($list_task_active[$key]);
				    		}
				    	}
				    }

				    //pre($list_task_active);

				    //$list_task_active = array_unique($list_task_active);

				    //pre($list_task_active);

				    $this->data_layout['list_task_active'] = $list_task_active;


				    if($this->input->post()){
						$this->form_validation->set_rules('description', 'description', 'trim');
						$this->form_validation->set_rules('message', 'Mô tả', 'trim');
						$this->form_validation->set_rules('progress', 'Tình Trạng');

						$this->form_validation->set_rules('time_spend', 'Thời gian làm');

						if($this->form_validation->run()){
							$description = $this->input->post('description');
							$message = $this->input->post('message');
							$progress = $this->input->post('progress');
							$time_spend = $this->input->post('time_spend');
							$task = $this->input->post('task');

							if($message == null) {
								$message = $old_note;
							}

							$data_report = array(
								'description'   => $description,
								'note'          => $message,
								'status'        => '1',
								'time_spend'    => $time_spend,
								'task_id'       => $task,
								'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
								'progress'      => $progress,
								'review_by'     => $my_id

							);

							if($this->my_report_model->update($report_id, $data_report)) {
								$this->session->set_flashdata('message','Sửa dữ liệu thành công');

							}
							else {
								$this->session->set_flashdata('message','Sửa dữ liệu không thành công');
							}
							redirect(base_url('my_report/index'));

						}
				    }
				}

			}
		}

		$this->data_layout['temp'] = 'edit_report';
	    $this->load->view('layout/main', $this->data_layout);

	}

	function add_report_now(){

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;

	    $my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $today = date("Y-m-d"); 
	    $this->data_layout['today'] = $today;

	    //echo $today; 
	    $input = array();
	    $input['where']['create_by'] = $my_id;
	    $input['where']['create_date'] = $today;

	    $list_report_today = $this->my_report_model->get_list($input);
	    //pre($list_report_today);

	    $this->data_layout['list_report_today'] = $list_report_today;
	    //id task can report

	    $task_id = $this->uri->segment(3);

	    $task_info = $this->task_model->get_info($task_id);
	    $this->data_layout['task_info'] = $task_info;

	    if(!$task_info){
	    	$this->session->set_flashdata('message','Không tồn tại thông tin task');
	    	redirect(base_url('my_report/index'));
	    }

	    else {
	    	if($task_info->end_date < $today) {
	    		$this->session->set_flashdata('message','Công việc này đã quá hạn');
	    		redirect(base_url('my_report/index'));
	    	}

	    	else {
	 			if($this->input->post()){
					$this->form_validation->set_rules('description', 'description', 'trim');
					$this->form_validation->set_rules('message', 'Mô tả', 'trim');
					$this->form_validation->set_rules('progress', 'Tình Trạng');

					$this->form_validation->set_rules('time_spend', 'Thời gian làm');
					$this->form_validation->set_rules('pro', 'Phần trăm tiến độ', 'numeric|callback_check_percent_task_only',array('numeric' => '%s Phải là số','check_percent_task_only'=>'Phần trăm mới không được nhỏ hơn phần trăm cũ'));

					$this->form_validation->set_rules('userfile', 'File Đính Kèm');

					if($this->form_validation->run()){
						$description = $this->input->post('description');
						$message = $this->input->post('message');
						$progress = $this->input->post('progress');
						$time_spend = $this->input->post('time_spend');

						$new_completion = $this->input->post('pro');

						$this->load->library('upload_library');

						$upload_path = './public/upload/report';


						if($new_completion < 0 ){
							$new_completion =0;
						}

						if($new_completion > 100 ) {
							$new_completion = 100;
						}



						$mission_id = $this->task_model->get_info($task_id,'mission_id');

						//pre($mission_id);

						$mission_id = $mission_id->mission_id;

						$project_id = $this->mission_model->get_info($mission_id,'project_id');

						$project_id = $project_id->project_id;

						$code = $project_id. $mission_id .rand(0,9999). md5($task_id.generateRandomString(8));
						$code = strtolower($code);

						$account_type = $this->data_layout['account_type'] ;

						if($this->data_layout['account_type'] == 3 ) {
							$rvstt = 1;
						}

						else if ($this->data_layout['account_type'] == 4) {
							$rvstt = 0;
						}

						$data_task = array('completion'=>$new_completion);

						$file_att = null;

						if (empty($_FILES['userfile']['name'])) { 
							$file_att = null;
						}

						else {
							$data_upload = $this->upload_library->upload($upload_path, 'userfile');
							$file_att = $data_upload['file_name'];

						}

						//pre($_FILES['userfile']);

						$data_report = array(
							'description'   => $description,
							'note'          => $message,
							'status'        => '1',
							'time_spend'    => $time_spend,
							'task_id'       => $task_id,
							'create_by'     => $my_id,
							'create_date'   => date_create('now')->format('Y-m-d'),
							'update_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
							'create_time'   => date_create('now' ,new \DateTimeZone( 'Asia/Ho_Chi_Minh' ))->format('Y-m-d H:i:s'),
							'progress'      => $progress,
							'review_by'     => $my_id,
							'review_status' => $rvstt,
							'code'          => $code,
							'file_att'      => $file_att

						);

						//pre($data_report);

						if($this->my_report_model->create($data_report)) {
							$this->session->set_flashdata('message','Tạo dữ liệu thành công');

												//$data_task = array('completion'=>$new_completion);
							$this->task_model->update_rule($where=array('id'=>$task_id), $data_task);

						}
						else {
							$this->session->set_flashdata('message','Tạo dữ liệu không thành công');
						}
						redirect(base_url('my_report/index'));

					}
			    }

	    	}
	    }


	    //pre($list_task_active);

		$this->data_layout['temp'] = 'add_report_now';
	    $this->load->view('layout/main', $this->data_layout);		
	}

	function my_room_report(){

		$my_id = $this->data_layout['id'];
		$my_account_level = $this->data_layout['account_type'];

		$list_my_room = $this->CI->get_my_room_id();

		//pre($list_my_room);

		if(in_array('10', $list_my_room)==false) {
			$this->session->set_flashdata('message','Không đủ quyền hạn');
			redirect(base_url('my_report/index'));
		}

		else  {

			$input_id = array();
			$input_id['where']['department_id'] = 10;

			$list_id = $this->role_model->get_list($input_id);
			$ids = array();

			foreach ($list_id as $key => $value) {
				$ids[] = $value->user_id;
			}

			//pre($ids);

			$all_report_by_room = null;

			foreach ($ids as $key => $value) {
				$input_my_report = array();
				$input_my_report['where'] = array('create_by'=>$value);
			 	$input_my_report['order'] = array('id','ASC');
			 	$all_report_by_me = $this->my_report_model->get_list($input_my_report); 

			 	//pre($all_report_by_me);
			 	$task_name = $mission_name = $project_name = 'chưa rõ'; $department_name='chưa rõ';

			 	foreach ($all_report_by_me as $key => $value) {
			 		$task_id = $value->task_id;
			 		$task_id = intval($task_id);
			 		if($task_id == 0){
				 		$value->task_name = 'Công việc phát sinh';
				 		$value->mission_name = 'Công việc phát sinh';
				 		$value->project_name = 'Công việc phát sinh';
				 		$value->department_name = 'Tất cả phòng ban'; 
			 		}
			 		else {
				 		$task_info = $this->task_model->get_info($task_id);
				 		if($task_info) {
				 			$task_name = $task_info->name;
				 			$mission_id = $task_info->mission_id;
				 			$mission_id = intval($mission_id);
							$mission_info = $this->mission_model->get_info($mission_id);
							if($mission_info) {
								$mission_name = $mission_info->name;
						 		$project_id = $mission_info->project_id;
						 		$project_id = intval($project_id);
						 		$department_id = $mission_info->department_id;
						 		$department_id = intval($department_id);
						 		$department_info = $this->department_model->get_info($department_id);
						 		$department_name = $department_info->name;
						 		$project_info = $this->project_model->get_info($project_id);
						 		if($project_info){
						 			$project_name = $project_info->project_name;
						 		}
						 							
							}
					 		
				 		}

					 	$value->task_name = $task_name;
				 		$value->mission_name = $mission_name;
				 		$value->project_name = $project_name;
				 		$value->department_name = $department_name; 	 			
			 		}

			 		

			 	}

			 	$all_report_by_room[] = $all_report_by_me;
			}

			//pre($all_report_by_room);
			$this->data_layout['all_report_by_room'] = $all_report_by_room;

		 	

		 	//pre($all_report_by_me);
		 	$this->data_layout['all_report_by_me'] = $all_report_by_me;
			}


		$this->data_layout['temp'] = 'my_room_report';
	    $this->load->view('layout/main', $this->data_layout);	
	}


	public function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png','userfile/pdf', 'userfile/docs', 'userfile/doc', 'userfile/zip', 'userfile/rar');
        $mime = get_mime_by_extension($_FILES['userfile']['name']);
        if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){

        	if($_FILES['userfile']['size'] > 500000 || $_FILES['userfile']['size'] == 0){
                $this->form_validation->set_message('file_check', '<strong style="color:red">File quá lớn </strong>');
                return false;        		
        	}

            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', '<strong style="color:red">Xin chọn đúng định dạng gif/jpg/png/doc/docs/zip/rar.</strong>');
                return false;
            }
        }
    }
}
