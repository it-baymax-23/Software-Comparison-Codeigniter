<?php 
	class review extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function addreview($data,$id,$userid,$activated = 0)
		{
			$basicfield = array('rating'=>array('over_all'),'description'=>array('title','description','props','cons','resource'));

			$key_field = array();$value_field = array();
			foreach($data['rating'] as $ratings)
			{
				if(in_array($ratings['label'],$basicfield['rating']))
				{
					array_push($key_field,$ratings['label']);
					array_push($value_field,$ratings['value']);
				}
			}

			foreach($data['description'] as $description)
			{
				if(in_array($description['label'],$basicfield['description']))
				{
					array_push($key_field,$description['label']);
					array_push($value_field, '"' . $description['content'] . '"');
				}
			}

			$this->db->query('Insert into review(' . join(',',$key_field) . ',created_date,activate,user_id,product_id) Values(' . join(',',$value_field) . ',NOW(),' . $activated .',' . $userid . ',' . $id . ')');
			$reviewid = $this->db->query('Select max(id) as id from review')->result_array()[0]['id'];

			$meta_field = array();
			foreach($data['rating'] as $ratings)
			{
				if(!in_array($ratings['label'],$basicfield['rating']))
				{
					array_push($meta_field,'("' . $ratings['label'] . '","' . $ratings['value'] . '",' . $reviewid . ')');
				}
			}

			foreach($data['description'] as $description)
			{
				if(!in_array($description['label'],$basicfield['description']))
				{
					array_push($meta_field,'("' . $description['label'] . '","' . $description['content'] . '",' . $reviewid . ')');
				}
			}

			if(count($meta_field) > 0)
			{
				$this->db->query('insert into reviewmeta(meta_key,meta_value,review_id) Values' . join(',',$meta_field));
			}
			
			return array('success'=>true);
		}

		function getreviews($productid,$offset = null,$page = 10,$filter = array(),$sort="helpful")
		{

			$result_review = array(); $result_review_from_source = array();
			if($sort != 'newest' && $sort != 'oldest')
			{
				$result_review = $this->db->query('Select review.*,user.usertype,user.username,user.company,user.profile as profile,user.company_size as companysize from review inner join user on(review.user_id = user.id) where review.activate = 1 and review.resource not in (Select webid from resource where status = 0) and review.product_id = ' . $productid . ' order by review.' . $sort . ' DESC')->result_array();
				$result_review_from_source = $this->db->query('Select review.* from review where review.activate = 1 and review.resource not in (Select webid from resource where status = 0) and review.product_id = ' . $productid . ' and review.user_id = 0 order by review.' . $sort . ' DESC')->result_array();	
			}
			else
			{
				$query1 = 'Select review.*,user.usertype,user.username,user.company,user.profile as profile,user.company_size as companysize from review inner join user on(review.user_id = user.id) where review.activate = 1 and review.resource not in (Select webid from resource where status = 0) and review.product_id = ' . $productid . ' order by review.created_date';
				$query2 = 'Select review.* from review where review.activate = 1 and review.resource not in (Select webid from resource where status = 0) and review.product_id = ' . $productid . ' and review.user_id = 0 order by review.created_date';

				$sortaction = ' DESC';
				if($sort == 'oldest')
				{
					$sortaction = ' ASC';
				}
				$result_review = $this->db->query($query1 . $sortaction)->result_array();
				$result_review_from_source = $this->db->query($query2 . $sortaction)->result_array();		

			}

			$result_review = array_merge($result_review,$result_review_from_source);

			$filter_review = array();

			//var_dump($result_review);exit;
			$array_review = array();
			foreach($result_review as $reviews)
			{
				array_push($array_review,$reviews['id']);
			}

			$resource = $this->db->query('Select * from resource');

			$reviewmeta = array();
			if(count($array_review) != 0)
			{
				$review_meta = 	$this->db->query('Select * from reviewmeta where review_id in (' . join(',',$array_review) . ')')->result_array();
			}
			


			foreach($result_review as $key => $reviews)
			{
				$result_review[$key]['ratingextra'] = array(); $result_review[$key]['descriptionextra'] = array();
				foreach($review_meta as $metas)
				{
					if($reviews['id'] == $metas['review_id'])
					{
						if(strpos($metas['meta_key'],'profile.') > -1)
						{
							$name_key = preg_split('/profile./',$metas['meta_key'])[1];
							if($name_key == 'name')
							{
								$result_review[$key]['username'] = $metas['meta_value'];
							}
							else if($name_key == 'industrytype')
							{
								$result_review[$key]['industrytype'] = $metas['meta_value'];
							}
							else if($name_key == 'employeenum')
							{
								$result_review[$key]['company_size'] = $metas['meta_value'];
							}
							else if($name_key == 'user_period')
							{
								$result_review[$key]['user_period'] = $metas['meta_value'];
							}
							else if($name_key == 'position')
							{
								$result_review[$key]['address'] = $metas['meta_value'];
							}
							else if($name_key == 'company')
							{
								$result_review[$key]['company'] = $metas['meta_value'];
							}
							else if($name_key == 'companysize')
							{
								$result_review[$key]['company_size'] = $metas['meta_value'];	
							}
							continue;
						}
						if(is_numeric($metas['meta_value']))
						{
							array_push($result_review[$key]['ratingextra'],$metas);
						}
						else
						{
							array_push($result_review[$key]['descriptionextra'],$metas);	
						}
					}
				}

			}

			$filter_review = array();

			if(!isset($filter) || count($filter) == 0 || !$filter)
			{
				$filter_review = $result_review;
			}
			else
			{
				foreach($result_review as $result_reviews)
				{
					foreach($filter as $key=>$value)
					{
						if($key == 'rating')
						{
							if(array_search($result_reviews['over_all'],$value) > -1)
							{
								array_push($filter_review,$result_reviews);
							}
						}
						else if($key == 'company_size')
						{
							foreach($value as $filter_value)
							{
								if(isset($result_reviews['company_size']))
								{

									$filter_array = preg_split('/~/',$filter_value);
									$company_size = preg_split('/-/',$result_reviews['company_size']);

									if((int)$company_size[0] > (int)$filter_array[0] && (int)$company_size[0] < $filter_array[1])
									{
										array_push($filter_review,$result_reviews);
									}	
								}
								
							}
						}
						else if($key == 'industrytype')
						{
							if(isset($result_reviews['industrytype']))
							{
								if(array_search($result_reviews['industrytype'],$value) > -1)
								{
									array_push($filter_review,$result_review);
								}	
							}
							
						}
					}
				}	
			}
			
			$result_review = $filter_review;

			if($offset)
			{
				$result_review = array_slice($result_review,($offset - 1) * 10,$page);	
			}
			return $result_review;
		}

		function addhelp($help,$id)
		{
			$this->db->query('Update review set ' . $help . ' = ' . $help . '+ 1 where id = ' . $id);
			return $this->db->query('Select '.$help . ' from review where id = ' . $id)->result_array()[0][$help];
		}
		function getallreviews()
		{
			$reviews =  $this->db->query('Select review.*,product.logo,product.name from review inner join product on(review.product_id = product.id) where review.resource not in (Select webid from resource where status != 1) order by created_date desc')->result_array();
			$id_array = array();

			$metas = $this->db->query('Select * from reviewmeta where meta_key = "profile.name"')->result_array();
			$users = $this->db->query('Select * from user')->result_array();

			$id_meta = array();
			foreach($metas as $meta)
			{
				array_push($id_meta,$meta['review_id']);
			}
			$id_user = array();


			foreach($users as $user)
			{
				array_push($id_user,$user['id']);
			}

			foreach($reviews as $key => $review)
			{
				if(array_search($review['user_id'],$id_user) > -1)
				{
					$reviews[$key]['author'] = $users[array_search($review['user_id'],$id_user)]['username'];
				}
				else if(array_search($review['id'],$id_meta) > -1)
				{
					$reviews[$key]['author'] = $metas[array_search($review['id'],$id_meta)]['meta_value'];
				}
			}

			return $reviews;
		}

		function deletereview($id)
		{
			$this->db->query('Delete from review where id = ' . $id);
			$this->db->query('Delete from reviewmeta where review_id = ' . $id);
			return array('success'=>true);
		}

		function activate($id,$activate = false)
		{
			$activatedata = 0;

			if($activate == 'true')
			{
				$activatedata = 1;
			}

			$this->db->query('Update review set activate = ' . $activatedata . ' where id = ' . $id);
			return array('success'=>true);
		}

		function getreview($id)
		{
			$query = $this->db->query('Select review.*,product.name,product.description as productdescription,product.logo from review inner join product on(review.product_id = product.id) where review.id = ' . $id . ' and resource not in (Select webid from resource where status = 0)');
			$result_review = $query->result_array();

			$result_review[0]['extrarating'] = array();
			$result_review[0]['extradescription'] = array();

			$querymeta = $this->db->query('Select * from reviewmeta where review_id = ' . $id);
			$reviewmeta = $querymeta->result_array();

			foreach($reviewmeta as $reviewmetas)
			{
				if(strpos($reviewmetas['meta_key'],'profile.') > -1)
				{
					continue;
				}
				if(is_numeric($reviewmetas['meta_value']))
				{
					array_push($result_review[0]['extrarating'],$reviewmetas);
				}
				else
				{
					array_push($result_review[0]['extradescription'],$reviewmetas);
				}
			}

			return $result_review[0];
		}

		function resourceactive($data)
		{
			$activate = 0;
			if($data['status'] == 'true')
			{
				$activate = 1;
			}

			$this->db->query('Update resource set status = ' . $activate . ' where id = ' . $data['id']);
		}

		function updatereview($data,$id)
		{
			$basicfield = array('rating'=>array('over_all'),'description'=>array('title','description','props','cons','resource','created_date'));

			$value_field = array();
			foreach($data['rating'] as $ratings)
			{
				if(in_array($ratings['label'],$basicfield['rating']))
				{
					array_push($value_field,$ratings['label'] . '=' . $ratings['value']);
				}
			}

			foreach($data['description'] as $description)
			{
				if(in_array($description['label'],$basicfield['description']))
				{
					array_push($value_field, $description['label'] . ' = "' . $description['content'] . '"');
				}
			}

			$this->db->query('Update review set ' . join(',',$value_field) . ' where id = ' . $id);
			
			$reviewid = $id;
			$this->db->query('Delete from reviewmeta where review_id = '. $id);
			$meta_field = array();
			foreach($data['rating'] as $ratings)
			{
				if(!in_array($ratings['label'],$basicfield['rating']))
				{
					array_push($meta_field,'("' . $ratings['label'] . '","' . $ratings['value'] . '",' . $reviewid . ')');
				}
			}

			foreach($data['description'] as $description)
			{
				if(!in_array($description['label'],$basicfield['description']))
				{
					array_push($meta_field,'("' . $description['label'] . '","' . $description['content'] . '",' . $reviewid . ')');
				}
			}

			if(count($meta_field) > 0)
			{
				$this->db->query('insert into reviewmeta(meta_key,meta_value,review_id) Values' . join(',',$meta_field));
			}
			
			return array('success'=>true);						
		}

		function addsource($data)
		{
			$result = $this->checkresource($data);
			if($result['success'])
			{
				$key_field = array(); $value_field = array();
				foreach($data as $key => $value)
				{
					if($key == 'id'){
						continue;
					}

					if(!is_numeric($value))
					{
						$value = '"' . $value . '"';
					}

					if(!isset($data['id']))
					{
						array_push($key_field,$key);
						array_push($value_field,$value);	
					}
					else
					{
						array_push($value_field,$key . ' = ' . $value);
					}
				}

				if(isset($data['id']))
				{
					$this->db->query('Update resource set ' .join(',',$value_field));	
					return array('success'=>true,'message'=>'You have successfully updated this resource');
				}
				else
				{
					$this->db->query('Insert into resource(' . join(',',$key_field) . ') Values(' . join(',',$value_field) . ')');
					return array('success'=>true,'message'=>'You have added this resource successfully');
				}
			}
			else
			{
				return $result;
			}
		}

		function getsources()
		{
			$query = $this->db->query('Select * from resource');
			return $query->result_array();
		}
		function getsourcebyid($id)
		{
			$query = $this->db->query('Select * from resource where id = ' . $id);
			return $query->result_array()[0];
		}

		function checkresource($data)
		{
			$querystring = '';
			if(isset($data['id']))
			{
				$querystring .= 'Select * from resource where (website = "' .$data['website'] . '" or webid = "' . $data['webid'] . '") and id != ' . $data['id'];
			}
			else
			{
				$querystring = 'Select * from resource where website = "' .$data['website'] . '" or webid = "' . $data['webid'] . '"';
			}
			$query  = $this->db->query($querystring)->result_array();

			if(count($query) > 0)
			{
				$result = array('success'=>false);
				if($query[0]['website'] == $data['website'])
				{
					$result['message'] = 'You have added this website url already';
				}
				else
				{
					$result['message'] = 'You have added this website id already';
				}

				return $result;
			}
			else
			{
				return array('success'=>true);
			}
		}

		function deletesource($id)
		{
			$source = $this->db->query('Select * from resource where id = '. $id)->result_array()[0];
			$this->db->query('Delete from resource where id = '. $id);
			$this->db->query('Delete from reviewmeta where review_id in (Select id from review where resource = "' . $source['webid'] . '")');
			$this->db->query('Delete from review where resource = "' . $source['webid'] . '"');
		}

		function getreviewby($user)
		{
			return $this->db->query('Select review.*,product.logo,product.name ,user.username from review inner join product on(review.product_id = product.id) inner join user on(review.user_id = user.id) where review.resource not in (Select webid from resource where status != 1) and review.user_id = ' . $user . ' order by created_date desc')->result_array();
		}
	}
?>