<?php 
	class HomeController extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/category');
			$this->load->model('Admin/product');
			$this->load->model('Admin/user');
			$this->load->model('Admin/review');
			$this->load->model('Admin/blog');
			$this->load->model('Admin/menu');
			$this->load->model('auth');
		}

		
		function categories()
		{
			session_manager();
			$category = $this->category->getcategories();
			$popularcategory = $this->category->getpopularcategory();
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			$header = array('menu'=>$menu);
			$this->load->view('Frontend/header',$header);
			$this->load->view('Frontend/categories',array('category'=>$category,'popular_cat'=>$popularcategory));
			$this->load->view('Frontend/footer');
		}

		function index()
		{
			session_manager();
			$menu = $this->menu->getmenu();
			$enable = false;
			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}

			foreach($menu as $menus)
			{
				if($menus['href'] == 'categories')
				{
					$enable = true;
				}
			}


			$data = array();
			$data['menu'] = $menu;

			if($enable)
			{
				$data['category'] = $this->category->getcategories();
			}
			$this->load->view('Frontend/header',$data);
			$category['popularproduct'] = $this->product->getpopularproduct();
			$category['user'] = $this->user->getpopularvendor();
			$category['review'] = array_slice($this->review->getallreviews(),0,6);
			$category['popular_category'] = $this->category->getpopularcategory();
			$this->load->view('Frontend/home',$category);
			$this->load->view('Frontend/footer');
		}

		function category($cat_name = null,$sub_name = null)
		{
			session_manager();
			if(isset($cat_name) && isset($sub_name))
			{
				$menu = $this->menu->getmenu();
				$cat_name = preg_replace('/-/',' ',$cat_name);
				$sub_name = preg_replace('/-/',' ',$sub_name);

				if($this->session->userdata('frontenduser'))
				{
					$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
				}
				$allproduct = array('product'=>$this->category->get_all_product_by_field(array('name'=>$sub_name)),'categoryname'=>$sub_name,'features'=>$this->category->getfeatures_by_field(array('name'=>$sub_name)),'id'=>str_replace(' ','-',$sub_name),'cat_name'=>$cat_name);

				if($this->input->post())
				{
					$filter = $this->input->post();
					$products = array();
					foreach($allproduct['product'] as $key => $product)
					{
						$enable = true;
						if(isset($filter['rating']))
						{
							$enable = false;
							$ratingarray = array($filter['rating']);
							foreach($ratingarray as $ratings)
							{
								$rating_array = preg_split('[~]',$ratings);


								if($product['review']['count'] == '0')
								{
									if($rating_array[0] == '0')
									{
										$enable = true;
										break;
									}
									continue;
								}


								if($product['review']['score'] >= $rating_array[0] * $product['review']['count'] && $product['review']['score'] <= $rating_array[1] * $product['review']['count'])
								{
									$enable = true;
									break;
								}
							}
						}

						if(isset($filter['deployment']) && $enable)
						{
							$deploy = preg_split('[,]',$product['product_detail']['deploy']);
							foreach($filter['deployment'] as $deployments)
							{
								if(!in_array($deployments,$deploy))
								{
									$enable = false;
									break;
								}
							}
						}

						if(isset($filter['features']) && $enable)
						{
							
							$id = $this->category->getcategorybyname($sub_name)['id'];
							$features_array = $this->product->getfeaturebyproductid($product['id'],$id);
							foreach($filter['features'] as $features)
							{
								if($features_array[$features] == 'false')
								{
									$enable = false;
									break;
								}								
							}	
						}

						if($enable)
						{
							$products[$key] = $product;
						}
					}

					$allproduct['product'] = $products;

					$allproduct['filter'] = $this->input->post();
				}
			
				foreach($menu as $menus)
				{
					if($menus['href'] == 'categories')
					{
						$enable = true;
					}
				}

				$related_category = $this->category->getcategorybyname($sub_name)['related_category'];

				if($related_category)
				{
					$related_category = unserialize($related_category);
				}
				else
				{
					$related_category = array();
				}

				$categories = $this->category->getcategories();
				$cat = array();
				foreach($categories as $key => $maincat)
				{
					$sub = array();
					foreach($maincat['sub'] as $maincats)
					{
						if(in_array($maincats['id'],$related_category))
						{
							array_push($sub,$maincats);
						}
					}
					if(count($sub) > 0)
					{
						$maincat['sub'] = $sub;
						array_push($cat,$maincat);
					}
				}

				$allproduct['related_category'] = $cat;
				$data = array();
				$data['menu'] = $menu;

				if($enable)
				{
					$data['category'] = $this->category->getcategories();
				}
				$this->load->view('Frontend/header',$data);
				$this->load->view('Frontend/product',$allproduct);
				$this->load->view('Frontend/footer',array('page'=>'productlist'));	
			}
		}

		function productdetail($categoryname,$id,$pages,$action = null)
		{
			session_manager();

			if($pages == 'comparision')
			{
				$this->compare($categoryname,$id,$pages);
			}
			else
			{
				$categoryname = str_replace('-',' ',$categoryname);
				$menu = $this->menu->getmenu();

				if($this->session->userdata('frontenduser'))
				{
					$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
				}


				$category = array('menu'=>$menu,'page'=>'detail');
				foreach($menu as $menus)
				{
					if($menus['href'] == 'categories')
					{
						$enable = true;
					}
				}


				if($enable)
				{
					$category['category'] = $this->category->getcategories();
				}

				$products = array('products'=>$this->product->getproductbyid($id));

				$category_feature = array();
				$subcategory = $this->category->getallcategory();

				$products['products'][0]['user'] = $this->user->getuserbyid($products['products'][0]['user_id']);
				$products['category_feature'] = $category_feature;
				$products['user'] = $this->session->userdata('frontenduser');
				$products['page'] = $pages;
				$products['category'] = $categoryname;
				$products['main'] = $this->category->getcategoryname($this->category->getcategorybyname($categoryname)['rootcategoryid']);


				$reviews = $this->review->getreviews($products['products'][0]['id']);

				$products['products'][0]['allreview'] = array('ease_use'=>array('score'=>0,'count'=>0),'customer_service'=>array('score'=>0,'count'=>0),'feature_function'=>array('score'=>0,'count'=>0),'value_money'=>array('score'=>0,'count'=>0));
				$available_key = array('EASE OF USE'=>'ease_use','CUSTOMER SUPPORT'=>'customer_service','VALUE FOR MONEY'=>'value_money','FEATURES & FUNCTIONALITY'=>'feature_function');
				
				$data_review = [0,0,0,0,0];
				foreach($reviews as $allreview)
				{
					
					$data_review[$allreview['over_all'] - 1] ++;

					foreach($allreview['ratingextra'] as $key_extra => $value_extra)
					{
						if(isset($available_key[strtoupper($value_extra['meta_key'])]))
						{
							$products['products'][0]['allreview'][$available_key[strtoupper($value_extra['meta_key'])]]['score'] += $value_extra['meta_value'];
							$products['products'][0]['allreview'][$available_key[strtoupper($value_extra['meta_key'])]]['count'] ++;
						}
					}
				}

				$products['review'] = array_slice($reviews,0,10);
				$products['countreview'] = count($reviews);
				$this->load->view('Frontend/header',$category);

				if(!$action)
				{
					$this->load->view('Frontend/productdetail',$products);
					if($pages == 'reviews')
					{
						$products['data_score'] = $data_review;
					}
					$this->load->view('Frontend/productdetail/' . $pages,$products);

				}
				else if($action == 'write' && $pages == 'reviews')
				{
					$products['action'] = $action;
					$this->load->view('Frontend/review/reviewheader',$products);
					$this->load->view('Frontend/review/write',$products);
				}
											
				$this->load->view('Frontend/footer',array('page'=>'detail'));	
			}
			
		}

		function reviewcount()
		{
			$data = $this->input->post();
			if(!isset($data['filter']))
			{
				$data['filter'] = array();
			}
			$reviews = $this->review->getreviews($data['id'],null,10,$data['filter']);
			echo count($reviews);
		}

		function reviewhelp()
		{
			$data = $this->input->post('class');
			$id = $this->input->post('id');
			echo $this->review->addhelp($data,$id);
		}
		function getreview()
		{
			$data = $this->input->post();
			if(!isset($data['filter']))
			{
				$data['filter'] = array();
			}
			$reviews = $this->review->getreviews($data['id'],null,10,$data['filter'],$data['sort']);
			$reviews = array_slice($reviews,($data['page'] - 1) * 10,10);
			echo json_encode($reviews);
		}
		function compare($categoryname,$id,$pages)
		{
			session_manager();
			$id_array = preg_split('/[-]/',$id);
			
			$products = array();

			foreach($id_array as $id_arrays)
			{
				array_push($products,$this->product->getproductbyid($id_arrays));
			}

			$features = array();
			foreach($products as $key_field => $product)
			{
				$feature_thumb = array();
				foreach($product[0]['feature'] as $key => $value)
				{
					if(!in_array($value['name'],$features))
					{
						$feature_thumb[count($features) - 1] = $value;
						array_push($features,$value['name']);
					}
					else
					{
						$index = array_search($value['name'],$features);
						$feature_thumb[$index] = $value;
					}
				}

				$products[$key_field][0]['feature'] = $feature_thumb;
			}
			
			$available_key = array('Ease Of Use'=>'ease_use','Customer Support'=>'customer_service','Value for money'=>'value_money','Features & Functionality'=>'feature_function');
			
			foreach($products as $key => $value)
			{
				$allreviews = $this->review->getreviews($products[$key][0]['id']);
				$products[$key][0]['allreview'] = array('over_all'=>array('score'=>0,'count'=>0),'ease_use'=>array('score'=>0,'count'=>0),'customer_service'=>array('score'=>0,'count'=>0),'feature_function'=>array('score'=>0,'count'=>0),'value_money'=>array('score'=>0,'count'=>0));	

				if(count($allreviews) > 0)
				{
					$products[$key][0]['lastreview'] = $allreviews[count($allreviews) - 1]['created_date'];
				}
				
				foreach($allreviews as $allreview)
				{
					$products[$key][0]['allreview']['over_all']['score'] += $allreview['over_all'];
					$products[$key][0]['allreview']['over_all']['count']++;
					foreach($allreview['ratingextra'] as $key_extra => $value_extra)
					{
						if(isset($available_key[$value_extra['meta_key']]))
						{
							$products[$key][0]['allreview'][$available_key[$value_extra['meta_key']]]['score'] += $value_extra['meta_value'];
							$products[$key][0]['allreview'][$available_key[$value_extra['meta_key']]]['count'] ++;
						}
					}
				}
			}

			
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			$category = array('menu'=>$menu);


			$this->load->view('Frontend/header',$category);
			$this->load->view('Frontend/compareheader',array('products'=>$products,'page'=>$pages,'category'=>$categoryname,'main'=>$this->category->getcategoryname($this->category->getcategorybyname(preg_replace('/-/',' ',$categoryname))['rootcategoryid'])));
			$this->load->view('Frontend/productdetail/compare',array('product'=>$products,'categoryname'=>$categoryname,'feature'=>$features));
			$this->load->view('Frontend/footer',array('page'=>'detail'));
		}

		function vendors()
		{
			$user = $this->session->userdata('frontenduser');
			if(!$user)
			{
				redirect('/signin');
			}

			if($user['usertype'] != 'vendor')
			{
				redirect('');
			}

			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			session_manager();
			$product = $this->product->getproductbyuser($user['id']);
			$this->load->view('Frontend/header',array('page'=>'software','menu'=>$menu));
			$this->load->view('Frontend/vendors/vendors',array('page'=>'software'));
			$this->load->view('Frontend/vendors/software',array('product'=>$product));
			$this->load->view('Frontend/footer',array('page'=>'vendor'));
		}
		function resource()
		{
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			session_manager();
			$data = array('category'=>$this->category->getcategories(),'user'=>$this->session->userdata('frontenduser'));
			$data_blog = $this->blog->getblogs();
			$this->load->view('Frontend/header',array('page'=>'blog','menu'=>$menu));
			$this->load->view('Frontend/blog',array('blog'=>$data_blog,'main'=>$this->category->getmaincategory()));
			$this->load->view('Frontend/footer',array('page'=>'blog'));

		}

		function blogs($id)
		{
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}
			$data = array('menu'=>$menu,'page'=>'blogs');
			$data_blog = array('blog'=>$this->blog->getblogs(array('id'=>$id)),'section'=>$this->blog->getsection($id),);
			session_manager();
			$this->load->view('Frontend/header',$data);
			$this->load->view('Frontend/blogsource',$data_blog);
			$this->load->view('Frontend/footer',array('page'=>'blog'));
		}

		function contact()
		{
			$menu = $this->menu->getmenu();

			if($this->session->userdata('frontenduser'))
			{
				$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
			}

			$data = array('menu'=>$menu,'page'=>'contact');
			$this->load->view('Frontend/header',$data);
			$this->load->view('Frontend/contact');
			$this->load->view('Frontend/footer',array('page'=>'contact'));
		}

		function search($term = null)
		{
			$data = array();

			$search = $_GET['search'];
			

			$product = $this->product->searchproduct($search);
			$category = $this->category->searchcategory($search);
			$resource = $this->blog->searchresource($search);

			$type = $this->input->post();

			if(count($category) > 0)
			{
				$data['category'] = array_slice($category,0,3);
			}

			if(count($product) > 0)
			{
				$data['product'] = array_slice($product,0,3);
			}

			if(count($resource) > 0)
			{
				$data['resource'] = array_slice($resource,0,3);
			}

			foreach($data as $key => $data_array)
			{
				if($key == 'category')
				{
					$data[$key]['result_count'] = count($category);	
				}
				else if($key == 'product')
				{
					$data[$key]['result_count'] = count($product);	
				}
				else
				{
					$data[$key]['result_count'] = count($resource);
				}

				foreach($data_array as $key_value => $value)
				{
					$data[$key][$key_value]['category_search'] = $key;
				}
			}

			$page = 'all';
			if($term)
			{
				$page = $term;
			}

			
			$data_array = array();

			if($page != 'all')
			{
				$slice_array = array();
				if($page == 'category')
				{
					$slice_array = $category;
				}
				else if($page == 'product')
				{
					$slice_array = $product;
				}
				else
				{
					$slice_array = $resource;
				}
				$data_array[$page] = array_slice($slice_array,0,10);
				$data_array[$page]['result_count'] = count($slice_array	);
			}
			else
			{
				$data_array = $data;
			}
			if(isset($type['type']))
			{
				
				echo json_encode($data);
			}
			else
			{
				$menu = $this->menu->getmenu();
				session_manager();
				if($this->session->userdata('frontenduser'))
				{
					$menu = $this->menu->getmenu($this->session->userdata('frontenduser')['usertype']);
				}
				$this->load->view('Frontend/header',array('page'=>'search','menu'=>$menu));
				$this->load->view('Frontend/search',array('all'=>$data_array,'search'=>$search,'content'=>$page));
				$this->load->view('Frontend/footer',array('page'=>'search'));
			}
		}

		function searchmore()
		{
			$search = $this->input->post('search');
			$skip = $this->input->post('initialdata');
			$type = $this->input->post('type');

			if($type == 'product')
			{
				$product = $this->product->searchproduct($search,$skip,10);	
				echo json_encode($product);
			}
			else if($type == 'category')
			{
				$category = $this->category->searchcategory($search,$skip,10);
				echo json_encode($category);
			}
			else if($type == 'resource')
			{
				$resource = $this->blog->searchresource($search,$skip,10);
				echo json_encode($resource);
			}
			
			
		}


		function priceinfo()
		{
			$cat = $this->input->post('cat');
			$products = $this->category->get_all_product_by_field(array('name'=>$cat));


			$array_data = array();
			foreach($products as $product)
			{
				if(isset($product['product_detail']['start_price']))
				{
					array_push($array_data,array('label'=>$product['name'],'value'=>$product['product_detail']['start_price']));
				}
				else
				{
					array_push($array_data,array('label'=>$product['name'],'value'=>0));
				}
			}

			echo json_encode($array_data);
		}

		function searchapps()
		{
			$data = $this->input->post();
			$product = $this->product->searchproduct($data['name']);
			echo json_encode($product);	
			
		}

		
		function login()
		{
			$user = $this->input->post();
			$userdata = $this->auth->login($user);
			if($userdata['success'])
			{
				$this->session->set_userdata('user',$userdata['user_info']);
				redirect('');
			}
			else
			{
				redirect('/signin');
			}
		}
	}
?>