<style type="text/css">
	.highlighted
	{
		color:yellow;
	}
</style>

<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        	<div class="user-data row">
	        	<div class="col-md-12" style="text-align: left; margin-bottom: 30px;">
	              <div class="col-md-12">
	                <div class="col-md-12" style="margin-top:20px;">
	                  <h3><?php echo count($review);?> Reviews Of <?php echo $products[0]['name'];?></h3>
	                </div>
	                <div class="col-md-12 m-t-20">
	                  <label style="font-weight: bold;">Over all Rating</label>
	                </div>
	                <div class="col-md-12">
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
	                    
	                    $value_score = floor($score); 
	                    $half_score = $score - $value_score;
	                  ?>
	                  <span>
	                    <?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
	                    <i class="fas fa-star highlighted"></i>
	                    <?php }?>
	                    <?php if(round($half_score,1) > 0){?>
	                      <i class="fas fa-star-half-alt highlighted"></i>
	                    <?php } else if($value_score < 5){?>
	                    <i class="far fa-star"></i>
	                    <?php }?>
	                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
	                      <i class="far fa-star"></i>
	                    <?php }?>
	                    <?php echo round($half_score,1) + $value_score;?>/5</span>
	                </div>
	              </div>
	            </div>
	            <hr/>
	            <?php foreach($review as $reviews){?> 
	            <div class="col-md-12 page-card" style="text-align: left; margin-bottom: 20px;">
	            	<div class="row m-l-10 m-r-10 au-card au-card--shadow au-card--no-pad">
		              	<div class="col-md-4 au-card au-card--shadow au-card--no-pad p-b-40" style="margin: 15px;">
			                <div class="col-md-12">
			                  <label class="p-t-20" style="margin-bottom: 0px;"><span style="font-weight: bold; font-style: italic; font-size: 20px;"><?php echo isset($reviews['username'])?$reviews['username']:'';?></span> from <span style="font-style: italic;"><?php if(isset($reviews['usertype']) && $reviews['usertype'] == 'administrator'){echo 'CompareSoftware.com';} else{ echo isset($reviews['company'])?$reviews['company']:'';}?><span></label>
			                </div>
			                <hr/>
			                <div class="m-t-12">
			                  <label class="col-md-7" style="font-weight: bold;">Over All</label>
			                  <span class="col-md-5" style="font-weight: bold;font-size:14px;">
			                    <?php for($index = 0;$index<$reviews['over_all'];$index++){?>
			                    <i class="fas fa-star highlighted"></i>
			                    <?php }?>
			                    <?php for($index = $reviews['over_all'];$index<5;$index++){?>
			                    <i class="far fa-star"></i>
			                    <?php }?>
			                  </span>
			                </div>
			                <?php foreach($reviews['ratingextra'] as $extras){?>
				                <div class="m-t-12">
				                  <label class="col-md-7" style="font-weight: bold; font-size: 14px;"><?php echo $extras['meta_key'];?></label>
				                  <span class="col-md-5" style="font-weight: bold; font-size: 14px;">
				                    <?php for($index = 0;$index<$extras['meta_value'];$index++){?>
				                    <i class="fas fa-star highlighted"></i>
				                    <?php }?>
				                    <?php for($index = $extras['meta_value'];$index<5;$index++){?>
				                    <i class="far fa-star"></i>
				                    <?php }?>
				                  </span>
				                </div>
			                <?php }?>
		              	</div>
		              	<div class="col-md-7 m-b-40">
		                	<div class="row" style="padding:20px;">
		                  		
		                  		<div class="col-md-12">
		                  			<span class="btn btn-danger deletereview"  style="float: right; border-radius: 20px;" attr_id='<?php echo $reviews['id'];?>'> Delete <i class="fas fa-trash"></i></span>
		                  			<a class="btn btn-success m-l-5" href="<?php echo base_url() . 'admin/review/editreview/' . $reviews['id'];?>"  style="float: right; margin-right: 10px; border-radius: 20px;"> Edit <i class="fas fa-edit"></i></a>	
		                  		</div>
		                  		<h3 class="col-md-12" style="margin-bottom:20px;"><?php echo $reviews['title'];?></h3>
		                  
		                  		<div class="col-md-12">
		                    		<p><?php echo $reviews['description'];?></p>
		                  		</div>
		                  		<h4 class="col-md-12" style="margin-top:20px;">Props</h4>
		                  		<div class="col-md-12">
		                    		<p><?php echo $reviews['props'];?></p>
		                  		</div>
		                  		<h4 class="col-md-12" style="margin-top:20px;">Cons</h4>
		                  		<div class="col-md-12">
		                    		<p><?php echo $reviews['cons'];?></p>
		                  		</div>
		                  		<?php foreach($reviews['descriptionextra'] as $extras){?>
		                  			<h4 class="col-md-12" style="margin-top:20px;"><?php echo $extras['meta_key'];?></h4>
		                  			<div class="col-md-12">
		                    			<p><?php echo $extras['meta_value'];?></p>
		                  			</div>
		                  		<?php }?>
		                	</div>
		              	</div>
		          	</div>
	            </div>
	            <?php }?>

                <div class="col-md-12">
                    <nav class="aria-pagination" aria-label="Page navigation" style="margin-bottom:30px; float: right;">
                        <ul class="pagination" id="pagination" style="margin-left: 0px;"></ul>
                    </nav>
                </div>
	          </div>
        </div>
    </div>
</div>