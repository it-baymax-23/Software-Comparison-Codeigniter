<div class="home">
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center"  style="background-color: rgb(11,152,183);">
		<h2 class="searchtitle" style="width:80%;text-align: center;">Resources</h2>
	</div>
</div>
<div class="container m-t-100 m-b-100">     
	<div class="row shadow border_default" style="padding:50px;">
		<div class="col-12 col-lg-12" id="maincategory">
			<span class="btn btn-primary  m-b-10 maincategory" attr_id="">ALL</span>
			<?php foreach($main as $mains){?>
			<span class="btn btn-outline-primary m-b-10 maincategory" attr_id="<?php echo $mains['id'];?>"><?php echo $mains['name'];?></span>
			<?php }?>
		</div>
		<div class="col-12">
			<div id="blog_posts" class="row d-flex flex-row align-items-start">
				
				<!-- Blog post -->
				<?php foreach($blog as $blogs){?>
				<div class="page-card col-12 col-sm-6 col-md-6 col-lg-4 m-t-20">
					<div class="row">
						<div class="col-11 col-sm-11 col-md-11 col-lg-11 shadow border_default"  style="height:350px;text-align: center;padding:0px;margin-left:auto;margin-right: auto;">
							<div class="blog_image" style="background-image:url(<?php echo base_url() .$blogs['logo'];?>);border-radius:0px;"></div>
							<div class="blog_text" style="overflow: hidden;height:80px;"><a href="<?php echo base_url();?>blogs/<?php echo $blogs['id'];?>"><?php echo $blogs['title'];?></a></div>
							<a href="<?php echo base_url();?>blogs/<?php echo $blogs['id'];?>" class="btn btn-primary m-t-30">Continue Reading</a>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
			<div class="row m-t-30">
			    <div class="col-2 col-md-2 col-sm-2 col-lg-2"></div>
			    <div class="col-8 col-md-8 col-lg-8 col-sm-8">
			      <nav aria-label="Page navigation" id="pagenavigation-container">
			          <ul class="pagination" id="pagination"></ul>
			      </nav>
			    </div>
			</div>			
		</div>
			
	</div>
	
</div>
	     