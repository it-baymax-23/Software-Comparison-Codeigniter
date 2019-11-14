<div class = "back_grey row p-t-50 p-b-50">
	<div class="compare_container">
		<div class="col-12" id="comparebuttonlist">
			<div class="row">
				<?php foreach($product as $key => $products){?>
				<div class="col-3">
					<div class="row">
						<div class="back_white compare_product_list" style="width:99%;margin-right:auto;" attr_id = "<?php echo $products[0]['id'];?>">
							<div class="row" style="padding:20px 20px;position:relative;">
								<?php if($key != 0){?>
								<span class="btn btn-danger delete_compare_item" style="position:absolute;right:15px;top:0px;"><i class="fas fa-times"></i></span>
								<?php }?>
								<div class="product_logo" style="margin-left:10px;">
									<a href="<?php echo $products[0]['product_detail']['websiteurl'];?>" class="productlink">
										<img src="<?php echo base_url() . $products[0]['logo'];?>">
									</a>
								</div>
								<div class="col-7">
									<a href="<?php echo base_url() .'productdetail/'. preg_replace('/ /','-',$products[0]['category'][0]['name']) .'/'. $products[0]['id'] .'/appinfo';?>" class="compare_product_text"><?php echo $products[0]['name'];?></a>
									<div class="row m-t-10">
										<div class="col-12">
											<?php star_display($products[0]['score'],$products[0]['review']);?>
										</div>
									</div>
								</div>
								<div class="col-12 m-t-10" style="text-align: center;">
									<a class="btn btn-primary" href="<?php echo $products[0]['product_detail']['websiteurl'];?>">VISIT THE SITE</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
				<?php for($index = $key+1;$index<4;$index++){?>
				<div class="col-3">
					<div class="row">
						<div class="back_white compare_product_list" style="width:99%;margin-right:auto;">
							<div class="row">
								<div class="col-12">
									<a class="row" href="#basic" data-toggle="modal"><img src="<?php echo base_url();?>images/icon/addbutton-1.png" style="margin:auto;padding-top:20px;opacity: 0.5;height:100px;"/></a>
									<div class="row m-t-10" style="text-align: center;">
										<div class="col-12">
											<a href="#basic" data-toggle="modal" style="font-size:20px !important">Add To Compare</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="col-12">
			<div class="row">
				<?php foreach($product as $key => $products){?>
				<div class="col-3">
					<div class="row">
						<div class="back_white p-b-30" style="width:99%;margin-right:auto;">
							<a href="<?php echo base_url() .'productdetail/'. preg_replace('/ /','-',$products[0]['category'][0]['name']) .'/'. $products[0]['id'] .'/appinfo';?>" class="col-12 m-t-10 comparename"><?php echo $products[0]['name'];?></a>
							<h4 class="col-12 m-t-5 comparetitle">Over View</h4>
							<h4 class="col-12 m-t-5 compareheader">Platforms supported</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Web based</h5>
									</div>
									<div class="col-4">
										<?php $product_deploy = preg_split('/,/',$products[0]['product_detail']['deploy']); $class="unchecked";
										if(in_array('webbase',$product_deploy)){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Windows</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if(in_array('windows',$product_deploy)){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Android</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if(in_array('android',$product_deploy)){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">IOS</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if(in_array('ios',$product_deploy)){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
							</div>

							<h4 class="col-12 m-t-10 compareheader">Training Model</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">In Person</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if($products[0]['product_detail']['training']['inperson'] == 'true'){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Live Online</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if($products[0]['product_detail']['training']['inperson'] == 'true'){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Webinairs</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										
										if($products[0]['product_detail']['training']['Webinars'] == 'true'){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Documentation</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if($products[0]['product_detail']['training']['Documentation'] == 'true'){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Support</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Liverep</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if($products[0]['product_detail']['support']['liverep'] == 'true'){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Business Hour</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if($products[0]['product_detail']['support']['businesshour'] == 'true'){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">On Line</h5>
									</div>
									<div class="col-4">
										<?

										$class = 'unchecked';
										if($products[0]['product_detail']['support']['onLine'] == 'true'){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
							</div>
							<a href="<?php echo base_url() .'productdetail/'. preg_replace('/ /','-',$products[0]['category'][0]['name']) .'/'. $products[0]['id'] .'/appinfo';?>" class="col-12 m-t-20 comparename"><?php echo $products[0]['name'];?></a>
							<h4 class="col-12 m-t-10 comparetitle">ScreenShots</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-12 comparescreenshot">
										<?php 
										$index = 0;
										$index_screenshot = $key + 1;
										foreach($products[0]['screenshot'] as $images){?>
										<a href="<?php echo base_url() . $images;?>"  class="html5lightbox" data-group="mygroup-<?php echo $index_screenshot;?>" data-thumbnail="<?php echo base_url() . $images;?>" data-width="300" data-height="300"><img src="<?php echo base_url() . $images;?>"></a>
										<?php $index++; }?>
										<?php if($products[0]['videourl']){?>
			                              <a href="<?php echo $products[0]['videourl'];?>"  class="html5lightbox" data-group="mygroup-<?php echo $index_screenshot;?>" data-thumbnail="<?php echo base_url();?>images/play.png" data-width="480" data-height="320"><img src="<?php echo base_url();?>images/play.png"></a>
			                            <?php $index++; }?>
			                            <span class="compare_desc" style="">View <?php echo $index;?> more</span>
									</div>
								</div>
							</div>
							<a href="<?php echo base_url() .'productdetail/'. preg_replace('/ /','-',$products[0]['category'][0]['name']) .'/'. $products[0]['id'] .'/appinfo';?>" class="col-12 m-t-20 comparename"><?php echo $products[0]['name'];?></a>
							<h4 class="col-12 m-t-5 comparetitle">Pricing</h4>
							<h4 class="col-12 m-t-5 compareheader">Starting From</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-12">
										<span class="comparelabel">$<?php echo isset($products[0]['product_detail']['start_price'])?$products[0]['product_detail']['start_price']:'';?>/month</span>
									</div>
								</div>
							</div>
							<h4 class="col-12 m-t-20 compareheader">Price model</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Free Trial</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if(isset($products[0]['product_detail']['pricemodel']) && in_array('freetrial',$products[0]['product_detail']['pricemodel'])){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Free Account</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if(isset($products[0]['product_detail']['pricemodel']) && in_array('free',$products[0]['product_detail']['pricemodel'])){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Subscription</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if(isset($products[0]['product_detail']['pricemodel']) && in_array('subscription',$products[0]['product_detail']['pricemodel'])){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">One Time</h5>
									</div>
									<div class="col-4">
										<?
										$class = 'unchecked';
										if(isset($products[0]['product_detail']['pricemodel']) && in_array('onetime',$products[0]['product_detail']['pricemodel'])){
											$class = 'checked';
										}
										?>
										<span class="comparecontent"><i class="fas fa-check-circle <?php echo $class;?>" style="float:right;"></i></span>
									</div>
								</div>
							</div>
							<a href="<?php echo base_url() .'productdetail/'. preg_replace('/ /','-',$products[0]['category'][0]['name']) .'/'. $products[0]['id'] .'/appinfo';?>" class="col-12 m-t-20 comparename"><?php echo $products[0]['name'];?></a>
							<h4 class="col-12 m-t-5 comparetitle">Reviews</h4>
							<h4 class="col-12 m-t-10 compareheader">Overall Rating</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display($products[0]['score'],$products[0]['review']);?>
								</span>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Ease Of Use</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display($products[0]['allreview']['ease_use']['score'],$products[0]['allreview']['ease_use']['count']);?>
								</span>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Value For Money</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display($products[0]['allreview']['value_money']['score'],$products[0]['allreview']['value_money']['count']);?>
								</span>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Customer Support</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display($products[0]['allreview']['customer_service']['score'],$products[0]['allreview']['customer_service']['count']);?>
								</span>
							</div>
							<h4 class="col-12 m-t-20 comparetitle">Last Reviewed</h4>
							<div class="col-12 m-t-5 comparecontent">
								<span class="" style="font-size:18px !important;">
								<?php if(isset($products[0]['lastreview'])){?>
								<?php 
									$arrayofdate = display_date($products[0]['lastreview']);
								?>
								<?php echo $arrayofdate['year'];?>, <?php echo (int)$arrayofdate['day'];?>th of <?php echo $arrayofdate['month'];?>
								<?php }?>
								</span>
							</div>
							<a href="<?php echo base_url() .'productdetail/'. preg_replace('/ /','-',$products[0]['category'][0]['name']) .'/'. $products[0]['id'] .'/appinfo';?>" class="col-12 m-t-20 comparename"><?php echo $products[0]['name'];?></a>
							<h4 class="col-12 m-t-10 comparetitle">Features</h4>
							<div class="col-12 m-t-5">
								<?php foreach($feature as $key_field => $features){?>
								<div class="row m-t-5">
									<div class="col-8">
										<span class="comparelabel"><?php echo $features;?></span>
									</div>
									<div class="col-4">
										<?php if(isset($products[0]['feature'][$key_field])){
											$value = $products[0]['feature'][$key_field];
											$class = 'unchecked';
											if($value['value'] == 'true')
											{
												$class = 'checked';
											}
											?>
											<i class="fas fa-check-circle <?php echo $class;?>"></i>
										<?php } else{?>
										<i class="fas fa-check-circle checked"></i>
										<?php }?>
									</div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<?php }
				$products = $product[0];
				?>
				<?php for($index = $key+1;$index<4;$index++){?>
				<div class="col-3">
					<div class="row">
						<div class="back_white p-b-30" style="width:99%;margin-right:auto;">
							<a class="col-12 m-t-10 comparename"></a>
							<h4 class="col-12 m-t-5 comparetitle">Over View</h4>
							<h4 class="col-12 m-t-5 compareheader">Platforms supported</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Web based</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Windows</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Android</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">IOS</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
							</div>

							<h4 class="col-12 m-t-10 compareheader">Training Models</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">In Person</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Live Online</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Webinairs</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Documentation</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Support</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Liverep</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Business Hour</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">On Line</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
							</div>
							<a class="col-12 m-t-20 comparename"></a>
							<h4 class="col-12 m-t-10 comparetitle">ScreenShots</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-12 comparescreenshot">
										
									</div>
								</div>
							</div>
							<a class="col-12 m-t-20 comparename"></a>
							<h4 class="col-12 m-t-5 comparetitle">Pricing</h4>
							<h4 class="col-12 m-t-5 compareheader">Starting From</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-12">
										<span class="comparelabel">$<?php echo $products[0]['product_detail']['start_price'];?>/month</span>
									</div>
								</div>
							</div>
							<h4 class="col-12 m-t-20 compareheader">Price model</h4>
							<div class="col-12 p-b-20" style="border-bottom:1px solid rgb(200,200,200);">
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Free Trial</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Free Account</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">Subscription</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-8">
										<h5 class="comparelabel">One Time</h5>
									</div>
									<div class="col-4">
										<span class="comparecontent"><i class="fas fa-check-circle unchecked" style="float:right;"></i></span>
									</div>
								</div>
							</div>
							<a class="col-12 m-t-20 comparename"></a>
							<h4 class="col-12 m-t-5 comparetitle">Reviews</h4>
							<h4 class="col-12 m-t-10 compareheader">Overall Rating</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display(0,0);?>
								</span>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Ease Of Use</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display(0,0);?>
								</span>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Value For Money</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display(0,0);?>
								</span>
							</div>
							<h4 class="col-12 m-t-10 compareheader">Customer Support</h4>
							<div class="col-12 m-t-5">
								<span class="comparecontent" style="font-size:18px !important;">
								<?php 
									star_display(0,0);?>
								</span>
							</div>
							<h4 class="col-12 m-t-20 comparetitle">Last Reviewed</h4>
							<div class="col-12 m-t-5 comparecontent">
								<span class="" style="font-size:18px !important;">
								
								</span>
							</div>
							<a class="col-12 m-t-20 comparename"></a>
							<h4 class="col-12 m-t-10 comparetitle">Features</h4>
							<div class="col-12 m-t-5">
								<?php foreach($feature as $features){?>
								<div class="row m-t-5">
									<div class="col-8">
										<span class="comparelabel"><?php echo $features;?></span>
									</div>
									<div class="col-4">
										<i class="fas fa-check-circle unchecked"></i>
									</div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>


 <div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please Select Product To Add To Compare</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body">
               <div class="form-group row">
                   <label class="col col-md-4 form-control-label">Search Apps</label>
                   <div class="col col-md-8">
                       <input class="form-control" name="app" attr_id = "<?php echo $categoryname;?>" required>
                   </div>
               </div>
               <div class="appresult row m-t-20">
	           		<div class="col-12">
	           			<h3 class="title"></h3>	
	           		</div>
	           		<div class="col-12 searchappresult m-t-20" style="padding:20px;max-height:300px;overflow-y: scroll;">
	           			
	           		</div>
               </div>
            </div>
        </div>
    </div>
 </div>