<div class="back_grey row p-t-50 p-b-50">
    <div class="compare_container">
    	<div class="col-12">
	      <div class="row">
	        <div class="col-12 col-sm-12 col-md-5 col-lg-3 filter">
	        	<div class="row">
	        		<div class="col-12 col-sm-12 col-md-11 col-lg-11  back_white m-t-20" style="margin-right:auto;padding-top:15px;">
	        			<h5>OVERALL RATING</h5>
	        			<div class="row m-t-10">
	        				<div class="col-12">
	        					<div style="float:left;width:40%;"><input type="checkbox" class="reviewfilter" value="5" attr_id="rating"><span class="m-l-10">Excellent</span></div>
	        					<div class="m-l-10" style="float:left;width:40%;"><progress value="<?php echo $data_score[4];?>" max="<?php echo $countreview;?>" style="margin-top:4px;"></progress></div>
	        					<div class="m-l-5" style="float: left;">
	        						<span><?php echo $data_score[4];?></span>
	        					</div>
	        				</div>
	        				<div class="col-12">
	        					<div style="float:left;width:40%;"><input type="checkbox" value="4" class="reviewfilter" attr_id="rating"><span class="m-l-10">Very good</span></div>
	        					<div class="m-l-10" style="float:left;width:40%;"><progress  value="<?php echo $data_score[3];?>" max="<?php echo $countreview;?>" style="margin-top:4px;"></progress></div>
	        					<div class="m-l-5" style="float: left;">
	        						<span><?php echo $data_score[3];?></span>
	        					</div>
	        				</div>
	        				<div class="col-12">
	        					<div style="float:left;width:40%;"><input type="checkbox" value="3" class="reviewfilter" attr_id="rating"><span class="m-l-10">Average</span></div>
	        					<div class="m-l-10" style="float:left;width:40%;"><progress  value="<?php echo $data_score[2];?>" max="<?php echo $countreview;?>" style="margin-top:4px;"></progress></div>
	        					<div class="m-l-5" style="float: left;">
	        						<span><?php echo $data_score[2];?></span>
	        					</div>
	        				</div>
	        				<div class="col-12">
	        					<div style="float:left;width:40%;"><input type="checkbox" value="2" class="reviewfilter" attr_id="rating"><span class="m-l-10">Poor</span></div>
	        					<div class="m-l-10" style="float:left;width:40%;"><progress  value="<?php echo $data_score[1];?>" max="<?php echo $countreview;?>" style="margin-top:4px;"></progress></div>
	        					<div class="m-l-5" style="float: left;">
	        						<span><?php echo $data_score[1];?></span>
	        					</div>
	        				</div>
	        				<div class="col-12">
	        					<div style="float:left;width:40%;"><input type="checkbox" value="1" class="reviewfilter" attr_id="rating"><span class="m-l-10">Terrible</span></div>
	        					<div class="m-l-10" style="float:left;width:40%;"><progress  value="<?php echo $data_score[0];?>" max="<?php echo $countreview;?>" style="margin-top:4px;"></progress></div>
	        					<div class="m-l-5" style="float: left;">
	        						<span><?php echo $data_score[0];?></span>
	        					</div>
	        				</div>
	        			</div>

	        			<h5 class="m-t-20">COMPANY SIZE</h5>
	        			<div class="row m-t-10">
	        				<div class="col-12">
	        					<input type="checkbox" value="" class="reviewfilter" attr_id="company_size"><span class="m-l-10">myself only</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="2~10" class="reviewfilter" attr_id="company_size"><span class="m-l-10">2~10</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="11~30" class="reviewfilter" attr_id="company_size"><span class="m-l-10">11~30</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="30~50" class="reviewfilter" attr_id="company_size"><span class="m-l-10">30~50</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="50~100" class="reviewfilter" attr_id="company_size"><span class="m-l-10">50~100</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="100~200" class="reviewfilter" attr_id="company_size"><span class="m-l-10">100~200</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="200~500" class="reviewfilter" attr_id="company_size"><span class="m-l-10">200~500</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="500~1000" class="reviewfilter" attr_id="company_size"><span class="m-l-10">500~1000</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="1000+" class="reviewfilter" attr_id="company_size"><span class="m-l-10">1000+</span>
	        				</div>
	        			</div>
	        			<h5 class="m-t-20">INDUSTRY</h5>
	        			<div class="row m-t-10">
	        				<div class="col-12">
	        					<input type="checkbox" value="Computer Software" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Computer Software</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Management Consulting" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Management Consulting</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="IT/Serivices" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">IT/Serivices</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Financial Services" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Financial Services</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Marketing/Advertising" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Marketing/Advertising</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Higher Education" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Higher Education</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Civic/Social Organization" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Civic/Social Organization</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Internet" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Internet</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Primary/Secondary Education" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Primary/Secondary Education</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="Government Administration" attr_id="industrytype" class="reviewfilter"><span class="m-l-10">Government Administration</span>
	        				</div>
	        			</div>
	        			<h5 class="m-t-20">TIME USED</h5>
	        			<div class="row m-t-10 m-b-15">
	        				<div class="col-12">
	        					<input type="checkbox" class="reviewfilter" value="free" attr_id="user_period"><span class="m-l-10">Free Trial</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" class="reviewfilter" value="6month" attr_id="user_period"><span class="m-l-10">Less than 6 months</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" class="reviewfilter" value="6~12month" attr_id="user_period"><span class="m-l-10">6~12 months</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="1~2year" class="reviewfilter" attr_id="user_period"><span class="m-l-10">1~2 years</span>
	        				</div>
	        				<div class="col-12">
	        					<input type="checkbox" value="2+year" class="reviewfilter" attr_id="user_period"><span class="m-l-10">2+ years</span>
	        				</div>
	        			</div>
	        		</div>
	        	</div>	
	        </div>
	        <div class="col-12 col-sm-12 col-md-7 col-lg-9" style="margin-left:auto;">
	        	<div class="row">
	        		<div class="col-12 back_white m-t-20" style="padding:20px 20px;">
	        			<div class="row">
		        			<div class="product_logo" style="margin-left:10px;width:70px;height:80px;">
		        				<div class="productlink">
		        					<img src="<?php echo base_url().$products[0]['logo'];?>"/>
		        				</div>
		        			</div>
			        		<div class="col-6 col-sm-6 col-md-6 col-lg-8">
			        			<div class="row">
			        				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
			        					<a href="<?php echo isset($products[0]['product_detail']['websiteurl'])?$products[0]['product_detail']['websiteurl']:'';?>"><h3 style="color:#38b7c5"><?php echo strtoupper($products[0]['name']);?></h3></a>
			        					<div>
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
	        		<div class="col-12 m-t-10">
	        			
	        			<div class="row m-t-10 p-b-10 back_white">
	        				<?php if($countreview > 0){?>
	        				<h2 class="col-12 m-t-10" style="color: rgb(11,152,183);text-align: center;">REVIEW SUMMARY BASED ON <?php echo $countreview;?> VERIFIED CUSTOMERS:</h2>
	        				<div class="col-12">
	        					<div class="row" style="padding:15px 10px;">
	        						<div class="col-12 col-sm-6 col-md-4 col-lg-4">
	        							<h4 style="font-weight: 400 !important;color:#808285 !important;text-align: center;">Common Pros</h4>
	        							<div class="row m-t-10" style="border-right:solid 1px #e1e1e1;">
	        								<div class="col-12">
	        									<!-- <div style="float: left;">
		        									<i class="far fa-thumbs-up" style="color:#8fcbf2;font-size: 18px;"></i>
		        								</div> -->
		        								<div class="pros" style="float:left;padding-left:25px;">
			        								<span  style="font-size:15px !important;">One of the most powerful tools that I've used. It has helped us answer so many business questions. You will never go back to Excel. It does everything Excel does and 100 times more. The power of being able to connect directly to your database, live, and quickly build dashboards and trends is amazing.</span>
			        							</div>
		        							</div>
		        							<div class="col-12 m-t-20">
		        								<div class="pros" style="float:left;padding-left:25px;">
			        								<span style="font-size:15px !important;">Visualizations are very crisp and appealing to the eye, Tableau has one of the most professional and clean looks on the market. Tableau has the ability to handle large datasets (millions of records) and join datasets from multiple data sources. Sharing and monitoring usage of dashboards is also a great tool.</span>
			        							</div>
		        							</div>
		        							<div class="col-12 m-t-20">
		        								<div class="pros" style="float:left;padding-left:25px;">
			        								<span style="font-size:15px !important;">The overall customer support of tableau is really amazing. If one gets stuck in a functionality, there are plenty of resources to get a quick and easily implementable solutions for instance tableau communities on google as well as you tube videos. This software has brought a positive change in the field of data visualization and for taking quick business decisions.</span>
			        							</div>
		        							</div>
		        							<div class="col-12 m-t-20">
		        								<div class="pros" style="float:left;padding-left:25px;">
			        								<span style="font-size:15px !important;">A MUST tool for anyone who is in the field of data and statistics. Tableau is perfect for dashboard creation and dealing with different sources of data in order of visually display meaningful finding. Drag-and-drop can be used for easy graph creation. Tableau offers a wide-variety of data-analysis features that make the experience of data analysis and data visualization much smoother.</span>
			        							</div>
		        							</div>
	        							</div>
	        						</div>
	        						<div class="col-12 col-sm-6 col-md-4 col-lg-4">
	        							<h4 style="font-weight: 400 !important;color:#808285 !important;text-align: center;">Common Cons</h4>
	        							<div class="row m-t-10" style="border-right:solid 1px #e1e1e1;">
	        								<div class="col-12">
		        								<div class="cons" style="float:left;padding-left:25px;">
			        								<span style="font-size:15px !important;">The palette of available visualizations is the same since too many years. (e.g. it is missing radial plots)</span>
			        							</div>
		        							</div>
		        							<div class="col-12 m-t-20">
		        								<div class="cons" style="float:left;padding-left:25px;">
			        								<span style="font-size:15px !important;">Even with all the flexible options they provide, it's still a pricey solution. However, it is totally worth it</span>
			        							</div>
		        							</div>
		        							<div class="col-12 m-t-20">
		        								<div class="cons" style="float:left;padding-left:25px;">
			        								<span style="font-size:15px !important;">I can't see the autosave feature anywhere, which is a very major drawback. Also, the application takes time to load sometimes.</span>
			        							</div>
		        							</div>
		        							<div class="col-12 m-t-20">
		        								<div class="cons" style="float:left;padding-left:25px;">
			        								<span style="font-size:15px !important;">It can be a bit overwhelming at first, but Tableau is much easier to learn with all the online tutorials that are available than most other software of its class.</span>
			        							</div>
		        							</div>
	        							</div>
	        						</div>
	        						<div class="col-12 col-sm-6 col-md-4 col-lg-4" style="padding-left:20px;">
	        							<h4 style="font-weight: 400 !important;color:#808285 !important;text-align: center;">Ratings Summary</h4>
	        							<div class="row m-t-10">
	        								<div class="col-12" style="text-align: center;">
	        									<span style="font-weight: 200 !important;color:#919395 !important;font-size:15px !important;">Overall Rating</span>
	        								</div>
	        								<div class="col-12" style="text-align: center;">
	        									<span style="font-weight:400 !important;font-size:25px !important;margin-left:-10px;"><?php star_display($products[0]['score'],$products[0]['review']);?></span>
	        								</div>
	        								<div class="col-12 m-t-10">
	        									<?php 
	        										$score_num = 0;
	        										foreach($review as $reviews)
	        										{
	        											if($reviews['over_all'] > 3)
	        											{
	        												$score_num ++;
	        											}
	        										}

	        										$percent = floor($score_num/$countreview * 100);
	        									?>
	        									<div class="row m-t-15">
		        									<span class="col-3" style="color:#38b7c5 !important;font-size:20px !important;"><?php echo $percent;?>%</span>
		        									<span class="col-9 m-t-5" style="font-weight: 200 !important;color:#919395 !important;font-size:15px !important;">Positive reviews</span>
		        								</div>
	        								</div>
	        								<div class="col-12 m-t-15">
	        									<div class="row">
		        									<span class="col-3" style="color:#38b7c5 !important;font-size:20px !important;">98%</span>
		        									<span class="col-9 m-t-5" style="font-weight: 200 !important;color:#919395 !important;font-size:15px !important;">Recommend this to a friend or a colleague</span>
		        								</div>
	        								</div>
	        								<div class="col-12 m-t-20" style="text-align: center;">
	        									<span style="font-weight: 200 !important;color:#919395 !important;font-size:22px !important;">Ratings Breakdown</span>

	        									<div class="row m-t-10">
	        										<div class="col-12 m-t-10" style="text-align: center;">
	        											<span class="m-l-5" style="color:grey !important;font-size:12px;display: block;">Value for money</span>
	        											<?php 
	        												$score = $products[0]['allreview']['value_money']['score'];

															if($score > 0)
															{
																$score = $score / $products[0]['allreview']['value_money']['count'];
															}
															$value_score = floor($score); 

															$half_score = $score - $value_score;
	        											?>
	        											<?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
									                    <i class="fas fa-star full" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php if(round($half_score,1) > 0){?>
									                      <i class="fas fa-star-half-alt full" style="margin:0px 2px;"></i>
									                    <?php } else if($value_score < 5){?>
									                    <i class="fas fa-star empty" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
									                      <i class="fas fa-star empty"></i>
									                    <?php }?>
									                    
	        										</div>
	        										<div class="col-12 m-t-10" style="text-align: center;">
	        											<span class="m-l-5 ellipsis" style="color:grey !important;font-size:12px;display: block;">Ease Of Use</span>
	        											<?php 
	        												$score = $products[0]['allreview']['ease_use']['score'];

															if($score > 0)
															{
																$score = $score / $products[0]['allreview']['ease_use']['count'];
															}
															$value_score = floor($score); 

															$half_score = $score - $value_score;
	        											?>
	        											<?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
									                    <i class="fas fa-star full" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php if(round($half_score,1) > 0){?>
									                      <i class="fas fa-star-half-alt full" style="margin:0px 2px;"></i>
									                    <?php } else if($value_score < 5){?>
									                    <i class="fas fa-star empty" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
									                      <i class="fas fa-star empty"></i>
									                    <?php }?>
									                    
	        										</div>
	        										<div class="col-12 m-t-10" style="text-align: center;">
	        											 <span class="m-l-5 ellipsis" style="color:grey !important;font-size:10px;display: block;">Feautures & Functionality</span>
	        											<?php 
	        												$score = $products[0]['allreview']['feature_function']['score'];

															if($score > 0)
															{
																$score = $score / $products[0]['allreview']['feature_function']['count'];
															}
															$value_score = floor($score); 

															$half_score = $score - $value_score;
	        											?>
	        											<?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
									                    <i class="fas fa-star full" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php if(round($half_score,1) > 0){?>
									                      <i class="fas fa-star-half-alt full" style="margin:0px 2px;"></i>
									                    <?php } else if($value_score < 5){?>
									                    <i class="fas fa-star empty" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
									                      <i class="fas fa-star empty"></i>
									                    <?php }?>
									                   
	        										</div>
	        										<div class="col-12 m-t-10" style="text-align: center;">
	        											<span  style="color:grey !important;font-size:12px;display: block;">Customer Support</span>
	        											<?php 
	        												$score = $products[0]['allreview']['customer_service']['score'];

															if($score > 0)
															{
																$score = $score / $products[0]['allreview']['customer_service']['count'];
															}
															$value_score = floor($score); 

															$half_score = $score - $value_score;
	        											?>
	        											<?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
									                    <i class="fas fa-star full" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php if(round($half_score,1) > 0){?>
									                      <i class="fas fa-star-half-alt full" style="margin:0px 2px;"></i>
									                    <?php } else if($value_score < 5){?>
									                    <i class="fas fa-star empty" style="margin:0px 2px;"></i>
									                    <?php }?>
									                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
									                      <i class="fas fa-star empty"></i>
									                    <?php }?>
									                    
	        										</div>
	        									</div>
	        									<div class="row m-t-10">
	        										<div class="col-12" style="text-align: center;">
	        											<span style="color:#919395 !important;font-size:15px !important;display: block;">The above ratings breakdown is based on <?php echo $countreview;?> customer ratings</span>
	        										</div>
	        									</div>
	        								</div>
	        							</div>
	        						</div>
	        					</div>
	        				</div>
	        				<?php }else{?>
		        				<h2 class="col-12 m-t-10" style="color:rgb(11,152,183);text-align: center;">There is no review in this software</h2>
		        			<?php }?>
	        			</div>
	        			
	        			<?php if($countreview > 0){?>
	        			<div class="row m-t-10 back_white">
	        				<h3 class="col-12 m-t-20" style="color:#808285;text-align: center;">Read <?php echo $countreview;?> <?php echo $products[0]['name'];?> Verified Customer Reviews</h3>
	        				<div class="col-11 m-t-10" style="margin-left:auto;margin-right: auto;">
	        					<div class="row">
	        						<div class="col-12 col-sm-6 col-md-8 col-lg-8">
			        					<div class="row">
			        						<div>
			        							Sort Reviews By:
			        						</div>
			        						<div class="col-md-4">
				        					 <select class="form-control sort" style="margin-left: 20px;">
				        					 	<option value="helpful">Most Helpful</option>
				        					 	<option value="newest">Newest</option>
				        					 	<option value="oldest">Oldest</option>
				        					 	<option value="over_all">Highest Rating</option>
				        					 </select>
											 </div>
										</div>
			        				</div>
	        						<div class="col-12 col-sm-6 col-md-4 col-lg-4">
	        							<a href="#" class="btn btn-primary m-l-30">WRITE A REVIEW</a>
	        						</div>
			        			</div>
	        				</div>
	        				<div class="col-12 m-t-10 review-container" attr_id="<?php echo $products[0]['id'];?>" pagelength="<?php echo $countreview;?>">
		        				<?php foreach($review as $reviews){?>
		        					<div class="row" style="padding-top:10px;padding-bottom: 10px;border-top:solid 1px #d1d3d4;">
		        						<div class="col-11" style="margin-left: auto;margin-right:auto;border-bottom:solid 1px lightgray;">
		        							<div class="row">
				        						<div class="profile">
				        							<?php if(isset($reviews['profile'])){?><img src="<?php echo base_url().$reviews['profile'];?>"><?php }?>
				        						</div>
				        						<div class="col-12 col-sm-12 col-md-5 col-lg-5" style="padding-top:10px;">
				        							<h4 style="color:#949597">Reviews by <?php echo $reviews['username'];?> Of <?php echo isset($reviews['company'])?$reviews['company']:'';?></h4>
				        						</div>
				        						<div class="col-12 col-sm-12 col-md-5 col-lg-5" style="padding-top: 10px;">
				        							<span style="float:right;"><?php if(isset($reviews['industry'])){?>Industry: <?php echo $reviews['industry'];?><?php } ?></span><br>
				        							<span style="float:right;"><?php if(isset($reviews['industry'])){?>Company size: <?php echo $reviews['company_size'];?><?php } ?></span>
				        						</div>
				        					</div>
			        					</div>
		        					</div>
		        					<div class="row m-t-20 m-b-30">
		        						<div class="col-1"></div>
		        						<div class="col-11">
		        							<div class="row">
		        								<h3 class="col-8" style="color:#949597;"><?php echo $reviews['title'];?></h3>
		        								<div class="col-4">
		        									<?php $dates = display_date($reviews['created_date']);?>
		        									<span>Reviewed on <?php echo $dates['month'];?> <?php echo $dates['day']?>th <?php echo $dates['year']?></span>
		        									<?php if($reviews['resource']){?><span style="display:block;">Review Source: <?php echo $reviews['resource'];?></span><?php }?>
		        								</div>
		        							</div>
		        							<div class="row m-t-10">
		        								<div class="col-12">
		        									<p><?php echo $reviews['description'];?></p>
		        								</div>
		        								<div class="col-12">
		        									<div class="row">
		        										<div class="col-12 col-sm-12 col-md-8 col-lg-8">
		        										</div>
		        										<div class="col-12 col-sm-12 col-md-4 col-lg-4">
		        											<div class="row">
		        												<div class="col-12">
		        													<h5 style="color:#949597;text-align: center;">Overall Rating</h5>
		        													<div class="row m-t-10">
								        								<div class="col-12" style="text-align: center;">
								        									<?php 
							    												$score = $reviews['over_all'];
							    											?>
							    											<?php for($index_score = 0;$index_score < $score;$index_score ++){?>
														                    <i class="fas fa-star full" style="margin:0px 2px;"></i>
														                    <?php }?>
														                    <?php for($index_score = $score + 1;$index_score <=5;$index_score ++){?>
														                      <i class="fas fa-star empty"></i>
														                    <?php }?>
								        								</div>
								        							</div>
		        												</div>
		        											</div>
		        										</div>
		        									</div>
		        								</div>
		        								<div class="col-12 m-t-20 readmore_container" style="display: none;">
		        									<div class="row">
		        										<div class="col-12 col-sm-12 col-md-8 col-lg-8" style="margin-right:auto;">
		        											<h5 class="pros" style="color:grey;padding-left:10px;font-size:18px !important;">Pros</h5>
		        											<div class="row">
		        												<div class="col-12">
		        													<p style="padding-left:10px;"><?php echo $reviews['props'];?></p>
		        												</div>
		        											</div>
		        											<h5 class="cons m-t-10" style="color:grey;padding-left:10px;font-size:18px !important;">Cons</h5>
		        											<div class="row">
		        												<div class="col-12">
		        													<p style="padding-left:10px;"><?php echo $reviews['cons'];?></p>
		        												</div>
		        											</div>
		        											<?php foreach($reviews['descriptionextra'] as $extras){?>
		        											<h5 class="m-t-10" style="color:grey;padding-left:10px;font-size:18px !important;"><?php echo $extras['meta_key'];?></h5>
		        											<div class="row">
		        												<div class="col-12">
		        													<p style="padding-left:10px;"><?php echo $extras['meta_value'];?></p>
		        												</div>
		        											</div>
		        											<?php }?>
		        										</div>
		        										
		        										<div class="col-12 col-sm-12 col-md-4 col-lg-4" style="">
		        											<div class="row">
		        												<?php if(count($reviews['ratingextra']) > 0){?>
		        												<div class="col-12">
				        											<h5 style="color:#949597;text-align: center;">Rating breakdown</h5>
				        											<div class="row m-t-10">
			        													<?php foreach($reviews['ratingextra'] as $extras){?>
			        														<div class="col-12" style="text-align: center;">
			        															<span class="m-l-5" style="color:grey !important;font-size:12px;overflow:hidden;text-overflow:hidden;white-space:nowrap;"><?php echo $extras['meta_key'];?></span>	
			        														</div>
			        														<div class="col-12" style="text-align: center;">
						        											<?php for($index_score = 0;$index_score < $extras['meta_value'];$index_score ++){?>
														                    <i class="fas fa-star full" style="margin:0px 2px;"></i>
														                    <?php }?>
														                    <?php for($index_score = $extras['meta_value'] + 1;$index_score <=5;$index_score ++){?>
														                      <i class="fas fa-star empty"></i>
														                    <?php }?>
														                    
														                    </div>
			        													<?php }?>	
				        											</div>
				        										</div>
				        										<?php }?>
				        									</div>
		        										</div>
		        										
		        									</div>
		        								</div>
		        								<div class="col-12 m-t-10">
		        									<a href="#" class="readmore">Read the full review <i class="fas fa-angle-down m-l-10"></i></a>
		        								</div>
		        							</div>
		        						</div>
		        					</div>
		        				<?php }?>
	        			</div>
	        			<div class="col-12">
	        				<div class="row m-t-10 m-b-100" style="border-top:solid 1px black;margin:0px;padding-top:50px;">
										<div class="col-12">
											<nav aria-label="Page navigation" style="margin-bottom:30px;"  id="pagenavigation-container">
										        <ul class="pagination" id="pagination"></ul>
										    </nav>
										</div>
									</div>
	        				</div>
	        			</div>
	        			<?php }?>
	        		</div>
	        	</div>
	        </div>
	      </div>
	     </div>
    </div>
  </div>