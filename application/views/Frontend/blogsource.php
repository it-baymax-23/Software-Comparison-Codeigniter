<div class="home">
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center"  style="background-color: rgb(11,152,183);">
		<h2 class="searchtitle" style="width:80%;text-align: center;"> <?php echo $blog[0]['title'];?></h2>
	</div>
</div>
<div class="single_post m-b-100 m-t-100" style="padding-top:0px;">
	<div class="container shadow m-t-10" style="padding:50px;">
		<div class="row">
			<div class="col-lg-12">
				<div class="blog_image shadow" style="text-align: center;height:200px;background-image: url(<?php echo base_url().$blog[0]['logo'];?>)">
				</div>
				<div class="single_post_text">
					<?php echo $blog[0]['description'];?>
				</div>
				<?php if(count($section) > 0){?>
				<div class="blog_cover border_default shadow" style="padding:20px;">
					<h4 class="title_3" style="font-size:24px;font-weight: normal;">The Cover of this blogs</h4>
					<hr/>
					<ul>
						<?php foreach($section as $key => $value){?>
						<li><?php echo $key+1;?>.<a href = "#section<?php echo $key;?>" style="margin-left:12px;"><?php echo $value['title'];?></a></li>
						<?php }?>
					</ul>
				</div>
				<?php }?>
			</div>
			<?php foreach($section as $key => $value){?>
			<div class="col-lg-12  m-t-30" id="section<?php echo $key;?>">
				<h3><?php echo $value['title'];?></h3>
				<div class="description">
					<?php echo $value['description'];?>
				</div>
			</div>
			<?php }?>
		</div>
		
	</div>
</div>