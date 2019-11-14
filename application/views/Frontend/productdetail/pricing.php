<div class="back_grey row p-t-50 p-b-50">
	<div class="compare_container">
		<div class="col-12">
	      <div class="row">
	        <div class="col-12 col-sm-12 col-md-10 col-lg-12" style="margin-left:auto;margin-right:auto;">
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
	        			<h3><?php echo $products[0]['name'];?> Pricing</h3>
	        			<div class="row m-t-20">
	        				<div class="col-6">
	        					<div class="row">
	        						<?php if($products[0]['product_detail']['start_price'])
	        						{
	        							echo '<div class="col-12 m-t-10"><span style="font-size:16px !important;font-weight:500;color:black !important;">Starting Price:</span> ' . $products[0]['product_detail']['start_price'] . '$/months</div>';
	        						}?>
	        						<?php if(isset($products[0]['product_detail']['pricemodel']))
	        						{
	        							echo '<div class="col-12 m-t-10"><span style="font-size:16px !important;font-weight:500;color:black !important;">Pricing Model:</span> ' . join(' , ',$products[0]['product_detail']['pricemodel']) . '</div>';
	        						}?>
	        						<div class="col-12 m-t-10">
				        				<?php if($products[0]['product_detail']['priceplan']){?>
				        				<a href="<?php echo $products[0]['product_detail']['priceplan']?>" class="btn btn-primary">
				        					VIEW PRICE PLAN
				        				</a>
				        				<?php } ?>
				        				<?php if(isset($products[0]['product_detail']['pricemodel']) && in_array('freetrial',$products[0]['product_detail']['pricemodel']) && $products[0]['product_detail']['freetrial']){?>
				        				<a href="<?php echo $products[0]['product_detail']['freetrial']?>" class="btn btn-primary">
				        					FREE TRIAL
				        				</a>
				        				<?php } ?>
				        			</div>
	        					</div>
	        				</div>
	        				<div class="col-6">
	        					<div class="row">
	        						<div class="col-12">
	        							<?php $product_detail = explode("\n",$products[0]['product_detail']['price_detail']);
	        							foreach($product_detail as $detail)
	        							{
	        							?>
	        							<p class="m-t-10" style="font-size:13px !important;color:black;"><?php echo $detail;?></p>
	        							<?php }?>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        			
	        		</div>

	        		<div class="col-12 back_white m-t-20" style="padding:20px 20px;">
	        			<h3>Comparision with the Software price in <?php echo $category;?></h3>
	        			<div class="row m-t-20">
	        				<div class="col-12">
	        					<h6 class="text_center" style="text-align: center;">Pricing Comparision</h6>
	        					<p class="text_center"  style="text-align: center;"><?php echo $category;?> app prices shown are as $/month</p>
	        				</div>
	        				<div class="col-12 m-t-20">
	        					<div id="compare_price" attr_cat="<?php echo $category;?>">
	        						
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