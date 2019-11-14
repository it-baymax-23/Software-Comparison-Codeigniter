<?php 
	class AdminProduct extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('auth');
			$this->load->model('Admin/category');
			$this->load->model('Admin/product');
			$this->load->model('Admin/feature');
		}

		function index()
		{
			$data = array('parent'=>'product','selected'=>'all');
			role_manage($data['parent'],$data['selected']);
			$product = array('product'=>$this->product->getallproduct());
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Product/index',$product);
			$this->load->view('Admin/footer',$data);
		}

		function get_product_by_user($id)
		{
			$result = $this->db->query('Select * from product where user_id = ' . $id)->result_array();
			
		}

		function addpopular()
		{
			$data = $this->input->post();
			$result = $this->product->addpopular($data);
			echo json_encode($result);
		}

		function activate()
		{
			$data = $this->input->post();
			$result = $this->product->activate($data);
			echo json_encode($data);
		}

		function delete()
		{
			$data = $this->input->post('id');
			echo json_encode($this->product->delete($data));
		}
		function newproduct($id = null)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>'product','selected'=>'new');

			if($id)
			{
				$data['selected'] = 'edit';
			}
			role_manage($data['parent'],$data['selected']);
			$vendors = $this->auth->get_user_by_role(array('vendor'));
			$data_product = array('vendor'=>$vendors,'category'=>$this->category->getallcategory(),'feature'=>$this->feature->allfeature());
			
			if(isset($id) && $this->product->check($id))
			{
				$data_product['id'] = $id;
			}
		
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Product/new',$data_product);
			$this->load->view('Admin/footer',$data);	
		}

		function addproduct()
		{
			$data = $this->input->post();
			$result = $this->product->saveproduct($data);
			echo json_encode($result);
		}
		function upload()
		{
			$config['upload_path']          = './uploads/product';

			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path'],0777,TRUE);	
			}

            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 20000;
            $config['max_height']           = 10000;
            $config['file_name'] 			= time().$_FILES['file']['name'];

            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('file'))
            {
            	echo json_encode(array('success'=>false,'message'=>$this->upload->display_errors())); 
            }
            else
            {
               echo json_encode(array('success'=>true,'message'=>$config['upload_path'] . '/' . $this->upload->data()['file_name']));
            }
		}
		function getfeatures()
		{
			$id = $this->input->post('id');
			$user = $this->auth->getuserbyid($id);
			$features = $this->feature->getfeaturebyidarray($user['features']);
			if($this->input->post('productid'))
			{
				$productid = $this->input->post('productid');
				$feature_array = $this->product->getfeature($productid);
				$id_array = array();

				foreach($feature_array as $featurekey)
				{
					array_push($id_array,$featurekey['feature_key']);
				}

				foreach($features as $key => $feature)
				{

					if(in_array($feature['id'],$id_array))
					{
						$value_key = array_search($feature['id'],$id_array);
						$features[$key]['value'] = $feature_array[$value_key]['value'];
					}
				}
			}

			echo json_encode($features);
		}
		function get()
		{
			$id = $this->input->post('id');
			$product = $this->product->getproductbyid($id)[0];
			echo json_encode($product);
		}

		function getbyvendor($id)
		{
			$data = array('parent'=>'product','selected'=>'getbyvendor');
			role_manage($data['parent'],$data['selected']);
			$product = array('product'=>$this->product->getproductbyuser($id));
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}

			$user = $this->auth->getuserbyid($id);
			$data['user'] = $user;
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/Product/index',$product);
			$this->load->view('Admin/footer',$data);
		}
		function reviewsetting()
		{
			$data = $this->input->post();
			$this->product->savereviewsetting($data);
			echo json_encode(array('success'=>true));
		}

		
	}
?>