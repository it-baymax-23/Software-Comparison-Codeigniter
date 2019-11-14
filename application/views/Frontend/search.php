<style>
	ul.search-tabs li
	{
		padding:30px;
		padding-bottom: 10px;
		float:left;
		margin-right: 5px;
	}

	ul.search-tabs li a
	{
		z-index:1000000;
	}
	ul.search-tabs li.active
	{
		border-bottom-style: solid;
		border-bottom-color:red; 
	}

	ul.search-tabs li:hover
	{
		border-bottom-style: solid;
		border-bottom-color:red; 
	}

	

	.logo_image
	{
		border:solid 1px rgb(11,152,183);
		margin-left:15px;
	}
</style>

<div class="home">
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center"  style="background-color: rgb(11,152,183);">
		<h2 class="searchtitle"> The Search Result For <?php echo $search;?></h2>
	</div>
</div>

<div class="row m-t-100">
	<div class="container">
		<div class="col-lg-12 tabcontainer m-b-30">
	    	<nav>
				<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
					<a class="search-item nav-item nav-link <?php echo $content == 'all'?'active':'';?>" href="<?php echo base_url();?>search?search=<?php echo $search;?>">ALL</a>
					<a class="search-item nav-item nav-link <?php echo $content == 'category'?'active':'';?>" href="<?php echo base_url();?>search/category?search=<?php echo $search;?>">Category</a>
					<a  class="search-item nav-item nav-link <?php echo $content == 'product'?'active':'';?>" href="<?php echo base_url();?>search/product?search=<?php echo $search;?>">Product</a>
					<a class="search-item nav-item nav-link <?php echo $content == 'resource'?'active':'';?>" href="<?php echo base_url();?>search/resource?search=<?php echo $search;?>">Resource</a>
				</div>
			</nav>

			<div class="tab-content row" style="margin:0px;">
				<?php foreach($all as $key => $value){?>
				<div class="col-md-12 m-l-30 m-t-20">
					<h4 class="search-key"><?php echo $key;?></h4><span class="search_result"> (The result <?php echo $value['result_count'];?>)</span>	
				</div>
				<?php foreach($value as $key_value => $contents){?>
				<?php if(!is_array($contents)){ continue;}?>
				<div class="col-md-12 m-l-30 m-t-20">
					<?php if($key =='resource'){?>
					<div class="row m-t-20">
						<div class="logo_image">
							<img src="<?php echo base_url().$contents['logo']?>" style="width:100px;height:100px;">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<h4><a class="search_content" href="<?php echo base_url()?>blogs/<?php echo $contents['id'];?>"><?php echo $contents['title'];?></a></h4>
						</div>
					</div>
					<?php } else if($key == 'category'){?>
					<h4><a class="search_content" href="<?php echo base_url();?>category/<?php echo $contents['id'];?>"><?php echo $contents['name'];?></a></h4>
					<p class="search_desc"><?php echo $contents['description'];?></p>
					<?php } else{ ?>
					<div class="row m-t-20">
						<div class="logo_image">
							<img src="<?php echo base_url().$contents['logo']?>" style="width:100px;height:100px;">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<h4><a class="search_content" href="<?php echo base_url();?>productdetail/<?php echo $contents['id'];?>"><?php echo $contents['name'];?></a></h4>
							<p style="overflow:hidden;height:50px;"><?php echo $contents['description'];?></p>
						</div>
					</div>
					<?php }?>
				</div>
				<?php }?>
				<div class="col-md-10 m-b-20" style="text-align: center;">
					<?php if(count($all) > 1 || $value['result_count'] > 10){?>
					<a href="<?php echo base_url();?>search/<?php echo $key;?>?search=<?php echo $search;?>" class="btn btn-primary <?php if(count($all) == 1){echo 'load_more';}?>" attr_type="<?php echo $key;?>" attr_search = "<?php echo $search;?>">Load More</a>
					<?php }?>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
	        
	