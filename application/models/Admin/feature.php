<?php 
	
	class feature extends CI_Model{
		
		function __construct()
		{

		}	
		
		function addfeature($data)
		{
			//check if the feature is already exist

			$result_check = $this->checkfeature($data);

			if(!$result_check['success'])
			{
				return $result_check;
			}
			else
			{
				//prepare the sql for feature
				$field = array(); $value_array = array();

				foreach($data as $key => $value)
				{
					array_push($field,$key);
					
					if(is_numeric($value))
					{
						array_push($value_array,$value);
					}
					else
					{
						array_push($value_array,"'" . $value . "'");
					}
				}

				//run sql

				$this->db->query('Insert into feature(' . join(',',$field) . ') Values(' . join(',',$value_array) . ')');
				return array('success'=>true,'message'=>'You have Added your Feature successfully');
			}
		}

		function checkfeature($data)
		{
			//prepare the query

			$query = $this->db->query('Select * from feature where name = "' . $data['name'] . '" and type = "' . $data['type'] . '"');
			if(count($query->result_array()) > 0)
			{
				return array('success'=>false,'message'=>'The Feature already exist');
			}
			else
			{
				return array('success'=>true);
			}
		}

		function allfeature()
		{
			$query = $this->db->query('Select * from feature');
			return $query->result_array();
		}

		function delete($data)
		{
			$this->db->query('Delete from feature where id in (' . join(',',$data) . ')');
			return array('success'=>true,'message'=>'You have Successfully Delete Properties');
		}

		function getfeaturebyidarray($id)
		{
			if($id)
			{
				return $this->db->query('Select * from feature where id in (' . $id . ')')->result_array();
			}
			else
			{
				return array();
			}
		}
	}
?>