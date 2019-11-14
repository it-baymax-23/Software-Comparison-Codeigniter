<?php 
	
	class settingreview extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function save($data)
		{
			$field = array();
			$field_value = array();

			foreach($data as $key => $value)
			{
				if(!is_numeric($value))
				{
					$value = "'" . $value ."'";
				}

				array_push($field,$key);
				array_push($field_value,$value);
			}

			if(count($this->db->query('Select * from review_setting where resource_id = "' . $data['resource_id'] . '"')->result_array()) == 0)
			{
				$this->db->query('insert into review_setting(' . join(',',$field) . ') Values(' . join(',',$field_value) . ')');	
			}
			else
			{
				$update_value = array();
				foreach($field as $key => $fields)
				{
					array_push($update_value,$fields . '='. $field_value[$key] . '');
				}

				$this->db->query('update review_setting set ' . join(',',$update_value) . ' where resource_id = "' . $data['resource_id'] . '"');
			}
			
			return true;
		}

		public function getsettingbyid($webid)
		{
			$query = $this->db->query('Select * from review_setting where resource_id = "' . $webid . '"');
			return $query->result_array();
		}
	}
?>