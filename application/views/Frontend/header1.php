<!DOCTYPE html>
<html lang="en">
<head>
<title>SoftwareCompare</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link href = "<?php echo base_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugins/OwlCarousel2-2.2.1/animate.css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/ui/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugins/slick-1.8.0/slick.css">
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/contact_responsive.css">
<?php } else{?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>styles/responsive.css">
<?php }?>
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
	    color: #687991;
	    font-size: 30px;
	    opacity: .6;
	    filter: alpha(opacity=60);
	}
</style>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
								<div class="user_icon"><img src="<?php echo base_url();?>images/user.svg" alt=""></div>
								<?php if(isset($user)){?>
								<div><a href="<?php echo base_url()?>user/logout">Sign out<i class="fas fa-sign-out-alt" style="margin-left:10px;"></i></a></div>
								<?php } else{?>
								<div><a href="<?php echo base_url()?>register">Register</a></div>
								<div><a href="<?php echo base_url()?>signin">Sign in</a></div>
								<?php }?>

							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">
					<!-- Logo -->
					<div class="col-lg-4 col-sm-4 col-4 order-1">
						<div class="logo_container">
							<div class="logo"><a href="<?php echo base_url();?>">Compare Software</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="<?php echo base_url();?>search" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products..." id="search" name="search">
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="<?php echo base_url(); ?>images/search.png" alt=""></button>
										<div class="result_auto"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav" >
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu" style="min-width: 120%;">
									<?php foreach($category as $categories){?>
										<?php if(count($categories['sub']) == 0){?>
										<li>
											<a href="#"><?php echo $categories['name'];?><i class="fas fa-chevron-right ml-auto"></i></a>
										</li>
										<?php } else {?>
										<li class="hassubs">
											<a href="#"><?php echo $categories['name'];?><i class="fas fa-chevron-right"></i></a>
											<ul>
												<?php foreach($categories['sub'] as $subs){?>
												<li style="padding-right:10px;"><a href="<?php echo base_url();?>category/<?php echo $subs['id'];?>" style=""><?php echo $subs['name'];?><i class="fas fa-chevron-right"></i></a></li>
												<?php }?>
											</ul>
										</li>
										<?php }?>
									<?php }?>
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="<?php echo base_url();?>">Home<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="<?php echo base_url();?>resource">Blog<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="<?php echo base_url();?>contact">Contact<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

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
		
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for Software and Category...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item">
									<a href="<?php echo base_url();?>">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item"><a href="<?php echo base_url();?>resource">blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="<?php echo base_url();?>contact">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
	
	<!-- Banner -->