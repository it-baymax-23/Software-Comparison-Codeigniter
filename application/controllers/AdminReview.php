<?php 
	class AdminReview extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/product');
			$this->load->model('Admin/review');
			$this->load->model('auth');
		}

		function index()
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			
			$data = array('parent'=>'review','selected'=>'review');
			role_manage($data['parent'],$data['selected']);
			
			$review = array('review'=>$this->review->getallreviews());
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Review/index',$review);
			$this->load->view('Admin/footer',$data);
		}

		function getreviewby($user)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'review','selected'=>'getbyuser');
			
			$review = array('review'=>$this->review->getreviewby($user));
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Review/index',$review);
			$this->load->view('Admin/footer',$data);	
		}

		function newreview($id)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}

			$user = $this->auth->get_user_by_role(array('buyer'));

			$data = array('parent'=>'review','selected'=>'review');
			role_manage($data['parent'],$data['selected']);
			$product = array('product'=>$this->product->getproductbyid($id),'resources' => $this->review->getsources(),'users'=>$user);
			
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Review/newreview',$product);
			$this->load->view('Admin/footer',$data);
		}

		function addreview()
		{
			$data = $this->input->post('data');
			$id = $this->input->post('id');
			$userid = $this->session->userdata('user');
			$result = $this->review->addreview($data,$id,$userid,1);
			echo json_encode($result);
		}

		function delete()
		{
			$id = $this->input->post('id');
			$result = $this->review->deletereview($id);
			echo json_encode($result);
		}

		function activate()
		{
			$id = $this->input->post('id');
			$activate = $this->input->post('activate');
			$result = $this->review->activate($id,$activate);
			echo json_encode($result);
		}

		function editreview($id)
		{	
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'review','selected'=>'edit');
			role_manage($data['parent'],$data['selected']);
			$review = array('review'=>$this->review->getreview($id),'resources' => $this->review->getsources());
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Review/editreview',$review);
			$this->load->view('Admin/footer',$data);	
		}

		function updatereview()
		{
			$data = $this->input->post('data');
			$id = $this->input->post('id');
			$userid = $this->session->userdata('user');
			$result = $this->review->updatereview($data,$id);
			echo json_encode($result);	
		}

		function getreview($productid)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'review','selected'=>'getreviewproduct');
			role_manage($data['parent'],$data['selected']);
			$reviews = $this->review->getreviews($productid);
			$review = array('review'=>$reviews,'products'=>$this->product->getproductbyid($productid));

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Review/getreview',$review);
			$this->load->view('Admin/footer',$data);		
		}

		function getsource(){
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'review','selected'=>'getsource');
			role_manage($data['parent'],$data['selected']);
			$sources = $this->review->getsources();

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Review/getsource',array('source'=>$sources));
			$this->load->view('Admin/footer',$data);
		}

		function resourceactive()
		{
			$data = $this->input->post();
			$this->review->resourceactive($data);
			echo json_encode(array('success'=>true));
		}
		function addsource()
		{
			$data = $this->input->post();
			$data['status'] = 1;
			$result = $this->review->addsource($data);
			echo json_encode($result);
		}

		function deletesource()
		{
			$id = $this->input->post('id');
			$this->review->deletesource($id);
			echo json_encode(array('success'=>true));
		}
	}

?>