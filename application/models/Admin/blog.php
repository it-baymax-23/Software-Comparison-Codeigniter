<?php 
	
	class blog extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function addblog($data){

			$key_field = array(); $value_field = array();

			foreach($data as $key => $value)
			{
				if($key != 'section' && $key != 'id')
				{
					if(!is_numeric($value))
					{
						$value = str_replace('"',"'",$value);
						$value = '"' . $value . '"';
					}
					
					if(!isset($data['id']))
					{
						array_push($key_field,$key);
						array_push($value_field,$value);	
					}
					else
					{
						array_push($value_field, $key . '=' . $value);
					}	
				}
			}

			// var_dump('Insert into post(' . join(',',$key_field) . ',created_date) Values(' . join(',',$value_field) . ',NOW())');exit;
			$id = '';
			if(!isset($data['id']))
			{
				$this->db->query('Insert into post(' . join(',',$key_field) . ',created_date) Values(' . join(',',$value_field) . ',NOW())');	
				$id = $this->db->query('Select max(id) as metaid from post')->result_array()[0]['metaid'];
			}
			else
			{
				$id = $data['id'];
				$this->db->query('Update post set ' . join(',',$value_field) . ' where id = ' . $id);
			}
			
			$meta_array = array();
			$this->db->query('Delete from postmeta where post_id = ' . $id);
			if(isset($data['section']))
			{
				foreach($data['section'] as $sections)
				{
					$sections['description'] = str_replace('"',"'",$sections['description']);
					$meta_value = '("' . $sections['title'] . '","' . $sections['description'] . '",' . $id.')';

					array_push($meta_array,$meta_value);
				}

				$this->db->query('Insert into postmeta(title,description,post_id) Values' . join(',',$meta_array));	
			}
			
			return array('success'=>true);
		}

		public function getblogs($search = array())
		{
			if(count($search) == 0)
			{
				return $this->db->query('Select * from post')->result_array();	
			}
			else
			{
				$query = array();
				foreach($search as $key => $value)
				{
					if(!is_numeric($value))
					{
						$value = '"'. $value . '"';
					}
					array_push($query,$key . ' = ' . $value);
				}

				return $this->db->query('Select * from post where ' . join(' and ',$query))->result_array();
			}
		}

		public function deleteblog($id)
		{
			$this->db->query('Delete from post where id = '. $id);
			$this->db->query('Delete from postmeta where post_id = ' . $id);
			return array('success'=>true);
		}

		function getsection($id)
		{
			return $this->db->query('Select * from postmeta where post_id = ' . $id)->result_array();
		}

		function searchresource($term,$skip = null,$limit=null)
		{
			$limit = '';
			if($skip)
			{
				$limit = 'limit ' . $skip .',' . $limit;
			}

			return $this->db->query('Select * from post where title like "%' . $term . '%"')->result_array();
		}
	}

?>