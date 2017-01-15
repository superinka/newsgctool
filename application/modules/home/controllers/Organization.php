<?php
Class Organization extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/organization_model');


	}


	
	function index() {

		$input = array();
		$input['where']['parent_id'] = 1; 
		$input['order'] = array('id','ASC');

		$list_center = $this->organization_model->get_list($input);
		$this->data_layout['list_center'] = $list_center;

		foreach ($list_center as $key => $value) {
			$input_child = array();
			$input_child['where']['parent_id'] = $value->id; 
			$input_child['order'] = array('id','ASC');
			$list_child = $this->organization_model->get_list($input_child);
			$value->list_child = $list_child;
		}

		$my_id = $this->data_layout['id'];
	    $this->data_layout['my_id'] = $my_id;

	    $list_room_id = array();
	    if($this->data_layout['account_type'] > 1) {
			$input_room = array();
			$input_room['where']['user_id'] = $my_id; 
			$list_room_by_me = $this->role_model->get_list($input_room);

			foreach ($list_room_by_me as $key => $value) {
				$list_room_id[] = $value->department_id;
			}    	
	    }

		$this->data_layout['list_room_id'] = $list_room_id;




		//pre($list_center);
		//pre($list_room_id);


		$this->data_layout['temp'] = 'organization';
	    $this->load->view('layout/main', $this->data_layout);
	}
}
