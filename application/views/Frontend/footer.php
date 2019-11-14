<footer class="footer" style="background-color: rgb(37,37,37);">
	<div class="container">
		<ul class="row" style="margin:0px 10px;">
			<li class="col-lg-3 col-xs-12 col-md-4 col-sm-6 m-t-20" style="color:white;">
				<span class="row" style="font-size:16px;margin-right:8%;">About SoftwareCompare</span>
				<ul class="row m-t-10">
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">Our Story</a></li>
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">News</a></li>
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">Careers</a></li>
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">Privacy Policy</a></li>
				</ul>
			</li>
			<li class="col-lg-3 col-xs-12 col-md-4 col-sm-6 m-t-20"  style="color:white;">
				<span class="row" style="font-size:16px;margin-right:8%;">For Buyers</span>
				<ul class="row m-t-10">
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">Categories</a></li>
					<li class="col-lg-12  footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">Resources</a></li>
					<li class="col-lg-12  footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">Review Software</a></li>
				</ul>
			</li>
			<li class="col-lg-3 col-xs-12 col-md-4 col-sm-6 m-t-20" style="color:white;">
				<span class="row" style="font-size:16px;margin-right:8%;">For Vendors</span>
				<ul class="row m-t-10">
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#" >Program Overview</a></li>
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#" >Advertise With Us</a></li>
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;"><a href="#">Vendor Account</a></li>
				</ul>
			</li>
			<li class="col-lg-3 col-xs-12 col-md-4 col-sm-6 m-t-20" style="color:white;">
				<span class="row" style="font-size:16px;margin-right:8%;">Contact Us</span>
				<ul class="row m-t-10">
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;">
						<a href="#" >Contact</a>
					</li>
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;">
						<a href="#" >Signin</a>
					</li>
					<li class="col-lg-12 footer-link" style="padding:5px 0px;font-size:12px;">
						<a href="#" >Register</a>
					</li>
				</ul>
			</li>
		</ul>		
	</div>
	<div class="scroll-to-top">
        <i class="btn btn-primary fa fa-arrow-up"></i>
    </div>		
</footer>
</div>
<?php echo '<script> base_url = "' . base_url() . '"</script>';?>
<script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/ui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>styles/bootstrap4/popper.js"></script>

<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="<?php echo base_url();?>assets/js/main_software.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.twbsPagination.js"></script>
<script src="<?php echo base_url();?>js/sticky.js"></script>
<script src="<?php echo base_url();?>assets/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".dropdown").hover(            
		    function() {
		        $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
		        $(this).toggleClass('open');        
		    },
		    function() {
		        $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
		        $(this).toggleClass('open');       
		    }
		); });
</script>
<!-- Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->

<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-130670536-1', 'auto',{
    	userId:'auto'
    });
    ga('send', 'pageview');
</script>

<!-- End Google Analytics -->
<script>
	var currentpage = 1;
	$('.productinfo_link').click(function(){
		var href = $(this).attr('href');
		var href_array = href.split('/');
		console.log(href_array);

		for(item in href_array)
		{
			if(href_array[item] && href_array[item] == 'productdetail')
			{

				console.log(href_array[item + 1]);console.log(href_array[item+2]);
				ga('send','event',href_array[Number(item) + 1],'click',href_array[Number(item) +2],1);
			}
		}
	})
	function page_init(pagelength)
	{	
		$('#pagenavigation-container').html('<ul class="pagination" id="pagination" style="display:inline-flex;"></ul>');

		var preparepage = $(document).find('.page-card').length;
		if(preparepage == 0)
		{
			return;
		}
		var pages = parseInt(preparepage / pagelength);
		console.log(pages);
		if(pages * pagelength < preparepage)
		{
			pages ++;	
		}

		console.log(currentpage);
	    window.pagObj = $('#pagination').twbsPagination({
	    	startPage:currentpage,
	        totalPages: pages,
	        visiblePages: 10,
	        onPageClick: function (event, page) {
	        	var borderdisable = 0;
	            $(document).find('.page-card').each(function(index){
	            	if(index >= pagelength*(page-1) && index<pagelength*page)
	            	{
	            		borderdisable = index;
	            		$(this).show();
	            	}
	            	else
	            	{
	            		$(this).hide();
	            	}
	            })

	            $(document).find('.page-card').eq(borderdisable).css('border-bottom','none');
	        }
	    }).on('page', function (event, page) {
	        console.info(page + ' (from event listening)');
	   });
	   
	   
	}
	
</script>

<script src="<?php echo base_url();?>assets/global/plugins/html5lightbox/html5lightbox.js"></script>
<?php if(isset($page) && $page == 'detail'){?>
<script>
	//var sticky = new Sticky('.sticky');
	var height = $('header').height();
	var sticky1 = new Sticky('.sticky',{marginTop:height});
	if($('#comparebuttonlist').length > 0)
	{
		var sticky2 = new Sticky('#comparebuttonlist',{marginTop:height + $('#productdetail_tabs').parent().height()});	
	}

	
	
</script>

<script src="<?php echo base_url();?>assets/global/plugins/chart/fusioncharts.js"></script>
<script src="<?php echo base_url();?>js/product_custom.js"></script>
<?php }?>
<?php if(isset($page) && ($page == 'login' || $page == 'account')){?>
<script src="<?php echo base_url();?>assets/js/frontend/login.js"></script>
<?php }?>
<?php if(isset($page) && ($page == 'productlist' || $page == 'compare' || $page == 'vendor')){
	?>

<script src="<?php echo base_url();?>js/main_product.js"></script>
	<script>
		$(document).ready(function(){
			page_init(20);
		})
	</script>
<?php }?>
<?php if(isset($page) && $page == 'reviewsearch'){?>
<script type="text/javascript">
	$(document).ready(function(){
		page_init(10);
	})
</script>
<?php }?>
<?php if(isset($page) && $page == 'blog'){?>
<script src="<?php echo base_url();?>assets/js/frontend/blog.js"></script>
<?php }?>
<?php if(isset($page) && $page == 'contact'){?>
<script src="<?php echo base_url();?>js/tilt.jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/frontend/contact.js"></script>
<?php }?>
<?php if(isset($page) && $page == 'upload'){?>
<script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/frontend/upload_software.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
<?php }?>
<?php if(isset($page) && $page =='newreview'){?>
<script src="<?php echo base_url();?>assets/js/frontend/newreview.js"></script>
<?php }?>
<?php if(isset($page) && $page == 'search'){?>
<script src="<?php echo base_url();?>assets/js/frontend/search.js"></script>
<?php }?>
</body>
</html>