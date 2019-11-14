<?php 
	class category extends CI_Model
	{
		function __construct()
		{
			parent::__construct();			
		}

		function add($data)
		{
			$check = $this->check($data);
			
			if($check['success'])
			{

				$field = array(); $value_field = array();
				foreach($data as $key => $value)
				{
					if(is_array($value))
					{
						$value = "'" . serialize($value) . "'";
					}
					else if(!is_numeric($value)){
						$value = "'" . $value . "'";
					}

					array_push($field,$key);
					array_push($value_field,$value);
				}

				$this->db->query('insert into category(' . join(',',$field) .') Values(' .join(',',$value_field) . ')');
				return array('success'=>true,'message'=>'Successfully Added Your Category');
			}
			else
			{
				return $check;
			}
		}

		function update($data){
			$check = $this->check($data);
			
			if($check['success'])
			{

				$value_field = array();
				foreach($data as $key => $value)
				{
					if($key == 'id')
					{
						continue;
					}
					if(is_array($value))
					{
						$value = "'" . serialize($value) . "'";
					}
					else if(!is_numeric($value)){
						$value = "'" . $value . "'";
					}

					array_push($value_field,$key . '=' . $value);
				}

				if($data['id'])
				{
					$this->db->query('update category set ' . join(',',$value_field) . ' where id = ' . $data['id']);
					return array('success'=>true,'message'=>'You have Successfully update your category');
				}
				else
				{
					$this->db->query('insert into category(' . join(',',$field) .') Values(' .join(',',$value_field) . ')');
					return array('success'=>true,'message'=>'Successfully Added Your Category');
				}
				
				
			}
			else
			{
				return $check;
			}
		}
		function getmaincategory()
		{
			$query = $this->db->query('Select * from category where category_type = "main"');
			return $query->result_array();
		}

		function getfeatures($id)
		{
			$query = $this->db->query('Select * from category where id = ' . $id);
			$category = unserialize($query->result_array()[0]['feature']);
			
			$feature_query = $this->db->query('Select * from feature where id in (' . join(',',$category) . ')');
			return $feature_query->result_array();
 		}

 		function getfeatures_by_field($field)
 		{
 			$fields = array();
 			foreach($field as $key => $value)
 			{
 				array_push($fields,$key . '="' . $value . '"');
 			}
 			$query = $this->db->query('Select * from category where category_type = "sub" and ' .join(' and ',$fields));
 			
			$category = unserialize($query->result_array()[0]['feature']);
			
			$feature_query = $this->db->query('Select * from feature where id in (' . join(',',$category) . ')');
			return $feature_query->result_array();	
 		}
		function getallcategory()
		{
			$query = $this->db->query('Select * from category where category_type != "main"');
			$result = $query->result_array();

			
			return $result;
		}

		function getcategories()
		{
			$query = $this->db->query('Select * from category order by name');
			$prepare_category = $query->result_array();
			$result_main = array();
			foreach($prepare_category as $key => $prepare_categories){
				if($prepare_categories['category_type'] == 'main')
				{
					$prepare_categories['sub'] = array();
					array_push($result_main,$prepare_categories);
				}
			}


					
			foreach($prepare_category as $key => $value)
			{				
				if($value['rootcategoryid'])
				{
					foreach($result_main as $key => $category)
					{
						if($category['id'] == $value['rootcategoryid'])
						{
							array_push($result_main[$key]['sub'],$value);
						}
					}
				}
			}
			
			return $result_main;
		}

		function delete($ids)
		{
			$this->db->query('Delete from category where id in (' . join(',',$ids) .')');
			return array('success'=>true,'message'=>'You have Successfully deleted categories');
		}

		function check($data)
		{
			$querystring = 'Select * from category where name = "' . $data['name'] .'" and category_type = "' . $data['category_type'] . '"';
			if(isset($data['id']))
			{
				$querystring .= ' and id !=' . $data['id'];
			}
			$query = $this->db->query($querystring);
			if(count($query->result_array()) > 0)
			{
				return array('success'=>false,'message'=>'The Category You Have Typed in is already exist');
			}
			else
			{
				return array('success'=>true);
			}
		}

		function get_all_product($id)
		{
			$product = $this->db->query('Select product.* from product')->result_array();

			$users = $this->db->query('Select * from user')->result_array();
			$user_array = array();
			foreach($users as $user)
			{
				$user_array[$user['id']] = $user['username'];
			}


			$array_id = array(); $array_product = array();
			foreach($product as $key => $products)
			{
				$products['category'] = preg_split('/[,]/',$products['category']);

				if(in_array($id,$products['category']))
				{
					foreach($products as $key_product => $value)
					{
						if($this->is_serialized($value))
						{	
							$value = preg_replace('/quote/',"'",$value);
							$value = unserialize($value);

							$products[$key_product] = $value;
						}
					}

					if($user_array[$products['user_id']])
					{
						$products['user'] = $user_array[$products['user_id']];	
					}
					else
					{
						$products['user'] = '';	
					}
					
					$products['review'] = array('score'=>0,'count'=>0);
					$array_product[$products['id']] = $products;
					array_push($array_id,$products['id']);	
				}				
			}

			if(count($array_id) > 0)
			{
				$reviews = $this->db->query('Select sum(over_all) as score,count(*) as count,product_id from review where product_id in (' . join(',',$array_id) . ') and resource not in (Select webid from resource where status = 0) group by product_id')->result_array();

				foreach($reviews as $review)
				{
					$array_product[$review['product_id']]['review'] = $review;
				}	
			}
			
			return $array_product;
		}


		function is_serialized( $data ) {
		    // if it isn't a string, it isn't serialized
		    if ( !is_string( $data ) )
		        return false;
		    $data = trim( $data );
		    if ( 'N;' == $data )
		        return true;
		    if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
		        return false;
		    switch ( $badions[1] ) {
		        case 'a' :
		        case 'O' :
		        case 's' :
		            if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
		                return true;
		            break;
		        case 'b' :
		        case 'i' :
		        case 'd' :
		            if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
		                return true;
		            break;
		    }
		    return false;
		}

		function getcategoryname($id)
		{
			return $this->db->query('Select * from category where id = ' . $id)->result_array()[0]['name'];
		}
		function getcategoryidbyname($name)
		{
			return $this->db->query('Select * from category where name = "' . $name . '" and category_type="sub"')->result_array()[0]['id'];
		}

		function getcategorybyname($name)
		{	
			return $this->db->query('Select * from category where name = "' . $name . '" and category_type = "sub"')->result_array()[0];
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
				$this->db->query('Update category set popular = ' .$popular . ' where id = ' . $data['id']);
				return array('success'=>true);
			}
			else
			{
				return array('success'=>false);
			}
		}

		function getpopularcategory()
		{
			$categories  = $this->db->query('Select * from category where popular = 1')->result_array();
			$id_array = array();
			foreach($categories as $key => $category)
			{
				array_push($id_array,$category['rootcategoryid']);
			}

			if(count($id_array)>0)
			{
				$category_main = $this->db->query('Select id,name from category where id in (' . join(',',$id_array) . ') and category_type="main"')->result_array();
				foreach($category_main as $categories_main)
				{
					foreach($id_array as $key => $value)
					{
						if($id_array[$key] == $categories_main['id'])
						{
							$categories[$key]['main'] = $categories_main['name'];
						}
					}
				}
			}

			return $categories;
			
		}

		function getcategorybyid($id)
		{
			$category = $this->db->query('Select * from category where id = ' . $id )->result_array()[0];
			return $category;
			
		}

		function searchcategory($name,$skip = null,$limitnum = null)
		{
			$limit = '';
			if($skip)
			{
				$limit = 'limit ' . $skip .',' . $limitnum;
			}

			return $this->db->query('Select * from category where name like "%' . $name . '%" and category_type = "sub" ' . $limit)->result_array();
		}

		function get_all_product_by_field($field)
		{
			$fields = array();
			foreach($field as $key => $value)
			{
				array_push($fields,$key . '= "' . $value . '"');
			}


			$product = $this->db->query('Select product.* from product')->result_array();

			$category = $this->db->query('Select id from category where category_type = "sub" and ' . join(' and ',$fields ))->result_array()[0];

			$users = $this->db->query('Select * from user')->result_array();
			$user_array = array();
			foreach($users as $user)
			{
				$user_array[$user['id']] = $user['username'];
			}


			$array_id = array(); $array_product = array();
			foreach($product as $key => $products)
			{
				$products['category'] = preg_split('/[,]/',$products['category']);

				if(in_array($category['id'],$products['category']))
				{
					foreach($products as $key_product => $value)
					{
						if($this->is_serialized($value))
						{	
							$value = preg_replace('/quote/',"'",$value);
							$value = unserialize($value);

							$products[$key_product] = $value;
						}
					}

					if(isset($user_array[$products['user_id']]))
					{
						$products['user'] = $user_array[$products['user_id']];	
					}
					else
					{
						$products['user'] = '';	
					}
					
					$products['review'] = array('score'=>0,'count'=>0);
					$array_product[$products['id']] = $products;
					array_push($array_id,$products['id']);	
				}				
			}

			if(count($array_id) > 0)
			{
				$reviews = $this->db->query('Select sum(over_all) as score,count(*) as count,product_id from review where product_id in (' . join(',',$array_id) . ') and resource not in (Select webid from resource where status = 0) group by product_id')->result_array();

				foreach($reviews as $review)
				{
					$array_product[$review['product_id']]['review'] = $review;
				}	
			}
			
			return $array_product;
		}
	}
?>