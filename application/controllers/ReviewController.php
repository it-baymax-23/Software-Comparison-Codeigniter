<?php 
	class ReviewController extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/review');
			$this->load->model('Admin/product');
			$this->load->model('Admin/review');
			$this->load->model('Admin/menu');
		}

		public function index()
		{
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}

			if(!$this->session->userdata('frontenduser'))
			{
				redirect('/signin');
			}
			session_manager();
			$this->load->view('Frontend/header',array('menu'=>$menu));
			$this->load->view('Frontend/reviews/reviews');
			$this->load->view('Frontend/footer');
		}

		public function search()
		{
			session_manager();
			if(!$this->session->userdata('frontenduser'))
			{
				redirect('/signin');
			}
			$search = $this->input->get('search');
			$product = $this->product->search($search);	

			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}

			$this->load->view('Frontend/header',array('menu'=>$menu));
			$this->load->view('Frontend/reviews/reviews');
			$this->load->view('Frontend/reviews/search',array('product'=>$product));
			$this->load->view('Frontend/footer',array('page'=>'reviewsearch'));
		}

		public function newreview($id)
		{
			session_manager();
			if(!$this->session->userdata('frontenduser'))
			{
				redirect('/signin');
			}

			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			$product = $this->product->getproductbyid($id);
			$this->load->view('Frontend/header',array('menu'=>$menu));
			$this->load->view('Frontend/reviews/new',array('product'=>$product[0]));
			$this->load->view('Frontend/footer',array('page'=>'newreview'));
		}

		public function addreview()
		{
			session_manager();
			$data = $this->input->post('data');
			$id = $this->input->post('id');
			$userid = $this->session->userdata('user')['id'];
			$result = $this->review->addreview($data,$id,$userid,0);
			echo json_encode($result);
		}
	}
?>