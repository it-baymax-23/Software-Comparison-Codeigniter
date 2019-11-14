<?php 
	class MenuController extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/menu');
		}

		public function index()
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}

			$parent = array('parent'=>'menu','selected'=>'menu');
			
			$this->load->view('Admin/header',$parent);
			$this->load->view('Admin/sidebar',$parent);
			$this->load->view('Admin/MenuSetting/menu');
			$this->load->view('Admin/footer',$parent);
		}

		public function addmenu()
		{
			$menudata = $this->input->post('data');
			$usertype = $this->input->post('usertype');
			$this->menu->savemenu($menudata,$usertype);
			echo json_encode(array('success'=>true));
		}

		public function getmenu()
		{
			$usertype = $this->input->get('usertype');
			echo json_encode($this->menu->getmenu($usertype));
		}

		public function setting()
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}

			$parent = array('parent'=>'menu','selected'=>'menu');
			
			$this->load->view('Admin/header',$parent);
			$this->load->view('Admin/sidebar',$parent);
			$this->load->view('Admin/MenuSetting/setting');
			$this->load->view('Admin/footer',$parent);	
		}

		public function do_upload()
		{
			$config['upload_path']          = './uploads/setting';

			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path'],0777,TRUE);
			}

            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name'] 			= time().$_FILES['logo']['name'];
            $this->load->library('upload', $config);
            if($this->upload->do_upload('logo'))
            {
            	$this->menu->savelogo($config['upload_path'] . '/'.$this->upload->data()['file_name']);
            	echo json_encode(array('success'=>true));
            }
		}
		public function savesetting()
		{
			
		}
	}
?>