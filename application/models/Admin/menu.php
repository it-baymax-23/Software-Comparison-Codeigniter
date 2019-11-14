<?php 
	class menu extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function savemenu($data,$usertype)
		{
			$datastring = serialize($data);
			$menudata = $this->db->query('Select * from setting where setting_key = "menu" and usertype="' . $usertype . '"')->result_array();

			if(count($menudata) > 0)
			{
				$this->db->query("Update setting set setting_value = '" . $datastring . "' where id = " . $menudata[0]['id']);
			}
			else
			{
				$this->db->query("Insert into setting(setting_key,setting_value,usertype) Values('menu','" . $datastring . "','" . $usertype . "')");
			}
		}

		public function getmenu($usertype = null)
		{
			$menudata = $this->db->query('Select * from setting where setting_key = "menu" and usertype = "' . $usertype . '"')->result_array();
			if(count($menudata) > 0)
			{
				return unserialize($menudata[0]['setting_value']);
			}
			else
			{
				return array();
			}
		}

		public function savelogo($url)
		{
			$logos = $this->db->query('Select * from setting where setting_key = "logo"');
			if(count($logos) > 0)
			{
				$this->db->query('Update setting set setting_value = "' . $url . '" where setting_key = "logo"');
			}
			else
			{
				$this->db->query('Insert into setting(setting_key,setting_value) Values("logo","'.$url . '")');
			}
		}
	}
?>