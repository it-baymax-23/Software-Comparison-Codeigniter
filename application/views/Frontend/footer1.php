<footer class="footer" style="background-color: black;">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#" style="color:white;">Compare Software</a></div>
						</div>
						<div class="footer_title" style="color:white;">Got Question? Call Us 24/7</div>
						<div class="footer_phone" style="color:white;">+38 068 005 3570</div>
						<div class="footer_contact_text" style="color:white;">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						
					</div>
				</div>
				<div class="scroll-to-top">
	                <i class="btn btn-danger fa fa-arrow-up"></i>
	            </div>
			</div>
		</div>
	</footer>
</div>
<?php echo '<script> base_url = "' . base_url() . '"</script>';?>
<script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>js/ui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url();?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url();?>plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url();?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url();?>plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url();?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url();?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url();?>plugins/slick-1.8.0/slick.js"></script>
<script src="<?php echo base_url();?>plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url();?>plugins/easing/easing.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="<?php echo base_url();?>js/blog_custom.js"></script>
<script src="<?php echo base_url();?>js/main_product.js"></script>
<script src="<?php echo base_url();?>assets/js/auto.js"></script>
<script src="<?php echo base_url();?>js/sticky.js"></script>
<script src="<?php echo base_url();?>assets/js/ajaxfileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.twbsPagination.js"></script>
<script>
	var currentpage = 1;
	function page_init(pagelength)
	{	
		$('#pagenavigation-container').html('<ul class="pagination" id="pagination"></ul>');

		var preparepage = $(document).find('.page-card').length;
		var pages = parseInt(preparepage / pagelength);
		console.log(pages);
		if(pages * pagelength < preparepage)
		{
			pages ++;	
		}

		console.log(pages);
	    window.pagObj = $('#pagination').twbsPagination({
	    	startPage:currentpage,
	        totalPages: pages,
	        visiblePages: 10,
	        onPageClick: function (event, page) {
	            $(document).find('.page-card').each(function(index){
	            	if(index >= pagelength*(page-1) && index<pagelength*page)
	            	{
	            		$(this).show();
	            	}
	            	else
	            	{
	            		$(this).hide();
	            	}
	            })
	        }
	    }).on('page', function (event, page) {
	        console.info(page + ' (from event listening)');
	   });
	}
		
</script>
<?php if(isset($page) && $page == 'compare'){?>
<script>
	var sticky = new Sticky('.sticky');
	
</script>
<?php }?>

<?php if(isset($page) && $page == 'detail'){?>

<script src="<?php echo base_url();?>js/product_custom.js"></script>
<?php }?>
<?php if(isset($page) && $page == 'login'){?>
<script src="<?php echo base_url();?>assets/js/frontend/login.js"></script>
<?php }?>
<?php if(isset($page) && $page == 'productlist'){?>
	<script>
		$(document).ready(function(){
			page_init(5);
		})
	</script>
<?php }?>
<?php if(isset($page) && $page == 'blog'){?>
<script src="<?php echo base_url();?>assets/js/frontend/blog.js"></script>
<?php }?>
<?php if(isset($page) && $page == 'contact'){?>
<script src="<?php echo base_url();?>assets/js/frontend/contact.js"></script>
<?php }?>
</body>

</html>