<?php
Class Upload extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login/login_model','',TRUE);
		$this->load->model('home_model');
		$this->load->model('home/acc_model');
		$this->load->model('home/role_model');
		$this->load->model('home/organization_model');
		$this->load->library('upload');

	}


	
	function index() {

if($this->input->post('submit'))
      {
         //Khai bao bien cau hinh
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = './public/upload/avatar';
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif';
         //Dung lượng tối đa
         $config['max_size']      = '500';
         //Chiều rộng tối đa
         $config['max_width']     = '1028';
         //Chiều cao tối đa
         $config['max_height']    = '1028';
         //load thư viện upload
         $this->load->library('upload', $config);
         //pre($config);

         $this->upload->initialize($config);
         //thuc hien upload
         if($this->upload->do_upload('image'))
         {
             //chua mang thong tin upload thanh con
             $data = $this->upload->data();
             //in cau truc du lieu cua file da upload
             pre($data);
         }
         else
         {
            //hien thi lỗi nếu có
            $error = $this->upload->display_errors();
            echo $error;
         }
 
      }

		$this->data_layout['temp'] = 'upload';
	    $this->load->view('layout/main', $this->data_layout);
	}
}
