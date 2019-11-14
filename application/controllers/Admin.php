<?php 
	require('vendor/autoload.php');		
	class Admin extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('auth');
			$this->load->library('session');
			$this->load->library('email');
			$this->load->model('Admin/product');
			$this->load->model('Admin/Statistics');
			$this->load->model('Admin/settingreview');
		}

		function index(){
			if(!$this->session->userdata('user'))
			{
				redirect('admin/login');
			}
			
			$homedata = array('user'=>$this->Statistics->getuserscount(),'user_recently'=>$this->Statistics->getuserrecently(),'userwait'=>$this->Statistics->getuserforwait(),'product'=>$this->Statistics->getproduct(),'product_recent'=>$this->Statistics->getproductrecently(),'product_review'=>$this->Statistics->getproductreviewed(),'resource'=>$this->Statistics->getresource(),'resource_recent'=>$this->Statistics->getresourcebydate());
			
			$data = array('parent'=>'home','selected'=>'home');
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/sidebar',$data);
			$this->load->view('Admin/index',$homedata);
			$this->load->view('Admin/footer',$data);
		}

		function login()
		{
			$data['signup'] = $this->auth->first_login();
			$this->load->view('Admin/login',$data);
		}

		function register()
		{
			$data = $this->input->post();
			$data['usertype'] = 'administrator';
			$data['activated'] = 1;
			$returndata = $this->auth->register($data);
			echo json_encode($returndata);
		}

		function loginuser()
		{
			$user = $this->input->post();
			$userdata = $this->auth->login($user);
			if($userdata['success'])
			{
				$this->session->set_userdata('user',$userdata['user_info']);
				echo json_encode(array('success'=>true,'redirect_url'=>base_url().'admin'));
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

		public function send_email($emailaddress,$confirm_data)
		{
			$rand_num = rand(10000,99999);
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

		public function reset($userid = null,$confirmcode=null)
		{
			$return_result = $this->auth->confirmcode($userid,$confirmcode);

			$data = array();
			if($return_result['success'])
			{
				$this->session->set_userdata('confirm_user_id',$return_result['user_info']['id']);
				$data['success'] = true;
			}
			else
			{
				$data = $return_result;
			}
			$this->load->view('Admin/reset',$data);
		}

		public function resetpassword()
		{
			$data = $this->input->post();
			$id = $this->session->userdata('confirm_user_id');
			$return = $this->auth->resetpassword($data,$id);
			echo json_encode(array('success'=>$return['success'],'redirect_url'=>base_url() . 'admin'));
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('/admin/login');
		}

		public function iframe_view()
		{
			$url = $this->input->get('url');		
			$resp = file_get_contents($url);
			$dom = new DomDocument();
			$dom->preserveWhiteSpace = false;
			$resp = trim($resp);
			if (substr($resp, 0, 3) == pack("CCC", 0xef, 0xbb, 0xbf)) {
				$resp = substr($resp, 3);
			}
			
			$resp = mb_convert_encoding($resp, 'UTF-8');
			$resp = preg_replace(
					array(
					"'<\s*script[^>]*[^/]>(.*?)<\s*/\s*script\s*>'is",
					"'<\s*script\s*>(.*?)<\s*/\s*script\s*>'is",
					"'<\s*noscript[^>]*[^/]>(.*?)<\s*/\s*noscript\s*>'is",
					"'<\s*noscript\s*>(.*?)<\s*/\s*noscript\s*>'is"
					), array(
					"",
					"",
					"",
					""
					), $resp);

			@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $resp);

			$address = parse_url($url);
			$address = $address['scheme'].'://'.$address['host'];
			
			$head = $dom->getElementsByTagName('head')->item(0);
			$base = $dom->getElementsByTagName('base')->item(0);
			$html_base_url = null;
			if (!is_null($base)) {
				$html_base_url = $this->create_absolute_url($base->getAttribute('href'), $url, null);
			}
			$imgs = $dom->getElementsByTagName('img');
			if ($imgs->length) {
				foreach ($imgs as $item) {
					$item->setAttribute('src', $this->create_absolute_url(
							trim($item->getAttribute('src')), $address, $html_base_url
					));
				}
			}

			$as = $dom->getElementsByTagName('a');
			if ($as->length) {
				foreach ($as as $item) {
					$item->setAttribute('href', $this->create_absolute_url(
							trim($item->getAttribute('href')), $address, $html_base_url
					));
				}
			}

            $links = $dom->getElementsByTagName('link');
            if ($links->length) {
                foreach ($links as $item) {
                    $item->setAttribute('href', $this->create_absolute_url(
                        trim($item->getAttribute('href')), $address, $html_base_url
                    ));
                }
            }

			$all_elements = $dom->getElementsByTagName('*');
			foreach ($all_elements as $item) {
				if ($item->hasAttributes()) {
					foreach ($item->attributes as $name => $attr_node) {
						if (preg_match("/^on\w+$/", $name)) {
							$item->removeAttribute($name);
						}
					}
				}
			}
			echo $dom->saveHtml();
		}

		public function settingsave()
		{
			$data = $this->input->post();
			$this->settingreview->save($data);
			echo json_encode(array('message'=>'You have successfully saved the setting data','success'=>true));
		}

		public function create_absolute_url($rel, $base, $html_base) {
	        $rel = trim($rel);
			if (substr($rel, 0, 11) == 'data:image/') {
				return $rel;
			}

			if (!empty($html_base)) {
				$base = $html_base;
			}
			return $this->make_absolute_url($rel, $base);
		}

		public function make_absolute_url( $maybe_relative_path, $url ) {
			if ( empty( $url ) )
		        return $maybe_relative_path;
		 
		    if ( ! $url_parts = parse_url( $url ) ) {
		        return $maybe_relative_path;
		    }
		 
		    if ( ! $relative_url_parts = parse_url( $maybe_relative_path ) ) {
		        return $maybe_relative_path;
		    }
		 
		    // Check for a scheme on the 'relative' url
		    if ( ! empty( $relative_url_parts['scheme'] ) ) {
		        return $maybe_relative_path;
		    }
		 
		    $absolute_path = $url_parts['scheme'] . '://';
		 
		    // Schemeless URL's will make it this far, so we check for a host in the relative url and convert it to a protocol-url
		    if ( isset( $relative_url_parts['host'] ) ) {
		        $absolute_path .= $relative_url_parts['host'];
		        if ( isset( $relative_url_parts['port'] ) )
		            $absolute_path .= ':' . $relative_url_parts['port'];
		    } else {
		        $absolute_path .= $url_parts['host'];
		        if ( isset( $url_parts['port'] ) )
		            $absolute_path .= ':' . $url_parts['port'];
		    }
		 
		    // Start off with the Absolute URL path.
		    $path = ! empty( $url_parts['path'] ) ? $url_parts['path'] : '/';
		 
		    // If it's a root-relative path, then great.
		    if ( ! empty( $relative_url_parts['path'] ) && '/' == $relative_url_parts['path'][0] ) {
		        $path = $relative_url_parts['path'];
		 
		    // Else it's a relative path.
		    } elseif ( ! empty( $relative_url_parts['path'] ) ) {
		        // Strip off any file components from the absolute path.
		        $path = substr( $path, 0, strrpos( $path, '/' ) + 1 );
		 
		        // Build the new path.
		        $path .= $relative_url_parts['path'];
		 
		        // Strip all /path/../ out of the path.
		        while ( strpos( $path, '../' ) > 1 ) {
		            $path = preg_replace( '![^/]+/\.\./!', '', $path );
		        }
		 
		        // Strip any final leading ../ from the path.
		        $path = preg_replace( '!^/(\.\./)+!', '', $path );
		    }
		 
		    // Add the Query string.
		    if ( ! empty( $relative_url_parts['query'] ) )
		        $path .= '?' . $relative_url_parts['query'];
		 
		    return $absolute_path . '/' . ltrim( $path, '/' );
		}
	}
?>