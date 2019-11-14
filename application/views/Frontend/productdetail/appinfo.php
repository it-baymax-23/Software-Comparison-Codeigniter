<div class="back_grey row p-t-50 p-b-50">
	<div class="compare_container">
		<div class="col-12">
	      <div class="row">
	        <div class="col-12 col-sm-12 col-md-10 col-lg-12" style="margin-left:auto;margin-right:auto;">
	        	<div class="row">
	        		<div class="col-12 back_white m-t-20" style="padding:20px 20px;">
	        			<div class="row">
		        			<div class="product_logo" style="margin-left:10px;width:70px;height:80px;">
		        				<a href="<?php echo $products[0]['product_detail']['websiteurl'];?>" class="productlink">
		        					<img src="<?php echo base_url().$products[0]['logo'];?>"/>
		        				</a>
		        			</div>
			        		<div class="col-6 col-sm-6 col-md-6 col-lg-8">
			        			<div class="row">
			        				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
			        					<a href="<?php echo $products[0]['product_detail']['websiteurl'];?>"><h3 style="color:#38b7c5"><?php echo strtoupper($products[0]['name']);?></h3></a>
			        					<div class="m-t-10">
			        						<span style="font-size:15px !important;color:#58595b;"><?php echo $category;?></span>
			        					</div>
			        					<div>
			        						<span style="font-size:17px !important;"><?php star_display($products[0]['score'],$products[0]['review']);?></span><br>
			        						<span>Overall Rating Based on <?php echo $products[0]['review'];?> Customer Reviews</span>
			        					</div>
			        				</div>
			        			</div>
			        		</div>			        		
			        		<div class="col-12 col-sm-12 col-md-3 col-lg-2" style="margin-left:auto;">
	        					<div style="margin-left: auto;float: right;">
				        			<div style="display: table">
					        			<span class="btn btn-danger" style="width:180px;">
					        				VISIT WEBSITE
					        			</span>
					        		</div>
					        		<div class="m-t-10" style="display: table">
					        			<span class="btn btn-primary" style="width:180px;">
					        				WRITE A REVIEW
					        			</span>
					        		</div>
					        		<div class="m-t-10" style="display: table">
					        			<span class="btn btn-primary" style="width:180px;">
					        				ADD TO COMPARE<i class="fas fa-plus-circle" style="margin-left:10px;"></i>
					        			</span>
					        		</div>
				        		</div>	
	        				</div>		        		
			        	</div>
	        		</div>
	        		<div class="col-12 back_white m-t-20" style="padding:20px 20px;">
	        			<div class="row">
	        				<div class="col-12 m-b-10">
		        				<h3><?php echo $products[0]['name'];?> Over View</h3>
		        			</div>
		        			<div class="col-12 p-t-20" style="border-top:solid 1px rgb(153,153,153);">
		        				<div class="row">
		        					<div class="col-12 col-sm-12 col-md-12 col-lg-8 m-t-10">
		        						<p style="font-size:15px;"><?php echo $products[0]['description'];?></p>
		        						<div class="row">
		        							<div class="col-12 col-sm-6 col-md-6 col-lg-6 m-t-20">
		        								<h4>Pricing</h4>
		        								<div class="row m-t-20">
		        									<div class="col-12">
		        										<h5>Pricing Options</h5>
		        										<?php if(isset($products[0]['product_detail']['pricemodel'])){?>
		        										<div class="row m-t-10">
		        											<div class="col-11" style="margin:auto;">
		        												<?php foreach($products[0]['product_detail']['pricemodel'] as $details){?>
		        												<div class="row" style="">
		        													<div class="col-6 m-t-10">
		        														<span><?php echo $details;?></span>
		        													</div>
		        													<div class="col-6 m-t-10">
		        														<i class="fas fa-check-circle" style="color:green;"></i>
		        													</div>
		        												</div>
		        												<?php }?>
		        												<?php if(isset($products[0]['product_detail']['priceplan'])){?>
		        												<div class="row m-t-10">
		        													<div class="col-12">
		        														<a class="btn btn-primary" href="<?php echo $products[0]['product_detail']['priceplan']; ?>">
		        															VIEW PRICE PLAN
		        														</a>
		        													</div>
		        												</div>
		        												<?php }?>
		        											</div>
		        										</div>

		        										<?php }?>
		        										
		        									</div>
		        								</div>
		        							</div>
		        							<div class="col-12 col-sm-6 col-md-6 col-lg-6 m-t-20">
		        								<h4>Vendor Information</h4>
		        								<div class="row m-t-20">
		        									<div class="col-12">
		        										<h5>Vendor Profile</h5>
		        										<div class="row m-t-10">
		        											<div class="col-6">
		        												<span>Company Name</span>
		        											</div>
		        											<div class="col-6">
		        												<span><?php echo $products[0]['user']['company'];?></span>
		        											</div>
		        										</div>
		        										<div class="row m-t-10">
		        											<div class="col-6">
		        												<span>Company Size</span>
		        											</div>
		        											<div class="col-6">
		        												<span><?php echo $products[0]['user']['company_size'];?></span>
		        											</div>
		        										</div>
		        										<div class="row m-t-10">
		        											<div class="col-6">
		        												<span>Website</span>
		        											</div>
		        											<div class="col-6">
		        												<span><?php echo $products[0]['user']['website'];?></span>
		        											</div>
		        										</div>
		        									</div>
		        								</div>
		        							</div>
		        						</div>
		        					</div>
		        					<div class="col-12 col-sm-12 col-md-12 col-lg-4 m-t-10">
										<div class="image_selected" style="width:100%;height:300px;"></div>
										<div class="row m-t-20">
											<ul class="image_list">
												<?php if($products[0]['videourl']){?>
					                              <li data-image="<?php echo base_url();?>images/play.png"" style="float:left;"><a href="<?php echo $products[0]['videourl'];?>"  class="html5lightbox" data-group="mygroup" data-thumbnail="<?php echo base_url();?>images/play.png" data-width="480" data-height="320"><img src="<?php echo base_url();?>images/play.png"></a></li>
					                              <?php }?>
					                              <?php foreach($products[0]['screenshot'] as $images){?>
					                              <li data-image="<?php echo base_url() . $images;?>" style="float:left;"><a href="<?php echo base_url() . $images;?>"  class="html5lightbox" data-group="mygroup" data-thumbnail="<?php echo base_url() . $images;?>"><img src="<?php echo base_url() . $images;?>"></a></li>
					                              <?php }?>
											</ul>
										</div>
		        					</div>
		        				</div>
	        				</div>
	        			</div>
	        		</div>

	        		<div class="col-12 back_white m-t-20" style="padding:20px 20px">
	        			<div class="row">
	        				<div class="col-12 m-b-10">
	        					<h3><?php echo $products[0]['name']?> Reviews</h3>
	        				</div>
	        			</div>
	        			<div class="row p-t-20" style="border-top:solid 1px rgb(153,153,153);">
	        				<div class="col-12 col-sm-6 col-md-3 col-lg-3" style="border-right: solid 1px #e1e1e1;">
	        					<div class="row m-t-10">
	        						<h5 class="col-12" style="text-align: center;">Overall Rating</h5>
	        						<?php 
			                            $score = 0;
			                            foreach($review as $reviews)
			                            {
			                              $score += $reviews['over_all'];
			                            }

			                            if($score > 0)
			                            {
			                              $score = $score / count($review);
			                            }
			                          ?>
			                         <div class="col-12 m-t-10" style="text-align: center;">
		                          		<h4 style="color:rgb(11,152,183) !important;display: inline;"><?php echo $score;?></h4>
		                          		<span style="font-size:15px !important;display: inline;">/5</span>
		                          		<div class="row m-t-10">
		                          			<div class="col-12" style="text-align: center;">
		                          				<a href="#">Write a Review</a>
		                          			</div>
		                          		</div>
		                          	</div>
	        					</div>
	        				</div>
	        				<div class="col-12 col-sm-6 col-md-3 col-lg-3" style="border-right: solid 1px #e1e1e1;">
	        					<div class="row m-t-10">
			        				<div class="col-12">
			        					<div style="float:left;width:40%;"><span class="m-l-10">Excellent</span></div>
			        					<div class="m-l-10" style="float:left;width:40%;"><progress value="6" max="10" style="margin-top:4px;"></progress></div>
			        					<div class="m-l-5" style="float: left;">
			        						<span>6</span>
			        					</div>
			        				</div>
			        				<div class="col-12">
			        					<div style="float:left;width:40%;"><span class="m-l-10">Very good</span></div>
			        					<div class="m-l-10" style="float:left;width:40%;"><progress value="1" max="10" style="margin-top:4px;"></progress></div>
			        					<div class="m-l-5" style="float: left;">
			        						<span>1</span>
			        					</div>
			        				</div>
			        				<div class="col-12">
			        					<div style="float:left;width:40%;"><span class="m-l-10">Average</span></div>
			        					<div class="m-l-10" style="float:left;width:40%;"><progress value="0" max="10" style="margin-top:4px;"></progress></div>
			        					<div class="m-l-5" style="float: left;">
			        						<span>0</span>
			        					</div>
			        				</div>
			        				<div class="col-12">
			        					<div style="float:left;width:40%;"><span class="m-l-10">Poor</span></div>
			        					<div class="m-l-10" style="float:left;width:40%;"><progress value="0" max="10" style="margin-top:4px;"></progress></div>
			        					<div class="m-l-5" style="float: left;">
			        						<span>0</span>
			        					</div>
			        				</div>
			        				<div class="col-12">
			        					<div style="float:left;width:40%;"><span class="m-l-10">Terrible</span></div>
			        					<div class="m-l-10" style="float:left;width:40%;"><progress value="1" max="10" style="margin-top:4px;"></progress></div>
			        					<div class="m-l-5" style="float: left;">
			        						<span>1</span>
			        					</div>
			        				</div>
			        			</div>
	        				</div>
	        				<div class="col-12 col-sm-6 col-md-3 col-lg-3" style="border-right: solid 1px #e1e1e1;">
	        					<div class="row m-t-10">
	        						<div class="col-12">
	        							<div class="row">
	        								<span class="col-12" style="text-align: center;">Value for money</span>
	        								<span class="col-12"  style="text-align: center;"><?php star_display($products[0]['allreview']['value_money']['score'],$products[0]['allreview']['value_money']['count']);?> 
	        									<span class="m-l-5"><?php echo get_score($products[0]['allreview']['value_money']['score'],$products[0]['allreview']['value_money']['count']);?></span>
	        								</span>
	        								
	        							</div>
	        						</div>
	        						<div class="col-12 m-t-10">
	        							<div class="row">
		        							<span  class="col-12" style="text-align: center;">Features</span>
		        							<span  class="col-12"  style="text-align: center;"><?php star_display($products[0]['allreview']['feature_function']['score'],$products[0]['allreview']['feature_function']['count']);?>
		        								<span class="m-l-5"><?php echo get_score($products[0]['allreview']['feature_function']['score'],$products[0]['allreview']['feature_function']['count'])?></span>
		        							</span>
		        							
		        						</div>
	        						</div>
	        						<div class="col-12 m-t-10">
	        							<div class="row">
		        							<span class="col-12" style="text-align: center;">Ease Of Use</span>
		        							<span class="col-12" style="text-align: center;"><?php star_display($products[0]['allreview']['ease_use']['score'],$products[0]['allreview']['ease_use']['count']);?>
		        								<span class="m-l-5"><?php echo get_score($products[0]['allreview']['ease_use']['score'],$products[0]['allreview']['ease_use']['count']);?></span>
		        							</span>
		        							
		        						</div>
	        						</div>
	        						<div class="col-12 m-t-10">
	        							<div class="row">
	        								<span class="col-12" style="text-align: center;">Customer Support</span>
	        								<span class="col-12" style="text-align: center;"><?php star_display($products[0]['allreview']['customer_service']['score'],$products[0]['allreview']['customer_service']['count']);?>
	        									<span class="m-l-5"><?php echo get_score($products[0]['allreview']['customer_service']['score'],$products[0]['allreview']['customer_service']['count']);?></span>
	        								</span>
	        								
	        							</div>
	        						</div>
	        					</div>
	        				</div>
	        				<div class="col-12 col-sm-6 col-md-3 col-lg-3">
	        					<?php 
									$score_num = 0;
									foreach($review as $reviews)
									{
										if($reviews['over_all'] > 3)
										{
											$score_num ++;
										}
									}

									$percent = 0;
									if($score_num > 0)
									{
										$percent = floor($score_num/count($review) * 100);	
									}
									
								?>
								<div class="row m-t-10">
									<div class="col-12">
										<div class="row">
											<span class="col-3" style="color:#38b7c5 !important; font-size:17px !important;"><?php echo $percent;?>%</span>
		        							<span class="col-9" style="font-weight: 200 !important;color:#919395 !important;font-size:17px !important;">positive reviews</span>
		        						</div>
		        						<div class="row m-t-10">
		        							<span class="col-3" style="color:#38b7c5 !important; font-size:17px !important;">98%</span>
	        								<span class="col-9" style="font-weight: 10 !important;color:#919395 !important;font-size:17px !important;">recommended this to a friend or a colleague</span>
		        						</div>
									</div>
								</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	      </div>
	     </div>
	</div>
</div>