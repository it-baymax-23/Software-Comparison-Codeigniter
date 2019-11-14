
<!DOCTYPE html>
<html lang="en">
<head>
<title>SoftwareCompare</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/bootstrap-4.1/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/ui/jquery-ui.css"/>
<link href = "<?php echo base_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

<?php if(isset($page) && $page == 'detail'){?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/product_responsive.css">
<?php }
if(isset($page) && $page == 'blogs')
{?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/blog_single_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/blog_single_responsive.css">
<?php }
if(isset($page) && $page == 'contact'){
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact.css">
<?php }
if(isset($page) && $page == 'upload'){ ?>
<link href="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url();?>assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url();?>assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />

<?php }?>

<?php if(isset($page) && $page == 'blog'){?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/blog_styles.css"/>
<?php }?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/theme.css"/>
<style>
	.scroll-to-top {
	    right: 20px;
	}

	.scroll-to-top {
	    padding: 1px;
	    text-align: center;
	    position: fixed;
	    bottom: 10px;
	    z-index: 10001;
	    display: none;
	    right: 10px;
	}

	.scroll-to-top:hover
	{
		cursor: pointer;
	}
	.scroll-to-top > i {
	    display: inline-block;
	    color: white;
	    font-size: 30px;
	    opacity: .6;
	    filter: alpha(opacity=60);
	}
</style>
</head>

<body>
<div id="loading">
	<div id="loading-center">
		<div id="loading-center-absolute">
			<div class="object" id="object_two"></div>
		</div>
	</div>
</div>

<div class="super_container">
	
	<!-- Header -->
	<!-- Header -->

	<header class="header" style="">

		
		<!-- Header Main -->

		<div class="header_main">
			<!-- <div class="container"> -->
				<div class="row">
					<!-- Logo -->
					<div class="col-xs-5 col-lg-2 col-sm-4" style="margin-left:5%;">
						<div class="logo_container">
							<div class="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/home/logo.png"></a></div>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<!-- Search -->
					<nav class="col-xs-12 col-md-12 col-lg-6 col-sm-12 main_nav">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="main_nav_content d-flex flex-row">
										<div class="main_nav_menu ml-auto pull-right" style="width:content">
											<ul class="standard_dropdown main_nav_dropdown" style="padding-top:0px;">
												<?php menu_init_func($menu);?>
											</ul>

										</div>

										<div class="menu_trigger_container ml-auto">
											<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
												<div class="menu_burger">
													<div class="menu_trigger_text">menu</div>
													<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</nav>
					
				</div>
			<!-- </div> -->
		</div>		
		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							<ul class="page_menu_nav">
								<?php page_menu_init($menu);?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row category_containers">
		<?php if(isset($category)){?>
		<div id="categories" class="shadow border_default m-b-50 row" style="display: none;">
			<div class="container m-b-20">
				<ul class="category_lists">
					<?php foreach($category as $key=>$value){
						if($value['category_type'] == 'main'){
						?>
						<li>
							<?php echo '<h3 class="maincat">' .  $value['name'] . '</h3>';?>
							<ul>
								<?php 
								foreach($value['sub'] as $categories){
									echo '<li style="padding-left:10px;"><a class="subcategory" href="' .base_url() . 'compare-' . str_replace(' ','-',$value['name']) .'-review-' . str_replace(' ','-',$categories['name']) .'" style="color:rgb(69,135,177);font-weight:400;">' . $categories['name'] . '</a></li>';
								} ?>
							</ul>
						</li>
					<?php }}?>
				</ul>
			</div>
		</div>
		<?php }?>
	</div>

	</header>
	
	<!-- Banner -->