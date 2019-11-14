<style>
	.nav-item
	{
		border-right:solid 1px rgb(11,152,183) !important;
		border-bottom:solid 1px rgb(11,152,183) !important;
		border-left:none;
	}

	.nav-item:last
	{
		border-right:none;
	}
</style>
<div class="home">
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center"  style="background-color: rgb(11,152,183);">
		<h2 class="searchtitle" style="width:80%;text-align: center;">Service For Vendors</h2>
	</div>
</div>
<div class="container m-t-100 m-b-100">
	<div class="row">
		<div class="col-lg-12 tabcontainer" style="box-shadow:0px 2px 10px 5px rgb(220,220,220);padding-bottom:50px;">
			<nav>
				<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
					<a class="search-item nav-item nav-link <?php echo $page=='software'?'active':''?>" id="nav-home-tab" href="<?php echo base_url();?>vendors" role="tab">My Software</a>
					<a class="search-item nav-item nav-link  <?php echo $page=='upload'?'active':''?>" id="nav-profile-tab" href="<?php echo base_url();?>vendors/upload">Upload Software</a>
					<a class="search-item nav-item nav-link  <?php echo $page=='account'?'active':''?>" id="nav-contact-tab" href="<?php echo base_url();?>vendors/account">My Account</a>
				</div>
			</nav>
	        	