<?php 
Class Upload_library {
	var $CI = '';

	function __construct() {
		$this->CI = & get_instance();
		$this->CI->load->library('upload');
	}

	function upload($upload_path ='', $file_name =''){
		$config = $this->config($upload_path , $file_name);

		$newFileName = time().$_FILES[$file_name]['name'].rand(0,10000);
		//pre($_FILES[$file_name]['size']);
        $config['file_name'] = md5($newFileName);

		$this->CI->upload->initialize($config);
		$this->CI->load->library('upload', $config);
		

		//pre($config);

		if($this->CI->upload->do_upload($file_name)) {
			$data_upload = $this->CI->upload->data();
		}
		else {
			$data_upload = $this->CI->upload->display_errors();
			//echo 'haha';
		}

		return $data_upload;
	}

	function config($upload_path =''){

		//Khai bao bien cau hinh
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif';
         //Dung lượng tối đa
         $config['max_size']      = '3000';
         //Chiều rộng tối đa
         $config['max_width']     = '2028';
         //Chiều cao tối đa
         $config['max_height']    = '2028';



         return $config;
		
	}
}
?>