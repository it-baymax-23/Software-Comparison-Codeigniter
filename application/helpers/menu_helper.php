<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('menu_init_func'))
{
	function menu_init_func($menu){
		foreach($menu as $key => $menus)
		{
			if(!isset($menus['type']))
			{	
				echo '<li>' . $menus['title'];
			}
			else if($menus['type'] == 'page')
			{
				echo '<li><a href="' . base_url() . $menus['href'] . '">' . $menus['title'];	

				if($menus['href'] == 'categories')
				{
					echo '<i class="fas fa-angle-down m-l-5"></i>';
				}

				echo '</a>';
			}
			else
			{
				echo '<li><a href="' . $menus['href'] . '">' . $menus['title'] . '</a>';	
			}
			
			

			if(isset($menus['children']) && count($menus['children']) > 0)
			{
				echo '<ul>';
				menu_init_func($menus['children']);
				echo '</ul>';
			}

			echo '</li>';
		}
	}
}

if(!function_exists('page_menu_init'))
{
	function page_menu_init($menu)
	{
		foreach($menu as $menus)
		{
			$children = '';
			if(isset($menus['children']))
			{
				$children = 'has-children';
			}
			echo '<li class="page_menu_item ' . $children . '">';
			echo '<a href="' . base_url(). $menus['href'] . '">' . $menus['title'] . '</a>';
			if(isset($menus['children']))
			{
				echo '<ul class="page_menu_selection">';
				page_menu_init($menus['children']);
				echo '</ul>';
			}
			echo '</li>';
		}
	}
}

if(!function_exists('star_display')){
	function star_display($score,$count)
	{
		if($score > 0)
		{
			$score = $score / $count;
		}

		$value_score = floor($score);

		$half_score = $score - $value_score;

		for($index = 0; $index<$value_score;$index++)
		{
			echo '<i class="fas fa-star full m-l-5"></i>';
		}

		if($half_score > 0)
		{
			echo '<i class="fas fa-star-half full m-l-5"></i>';
		}
		else if($value_score != 5)
		{
			echo '<i class="fas fa-star empty m-l-5"></i>';	
		}
		for($index = $value_score + 1 ;$index<5;$index++)
		{
			echo '<i class="fas fa-star empty m-l-5"></i>';
		}
	}
}

if(!function_exists('get_score'))
{
	function get_score($score,$count)
	{
		if($score > 0)
		{
			$score = $score / $count;
		} 

		return $score;
	}
}

if(!function_exists('display_date'))
{
	function display_date($date)
	{
		$datestring = date('Y d m',strtotime($date));

		 $date_array = preg_split('/ /',$datestring);

		 $arrayofdate = array('year'=>$date_array[0],'day'=>$date_array[1],'month'=>display_month($date_array[2]));

		 return $arrayofdate;
	}
}

if(!function_exists('display_month'))
{
	function display_month($month)
	{
		switch($month)
		{
			case '1':
			{
				return 'January';
			}
			case '2':
			{
				return 'February';
			}
			case '3':
			{
				return 'March';
			}
			case '4':
			{
				return 'April';
			}
			case '5':
			{
				return 'May';
			}
			case '6':
			{
				return 'June';
			}
			case '7':
			{
				return 'July';
			}
			case '8':
			{
				return 'April';
			}
			case '9':
			{
				return 'September';
			}
			case '10':
			{
				return 'October';
			}
			case '11':
			{
				return 'November';
			}
			case '12':
			{
				return 'December';
			}
		}
	}
}