<div class="back_grey row p-t-20 p-b-20">
	<div class="compare_container">
		<div class="col-12">
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
        					<div class="m-t-20" style="margin-left: auto;float: right;">
			        			<div style="display: table">
				        			<span class="btn btn-danger" style="width:180px;">
				        				VISIT WEBSITE
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
        		<div class="col-12 m-t-20">
        			<div class="row">
        				<div class="col-8">
        					<div class="row" style="margin-right:0px;">
        						<div class="col-12 back_white" style="padding:30px;">
        							<div class="row">
        								
        							</div>
        							<div class="row" id="rating">
        								<div class="col-12">
        									<div class="row m-t-40">
	        								<h5 class="col-12 star-header">Overall rating</h5>
	        								<div class="col-12 m-t-10" attr_name = "over_all">
	        									<i class="fas fa-star empty writestar" attr_value="1"></i>
	        									<i class="fas fa-star empty writestar"  attr_value="2"></i>
	        									<i class="fas fa-star empty writestar" attr_value="3"></i>
	        									<i class="fas fa-star empty writestar" attr_value="4"></i>
	        									<i class="fas fa-star empty writestar" attr_value="5"></i>
	        								</div>
		        							</div>
		        							<div class="row m-t-20">
		        								<div class="col-6">
		        									<div class="row">
				        								<h5 class="col-12 star-header">Features & Functionality</h5>
				        								<div class="col-12 m-t-10" attr_name="Features & Functionality">
				        									<i class="fas fa-star empty writestar"  attr_value="1"></i>
				        									<i class="fas fa-star empty writestar" attr_value="2"></i>
				        									<i class="fas fa-star empty writestar" attr_value="3"></i>
				        									<i class="fas fa-star empty writestar" attr_value="4"></i>
				        									<i class="fas fa-star empty writestar" attr_value="5"></i>
				        								</div>
				        							</div>
			        							</div>
			        							<div class="col-6">
			        								<div class="row">
				        								<h5 class="col-12 star-header">Value For Money(optional)</h5>
				        								<div class="col-12 m-t-10" attr_name="Value for money">
				        									<i class="fas fa-star empty writestar" attr_value="1"></i>
				        									<i class="fas fa-star empty writestar" attr_value="2"></i>
				        									<i class="fas fa-star empty writestar" attr_value="3"></i>
				        									<i class="fas fa-star empty writestar" attr_value="4"></i>
				        									<i class="fas fa-star empty writestar" attr_value="5"></i>
				        								</div>
				        							</div>
			        							</div>
		        							</div>
		        							<div class="row m-t-20">
		        								<div class="col-6">
		        									<div class="row">
				        								<h5 class="col-12 star-header">Ease Of Use</h5>
				        								<div class="col-12 m-t-10" attr_name="Ease Of Use">
				        									<i class="fas fa-star empty writestar" attr_value="1"></i>
				        									<i class="fas fa-star empty writestar" attr_value="2"></i>
				        									<i class="fas fa-star empty writestar" attr_value="3"></i>
				        									<i class="fas fa-star empty writestar" attr_value="4"></i>
				        									<i class="fas fa-star empty writestar" attr_value="5"></i>
				        								</div>
				        							</div>
			        							</div>
			        							<div class="col-6">
			        								<div class="row">
				        								<h5 class="col-12 star-header">Customer Support(optional)</h5>
				        								<div class="col-12 m-t-10" attr_name="Customer Support">
				        									<i class="fas fa-star empty writestar" attr_value="1"></i>
				        									<i class="fas fa-star empty writestar" attr_value="2"></i>
				        									<i class="fas fa-star empty writestar" attr_value="3"></i>
				        									<i class="fas fa-star empty writestar" attr_value="4"></i>
				        									<i class="fas fa-star empty writestar" attr_value="5"></i>
				        								</div>
				        							</div>
			        							</div>
		        							</div>		
        								</div>
        							</div>
        							<form class="row" id="description" style="display:none;">
        								<div class="col-12">
        									<div class="row m-t-20">
		        								<h3 class="col-12">Your Review</h3>
		        							</div>
		        							<div class="row m-t-20">
		        								<label class="col-12">Title Your Review</label>
		        								<div class="col-12 m-t-5">
		        									<input class="form-control" name="title">
		        								</div>
		        							</div>
		        							<div class="row m-t-20">
		        								<label class="col-6">Pros</label>
		        								<div class="col-6"><span style="float:right;"><span class="textlength">0</span>/100 charaters minimum</span></div>
		        								<div class="col-12">
		        									<textarea class="form-control" name="props" rows="5"></textarea>
		        								</div>
		        							</div>
		        							<div class="row m-t-20">
		        								<label class="col-6">Cons</label>
		        								<div class="col-6"><span style="float:right;"><span class="textlength">0</span>/100 charaters minimum</span></div>
		        								<div class="col-12">
		        									<textarea class="form-control" name="cons" rows="5"></textarea>
		        								</div>
		        							</div>
		        							<div class="row m-t-20">
		        								<label class="col-6">Over All</label>
		        								<div class="col-6"><span style="float:right;"><span class="textlength">0</span>/100 charaters minimum</span></div>
		        								<div class="col-12">
		        									<textarea class="form-control" name="description" rows="5"></textarea>
		        								</div>
		        							</div>		
        								</div>
        							</form>
        							
        							<div class="row m-t-20" style="border-top:solid 1px #808285;">
        								<div class="col-12 m-t-20">
        									<span id="next" class="btn btn-primary" style="font-size:20px !important;float:left;" >Continue</span>
        									<span id="submit" class="btn btn-success" style="font-size:20px !important; float:right;display: none;" attr_id="<?php echo $products[0]['id'];?>">Submit Review</span>
         								</div>
        							</div>
        						</div>
        					</div>
        					
        				</div>
        				<div class="col-4">
        					<div class="row" style="margin-left:0px;">
        						<?php foreach($review as $key => $reviews){?>
        						<div class="col-12 back_white <?php if($key != 0){ echo 'm-t-20';}?>" style="padding:20px 20px;">
        							<?php if($key == 0){?>
	        							<h4 class="m-b-20">Latest Reviews</h4>
	        							<?php }?>	        		
	        							<div class="row">
	        								<div class="col-12">
	        									<h5><?php star_display($reviews['over_all'],1);?>
	        										<?php echo $reviews['title'];?>
	        									</h5>
	        								</div>
	        								<div class="col-12 m-t-5">
	        									<p><?php echo $reviews['description'];?></p>
	        								</div>
	        								<div class="col-12 m-t-5">
	        									<?php 
	        										$date = display_date($reviews['created_date']);
	        									?>
	        									<p>Reviewed <?php echo $date['day'];?>th of <?php echo $date['month'];?>, <?php echo $date['year'];?> by <?php echo $reviews['username'];?></p>
	        								</div>
	        							</div>
	        							<?php if($key == 2){
	        								break;
	        							}?>
        						</div>
        						<?php }?>
        					</div>
        					
        				</div>
        			</div>
        		</div>
			</div>
		</div>
	</div>
</div>
