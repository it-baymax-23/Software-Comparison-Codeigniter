<?php 
	require('vendor/autoload.php');		
	class UserController extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('auth');
			$this->load->model('Admin/category');
			$this->load->library('session');
			$this->load->library('email');
			$this->load->model('Admin/menu');
		}

		function index(){
			
		}

		function login()
		{
			
			
		}

		function adduser()
		{
			$data = $this->input->post();
			$data['activated'] = 0;

			$subject = $data['username'] . ' is waiting for your approval';

			$html = '';
			foreach($data as $key => $value)
			{
				if($key != 'profile' && $key != 'socialnetwork')
				{
					$html .= '<div><label style="float:left;width:30%;margin-right:12px;">' . $key . ':<label><span type="float:left;width:70%">' . $value . '</span></div>';
				}
			}

			$result = $this->send_mail($data['email'],'jws19950122@outlook.com',$subject,$html,$data['username']);
			if($result['success'])
			{
				$returndata = $this->auth->register($data);

				$subject = 'Please wait for me while searching your site';
				$html = 'We will contact you soon after approve your request';

				$this->send_mail('jws19950122@outlook.com',$data['email'],$subject,$html,'Quan');
				echo json_encode($returndata);	
			}
			else
			{
				echo json_encode($result);
			}
			
		}

		function updateuser()
		{
			$data = $this->input->post();
			$data['activated'] = 0;

			$subject = $data['username'] . ' is waiting for your approval for his account update';

			$html = '';
			foreach($data as $key => $value)
			{
				if($key != 'profile' && $key != 'socialnetwork')
				{
					$html .= '<div><label style="float:left;width:30%;margin-right:12px;">' . $key . ':<label><span type="float:left;width:70%">' . $value . '</span></div>';
				}
			}

			$result = $this->send_mail($data['email'],'jws19950122@outlook.com',$subject,$html,$data['username']);

			$data['id'] = $this->session->userdata('frontenduser')['id'];
			
			if($result['success'])
			{
				$returndata = $this->auth->update($data);

				$subject = 'Please wait for me while searching your site';
				$html = 'We will contact you soon after approve your request';

				$this->send_mail('jws19950122@outlook.com',$data['email'],$subject,$html,'Quan');
				echo json_encode($returndata);	
			}
			else
			{
				echo json_encode($result);
			}
		}

		function loginuser()
		{
			$user = $this->input->post();

			$userdata = $this->auth->login($user);

			if($userdata['success'])
			{
				if($userdata['user_info']['usertype'] == 'administrator')
				{
					echo json_encode(array('success'=>false,'message'=>"You are Admin manager So you can't login into frontend"));
				}
				else
				{
					$this->session->set_userdata('frontenduser',$userdata['user_info']);
					echo json_encode(array('success'=>true,'redirect_url'=>base_url()));	
				}
				
			}
			else
			{
				echo json_encode($userdata);
			}
		}

		function forgetpassword()
		{
			$data = $this->input->post();
			$confirm_data = $this->auth->forgetpassword($data);
			
			if($confirm_data['success'])
			{
				$user_info = $confirm_data['user_info'];
				
				$send_result = $this->send_email($user_info['email'],$user_info);
				if($send_result['success'])
				{
					echo json_encode($send_result);
				}
				else
				{
					echo json_encode($send_result);
				}
			}
			else
			{
				echo json_encode($confirm_data);
			}
		}

		public function send_mail($from,$to,$subject,$data,$username)
		{
			$apiKey = ('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');
			$email = new \SendGrid\Mail\Mail();
			$email->setFrom($from,$username);
			$email->setSubject($subject);
			$email->addTo($to);
			$email->addContent(
			    "text/html", $data
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
		public function send_email($emailaddress,$confirm_data)
		{
			$rand_num = rand(10000,99999);
			$apiKey = ('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');
			$email = new \SendGrid\Mail\Mail();
			$email->setFrom("start19960718@outlook.com", "STAR");
			$email->setSubject("Reset Password");
			$email->addTo($emailaddress);
			$email->addContent(
			    "text/html", "<h1>Reset Password</h1>" . '<p>Hi </p>' . $confirm_data['username'] . '<p>Please use this url to reset the password</p>'.'<a href = "' . base_url().'reset/'.$confirm_data['id'].'/'.$confirm_data['activation_code'] . '">'. base_url().'reset/'.$confirm_data['id'].'/'.$confirm_data['activation_code'] .'</a>'
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

		// public function reset($userid = null,$confirmcode=null)
		// {
		// 	$return_result = $this->auth->confirmcode($userid,$confirmcode);

		// 	$data = array();
		// 	if($return_result['success'])
		// 	{
		// 		$this->session->set_userdata('confirm_user_id',$return_result['user_info']['id']);
		// 		$data['success'] = true;
		// 	}
		// 	else
		// 	{
		// 		$data = $return_result;
		// 	}
		// 	$this->load->view('Admin/reset',$data);
		// }

		public function resetpassword()
		{
			$data = $this->input->post();
			$id = $this->session->userdata('confirm_user_id');
			$return = $this->auth->resetpassword($data,$id);
			echo json_encode(array('success'=>$return['success'],'redirect_url'=>base_url().'signin'));
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('/signin');
		}

		function signin()
		{
			if($this->session->userdata('user'))
			{
				redirect('');
			}

			// $menu = $this->menu->getmenu();

			// if($this->session->userdata('frontenduser'))
			// {
			// 	$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			// }
			 $category = array('menu'=>array());


			$this->load->view('Frontend/header',$category);
			$this->load->view('Frontend/login');
			$this->load->view('Frontend/footer',array('page'=>'login'));
		}

		function register()
		{
			// if(!$this->session->userdata('frontenduser'))
			// {
			// 	redirect('');
			// }
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			$category = array('menu'=>$menu);
			$this->load->view('Frontend/header',$category);
			$this->load->view('Frontend/register');
			$this->load->view('Frontend/footer',array('page'=>'login'));	
		}

		function forget()
		{
			$category = array('category'=>$this->category->getcategories());
			$this->load->view('Frontend/header',$category);
			$this->load->view('Frontend/forgetpassword');
			$this->load->view('Frontend/footer',array('page'=>'login'));
		}

		function reset($userid = null,$confirmcode=null){
			$return_result = $this->auth->confirmcode($userid,$confirmcode);

			$data = array();
			if($return_result['success'])
			{
				$this->session->set_userdata('confirm_user_id',$return_result['user_info']['id']);
				$data['success'] = true;
			}
			else
			{
				redirect('');
			}

			$category = array('category'=>$this->category->getcategories());
			$this->load->view('Frontend/header',$category);
			$this->load->view('Frontend/resetpassword');
			$this->load->view('Frontend/footer',array('page'=>'login'));
		}
		function do_upload()
		{
			$config['upload_path']          = './uploads/user';

			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path'],0777,TRUE);
			}

            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name'] 			= time().$_FILES['profile']['name'];
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('profile'))
            {
            	echo json_encode(array('success'=>false,'message'=>$this->upload->display_errors())); 
            }
            else
            {
               echo json_encode(array('success'=>true,'message'=> $config['upload_path'].'/' . $this->upload->data()['file_name']));
            }
		}

		function contact()
		{
			$data = $this->input->post();
			$title = 'The request for contact from ' . $data['username'] . ' is reached';
			$html = '<h1> The Reqest From ' . $data['username'] . ' Is Reached, He wants your help.</h1>';
			$html .= '<p>' . $data['message'] . '</p>';

			$result = $this->send_mail($data['email'],'jws19950122@outlook.com',$title,$html,$data['username']);
			if($result['success'])
			{
				echo json_encode(array('success'=>true,'message'=>'You have successfully send your mail to admin'));
			}
			else
			{
				echo jso_encode($result);
			}
		}

	}
?>