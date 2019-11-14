<?php 
	
	class Statistics extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getuserscount()
		{
			$users =  $this->db->query('Select count(*) as count, usertype from user group by usertype')->result_array();
			$user_array = array();
			foreach($users as $user)
			{
				$user_array[$user['usertype']] = $user['count'];
			}

			return $user_array;
		}

		public function getuserrecently()
		{
			$users = $this->db->query('Select count(*) as count,usertype from user where created_date >= DATE_SUB(NOW(),INTERVAL 7 DAY) group by usertype')->result_array();

			$user_array = array();
			foreach($users as $user)
			{
				$user_array[$user['usertype']] = $user['count'];
			}

			return $user_array;
		}

		public function getuserforwait()
		{
			$users = $this->db->query('Select count(*) as count,usertype from user where activated = 0')->result_array();

			$user_array = array();

			foreach($users as $user)
			{
				$user_array[$user['usertype']] = $user['count'];
			}
		}

		public function getproduct(){
			$product = $this->db->query('Select count(*) as count from product')->result_array();
			return $product[0]['count'];
		}

		public function getproductrecently()
		{
			$product = $this->db->query('Select count(*) as count from product where created_date > DATE_SUB(NOW(),INTERVAL 7 DAY)')->result_array();
			return $product[0]['count'];
		}

		public function getproductreviewed()
		{
			$product = $this->db->query('Select * from review group by product_id')->result_array();
			return count($product);
		}	

		public function getresource()
		{
			$resource = $this->db->query('select count(*) as count from post')->result_array()[0]['count'];
			return $resource;
		}

		public function getresourcebydate()
		{
			$resource = $this->db->query('Select count(*) as count from post where created_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)')->result_array()[0]['count'];
			return $resource;
		}
	}
?>