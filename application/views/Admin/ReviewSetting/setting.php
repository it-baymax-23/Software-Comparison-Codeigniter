<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        	<div class="row m-b-30">
        		<div class="col-md-12">
        			<span class="btn btn-success pull-right save_product_review" style="padding:10px 20px;" product_id="<?php echo $product[0]['id'];?>">Save Review Setting <i class="fas fa-save m-l-10"></i></span>
        		</div>
        	</div>
	        <div class="row">
	        	<div class="col-md-12 user-data p-b-30 m-b-30">
	        		<!-- <h3 class="title-3 m-b-30"><i class="fab fa-product-hunt"></i>Product Info</h3> -->
	        		<div class="row" style="padding: 15px;">
	        			<div class="col-md-3"  style=" vertical-align: middle;">
	        				<img src="<?php echo base_url() . $product[0]['logo']?>"  style="width: 100%; height: auto;"/>
	        			</div>
	        			<div class="col-md-9">
	        				<div class="col-md-12">
	        					<div class="row">
		        					<h3><?php echo $product[0]['name'];?></h3>
		        				</div>
		        				<div class="row">
		        					<span>
		        						<?php 
		        						$score = 0;
		        						if($product[0]['score'] != 0){$score = $product[0]['score']/$product[0]['review'];}
		        							$value_score = floor($score); 
		                    				$half_score = $score - $value_score;
		        						?>
		        						<?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
						                    <i class="fas fa-star highlighted" style="color:yellow"></i>
						                    <?php }?>
						                    <?php if(round($half_score,1) > 0){?>
						                      <i class="fas fa-star-half-alt highlighted" style="color:yellow"></i>
						                    <?php } else if($value_score < 5){?>
						                    <i class="far fa-star"></i>
						                    <?php }?>
						                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
						                      <i class="far fa-star"></i>
						                    <?php }?>
						                    <?php echo round($half_score,1) + $value_score;?>/5(<?php echo $product[0]['review'];?>)
						            </span>
		        				</div>
	        				</div>
	        				<br>
	        				<p><?php echo $product[0]['description'];?></p>
	        			</div>
	        		</div>
	        		<div class="row m-t-15" style="padding: 15px;">
	        			<div class="col-6">
			        		<div class="row m-t-10">
			        			<label class="col-3">Resource</label>
			        			<div class="col-7">
			        				<select class="form-control" name="resource_id">
			        					<?php foreach($resources as $key => $value){?>
			        					<option value="<?php echo $value['webid']?>" <?php if($value['webid'] == $product[0]['resource_id']){echo 'selected';}?>><?php echo $value['website'];?></option>
			        					<?php }?>
			        				</select>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="col-6">
			        		<div class="row m-t-10">
			        			<label class="col-3">Product Url</label>
			        			<div class="col-7">
			        				<input class="form-control" name="producturl" value="<?php echo isset($product[0]['producturl'])?$product[0]['producturl']:'';?>">
			        			</div>
			        		</div>
			        	</div>
		        	</div>
	        	</div>
	        </div>
	    </div>
	</div>
</div>50.62.176.253