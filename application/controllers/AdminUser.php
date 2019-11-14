<?php 
	require('vendor/autoload.php');		
	class AdminUser extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('auth');
			$this->load->model('Admin/feature');
			$this->load->model('Admin/product');
		}

		function all($role)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}


			$data = array('parent'=>$role,'selected'=>'all'.$role);
			role_manage($data['parent'],$data['selected']);
			$data_user = array('user'=>$this->auth->get_user_by_role(array($role)));

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			if($role == 'vendor')
			{
				$id_array = array();
				foreach ($data_user['user'] as $key => $value) {
					$data_user['user'][$key]['product'] = count($this->product->getproductbyuser($value['id']));
				}

				$this->load->view('Admin/Vendor/vendor',$data_user);
				
			}
			else if($role == 'buyer')
			{
				$this->load->view('Admin/User/user',$data_user);		
			}
			else if($role == 'admins')
			{
				$this->load->view('Admin/admin/user',$data_user);
			}
			$this->load->view('Admin/footer',$data);
		}

		function newuser($role)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			
			$directory = './uploads/user';
			$images_jpg = glob($directory . '/*.jpg');
			$images_png = glob($directory.'/*.png');

			$images = array_merge($images_jpg,$images_png);
			
			$data = array('parent'=>$role,'selected'=>'newuser' . $role);

			role_manage($data['parent'],$data['selected']);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);

			if($role == 'buyer')
			{
				$this->load->view('Admin/User/new',array('images'=>$images));	
			}
			else if($role == 'vendor')
			{			
				$this->load->view('Admin/Vendor/new',array('images'=>$images));
			}
			else if($role == 'admin')
			{
				$this->load->view('Admin/admin/new',array('images'=>$images));
			}
			$this->load->view('Admin/footer',$data);	
		}

		function edituser($role,$id)
		{
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			$data = array('parent'=>$role,'selected'=>'edituser' . $role);
			role_manage($data['parent'],$data['selected']);
			$user = $this->auth->getuserbyid($id);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			if($role == 'vendor')
			{
				$this->load->view('Admin/Vendor/edit',array('user'=>$user,'featureselect'=>$this->feature->getfeaturebyidarray($user['features']),'feature'=>$this->feature->allfeature()));
			}
			else if($role == 'buyer')
			{
				$this->load->view('Admin/User/edit',array('user'=>$user));
			}
			else if($role == 'admin')
			{
				$this->load->view('Admin/admin/edit',array('user'=>$user));
			}
			$this->load->view('Admin/footer',$data);	
		}

		function adduser()
		{
			$data = $this->input->post();
			if(!isset($data['id']))
			{
				$data['activated'] = 1;
				$return_result = $this->auth->register($data);
			}
			else
			{
				$return_result = $this->auth->update($data);
			}
			
			echo json_encode($return_result);
		}
		
		function do_upload()
		{
			$config['upload_path']          = './uploads/user';

			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path'],0777,TRUE);
			}

            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['max_width']            = 10240;
            $config['max_height']           = 76800;
            $config['file_name'] 			= time().$_FILES['profile']['name'];
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('profile'))
            {
            	echo json_encode(array('success'=>false,'message'=>$this->upload->display_errors())); 
            }
            else
            {
                $result = array('filename'=>$config['upload_path'].'/' . $this->upload->data()['file_name']);

               echo json_encode($result);
            }
		}

		function deactivate()
		{
			$id = $this->input->post('id');
			$result = $this->auth->deactivate($id);
			echo json_encode($result);
		}

		function activate()
		{
			$id = $this->input->post('id');
			$user = $this->auth->getuserbyid($id);
			$this->auth->activate($id);
			$confirm_data = $this->auth->forgetpassword($user);
			$result_email = $this->send_email($user['email'],$confirm_data['user_info']);

			if($result_email['success'])
			{
				echo json_encode(array('success'=>true));
			}
			else
			{
				echo json_encode(array('success'=>false,'message'=>$result_email['message']." So We can't activate this account"));
			}

		}

		function getinfo()
		{
			$id = $this->input->post('id');
			$user = $this->auth->getuserbyid($id);

			echo json_encode(array('success'=>true,'data'=>$user));
		}

		function delete()
		{
			$id = $this->input->post('id');
			$result = $this->auth->deleteuser($id);
			echo json_encode($result);
		}

		public function send_email($emailaddress,$confirm_data)
		{
			
			$apiKey = ('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');
			$email = new \SendGrid\Mail\Mail();
			$email->setFrom("start19960718@outlook.com", "STAR");
			$email->setSubject("Reset Password");
			$email->addTo($emailaddress);
			$email->addContent(
			    "text/html", "<h1>Reset Password</h1>" . '<p>Hi </p>' . $confirm_data['username'] . '<p>Please use this url to reset the password</p>'.'<a href = "' . base_url().'admin/reset/'.$confirm_data['id'].'/'.$confirm_data['activation_code'] . '">'. base_url().'admin/reset/'.$confirm_data['id'].'/'.$confirm_data['activation_code'] .'</a>'
			);
			$sendgrid = new \SendGrid($apiKey);
			
			try{
				$response = $sendgrid->send($email);
				if($response->statusCode() == 202)
				{
					return array('success'=>true,'message'=>'We have Send The Url to Reset Password to Your Email,Please check your email');
				}
				else
				{
					return array('success'=>false, 'message'=>'Such Email is not exist');
				}
			}
			catch(Exception $e)
			{
				return array('success'=>false, 'message'=>'Such Email is not exist');
			}
		}

		public function addpopular()
		{
			$data = $this->input->post();
			$result = $this->auth->addpopular($data);
			echo json_encode($data);
		}
	}
?>