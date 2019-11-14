<?php 
	class product extends CI_Model
	{
		function __construct()
		{
			
		}

		function saveproduct($product)
		{
			$key_field = array(); $value_field = array();
			$update_field = array();
			foreach($product as $key => $value)
			{
				if($key == 'feature' || $key == 'undefined' || $key == 'id')
				{
					continue;
				}
				else
				{
					if(is_array($value))
					{
						//$value = preg_replace('/\'/','&quote',$value);
						$value = "'" . preg_replace('/\'/','quote',serialize($value)) . "'"; 
					}

					else if(!is_numeric($value))
						
					{
						$value = '"' . $value . '"';
					}	
					if(!isset($product['id']))
					{
						array_push($key_field,$key);
						array_push($value_field,$value);	
					}
					else
					{
						array_push($update_field, $key . ' = ' . $value);
					}
				}
			}

			if(isset($product['id']))
			{
				$this->db->query('Update product set ' . join(',',$update_field) . ' where id = ' . $product['id']);
			}
			else
			{
				$this->db->query('Insert into product(' . join(',',$key_field) . ') Values(' . join(',',$value_field) . ')');	
			}
			

			$id = $this->db->query('Select Max(id) as id from product')->result_array()[0]['id'];

			if(isset($product['id']))
			{
				$id = $product['id'];
			}

			if(isset($product['id']))
			{
				$this->db->query('Delete from productmeta where product_id = ' . $id);
			}

			$query = array();
			foreach($product['feature'] as $key => $features)
			{
				$subquery = '('.$id . ',' . $key . ',"' . $features . '","active")';
				array_push($query,$subquery);
			}

			$this->db->query('insert into productmeta(product_id,feature_key,value,status) Values' . join(',',$query));
			return array('success'=>true);
		}

		function getproductbyuser($id)
		{
			$result = $this->db->query('Select * from product where user_id = ' . $id)->result_array();


			$result_product = array();
			$id_array = array();
			foreach($result as $results)
			{
				foreach($results as $key => $value)
				{
					if($this->is_serialized($value))
					{
						$value = preg_replace('/quote/',"'",$value);
						$value = unserialize($value);
						$results[$key] = $value;
					}	
				}
				
				$results['review'] = array('score'=>0,'count'=>0);
				$result_product[$results['id']] = $results;
				array_push($id_array,$results['id']);
			}
			
			if(count($id_array) > 0)
			{
				$reviews = $this->db->query('Select sum(over_all) as score,count(*) as count,product_id from review where product_id in (' . join(',',$id_array) . ') and resource not in (Select webid from resource where status = 0) group by product_id')->result_array();

				foreach($reviews as $review)
				{
					$result_product[$review['product_id']]['review'] = $review;
				}

				
			}
			return $result_product;	
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
		function getallproduct()
		{
			$query = $this->db->query('Select * from product');
			$product = $query->result_array();

			$categories = $this->db->query('Select * from category')->result_array();

			$data_category = array();
			foreach($categories as $category)
			{
				$data_category[$category['id']] = $category['name'];
			}

			foreach($product as $key => $products)
			{
				$product_category = preg_split('/[,]/',$products['category']);

				$category_array = array();
				foreach($product_category as $value)
				{
					if(isset($data_category[$value]) && $data_category[$value])
					{
						array_push($category_array,$data_category[$value]);
					}
				}


				$product[$key]['category'] = join(',',$category_array);
			}

			return $product;
		}

		function check($id)
		{
			if(count($this->db->query('Select * from product where id = '. $id)->result_array()) > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function searchproduct($name,$skip = null,$limit = null)
		{
			$limit = '';
			if($skip)
			{
				$limit = 'limit ' . $skip .',' . $limit;
			}

			$name = strtolower($name);

			$product = $this->db->query('Select * from product where LOWER(name) like "%' .$name . '%" ' . $limit)->result_array();

			$id_array = array();
			foreach($product as $key => $products)
			{
				$product[$key]['review'] = 0;$product[$key]['count'] = 0;
				array_push($id_array,$products['id']);
			}	

			if(count($id_array) > 0)
			{
				$review = $this->db->query('Select * from review where product_id in (' . join(',',$id_array) . ')')->result_array();
				foreach($review as $reviews)	
				{
					$index = array_search($reviews['product_id'],$id_array);
					$product[$index]['review'] += $reviews['over_all'];
					$product[$index]['count'] ++;
				}
			}
			
			return $product;
		}

		function search($search)
		{
			$search = strtolower($search);

			return $this->db->query('Select product.*,user.company as company from product,user where (LOWER(product.name) like "%' . $search . '%" or product.user_id in (Select id from user where LOWER(company) like "%' . $search . '%")) and product.user_id = user.id')->result_array();
		}

		function getproductbyid($id)
		{
			$query = $this->db->query('Select product.*,count(review.product_id) as review,sum(review.over_all) as score from product,review where product.id = ' . $id . ' and review.product_id = ' . $id);
			$product = $query->result_array();

			$product[0]['category'] = $this->db->query('Select * from category where id in (' . $product[0]['category'] . ')')->result_array();

			
			$product[0]['product_detail'] = str_replace('quote','\'',$product[0]['product_detail']);
			$product[0]['product_detail'] = unserialize($product[0]['product_detail']);
			$product[0]['screenshot'] = unserialize($product[0]['screenshot']);
			
			$feature_array = $this->db->query('Select * from feature')->result_array();
			$feature_data = array();
			foreach($feature_array as $feature_arrays)
			{
				$feature_data[$feature_arrays['id']] = array('name'=>$feature_arrays['name'],'type'=>$feature_arrays['type']);
			}

			$features = $this->db->query('Select * from productmeta where product_id = ' . $id)->result_array();

			$product[0]['feature'] = array();
			foreach($features as $feature)
			{
				
				$product[0]['feature'][$feature['feature_key']] = array_merge($feature_data[$feature['feature_key']],array('value'=>$feature['value']));
			}

			return $product;
		}

		function delete($data)
		{
			$this->db->query('Delete from product where id in (' . join(',',$data) . ')');
			$this->db->query('Delete from productmeta where product_id in (' . join(',',$data) . ')');
			return array('success'=>true);
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

				$this->db->query('update product set popular = ' . $popular . ' where id = ' . $data['id']);
				return array('successs'=>true);	
			}
			else
			{
				return array('successs'=>false);	
			}
		}	

		function getpopularproduct()
		{
			$query = $this->db->query('Select * from product where popular = 1');
			return $query->result_array();
		}
		
		function activate($data)
		{
			if($data['id'])
			{
				$popular = 0;
				if($data['popular'])
				{
					$popular = 1;
				}

				$this->db->query('update product set activated = ' . $popular . ' where id = ' . $data['id']);
				return array('successs'=>true);	
			}
			else
			{
				return array('successs'=>false);	
			}	
		}

		function getfeaturebyproductid($id,$cat_id)
		{
			$features =  $this->db->query('Select * from productmeta where product_id = ' . $id . ' and category_id = ' . $cat_id)->result_array();

			$feature_array = array();
			foreach($features as $feature)
			{
				$feature_array[$feature['feature_key']] = $feature['value'];
			}

			return $feature_array;
		}

		function savereviewsetting($data)
		{
			$this->db->query('Update product set resource_id = "' . $data['resource_id'] . '",producturl="' . $data['producturl'] . '" where id = ' . $data['product_id']);
			return true;
		}

		function getfeature($productid)
		{
			return $this->db->query('Select * from productmeta where product_id = '. $productid)->result_array();
		}
	}
?>