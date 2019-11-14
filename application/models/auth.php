<?php 
	
	class auth extends CI_Model
	{
		function __construct()
		{
			
		}

		function first_login()
		{
			$result = $this->db->query('Select * from user where usertype = "administrator"');
			if(count($result->result_array()) > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		// register function
		function register($user)
		{
			$field = array(); $field_value = array();

			$valid_user = $this->user_exist($user,$user['usertype']);

			if($valid_user['exist'])
			{
				return array('success'=>false,'error_message'=>$valid_user['exist_type']. ' is already exist, please retry again with another ' . $valid_user['exist_type']);
			}

			$field = array(); $value_field = array();
			foreach($user as $key => $value)
			{
				if(is_array($value))
				{
					$value = serialize($value);
				}

				if(!is_numeric($value) || $key == 'phone'){
					$value_fields = "'" . $value . "'";	
				}
				else
				{
					$value_fields = "'" . $value . "'";
				}
				

				if($key == 'password')
				{
					$value_fields = 'md5("' . $value . '")';
				}
				else if($key == 'rpassword' || $key == 'tnc')
				{
					continue;
				}
				array_push($field,$key);
				array_push($value_field , $value_fields);
			}

			array_push($field,'created_date');array_push($value_field,'CURDATE()');
			
			$this->db->query('insert into user(' . join(',',$field) . ') Values(' . join(',',$value_field) . ')');

			$query_id = $this->db->query('Select max(id) as id from user');
			return array('success'=>true,'message'=>'User have registered successfully','id'=>$query_id->result_array());
		}

		function update($user){

			$field_value = array();
			$valid_user = $this->user_exist($user,$user['usertype']);

			if($valid_user['exist'])
			{
				return array('success'=>false,'error_message'=>$valid_user['exist_type']. ' is already exist, please retry again with another ' . $valid_user['exist_type']);
			}

			foreach($user as $key => $value)
			{
				if($key != 'id')
				{
					if($key == 'password' && $value)
					{
						$value = 'MD5("' . $value . '")';
					}
					else if($key == 'password' && !$value)
					{
						continue;
					}
					else if($key == 'rpassword' || $key == 'tnc')
					{
						continue;
					}
					else
					{
						if(is_array($value))
						{
							$value = "'" . serialize($value) . "'";
						}
						else
						{
							$value = '"' . $value . '"';
						}
					}

					array_push($field_value,$key . '=' . $value);
				}
			}

			$this->db->query('Update user set ' . join(',',$field_value) . ' where id = ' . $user['id']);
			return array('success'=>true,'id'=>$user['id']);
		}
		//login function

		function login($user)
		{
			// compare the username

			$querystring = 'Select * from user where (username = "' . $user['username'] . '" or email = "' . $user['username'] . '")';

			if(isset($user['usertype']))
			{
				$querystring .= ' and usertype = "' . $user['usertype'] . '"';
			}	
			$query = $this->db->query($querystring); 

			$user_info = $query->result_array();

			if(count($user_info) > 0)
			{
				$query = $this->db->query('Select * from user where username ="' . $user_info[0]['username'] . '" and password = MD5("' . $user['password'] . '")');

				$user_info = $query->result_array();

				//compare the password
				if(count($user_info) > 0)
				{
					if(!$user_info[0]['activated'])
					{
						return array('success'=>false,'message'=>'Your account is not approved by admin');
					}
					else
					{
						return array('success'=>true,'user_info'=>$user_info[0]);	
					}
					//$this->db->query('Update user set last_logedin = CURDATE()');
					
				}
				else
				{
					return array('success'=>false,'message'=>'Password you typed in is incorrect');
				}
			}
			else
			{
				return array('success'=>false,'message'=>'Username you typed in is incorrect');
			}
		}

		//determine if the user exist
		function user_exist($user,$type = null)
		{
			if(!$type || $type == 'buyer')
			{
				$querystring = 'Select * from user where username = "' . $user['username'] .'" or email = "' . $user['email'] . '"';	
			}
			else
			{
				$querystring = 'Select * from user where company = "' . $user['company'] . '"';
			}

			$query = $this->db->query($querystring);

			$real_user = $query->result_array();

			if(count($real_user) > 0)
			{
				if(isset($user['id']) && $real_user[0]['id'] == $user['id'])
				{
					return array('exist'=>false);
				}
				else if($type == 'vendor')
				{
					return array('exist'=>false);
				}
				if($real_user[0]['username'] == $user['username'])
				{
					return array('exist'=>true,'exist_type'=>'username');
				}
				else
				{
					return array('exist'=>true,'exist_type'=>'email');
				}
			}
		}

		function forgetpassword($data)
		{
			$query = $this->db->query('Select * from user where email = "' . $data['email']. '"');
			$user_info = $query->result_array();

			if(count($user_info) > 0)
			{
				if(!$user_info[0]['activated'])
				{
					return array('success'=>false,'message'=>'You have not approved by the admin');
				}
				else
				{
					$rand_num = rand(10000,99999);
					$this->db->query('Update user set activation_code = MD5("' . $rand_num . '") where id = ' . $user_info[0]['id']);

					$query_inserted = $this->db->query('Select * from user where id = ' . $user_info[0]['id']);
					return array('success'=>true,'user_info'=>$query_inserted->result_array()[0]);	
				}
				
			}
			else
			{
				return array('success'=>false,'message'=>'Such User is not exist');
			}
		}

		function confirmcode($userid,$confirmcode)
		{
			if($userid && $confirmcode)
			{
				$query_result = $this->db->query('Select * from user where id = ' . $userid . ' and activation_code = "' . $confirmcode . '"');
				if(count($query_result->result_array()) > 0)
				{
					return array('success'=>true,'user_info'=>$query_result->result_array()[0]);
				}
				else
				{
					return array('success'=>false,'message'=>"You can't reset the password in this url. Please recheck your email account.");
				}	
			}
			else
			{
				return array('success'=>false,'message'=>"You can't reset the password in this url. Please recheck your email account.");
			}
		}

		function resetpassword($data,$id)
		{
			$this->db->query('Update user set password = MD5("' . $data['password'] . '"),activation_code = "" where id = ' . $id);
			return array('success'=>true);
		}

		function getallusers()
		{
			$query = $this->db->query('Select * from user');
			return $query->result_array();
		}

		function getuserbyid($id)
		{
			$user =  $this->db->query('Select * from user where id = ' . $id)->result_array()[0];
			$user['socialnetwork'] = unserialize($user['socialnetwork']);
			return $user;
		}

		function getuserbytype($type)
		{
			return $this->db->query('Select * from user where usertype = "vendor"')->result_array();
		}
		function setprofile($id,$url)
		{
			$this->db->query('Update user set profile = "' . $url . '" where id = ' . $id);
			return array('success'=>true);
		}

		function deleteuser($id)
		{
			$this->db->query('Delete from user where id in (' .join(',',$id) .')');
			return array('success'=>true);
		}

		function deactivate($id){
			$this->db->query('Update user set activated = 0 where id = ' . $id);
			return array('success'=>true);
		}

		function activate($id)
		{
			$this->db->query('Update user set activated = 1 where id = ' . $id);
			return array('success'=>true);
		}

		function getdeactivateduser()
		{
			return $this->db->query('Select * from user where activated = 0')->result_array();
		}
		function addpopular($data)
		{
			if($data['id'])
			{
				$popular = 0;
				if($data['popular'])
				{
					$popular = 1;
				}
				
				$this->db->query('Update user set popular = ' .$popular . ' where id = ' . $data['id']);
				return array('success'=>true);
			}
			else
			{
				return array('success'=>false);
			}
		}

		function get_user_by_role($roles)
		{
			$role_value = array();
			foreach($roles as $role)
			{
				array_push($role_value,"'" . $role . "'");
			}

			$query = $this->db->query('Select * from user where usertype in (' . join(',',$role_value) .')');
			return $query->result_array();
		}


	}

?>