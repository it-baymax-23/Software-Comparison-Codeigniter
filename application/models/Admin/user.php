<?php 
	
	class user extends CI_Model
	{
		function __construct()
		{

		}

		function getuserbyid($id)
		{
			$query = $this->db->query('Select * from user where id = ' . $id);
			return isset($query->result_array()[0])?$query->result_array()[0]:array();
		}

		function getpopularvendor()
		{
			$query = $this->db->query('Select * from user where popular = 1 and usertype="vendor"' );
			return $query->result_array();
		}
	}
?>