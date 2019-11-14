	<!-- Blog -->

	<style>
		.highlighted
		{
			color:rgb(249,191,59);
		}

		div.comparisontable{
		    display: flex;
		    flex-direction: column; /* turn children ul elements into stacked rows */
		    overflow-x:scroll; 
		}
			 
			 
		div.comparisontable ul.row{
		    list-style: none; 
		    
		    flex-wrap: wrap;
		}
		 
		div.comparisontable ul.row li{
		    background: white;
		    flex: 1;
		    padding: 10px;
		    border-bottom: 1px solid gray;
		    border-left: 1px solid #cadce6;
		}
		 
		/* the legend column (first li within each row) */
		div.comparisontable ul.row li.legend{
		    background:rgb(11,152,183);
		    color: white;
		    border: none;
		    width: 200px;
		    border-bottom: 1px solid white;
		    text-align: center;
		}
		 
		/* very first row */
		div.comparisontable ul.row li{
		    text-align: center;
		}
		 
		/* very last row */
		div.comparisontable ul.row:last-of-type li{
		    text-align: center;
		    border-bottom: none;
		    box-shadow: 0 6px 6px rgba(0,0,0,0.23);
		}
		 
		 
		/* first and last cell within legend column */
		
		.removeone
		{
			font-size:12px;
		}

		.removeone:hover
		{
			color:red;
			cursor:pointer;
		}

		.fa-check-circle
		{
			color:green;
		}
	</style>
	<!-- Blogs section start -->
	<section class="page-container" style="padding:0px;min-width: content;">
		<div class="main-content" style="padding-top:20px;padding-bottom:30px;">
			<div class="section__content section__content--p30">
		        <div class="container-fluid">
		        	<div class="row">

		        		<div class="comparisontable col-md-12" style="padding:0px;">
 
						    <ul class="row sticky" style="z-index:1200;margin:0px;">
						        <li style="display: table-cell;">
						        	<span class="btn btn-danger col-md-12 removeall">Remove All Product<i class="fa fa-trash" style="margin-left:10px;"></i></span>
						        	<span class="btn btn-primary col-md-12 addproduct"  style="margin-top:10px;">Add Product<i class="fa fa-plus-circle" style="margin-left:10px;"></i></span>
						        	<span class="btn btn-success col-md-12" style="margin-top:10px;">Share<i class="fa fa-share" style="margin-left:10px;"></i></span></li>
						        <?php foreach($product as $products){?>
						        <li style="display: table-cell;">
						        	<span class="pull-right removeone" attr_id="<?php echo $products[0]['id'];?>">Remove Product<i class="fa fa-times-circle" style="margin-left:10px;"></i></span>
						        	<br/>
						        	<div class="col-12">
						        		<div class="row">
						        			<div class="col-12 col-sm-12 col-md-12 col-lg-4">
						        				<img src="<?php echo base_url() . $products[0]['logo'];?>" style="border:solid 1px grey;width:70px;height:70px;"/>
						        			</div>
						        			<div class="col-12 col-sm-12 col-md-12 col-lg-8">
						        				<div class="row">
						        					<h3 style="font-size:20px;text-align: left;"><?php echo $products[0]['name'];?></h3>			
						        				</div>
						        				<div class="row">
						        					<span style="font-size:12px;">by Culture Amp</span>
						        				</div>
						        				<div class="row">
						        					<?php 
														$score = $products[0]['score'];

														if($score > 0)
														{
															$score = $score / $products[0]['review'];
														}
														$value_score = floor($score); 

														$half_score = $score - $value_score;
													?>

													<span style="font-size:16px;">
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
								                    <?php echo round($half_score,1) + $value_score;?>/5 (<?php echo $products[0]['review'];?> reviews)</span>
						        				</div>
						        				<div class="row">
						        					<?php if($products[0]['product_detail']['websiteurl']){?>
						        					<a class="btn btn-primary" href="<?php echo $products[0]['product_detail']['websiteurl'];?>" style="width:180px;">Visit Website <i class="fa fa-share" style="margin-left:12px;"></i></a>
						        					<?php } else{?>
						        					<a class="btn btn-primary" href="<?php echo base_url();?>productdetail/<?php echo $products[0]['id'];?>" style="width:180px;">View Profile <i class="fa fa-share" style="margin-left:12px;"></i></a>
						        					<?php }?>	
						        				</div>
						        			</div>
						        		</div>
						        	</div>
						        </li>
						        <?php }?>
						    </ul>
						     <ul class="row">
						     	<li>
						     		Best For
						     	</li>	
						     </ul>
						    <ul class="row">
						        <li class="legend" style="text-align: center;line-height: 100px;">Who Uses This Software?</li>
						        <?php foreach($product as $products){?>
						        <li> <?php echo $products[0]['product_detail']['who_use'];?></li>
						        <?php }?>
						    </ul>
						     
						    <ul class="row">
						        <li class="legend" style="text-align: center;">Target Customer Size(Users)</li>
						        <?php foreach($product as $products){?>
						        <li>10 ~ 1000+</li>
						        <?php }?>
						    </ul>
     						
     						<ul class="row">
						     	<li>
						     		Pricing
						     	</li>	
						     </ul>
						    <ul class="row">
						        <li class="legend" style="text-align: center;">Starting Price</li>
						        <?php foreach($product as $products){?>
						        <li><?php echo isset($products[0]['product_detail']['start_price'])?$products[0]['product_detail']['start_price']:'';?></li>
						        <?php }?>
						    </ul>
						     
						    <ul class="row">
						        <li class="legend" style="text-align: center;">Free Trial</li>
						        <?php foreach($product as $products){?>
						        <?php if($products[0]['product_detail']['freetrial']){echo '<li style="font-size:18px;"><i class="fa fa-check-circle" style="margin-right:12px;color:green;"></i>Yes</li>';}else{echo '<li>No</li>';}?>
						        <?php }?>
						    </ul>
						     <ul class="row">
						        <li class="legend" style="text-align: center;">Free Version</li>
						        <?php foreach($product as $products){?>
						        <?php if(isset($products[0]['product_detail']['freedemo'])){echo '<li style="font-size:18px;"><i class="fa fa-check-circle" style="margin-right:12px;color:green;"></i>Yes</li>';}else{echo '<li>No</li>';}?>
						        <?php }?>
						    </ul>

						    <ul class="row">
						     	<li>
						     		Product Details
						     	</li>	
						     </ul>
						    <ul class="row">
						        <li class="legend" style="text-align: center;">Plat Form</li>
						        <?php foreach($product as $products){?>
						        <li>
						        	<div class="col-md-12">
						        		<h4 class="row">web/installed</h4>
						        	</div>
						        	<div class="col-md-12">
						        		<span class="row">
							        		<i class="fa fa-cloud" style="font-size:27px;margin:5px 15px;margin-left:0px;"></i><i class="fab fa-windows" style="font-size:27px;margin:5px 15px;"></i><i class="fab fa-apple" style="font-size:27px;margin:5px 15px;opacity: 0.5;"></i>
							        	</span>
						        	</div>
						        	<div class="col-md-12" style="margin-top:10px;">
						        		<h4 class="row">mobile</h4>
						        	</div>
						        	<div class="col-md-12">
						        		<span class="row">
							        		<i class="fab fa-android" style="font-size:27px;margin:5px 15px;margin-left:0px;"></i>
							        	</span>
						        	</div>
						        </li>
						        <?php }?>
						    </ul>

						     <ul class="row">
						        <li class="legend" style="text-align: center;">Features</li>
						        <?php foreach($product as $products){
						        	?>
						        <li style="text-align: left;">
						        	<?php foreach($products[0]['feature'][$categoryid] as $key => $value){?>
						        	<?php if($value['type'] == 'checkbox'){
						        		$check = 'opacity: 0.5;color:grey';
						        		if($value['value'] == 'true'){
						        			$check  ='';
						        		}
						        	?>
						        	<div class="col-md-12">
						        		<i class="fa fa-check-circle" style="margin-right:12px;<?php echo $check;?>"></i><?php echo $value['name'];?>
						        	</div>
						        	<?php }
						        	else if($value['type'] == 'input'){?>
						        	<div class="col-md-12">
						        		<?php echo $value['name'] . '  :  ' . $value['value'];?>
						        	</div>
						        	<?php }
						        }?>
						        </li>
						        <?php }?>
						    </ul>
						    <ul class="row">
						     	<li>
						     		Ratings
						     	</li>	
						     </ul>
						    <ul class="row" style="text-align: center;">
						        <li class="legend" style="text-align: center;">Over All In Rating</li>
						        <?php foreach($product as $products){?>
						        <li>
						        	<?php 
										$score = $products[0]['allreview']['over_all']['score'];

										if($score > 0)
										{
											$score = $score / $products[0]['allreview']['over_all']['count'];
										}
										$value_score = floor($score); 

										$half_score = $score - $value_score;
									?>
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
						        </li>
						        <?php }?>
						    </ul>

						    <ul class="row">
						        <li class="legend" style="text-align: center;">Easy Of Use</li>
						        <?php foreach($product as $products){?>
						        <li>
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
						        </li>
						        <?php }?>
						    </ul>

						    <ul class="row">
						        <li class="legend" style="text-align: center;">Customer Service</li>
						        <?php foreach($product as $products){?>
						        <li>
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
						        </li>
						        <?php }?>
						    </ul>

						    <ul class="row">
						        <li class="legend" style="text-align: center;">Features & Functionality</li>
						        <?php foreach($product as $products){?>
						        <li>
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
						        </li>
						        <?php }?>
						    </ul>

						    <ul class="row">
						        <li class="legend" style="text-align: center;">Value for Money</li>
						        <?php foreach($product as $products){?>
						        <li>
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
						        </li>
						        <?php }?>
						    </ul>

						    <ul class="row">
						     	<li>
						     		Training And Support
						     	</li>	
						     </ul>
						    <ul class="row">
						        <li class="legend" style="text-align: center;">Support</li>
						        <?php foreach($product as $products){
						        	$support = $products[0]['product_detail']['support'];
						        	?>
						        <li style="text-align: left;">
						        	<div class="col-md-12">
						        		<?php 
						        		$check = 'opacity: 0.5;color:grey';
						        		if($support['liverep'] == 'true'){ $check = '';}?>
						        		<span><i class="fa fa-user" style="margin-right:12px;<?php echo $check;?>"></i>24/7 (Live Rep) </span>
						        	</div>
						        	<div class="col-md-12">
						        		<?php 
						        			$check = 'opacity: 0.5;color:grey'; 
						        			if($support['businesshour'] == 'true')
						        			{
						        				$check = '';
						        			}
						        		?>
						        		<span><i class="fas fa-clock" style="margin-right:12px;<?php echo $check;?>"></i>Business Hours </span>
						        	</div>
						        	<div class="col-md-12">
						        		<?php 
						        			$check = 'opacity: 0.5;color:grey'; 
						        			if($support['onLine'] == 'true')
						        			{
						        				$check = '';
						        			}
						        		?>
						        		<span><i class="fa fa-desktop" style="margin-right:12px;<?php echo $check;?>"></i>Online </span>
						        	</div>

						        </li>
						        <?php }?>
						    </ul>

						    <ul class="row">
						        <li class="legend" style="text-align: center;">Training</li>
						        <?php foreach($product as $products){
						        	$trial = $products[0]['product_detail']['training'];
						        	?>
						        <li style="text-align: left;">
						        	<div class="col-md-12">
						        		<?php 
						        			$check = 'opacity: 0.5;color:grey'; 
						        			if($trial['inperson'] == 'true')
						        			{
						        				$check = '';
						        			}
						        		?>
						        		<i class="fa fa-check-circle" style="margin-right:12px;<?php echo $check;?>"></i>In Person
						        	</div>
						        	<div class="col-md-12">
						        		<?php 
						        			$check = 'opacity: 0.5;color:grey'; 
						        			if($trial['liveonline'] == 'true')
						        			{
						        				$check = '';
						        			}
						        		?>
						        		<i class="fa fa-check-circle" style="margin-right:12px;<?php echo $check;?>"></i>Live Online
						        	</div>
						        	<div class="col-md-12">
						        		<?php 
						        			$check = 'opacity: 0.5;color:grey'; 
						        			if($trial['Webinars'] == 'true')
						        			{
						        				$check = '';
						        			}
						        		?>
						        		<i class="fa fa-check-circle" style="margin-right:12px;<?php echo $check;?>"></i>Webnairs
						        	</div>
						        	<div class="col-md-12">
						        		<?php 
						        			$check = 'opacity: 0.5;color:grey'; 
						        			if($trial['Documentation'] == 'true')
						        			{
						        				$check = '';
						        			}
						        		?>
						        		<i class="fa fa-check-circle" style="margin-right:12px;<?php echo $check;?>"></i>Documentation
						        	</div>
						        </li>
						        <?php }?>
						    </ul>
						</div>		
		        	</div>
				</div>	
			</div>
	</section>
	<!-- Blogs section end -->
	