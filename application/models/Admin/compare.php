<?php 
	class compare extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function savecompare($data)
		{
			$result = $this->checkcompare($data);
			if($result['success'])
			{

				$data['content'] = str_replace('"',"'",$data['content']);

				$this->db->query('Insert into comparetable(name,slug,content,activated,created_date) Values("' . $data['name'] . '","' . $data['slug'] . '","'. $data['content'] . '",1,NOW())');
				return array('success'=>true,'id'=>$this->db->query('Select max(id) as id from comparetable')->result_array()[0]['id']);
			}
			else
			{
				return $result;
			}
		}

		public function checkcompare($data)
		{
			$table = $this->db->query('Select * from comparetable where name = "' . $data['name'] . '" or slug = "' . $data['slug'] . '"')->result_array();
			if(count($table) > 0)
			{
				if($table[0]['name'] == $data['name'])
				{
					return array('success'=>false,'message'=>"The Name can't be duplicated");
				}
				else
				{
					return array('success'=>false,'message'=>"The Slug can't be duplicated");
				}
			}
			else
			{
				return array('success'=>true);
			}
		}

		public function getcompare($field = array())
		{
			$value_field = array();
			foreach($field as $key=>$value)
			{
				if($key != 'id')
				{
					$value = str_replace('"',"'",$value);
					$value = '"' . $value . '"';
				}

				array_push($value_field,$key . '=' . $value);
			}

			$where = '';
			if(count($value_field) > 0)
			{
				$where = 'where ' . join(' and ',$value_field);
			}
			return $this->db->query('Select * from comparetable ' . $where)->result_array();
		}

		public function updatecompare($data)
		{
			$data['content'] = str_replace('"',"'",$data['content']);

			$this->db->query('Update comparetable set name = "' . $data['name'] . '",content="' . $data['content'] . '",slug="' . $data['slug'] . '" where id = ' . $data['id']);
			return array('success'=>true,'id'=>$data['id']);
		}

		public function activate($data)
		{
			$this->db->query('Update comparetable set activated = ' . $data['activated'] . ' where id = ' . $data['id']);
			return array('success'=>true);
		}

		public function delete($id)
		{
			$this->db->query('Delete from comparetable where id = ' . $id);
			return array('success'=>true);
		}
	}
?>