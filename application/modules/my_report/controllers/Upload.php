<?php
Class Upload extends MY_Controller {
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
		$this->load->model('my_mission_model');


	}
	
	function index() {


		$this->data_layout['temp'] = 'index';
	    $this->load->view('layout/main', $this->data_layout);
	}

	public function upload_file()
		{
		  $status = "";
		  $msg = "";
		  $file_element_name = 'userfile';

		 if ($status != "error")
		{
		  $config['upload_path'] = './public/public/upload/report';
		  $config['allowed_types'] = 'gif|jpg|png|doc|txt';
		  $config['max_size'] = 1024 * 8;
		  $config['encrypt_name'] = FALSE;

		  $this->load->library('upload', $config);
		  if (!$this->upload->do_upload($file_element_name))
		  {
		    $status = 'error';
		    $msg = $this->upload->display_errors('', '');
		  }
		  else
		   {
		   $data = $this->upload->data();
		   $image_path = $data['full_path'];
		   if(file_exists($image_path))
		   {
		      $status = "success";
		      $msg = "File successfully uploaded";
		 }
		 else
		 {
		  $status = "error";
		  $msg = "Something went wrong when saving the file, please try again.";
		 }
		}
		 @unlink($_FILES[$file_element_name]);
		 }
		 echo json_encode(array('status' => $status, 'msg' => $msg));
		}
}