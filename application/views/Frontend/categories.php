<div class="home">
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center"  style="background-color: rgb(11,152,183);">
		<h2 class="searchtitle" style="width:80%;text-align: center;">Software Categories</h2>
	</div>
</div>
<div class="container m-t-70 m-b-100">
	<div class="row m-b-30 shadow border_default" style="padding:10px 10px 50px 50px;">
		<div class="col-lg-8 col-xs-12 col-sm-12 col-md-8 m-t-30">
			<div class="row">
				<h1 class="m-l-10 m-b-20" style="font-size:24px;">Main Categories</h1>
				<div class="col-lg-12 m-b-10">
					<h3 style="font-weight: normal;font-size:20px;">What kind of software are you looking for?</h3>
				</div>
				<div class="col-lg-12 m-b-30">
					<input class="form-control category_search" placeholder="please type the word what you are looking for" />
				</div>
				<div class="col-lg-12">
					<ul id="tree1" class="category_list">
						<?php foreach($category as $key=>$value){
							if($value['category_type'] == 'main'){
							?>
							<li style="padding-right:0px;padding-top:0px;padding-bottom:0px;">
								<?php echo '<div class="col-9 col-lg-11 col-md-10 col-sm-10 col-xs-9 category_title"><h4 style="font-size: 18px;margin:8px 8px;">' .  $value['name'] . '</h4>';?>
								<ul class="sub" style="margin-left:0px;">
									<?php 
									foreach($value['sub'] as $categories){
										echo '<li><a href="' .base_url() . 'compare-' . str_replace(' ','-',$value['name']) .'-review-' . str_replace(' ','-',$categories['name']) .'">' . $categories['name'] . '</a></li>';
									} ?>
								</ul>
								</div>	
							</li>
						<?php }}?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 m-t-30">
			<h1 style="font-size:24px;">Favourite Categories</h1>
			<div class="row m-t-20">
				<ul class="col-lg-12">
					<?php foreach($popular_cat as $popular){?>
					<li class="popular"><a href="<?php echo base_url()?>compare-<?php echo str_replace(' ','-',$popular['main']);?>-review-<?php echo str_replace(' ','-',$popular['name']);?>" style=""><?php echo $popular['name'];?></a></li>
					<?php }?>
				</ul>
			</div>
		</div>	
	</div>
</div>