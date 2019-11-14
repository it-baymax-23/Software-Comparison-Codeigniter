
	<!-- Blog -->

	<style>
		h4
		{
			font-size:18px;
		}
		
		.removecompareelem:hover
		{
			color:red;
			cursor:pointer;
		}

		.removecompareelem
		{
			color:black;
			position:absolute;
			z-index:10000;
			top:5px;
			left:5px;
		}

		label
		{
			font-size:16px;
		}
		.btn
		{
			font-size:16px;
		}
	</style>
	<div class="home">
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column"  style="background-color: rgb(11,152,183);">
			<div class="compare_container m-t-10">
				<span class="searchtitle" style="width:80%;"><a class="searchtitle" href="<?php echo base_url();?>">HOME</a> <img src="<?php echo base_url()?>images/icon/icon-right.png" style="width:auto;height:auto;margin:0px 5px;"><a class="searchtitle" href=""><?php echo strtoupper($cat_name);?></a><img src="<?php echo base_url()?>images/icon/icon-right.png" style="width:auto;height:auto;margin:0px 5px;"></i><?php echo strtoupper($categoryname);?></span>
				<h3 class="searchheader">Compare <?php echo $categoryname;?> Software</h3>
			</div>
		</div>
	</div>
	<div class="row sticky" style="width:100vw;height:content;position:fixed;bottom:0px;background-color: rgb(128,128,128,0.7);z-index:1280;padding: 10px 25px;">
		<div class="col-12 col-sm-12 col-md-12 col-lg-1"></div>
		<div class="col-12 col-sm-8 col-md-7 col-lg-6">
			<div class="row  compare" attr_id="<?php echo $id;?>"></div>
		</div>
		<div class="col-12 col-sm-4 col-md-3 col-lg-4">
			<span class="btn btn-danger pull-left" id="remove_all" style="margin-top:30px;padding:12px;width:150px;">Remove All</span>
			<span class="btn btn-primary comparestart pull-right" style="margin-top:30px;padding:12px;width:150px;">Compare Now</span>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-1"></div>
	</div>
	<div class="back_grey row p-t-50 p-b-50">
		<div class="compare_container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
					<div class="row">
						<div class="col-12" style="margin-right:auto;">
							<div class="row" style="margin:0px;">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
									<div class="row">
										<div class="col-6">
											<a class="btn btn-default back_white pull-left" style="float:left;" href="#filter" data-toggle="collapse" role="button"  aria-expanded="false" aria-controls="filter">FILTER RESULT<i class="fas fa-plus" style="margin-left:10px;"></i></a>
										</div>
										<div class="col-6">
											<span class="btn btn-default back_white dropdown dropdown-toggle" data-toggle="dropdown" style="float:right;font-size:16px !important;">
												Recommended<span class="caret"></span>
												 <div class="dropdown-menu" style="color:grey;width:100%;">
												    <a class="dropdown-item" href="#" style="color:grey;">HIGHEST RATED</a>
												    <a class="dropdown-item" href="#" style="color:grey;">LOWEST RATED</a>
												    <a class="dropdown-item" href="#" style="color:grey;">MOST REVIEWS</a>
												 </div>	
											</span>
											
										</div>
									</div>
								</div>
								<form id="filter" class="collapse col-12 col-sm-12 col-md-12 col-lg-12 p-t-30 p-b-30 back_white" method="post">
									<div class="row">
										<label class="col-2">
											Pricing Models
										</label>
										<div class="col-10">
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['price']) && $filter['price'] == 'free'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['price']) && $filter['price'] == 'free'){echo '<i class="fas fa-check"></i>';}?>Free</span>
												<input type="checkbox" name="price" value="free" style="display: none;" <?php if(isset($filter['price']) && $filter['price'] == 'free'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['price']) && $filter['price'] == 'freetrial'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['price']) && $filter['price'] == 'freetrial'){echo '<i class="fas fa-check"></i>';}?>Free Trial</span>
												<input type="checkbox" name="price" value="freetrial" style="display: none;" <?php if(isset($filter['price']) && $filter['price'] == 'freetrial'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['price']) && $filter['price'] == 'One-time'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['price']) && $filter['price'] == 'One-time'){echo '<i class="fas fa-check"></i>';}?>One Time</span>
												<input type="checkbox" name="price" value="One-time" style="display: none;" <?php if(isset($filter['price']) && $filter['price'] == 'One-time'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['price']) && $filter['price'] == 'open-source'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['price']) && $filter['price'] == 'open-source'){echo '<i class="fas fa-check"></i>';}?>Open Source</span>
												<input type="checkbox" name="price" value="open-source" style="display: none;" <?php if(isset($filter['price']) && $filter['price'] == 'open-source'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['price']) && $filter['price'] == 'open-source'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['price']) && $filter['price'] == 'subscription'){echo '<i class="fas fa-check"></i>';}?>SubScription</span>
												<input type="checkbox" name="price" value="subscription" style="display: none;"  <?php if(isset($filter['price']) && $filter['price'] == 'subscription'){echo 'checked';}?>>
											</div>
										</div>
									</div>
									<div class="row m-t-10">
										<label class="col-2">
											Devices Supported
										</label>
										<div class="col-10">
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['platform']) && $filter['platform'] == 'android'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['platform']) && $filter['platform'] == 'android'){echo '<i class="fas fa-check"></i>';}?>Android</span>
												<input type="checkbox" name="platform" value="android" style="display: none;" <?php if(isset($filter['platform']) && $filter['platform'] == 'android'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['platform']) && $filter['platform'] == 'iphone'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['platform']) && $filter['platform'] == 'iphone'){echo '<i class="fas fa-check"></i>';}?>Android</span>
												<input type="checkbox" name="platform" value="iphone" style="display: none;" <?php if(isset($filter['platform']) && $filter['platform'] == 'iphone'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle  <?php if(isset($filter['platform']) && $filter['platform'] == 'web-based'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['platform']) && $filter['platform'] == 'web-based'){echo '<i class="fas fa-check"></i>';}?>Android</span>
												<input type="checkbox" name="platform" value="web-based" style="display: none;" <?php if(isset($filter['platform']) && $filter['platform'] == 'web-based'){echo 'checked';}?>>
											</div>
										</div>
									</div>
									<div class="row m-t-10">
										<label class="col-2">
											Organization types
										</label>
										<div class="col-10">
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'freelancer'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'freelancer'){echo '<i class="fas fa-check"></i>';}?>Freelancer</span>
												<input type="checkbox" name="organization_type" value="freelancer" style="display: none;" <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'freelancer'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'large_enterprise'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'large_enterprise'){echo '<i class="fas fa-check"></i>';}?>Freelancer</span>
												<input type="checkbox" name="organization_type" value="large_enterprise" style="display: none;" <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'large_enterprise'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'business'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'business'){echo '<i class="fas fa-check"></i>';}?>Mid Size Business</span>
												<input type="checkbox" name="organization_type" value="business" style="display: none;" <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'business'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'no-profit'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'no-profit'){echo '<i class="fas fa-check"></i>';}?>Non Profits</span>
												<input type="checkbox" name="organization_type" value="no-profit" style="display: none;" <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'no-profit'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle  <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'administration'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'administration'){echo '<i class="fas fa-check"></i>';}?>Public Administrations</span>
												<input type="checkbox" name="organization_type" value="administration" style="display: none;" <?php if(isset($filter['organization_type']) && $filter['organization_type'] == 'administration'){echo 'checked';}?>>
											</div>
										</div>
									</div>
									<div class="row m-t-10">
										<label class="col-2 m-t-5">
											Features
										</label>
										<div class="col-10">
											<?php foreach($features as $feature){?>
			        							<?php if($feature['type'] == 'checkbox'){?>
			        								<div class="button-checkbox m-t-5 m-l-5">
														<span class="btn btn-circle <?php if(isset($filter['features']) && in_array($feature['id'],$filter['features'])){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['features']) && in_array($feature['id'],$filter['features'])){echo 'checked';}?><?php echo $feature['name'];?></span>
														<input type="checkbox" name="features[]" style="display: none;" value="<?php echo $feature['id'];?>">
													</div>	
				                                <?php }?>
			                                <?php }?>
											
										</div>
									</div>
									<div class="row m-t-10">
										<label class="col-2">
											Minimum Rating
										</label>
										<div class="col-10">
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['rating']) && $filter['rating'] == '4~5'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['rating']) && $filter['rating'] == '4~5'){echo '<i class="fas fa-check"></i>';}?>
													<?php for($index = 0;$index<4;$index++){?>
													<i class="fas fa-star full m-l-2"></i>
													<?php }?>
												</span>
												<input type="checkbox" name="rating" value="4~5" style="display: none;">
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['rating']) && $filter['rating'] == '3~5'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['rating']) && $filter['rating'] == '3~5'){echo '<i class="fas fa-check"></i>';}?>
													<?php for($index = 0;$index<3;$index++){?>
														<i class="fas fa-star full m-l-2"></i>
													<?php }?>
												</span>
												<input type="checkbox" name="rating" value="3~5" style="display: none;">
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['rating']) && $filter['rating'] == '2~5'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['rating']) && $filter['rating'] == '2~5'){echo '<i class="fas fa-check"></i>';}?>
													<?php for($index = 0;$index<2;$index++){?>
													<i class="fas fa-star full m-l-2"></i>
													<?php }?>
												</span>
												<input type="checkbox" name="rating" value="2~5" style="display: none;" <?php if(isset($filter['rating']) && $filter['rating'] == '2~5'){echo 'checked';}?>>
											</div>
											<div class="button-checkbox m-l-5 m-t-5">
												<span class="btn btn-circle <?php if(isset($filter['rating']) && $filter['rating'] == '1~5'){echo 'btn-primary';}else{echo 'btn-default';}?>"><?php if(isset($filter['rating']) && $filter['rating'] == '1~5'){echo '<i class="fas fa-check"></i>';}?>
													<i class="fas fa-star full m-l-2"></i>
												</span>
												<input type="checkbox" name="rating" value="1~5" style="display: none;" <?php if(isset($filter['rating']) && $filter['rating'] == '1~5'){echo 'checked';}?>>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="row m-t-20" style="margin-left:0px;margin-right: 0px;">
								<div class="col-12 back_white" style="padding: 0px;">
									<?php foreach($product as $products){?>
									<div class="row reviewers_choice page-card" style="margin:0px;">
										<div class="col-12">
											<div class="row">
												<div class="product_logo" style="margin-left:0px;">
													<a class="productinfo_link productlink" href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$categoryname)?>/<?php echo $products['id']?>/reviews">
														<img src="<?php echo base_url() . $products['logo'];?>">
													</a>
												</div>
												<div class="col-12 col-sm-12 col-md-7 col-lg-7">
													<div class="row">
														<a class="productinfo_link" href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$categoryname)?>/<?php echo $products['id']?>/reviews">
															<h3 style="color:#00aeef"><?php echo $products['name'];?></h3>
														</a>												
													</div>
													<div class="text ellipsis row m-t-10">
														<p class="text-concat">
															<?php echo $products['description'];?>
														</p>
													</div>
													<div class="row m-t-20">
														<a class="productinfo_link" href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$categoryname)?>/<?php echo $products['id']?>/reviews">
															Read the full report on <?php echo $products['name'];?>
														</a>
													</div>	
												</div>
												<div style="margin-left:auto;">
													<div style="display: table;">
														<span class="btn btn-danger" style="width:180px !important;float:right;">
															VISIT WEBSITE<img src="<?php echo base_url();?>images/icon/website.png" style="margin-left:20px;height:auto;">
														</span>
													</div>
													<div class="m-t-10" style="display: table;">
														<span class="btn btn-primary addcompare compare_button" style="width:180px !important;float:right;" attr_id="<?php echo $products['id'];?>">
															ADD TO COMPARE<i class="fas fa-plus-circle" style="margin-left:20px;"></i>
														</span>
													</div>
													<div class="m-t-10" style="text-align: center;">
														<?php 
															$score = $products['review']['score'];

															if($score > 0)
															{
																$score = $score / $products['review']['count'];
															}
															$value_score = floor($score); 

															$half_score = $score - $value_score;
														?>

														<span style="font-size:24px !important;">
									                    <?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
									                    <i class="fas fa-star full"></i>
									                    <?php }?>
									                    <?php if(round($half_score,1) > 0){?>
									                      <i class="fas fa-star-half-alt full"></i>
									                    <?php } else if($value_score < 5){?>
									                    <i class="fas fa-star empty"></i>
									                    <?php }?>
									                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
									                      <i class="fas fa-star empty"></i>
									                    <?php }?>
									                    </span>
									                    <?php if($products['review']['count'] > 0){?>
									                    <a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$categoryname)?>/<?php echo $products['id']?>/reviews" class="reviewdesc">Based on <?php echo $products['review']['count'];?> Customer Reviews</a>
									                    <span class="visitnumber" attr_id="<?php echo $products['id']; ?>">Followers: 0</span>
									                    <?php }?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php }?>
									<div class="row m-t-10 m-b-100" style="border-top:solid 1px black;margin:0px;padding-top:50px;">
										<div class="col-12">
											<nav aria-label="Page navigation" style="margin-bottom:30px;"  id="pagenavigation-container">
										        <ul class="pagination" id="pagination"></ul>
										    </nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-4">
					<div class="row">
						<div class="col-12" style="margin-left:auto;">
							<div class="row back_white sidebarcontainer" style="border-top:solid 3px red;border-bottom:solid 3px red;padding-bottom:20px;">
								<div class="col-12">
									<div class="row reviewers_choice">
										<div>
											<img src="<?php echo base_url();?>images/icon/bestall.png" style="height:auto;"/>
										</div>
										<div class="col-10 col-sm-10 col-md-10 col-lg-10">
											<span class="searchtitle" style="color:#30b1c3;">Best Overall</span>			
											<p>Discover Which apps stand out for specific criteria according to our users opinions</p>					
										</div>
									</div>
									<div class="row reviewers_choice">
										<div class="product_logo" style="margin-right:2px;">
											<div class="productlink">
												<img src="<?php echo base_url().'uploads/user/1544064300vendor1.png'?>"/>
											</div>
										</div>
										<div class="col-6 col-sm-6 col-md-8 col-lg-7">
											<span class="searchtitle" style="color:black;">Company Name</span>			
											<p>Discover Which apps stand out for specific criteria according to our users opinions</p>					
										</div>
										<div style="margin-left:auto;margin-right:auto;">
											<div>
												<img src="<?php echo base_url();?>images/icon/gold.png" style="height:auto;"/>
											</div>
										</div>
									</div>
									<div class="row reviewers_choice">
										<div class="product_logo" style="margin-right:2px;">
											<div class="productlink">
												<img src="<?php echo base_url().'uploads/user/1544064613vendor3.png'?>"/>
											</div>
										</div>
										<div class="col-6 col-sm-6 col-md-8 col-lg-7">
											<span class="searchtitle" style="color:black;">Company Name</span>			
											<p>Discover Which apps stand out for specific criteria according to our users opinions</p>					
										</div>
										<div style="margin-left:auto;margin-right:auto;">
											<div>
												<img src="<?php echo base_url();?>images/icon/silver.png" style="height:auto;"/>
											</div>
										</div>
									</div>
									<div class="row reviewers_choice">
										<div class="product_logo" style="margin-right:2px;">
											<div class="productlink">
												<img src="<?php echo base_url().'uploads/user/1544064469vendor2.png'?>"/>
											</div>
										</div>
										<div class="col-6 col-sm-6 col-md-8 col-lg-7">
											<span class="searchtitle" style="color:black;">Company Name</span>			
											<p>Discover Which apps stand out for specific criteria according to our users opinions</p>					
										</div>
										<div style="margin-left:auto;margin-right:auto;">
											<div>
												<img src="<?php echo base_url();?>images/icon/bronze.png" style="height:auto;"/>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row back_white sidebarcontainer m-t-50" style="border-top:solid 3px red;border-bottom:solid 3px red;padding-bottom:20px;">
								<div class="col-12" style="padding:20px 15px;margin-left:20px;">
									<div class="row">
										<div>
											<img src="<?php echo base_url();?>images/icon/related_cat.png" style="height:auto;"/>
										</div>
										<div class="col-10 col-sm-10 col-md-10 col-lg-10">
											<span class="searchtitle" style="color:#30b1c3;">Related Categories</span>			
										</div>
									</div>
									<div class="row m-t-10">
										<ul>
											<?php foreach($related_category as $relate){?>
												<li style="padding-left:0px;">
													<a href="#" style="color:#5fbbd2"><?php echo $relate['name']?></a>
													<ul>
													<?php foreach($relate['sub'] as $subs){?>
														<li><a href="<?php echo base_url().'compare-'.str_replace(' ','-',$relate['name']).'-review-' . str_replace(' ','-',$subs['name']);?>" style="color:#5fbbd2"><img src="<?php echo base_url();?>images/icon/right.png"><?php echo $subs['name']; ?></a></li>	
													<?php }?>
													</ul>
												</li>
											<?php }?>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	