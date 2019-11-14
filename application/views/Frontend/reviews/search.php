<div class="row m-t-30 m-b-100">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
			<div class="col-12 col-sm-12 col-md-10 col-lg-10 shadow border_default" style="padding:50px 50px;">
				<p class="m-b-20" style="text-align: center;">Your Search returned <span class="btn btn-primary"><?php echo count($product);?> results</span></p>
				<ol class="general_search_result">
					<?php foreach($product as $products){?>
					<li class="row page-card">
						<div class="product_logo" style="margin-left:0px;width:70px;height:70px;">
							<a class="productlink" href="<?php echo base_url();?>reviews/newreview/<?php echo $products['id'];?>">
								<img src="<?php echo base_url() . $products['logo']?>"/>
							</a>
						</div>
						<div class="col-lg-8 col-xs-6 col-sm-8"  style="vertical-align: middle;">
							<a href="<?php echo base_url();?>reviews/newreview/<?php echo $products['id'];?>" style="margin-top:10px;"><?php echo $products['name'];?></a><span style="margin-left:10px;"> By <?php echo $products['company'];?></span>
						</div>
					</li>
					<?php }?>
				</ol>
				<div class="row m-t-10">
					<div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
					<div class="col-12 col-md-8 col-lg-8">
						<nav aria-label="Page navigation" style="margin-bottom:30px;"  id="pagenavigation-container">
					        <ul class="pagination" id="pagination"></ul>
					    </nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>