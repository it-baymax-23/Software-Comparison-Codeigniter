<?php

	if(!function_exists('role_manage'))
	{
		function role_manage($page,$selected)
		{
			$ci = @get_instance();
			$session = $ci->session->user;

			if($session['usertype'] == 'buyer')
			{
				if($page == 'buyer' && $selected != 'edituserbuyer')
				{
					redirect($_SERVER['HTTP_REFERER']);
				}
				else if($page == 'review' && ($selected != 'getbyuser' && $selected !='edit'))
				{
					redirect($_SERVER['HTTP_REFERER']);	
				}
				else if($page != 'buyer' && $page != 'vendor')
				{
					redirect($_SERVER['HTTP_REFERER']);		
				}	
			}
			
		}
	} 

	if(!function_exists('session_manager'))
	{
		function session_manager(){
			$ci = @get_instance();
			$session = $ci->session->user;

			if(!$session)
			{
				redirect('/signin');
			}	
		}
	}

	if(!function_exists('role_set'))
	{
		function role_set($usertype)
		{
			if($usertype != 'admins')
			{
				$vendor = file_get_contents(__DIR__ . '/' . $usertype . '.json');
				return json_decode($vendor,true);	
			}
			else
			{
				$ci = @get_instance();
				$session = $ci->session->user;
				return unserialize($session['role_manage']);
			}
		}
	}

	if(!function_exists('get_role'))
	{
		function get_role(){
			$ci = @get_instance();
			$session = $ci->session->user;
			return $session['usertype'];
		}
	}

	if(!function_exists('display_menu'))
	{
		function display_menu($menu)
		{
			$ci = &get_instance();
			$session = $ci->session->user;

			foreach($menu as $key => $value)
			{
				$url = '#';

				$value['href'] = str_replace('(:id)',$session['id'],$value['href']);
				if($value['href'] != '#')
				{
					$url = base_url() . $value['href'];
				}

				$class = '';
				if(isset($value['children']))
				{
					$class = 'has-sub';
				}
				echo '<li class="' . $class . '"><a class="js-arrow" href="' . $url . '">';
				if(isset($value['icon']))
				{
					echo '<i class="' . $value['icon'] . '"></i>';
				}

				echo $value['name'] . '</a>';
				
				if(isset($value['children'])){
					echo '<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">';
					display_menu($value['children']);
					echo '</ul>';
				}

				echo '</li>';
			}
		}
	}

	if(!function_exists('admin_role_menu'))
	{
		function admin_role_menu()
		{
			$ci = &get_instance();
			$session = $ci->session->user;
			$menu = role_set($session['usertype']);

			display_menu($menu);

		}
	}

	if(!function_exists('name_from_role'))
	{
		function name_from_role($role)
		{
			$array = array();
			foreach($role as $roles)
			{
				array_push($array,$roles['name']);
				if(isset($roles['children']) && count($roles['children']) > 0)
				{
					$array = array_merge($array,name_from_role($roles['children']));
				}
			}

			return $array;
		}
	}
	if(!function_exists('tree_display'))
	{
		function tree_display($tree_admin,$roles = array())
		{
			$names = name_from_role($roles);

			foreach($tree_admin as $key => $value)
			{
				$attribute = 'attr_href = "' . $value['href'].'"';
				$jstree = '';

				$jstree = array();
				if(isset($value['icon']))
				{
					$jstree = array('icon'=>$value['icon']);
				}

				if(in_array($value['name'], $names))
				{
					$jstree = array_merge($jstree,array('selected'=>true,'opened'=>true));
				}

				if(count($jstree) > 0)
				{
					$jstree = json_encode($jstree);
					$jstree = "data-jstree='" . $jstree . "'";
				}
				else
				{
					$jstree = '';
				}

				echo '<li ' . $attribute . ' ' . $jstree .'>' . $value['name'];

				if(isset($value['children']))
				{
					echo '<ul>';
					tree_display($value['children'],$roles);
					echo '</ul>';
				}

				echo '</li>';
			}
		}
	}

	if(!function_exists('role_set_tree'))
	{
		function role_set_tree($roles = array())
		{
			$tree_admin = file_get_contents(__DIR__ . '/administrator.json');
			$tree_admin = json_decode($tree_admin,true);
			tree_display($tree_admin,$roles);
		}
	}

?>