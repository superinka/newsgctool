<?php
Class Project_report extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/department_model');
		$this->load->model('request/request_model');

		//$a = get_list_notification();

	}

    function index(){
		//$this->load->view('home/index');
		$id = $this->data_layout['id'];




		$message = $this->session->flashdata('message');
	    $this->data_layout['message'] = $message;
		

		$input = array();
		$where = array('user_id' => $id);

		$input['where']['created_by'] = $id;
		$total = $this->project_model->get_total();


		$list_project = $this->project_model->get_list();
		$numberproject = count($list_project);

		

		//pre($list_project);

		foreach ($list_project as $key => $value) {
			# code...
			$project_id = $value->id;
			//echo $project_id;
			$list_emp = $this->project_user_model->get_columns('tb_project_user',$where=array('project_id'=>$project_id));

			//pre($list_emp);

			if ($list_emp!=null) {
					foreach ($list_emp as $k => $v) {

					$emp_name = $this->home_model->get_column('tb_employee', 'fullname',$where=array('user_id'=>$v->user_id));
					//pre($emp_name);
					//pre($room_name[0]->name);
					$v->emp_name = $emp_name[0]->fullname;
					//$this->data_layout['room_name'] = $room_name;
					//pre($room_name);
					}

			}

			$value->emp = $list_emp;

		//pre($list_project);

		}

        $this->data_layout['list_project'] = $list_project;

        $this->data_layout['temp'] = 'project_report';
	    $this->load->view('layout/main', $this->data_layout);
    }

}