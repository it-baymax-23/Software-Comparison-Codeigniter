				<div class="tab-content py-3 px-3 px-sm-0" style="background-color: white;">
					<div class="col-lg-12">
					<?php if(count($product) == 0){?>
					<div class="row" style="padding:30px 30px;">
						<p>There is no products you have uploaded</p>
					</div>
					<?php }?>
					<?php foreach($product as $products){?>
						<div class="row page-card productlist">
							<div class="product_logo">
								<a class="productlink" href="<?php echo base_url();?>productdetail/<?php echo $products['id']?>">
									<img src="<?php echo base_url() . $products['logo'];?>">
								</a>
							</div>
							<div class="col-12 col-lg-10 col-md-10 col-sm-10" style="margin-right:auto;">
								<div class="row">
									<div class="col-12 col-md-9 col-xs-9 col-sm-9 col-lg-9">
										<div class="row">
											<a href="<?php echo base_url();?>productdetail/<?php echo $products['id']?>"><h3 style="font-size:25px;"><?php echo $products['name'];?></h3></a> 
										</div>
										
										<div class="row" style="margin-top:5px;">
											<?php 
												$score = $products['review']['score'];

												if($score > 0)
												{
													$score = $score / $products['review']['count'];
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
						                    <?php } else{?>
						                    <i class="far fa-star"></i>
						                    <?php }?>
						                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
						                      <i class="far fa-star"></i>
						                    <?php }?>
						                    <?php echo round($half_score,1) + $value_score;?>/5 (<?php echo $products['review']['count'];?> reviews)</span>
										</div>
										<div class="row description"  style="padding:30px 0px;height:100px;overflow: hidden;">
											<?php echo $products['description'];?>
										</div>
									</div>
									<div style="float:left;margin-left:20px;margin-top:20px;">
										<a class="btn btn-primary" href="<?php echo base_url();?>productdetail/<?php echo $products['id'];?>" style="width:180px;">View Profile<i class="fa fa-share" style="margin-left:12px;"></i></a>

									</div>	
								</div>
							</div>
						</div>						
					<?php }?>
					</div>
					<div class="col-12">
						<div class="row m-t-30">
							<div class="col-12 col-sm-2 col-md-2 col-lg-2"></div>
							<div class="col-md-8">
								<nav id="pagenavigation-container" aria-label="Page navigation" style="margin-bottom:30px;text-align: center;">
							        <ul class="pagination" id="pagination" style="margin-left:20%;"></ul>
							    </nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>