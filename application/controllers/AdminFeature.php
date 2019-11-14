<?php 
	class AdminFeature extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/feature');
		}

		function index()
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'feature','selected'=>'feature');
			role_manage($data['parent'],$data['selected']);
			$data_feature = array('feature'=>$this->feature->allfeature());
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Feature/index',$data_feature);
			$this->load->view('Admin/footer',$data);
		}
		function newfeature($id = null){
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'feature','selected'=>'newfeature');
			role_manage($data['parent'],$data['selected']);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Feature/new');
			$this->load->view('Admin/footer',$data);	
		}

		function addfeature()
		{
			$data = $this->input->post();
			$return_result = $this->feature->addfeature($data);
			echo json_encode($return_result);
		}

		function delete()
		{
			$data = $this->input->post('id');
			$return_result = $this->feature->delete($data);

			echo json_encode($return_result);
		}
	}
?>