<div class="back_grey row p-t-50 p-b-50">
    <div class="compare_container">
    	<div class="col-12">
	      <div class="row">
	        <div class="col-12 col-sm-12 col-md-10 col-lg-9" style="margin-left:auto;margin-right:auto;">
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
	        			<div class="row" style="padding-left:20px;">
	        				<h3 style="text-align: center;">The Feature Summary for <?php echo $products[0]['name'];?></h3>
	        			</div>
	        			<div class="row m-t-30">
	        				<div class="col-12">
	        					<?php $index_feature = 0;?>
	        				<?php foreach($products[0]['feature'] as $key => $value){?>
	        					<?php 
		                          	
		                            if($index_feature % 2 == 0){
		                              echo '<div class="row">';
		                            }
		                            if($value['type'] == 'checkbox'){
		                              $unchecked = 'opacity:0.5';

		                              if($value['value'] == 'true')
		                              {
		                                $unchecked = 'color:green;';
		                              }
		                          ?>
		                          <div class="col-md-6">
		                          	<div class="row">
			                            <span class="col-8" style="font-size:18px !important;"><?php echo $value['name'];?></span><span class="p-t-5 col-4"  style="font-size:18px !important;"><i class="fa fa-check-circle" style="float:right;<?php echo $unchecked;?>"></i></span>
			                        </div>
		                          </div>
		                          <?php } else{?>
		                          <div class="col-md-6">
		                          	<div class="row">
		                            	<span class="col-8" style="font-size:18px !important;"><?php echo $value['name']?></span><span class="col-4" style="text-align: right;font-size:18px !important;"><?php echo $value['value'];?></span>
		                            </div>
		                          </div>
		                          
		                      <?php }
		        
		                      	  if($index_feature % 2 == 1){
		                            echo '</div>';
		                          }
		                          $index_feature ++;
		                    }?>
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