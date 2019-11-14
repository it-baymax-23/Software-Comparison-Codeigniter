<?php 
	
	class AdminReviewSetting extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/product');
			$this->load->model('Admin/review');
			$this->load->model('Admin/settingreview');
		}

		public function index(){

		}

		public function setting($id)
		{
			$product = $this->product->getproductbyid($id);
			$data = array('parent'=>'resource_setting','selected'=>'resource_setting');
			role_manage($data['parent'],$data['selected']);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/ReviewSetting/setting',array('product'=>$product,'resources'=>$this->review->getsources()));
			$this->load->view('Admin/footer',$data);
		}

		public function resource_review($id)
		{
			$resource = $this->review->getsourcebyid($id);
			$resourcesetting = $this->settingreview->getsettingbyid($resource['webid']);
			$data = array('parent'=>'resource_setting','selected'=>'resource_setting');
			role_manage($data['parent'],$data['selected']);
			$data_setting = array('resource'=>$resource);
			if(count($resourcesetting) > 0)
			{
				$data_setting['setting'] = $resourcesetting[0];
			}

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/ReviewSetting/setting_resource',$data_setting);
			$this->load->view('Admin/footer',$data);	
		}
	}
?>