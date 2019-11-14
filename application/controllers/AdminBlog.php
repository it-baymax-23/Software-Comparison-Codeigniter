<?php 
	
	class AdminBlog extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/category');
			$this->load->model('Admin/blog');
		}

		public function index()
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}


			$data = array('parent'=>'blog','selected'=>'blog');
			role_manage($data['parent'],$data['selected']);
			$data_blog = $this->blog->getblogs();
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Blog/index',array('blog'=>$data_blog,'maincategory'=>$this->category->getmaincategory()));
			$this->load->view('Admin/footer',$data);

		}

		public function newblog($id = null)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}


			$data = array('parent'=>'blog','selected'=>'blog');
			role_manage($data['parent'],$data['selected']);
			$newdata = array('maincategory'=>$this->category->getmaincategory());	

			if($id)
			{
				$newdata['id'] = $id;
				$newdata['maininfo'] = $this->blog->getblogs(array('id'=>$id));
				$newdata['section'] = $this->blog->getsection($id);
			}

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Blog/new',$newdata);
			$this->load->view('Admin/footer',$data);
		}

		public function updateblog()
		{
			$data = $this->input->post();
		}

		public function addblog()
		{
			$data = $this->input->post();
			$result = $this->blog->addblog($data);
			echo json_encode($result);
		}

		public function delete()
		{
			$id = $this->input->post('id');
			$result = $this->blog->deleteblog($id);
			echo json_encode($result);
		}

		function do_upload()
		{
			$config['upload_path']          = './uploads/blog';

			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path'],0777,TRUE);
			}

            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name'] 			= time().$_FILES['logo']['name'];
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('logo'))
            {
            	echo json_encode(array('success'=>false,'message'=>$this->upload->display_errors())); 
            }
            else
            {
                $result = array('success'=>true,'filename'=>$config['upload_path'].'/' . $this->upload->data()['file_name']);

               echo json_encode($result);
            }
		}

		function getbycategory()
		{
			$id = $this->input->post('id');
			if(!isset($id) || !$id)
			{
				echo json_encode($this->blog->getblogs());
			}
			else
			{
				echo json_encode($this->blog->getblogs(array('category'=>$id)));
			}
		}
	}
?>