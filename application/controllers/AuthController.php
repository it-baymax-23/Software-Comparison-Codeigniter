<?php 
	
	require('vendor/autoload.php');	
	class AuthController extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('auth');
			$this->load->library('session');
			$this->load->library('email');
		}

		public function index()
		{
			$this->load->view('Frontend/login');
		}

		public function register()
		{
			$user = $this->input->post();
			$message = $this->auth->register($user);
			echo json_encode($message);			
		}

		public function login()
		{
			$user = $this->input->post();
			$message = $this->auth->login($user);
			if(!$message['success'])
			{
				echo json_encode($message);	
			}
			else
			{
				$user_info = $message['user_info'];			
				$this->load->helper('url');
				$this->session->set_userdata('user',$message['user_info']['id']);
				echo json_encode(array('success'=>true,'message'=>'Login Successed','redirect_url'=>base_url()));
			}
		}

		public function confirmnumber()
		{
			$data = $this->input->post();
			$sessiondata = $this->session->get_userdata();
			if($sessiondata['confirm_number'] == intval($data['confirm_number']))
			{
				$this->session->set_userdata('confirmed',true);
				echo json_encode(array('success'=>true,'redirect_url'=>base_url().'resetpassword'));
			}
			else
			{
				echo json_encode(array('success'=>false,'message'=>'Confirm Number is not matched, Please retype again'));
			}

		}

		public function forgetpassword()
		{
			$data = $this->input->post();
			$confirm_data = $this->auth->forgetpassword($data);
			$to      = 'start19960718@outlook.com';
			$subject = 'the subject';
			$message = 'hello';
			$headers = 'From: jws19950122@outlook.com' . "\r\n" .
			    'Reply-To: jws19950122@outlook.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			if($confirm_data['success'])
			{
				$user_info = $confirm_data['user_info'];
				
				$send_result = $this->send_email($user_info['email']);
				if($send_result['success'])
				{
					$this->session->set_userdata('confirm_userid',$user_info['id']);
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

		public function resetpasswordform()
		{
			if(!$this->session->get_userdata()['confirmed'])
			{
				redirect(base_url());
			}
			else
			{
				$this->load->view('Frontend/confirm');
			}
		}

		public function resetpassword()
		{
			$data = $this->input->post();
			$result = $this->auth->resetpassword($data,$this->session->get_userdata()['confirm_userid']);
			$result['redirect_url'] = base_url();
			if($result['success'])
			{
				$this->session->set_userdata('confirmed',false);
			}
			echo json_encode($result);
		}

		public function send_email($emailaddress)
		{
			$rand_num = rand(10000,99999);
			$apiKey = ('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');
			$email = new \SendGrid\Mail\Mail();
			$email->setFrom("start19960718@outlook.com", "STAR");
			$email->setSubject("Confirm Number");
			$email->addTo($emailaddress);
			$email->addContent(
			    "text/html", "<h1>Confirm Your Number</h1><strong>" . $rand_num . "</strong>"
			);
			$sendgrid = new \SendGrid($apiKey);
			
			try{
				$response = $sendgrid->send($email);
				if($response->statusCode() == 202)
				{
					$this->session->set_userdata('confirm_number',$rand_num);
					return array('success'=>true);
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
	}
?>