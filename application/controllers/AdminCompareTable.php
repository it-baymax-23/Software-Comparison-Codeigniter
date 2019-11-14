<?php 
	
	class AdminCompareTable extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/product');
			$this->load->model('Admin/feature');
			$this->load->model('Admin/compare');
		}

		public function index()
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}

			$data = array('parent'=>'comparetable','selected'=>'comparetable');
			role_manage($data['parent'],$data['selected']);			
			
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/comparetable/index',array('compare'=>$this->compare->getcompare()));
			$this->load->view('Admin/footer',$data);
		}

		public function newtable($id = null)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}

			$data = array('parent'=>'comparetable','selected'=>'comparetable');

			$data_compare = array('product'=>$this->product->getallproduct(),'feature'=>$this->feature->allfeature());
			role_manage($data['parent'],$data['selected']);
			if($id)
			{
				$data_compare['compare'] = $this->compare->getcompare(array('id'=>$id))[0];
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/comparetable/new',$data_compare);
			$this->load->view('Admin/footer',$data);
		}

		public function savecompare()
		{
			$data = $this->input->post();
			if(isset($data['id']))
			{
				echo json_encode($this->compare->updatecompare($data));
			}
			else
			{
				echo json_encode($this->compare->savecompare($data));	
			}
		}

		public function checkcompare()
		{
			$data = $this->input->post();
			if(isset($data['id']))
			{
				echo json_encode(array('success'=>true));
			}
			else
			{
				echo json_encode($this->compare->checkcompare($data));	
			}
			
		}

		public function activate()
		{
			$data = $this->input->post();
			if($data['activated'] == 'true')
			{
				$data['activated'] = 1;
			}
			else
			{
				$data['activated'] = 0;
			}
			echo json_encode($this->compare->activate($data));
		}

		public function delete()
		{
			$id = $this->input->post('id');
		 	echo json_encode($this->compare->delete($id));
		}
	}
?>