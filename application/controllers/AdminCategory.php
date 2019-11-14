<?php

	class AdminCategory extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/feature');
			$this->load->model('Admin/category');
		}

		function index(){
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'category','selected'=>'category');
			role_manage($data['parent'],$data['selected']);
			$data_category = array('category'=>$this->category->getallcategory());
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Category/index',$data_category);
			$this->load->view('Admin/footer',$data);
		}

		function newcategory($id = null){
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'category','selected'=>'newcategory');
			role_manage($data['parent'],$data['selected']);
			$data_category = array('maincategory'=>$this->category->getmaincategory());

			$all_category = $this->category->getcategories();


			$related_category = array();
			if($id)
			{
				$data_category['category'] = $this->category->getcategorybyid($id);

				if($data_category['category']['related_category'])	
				{
					$related_category = unserialize($data_category['category']['related_category']);
				}

				$data_category['id'] = $id;
			}

			foreach($all_category as $key => $all_categorys)
			{
				foreach($all_categorys['sub'] as $key_field => $key_value)
				{
					if(in_array($key_value['id'],$related_category))
					{
						$all_categorys['sub'][$key_field]['selected'] = true;
					}
				}
			}

			
			$data_category['all'] = $all_category;

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Category/new.php',$data_category);
			$this->load->view('Admin/footer',$data);	
		}

		function maincategory()
		{
			$data = $this->input->post();
			$data['category_type'] = 'main';
			$return_result = $this->category->add($data);
			echo json_encode($return_result);
		}
		function addpopular()
		{
			$data = $this->input->post();
			$result = $this->category->addpopular($data);
			echo json_encode($result);
		}

		function add()
		{
			$data = $this->input->post();
			$data['category_type'] = 'sub';
			if(isset($data['id']))
			{
				$return_result = $this->category->update($data);
				echo json_encode($return_result);	
			}
			else
			{
				$return_result = $this->category->add($data);
				echo json_encode($return_result);
			}
			
		}

		function delete(){
			$id = $this->input->post('id');
			$return_result = $this->category->delete($id);
			echo json_encode($return_result);
		}

		function do_upload()
		{
			$config['upload_path']          = './uploads/category';

			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path'],0777,TRUE);
			}

            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name'] 			= time().$_FILES['category_icon']['name'];

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('category_icon'))
            {
            	echo json_encode(array('success'=>false,'message'=>$this->upload->display_errors())); 
            }
            else
            {
            	echo json_encode(array('success'=>true,'file'=>$config['upload_path'].'/' . $this->upload->data()['file_name']));
            }
		}
	}
?>