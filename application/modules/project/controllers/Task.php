<?php
Class Task extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home/home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/department_model');
		$this->load->model('project_model');
		$this->load->model('project_user_model');
		$this->load->model('mission_model');
		$this->load->model('task_model');
		$this->load->model('mission_user_model');
		$this->load->model('proportion_department_model');

		global $account_type;
		
		$holidays = array();

		$this->data_layout['holidays'] = $holidays;



	}
	
	function edit_task() {

		$my_id = $this->data_layout['id'];

		$account_type = $this->data_layout['account_type'];

		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;
		
	    $project_id =  $this->uri->segment(3);
	    $mission_id =  $this->uri->segment(4);

		//lay id du an can sua
		$task_id = $this->uri->segment(5);
		$task_id = intval($task_id);
		$this->data_layout['task_id'] = $task_id;

		if($this->data_layout['account_type']!=3){
			$this->session->set_flashdata('message','Không đủ quyền hạn');
			redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));	
		}

		else {
			$info_task = $this->task_model->get_info($info_task);
			$this->data_layout['info_task'] = $info_task;

			if(!$info_task){
				$this->session->set_flashdata('message','Không tồn tại');
				redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));					
			}
			else {
				if($info_task->create_by!=$my_id){
					$this->session->set_flashdata('message','Không đủ quyền hạn');
					redirect(base_url('project/mission/view_detail/'.$project_id.'/'.$mission_id));							
				}
				else {

					$info_project = $this->project_model->get_info($project_id);
					$this->data_layout['info_project'] = $info_project;

					$info_mission = $this->mission_model->get_info($mission_id);
					$this->data_layout['info_mission'] = $info_mission;

				}
			}
		}

		$this->data_layout['temp'] = 'edit_task';
	    $this->load->view('layout/main', $this->data_layout);
	}
		
}