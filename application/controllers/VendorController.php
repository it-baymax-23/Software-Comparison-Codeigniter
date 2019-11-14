<?php 
	
	class VendorController extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/product');
			$this->load->model('Admin/category');
			$this->load->model('auth');
			$this->load->model('Admin/menu');
		}

		public function upload()
		{
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}

			$this->load->view('Frontend/header',array('page'=>'upload','menu'=>$menu));
			$this->load->view('Frontend/vendors/vendors',array('page'=>'upload'));
			$this->load->view('Frontend/vendors/upload',array('category'=>$this->category->getallcategory()));
			$this->load->view('Frontend/footer',array('page'=>'upload'));
		}

		public function do_upload()
		{
			$config['upload_path']          = './uploads/product';

			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path'],0777,TRUE);	
			}

            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 2000;
            $config['max_height']           = 1000;

            $filename = array();	

            $this->load->library('upload',$config);
            foreach($_FILES['file']['name'] as $key => $file)
            {
            	$config['file_name'] 			= time().$file;	
            	$_FILES['images[]']['name']= $_FILES['file']['name'][$key];
	            $_FILES['images[]']['type']= $_FILES['file']['type'][$key];
	            $_FILES['images[]']['tmp_name']= $_FILES['file']['tmp_name'][$key];
	            $_FILES['images[]']['error']= $_FILES['file']['error'][$key];
	            $_FILES['images[]']['size']= $_FILES['file']['size'][$key];
            	$this->upload->initialize($config);

            	if($this->upload->do_upload('images[]'))
            	{
            		array_push($filename,$config['upload_path'] . '/' . $this->upload->data()['file_name']);
            	}
            }
            echo json_encode($filename);
		}

		public function addproduct()
		{
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('frontenduser')['id'];


			$result = $this->product->saveproduct($data);
			echo json_encode($result);
		}

		public function account()
		{
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			$this->load->view('Frontend/header',array('page'=>'account','menu'=>$menu));
			$this->load->view('Frontend/vendors/vendors',array('page'=>'account'));
			$this->load->view('Frontend/vendors/account',array('user'=>$this->auth->getuserbyid($this->session->userdata('frontenduser')['id'])));
			$this->load->view('Frontend/footer',array('page'=>'account'));	
		}
	}
?>