/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Custom Dropdown
4. Init Page Menu
5. Init Recently Viewed Slider
6. Init Brands Slider
7. Init Quantity
8. Init Color
9. Init Favorites
10. Init Image


******************************/
var enable = false;	 
var rating = {};
var sort = 'helpful';
var filterdata = {};

$(document).ready(function()
{
	"use strict";
	/* 

	1. Vars and Inits

	*/

	$(document).on('click','.reviewfilter',function(){
		var data = {};
		$('.reviewfilter').each(function(){
			if($(this)[0]['checked'])
			{

				if(!data[$(this).attr('attr_id')])
				{
					data[$(this).attr('attr_id')] = [];	
				}
				
				data[$(this).attr('attr_id')].push($(this).val());

				console.log(filterdata);
			}
			
		})

		filterdata = data;
		init_pagination(10);	
	})

	$('.sort').change(function(){
		sort = $(this).val();
		init_pagination(10);
	})


	$(document).on('click','.helpful',function(){

		var self = this;
		$.ajax({
			url:base_url + 'review/help',
			data:{class:$(this).attr('attr_id'),id:$(this).attr('review_id')},
			type:'post',
			success:function(res){
				$(self).html($(self).find('i').eq(0)[0]['outerHTML'] + res);
			}
		})
	})
	if($('#rating').length > 0)
	{
		initreviewsetting();
	}

	inittabbutton();
	if($('.filter').length > 0)
	{
		initfilter();			
	}
	if($('#comparebuttonlist').length > 0)
	{
		initcomparebuttonlist();	
	}
	
	$(window).scroll(function(){
		inittabbutton();
		if($('.filter').length > 0)
		{
			initfilter();			
		}
		if($('#comparebuttonlist').length > 0)
		{
			initcomparebuttonlist();	
		}
	})

	var menuActive = false;
	var header = $('.header');
	initImage();

	init_pagination(10);
	if($('#compare_price').length > 0)
	{
		$.ajax({
			url:base_url + 'priceinfo',
			type:'post',
			data:{cat:$('#compare_price').attr('attr_cat')},
			success:function(res){
				var chartInstance = new FusionCharts({
				      type: 'column2D',
				      width: '100%', // Width of the chart
				      height: '400', // Height of the chart
				      dataFormat: 'json', // Data type
				      renderAt:'compare_price', //container where the chart will render
				      dataSource: {
				          "chart": {
				              "xAxisName": "Software Name",
				              "yAxisName": "Start Price($/month)",
				              "numberSuffix": "$",
				              "theme": "fusion",
				          },
				          // Chart Data
				          "data": JSON.parse(res)
				      }
				});
				// Render
				chartInstance.render();
			}
		})
	}

	$(document).on('click','.readmore',function(){

		var container = $(this).parent().parent().parent().find('.readmore_container').eq(0);
		if(container.attr('style'))
		{	
			container.attr('style','');
			$(this).html('Minimize Review<i class="fas fa-angle-up m-l-10"></i>');
		}
		else
		{
			container.attr('style','overflow-y:hidden;max-height:70px;');
			$(this).html('Read the full review<i class="fas fa-angle-down m-l-10"></i>');	
		}

		return false;

	})

	function formatDate(userDOB) {
	  const dob = new Date(userDOB);

	  const monthNames = [
	    'January', 'February', 'March',
	    'April', 'May', 'June', 'July',
	    'August', 'September', 'October',
	    'November', 'December'
	  ];

	  const day = dob.getDate();
	  const monthIndex = dob.getMonth();
	  const year = dob.getFullYear();

	  // return day + ' ' + monthNames[monthIndex] + ' ' + year;
	  return `${day} ${monthNames[monthIndex]} ${year}`;
	}

	function display_star(score)
	{
		var html_star = '';
		for(var index_score = 0;index_score < score;index_score ++){
			html_star += '  <i class="fas fa-star full" style="margin:0px 2px;"></i>';
		}

		for(var element_star = Number(score) + 1;element_star <= 5;element_star ++)
		{
			html_star += '<i class="fas fa-star empty" style="margin:0px 2px;"></i>';
		}

		return html_star;
	}
	function init_pagination(pagelength)
	{
		$('#pagenavigation-container').html('<ul class="pagination" id="pagination" style="display:inline-flex;"></ul>');

		$.ajax({
			url:base_url + 'review/reviewcount',
			type:'post',
			data:{filter:filterdata,id:$('.review-container').attr('attr_id'),sort:sort},
			success:function(res)
			{
				var preparepage = Number(res);
				if(preparepage == 0)
				{
					$('.review-container').html('<h2 class="col-12 m-t-10" style="color:rgb(11,152,183);text-align: center;">There is no review With This filter</h2>');
				}

				var pages = parseInt(preparepage / pagelength);
				console.log(pages);
				if(pages * pagelength < preparepage)
				{
					pages ++;	
				}

				console.log(currentpage);

				var data = {id:$('.review-container').attr('attr_id')};
			    window.pagObj = $('#pagination').twbsPagination({
			    	startPage:currentpage,
			        totalPages: pages,
			        visiblePages: 10,
			        onPageClick: function (event, page) {
			        	data.page = page;
			        	data.filter = filterdata;
			        	data.sort = sort;
			        	console.log(data);
			        	$.ajax({
			        		url:base_url + 'review/getreview',
			        		type:'post',
			        		data:data,
			        		success:function(res)
			        		{
			        			$('.review-container').html('');
			        			var review = JSON.parse(res);
			        			for(var item_review in review)
			        			{
			        				var reviews = review[item_review];
			        				var html = '<div class="row page-card" style="padding-top:10px;padding-bottom: 10px;border-top:solid 1px #d1d3d4;"><div class="col-11" style="margin-left: auto;margin-right:auto;border-bottom:solid 1px #d1d3d4;padding-bottom:10px;"><div class="row"><div class="profile">';

			        				if(reviews['profile'])
			        				{
			        					html += '<img src="' + base_url + reviews['profile'] + '"/>';
			        				}
			        				else
			        				{
			        					html+= '<img src="' + base_url + 'images/no_photo.png"/>';
			        				}

			        				html += '</div><div style="padding-top:10px;margin-left:10px;"><h4 style="color:#949597">Reviewed by ';

			        				if(reviews['username'])
			        				{
			        					html += reviews['username'];
			        				}



			        				if(reviews['company'])
			        				{
			        					html += ' Of ' + reviews['company'];
			        				}

			        				html += '</h4>';
			        				if(reviews['user_id'] > 0)
			        				{
			        					html += '<span><i class="fas fa-check-circle m-r-2" style="color:green;margin-right:5px;"></i>Validate User</i>';
			        				}
			        				else
			        				{
			        					html += '<span><i class="fas fa-check-circle m-r-2" style="margin-right:5px;"></i>Current Customer</i>';	
			        				}
			        				html += '</div><div class="" style="padding-top: 10px;margin-left:auto;">';
			        				if(reviews['industry'])
			        				{
			        					html += '<span style="float:right;">Industry:' + reviews['industry'] + '</span><br>';
			        				}
			        				else if(reviews['industrytype'])
			        				{
			        					html += '<span style="float:right;">Industry:' + reviews['industrytype'] + '</span><br>';	
			        				}


			        				if(reviews['company_size'])
			        				{
			        					html += '<span style="float:right;">Company Size:' + reviews['company_size']+ '</span><br>';
			        				}


			        				if(reviews['user_period'])
			        				{
			        					html += '<span style="float:right;">I have used it for ' + reviews['user_period'] + '</span><br>';
			        				}

			        				html += '</div><div style="margin-left:auto;padding-top:10px;">';

			        				if(reviews['resource'])
			        				{
			        					if(reviews['resource'] == 'gcrowd')
			        					{
			        						reviews['resource'] = 'g2crowd';
			        					}

			        					reviews['resource'] = reviews['resource'].charAt(0).toUpperCase() + reviews['resource'].slice(1);

			        					html += '<span style="display:block">Review Source:  ' + reviews['resource'] + '</span><span>Reviewed on ' + formatDate(reviews['created_date']) + '</span>';
			        				}


			        				html += '</div></div></div></div><div class="row m-t-20 m-b-30"><div class="col-11" style="margin:auto;"><div class="row"><h3 class="col-8" style="color:#949597;">'

			        				if(reviews['title'])
			        				{
			        					html += reviews['title'];
			        				}

			        				html += '</h3>';
			        				html += '<div class="col-4"><div class="row" style="text-align:right;display:block;">';

			        				html += '<div class="col-12"><h5 style="color:#949597;text-align: center;">Overall Rating</h5><div class="row m-t-10"><div class="col-12" style="text-align: center;">';

			        				html+= display_star(reviews['over_all']);

			        				html += '</div></div></div></div></div></div><div class="row m-t-10 " ><div class="col-12"><div class="row"><div class="col-12 col-sm-12 col-md-8 col-lg-8"></div><div class="col-12 col-sm-12 col-md-3 col-lg-3" style="margin-right:auto;"><div class="row">';

			        				

			        				html += '</div></div></div></div></div><div class="row"><div class="col-12 m-t-20 readmore_container" style="overflow-y:hidden;max-height:70px;"><div class="row"><div class="col-12"><p>' + reviews['description'] + '</p></div><div class="col-12 col-sm-12 col-md-8 col-lg-8" style="margin-right:auto;">';
			        				if(reviews['props'])
			        				{
			        					html += '<h5 class="pros" style="color:grey;padding-left:10px;font-size:18px !important;">Pros</h5><div class="row"><div class="col-12"><p style="padding-left:10px;">' + reviews['props'] + '</p></div></div>';
			        				}
			        				if(reviews['cons'])
			        				{
			        					html += '<h5 class="cons m-t-10" style="color:grey;padding-left:10px;font-size:18px !important;">Cons</h5><div class="row"><div class="col-12"><p style="padding-left:10px;">' + reviews['cons'] + '</p></div></div>';	
			        				}
			        				
			        				for(var item in reviews['descriptionextra'])
			        				{
			        					html += '<h5 class="m-t-10" style="color:grey;padding-left:10px;font-size:18px !important;">' + reviews['descriptionextra'][item]['meta_key'] + '</h5><div class="row"><div class="col-12"><p style="padding-left:10px;">' + reviews['descriptionextra'][item]['meta_value'] + '</p></div></div>';
			        				}

			        				html += '</div><div class="col-12 col-sm-12 col-md-4 col-lg-4" style=""><div class="row">';

			        				if(reviews['ratingextra'].length > 0)
			        				{
			        					html += '<div class="col-12"><h5 style="color:#949597;text-align: center;">Rating breakdown</h5><div class="row m-t-10">';

			        					for(var item_rating in reviews['ratingextra'])
			        					{
			        						html += '<div class="col-12" style="text-align: center;"><span class="m-l-5" style="color:grey !important;font-size:12px;overflow:hidden;text-overflow:hidden;white-space:nowrap;">' + reviews['ratingextra'][item_rating]['meta_key'] + '</span></div><div class="col-12" style="text-align: center;">' + display_star(reviews['ratingextra'][item_rating]['meta_value']) + '</div>';
			        					}

			        					html += '</div></div>';
			        				}

			        				html += '</div></div></div></div></div><div class="row"><div class="col-6 m-t-10" style=""><a href="#" class="readmore">Read the full review <i class="fas fa-angle-down m-l-10"></i></a></div><div class="col-6 m-t-10">Helpful?  <span class="btn btn-default helpful m-l-10" style="width:50px !important;" attr_id="helpful" review_id="' + reviews['id'] + '"><i class="fas fa-thumbs-up"></i>  ' + reviews['helpful'] + '</span><span class="m-l-10 btn btn-default helpful" style="width:50px !important;" attr_id="unhelpful" review_id = "' + reviews['id'] + '"><i class="fas fa-thumbs-down"></i>  ' + reviews['unhelpful'] + '</span></div></div></div></div>';

			        				$('.review-container').append(html);
			        			}
			        			
			        		}
			        	})
			        	
			        }
			    }).on('page', function (event, page) {
			        console.info(page + ' (from event listening)');
			   });		
			}
		})
		
	}	
	
	// initTab();

	// $(window).on('resize',function(){
	// 	initTab();
	// })
	/* 

	2. Set Header

	*/

	function initcomparebuttonlist()
	{
		var rect = $('#comparebuttonlist')[0].getBoundingClientRect();
		var doc = document.documentElement;
		var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
		if(rect.top < top)
		{
			$('#comparebuttonlist').addClass('shadow');
		}
		else
		{
			$('#comparebuttonlist').removeClass('shadow');	
		}
	}

	function inittabbutton()
	{
		var rect = $('#productdetail_tabs')[0].getBoundingClientRect();
		var doc = document.documentElement;
		var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

		if(rect.top < top)
		{
			$('#visitwebsite').show();
		}
		else
		{
			$('#visitwebsite').hide();	
		}
	}

	function initreviewsetting()
	{
		$(document).on('mouseover','.writestar',function(){
			var value = $(this).attr('attr_value');

			$(this).parent().find('.writestar').each(function(){
				if($(this).attr('attr_value') <= value)
				{
					$(this).addClass('full');
					$(this).removeClass('empty');
				}
				else
				{
					$(this).addClass('empty');
					$(this).removeClass('full');
				}
			})
		})

		$(document).on('click','.writestar',function(){
			var value = $(this).attr('attr_value');
			rating[$(this).parent().attr('attr_name')] = value;
		})

		$(document).on('mouseout','.writestar',function(){
			var value = 0;
			if(rating[$(this).parent().attr('attr_name')])
			{
				value = rating[$(this).parent().attr('attr_name')];	
			}
			
			$(this).parent().find('.writestar').each(function(){
				if($(this).attr('attr_value') <= value)
				{
					$(this).addClass('full');
					$(this).removeClass('empty');
				}
				else
				{
					$(this).addClass('empty');
					$(this).removeClass('full');
				}
			})
		})

		$(document).on('click','#next',function(){
			var required = ['over_all','Features & Functionality','Ease Of Use'];

			console.log(rating);
			for(var item in required)
			{
				if(!rating[required[item]])
				{
					toastr['error']('You must select the ratings for the ' + required[item],'Error');
					return;
				}	
			}

			$('#rating').hide();
			$('#description').show();
			$(this).attr('id','prev');
			$('#submit').show();
			$(this).html('Prev');
		})

		$(document).on('click','#prev',function(){
			$('#rating').show();
			$('#description').hide();
			$('#submit').hide();
			$(this).attr('id','next');
			$(this).html('Continue');
		})


		$(document).on('click','#submit',function(){

			var enable = true;
			var description = [];
			var rating_array = [];

			for(var item in rating)
			{
				rating_array.push({label:item,value:rating[item]});
			}
			$(document).find('.form-control').each(function(){
				if($(this)[0]['tagName'] == 'TEXTAREA')
				{
					if(!$(this).val() || $(this).val().length < 100)
					{
						toastr['error']('Please select the default value for this '+ $(this).attr('name'),'Error');
						enable = false;

					}
				}

				description.push({label:$(this).attr('name'),content:$(this).val()})
			})

			var id = $(this).attr('attr_id');
			if(enable)
			{
				$.ajax({
					url:base_url + 'reviews/addreview',
					type:'post',
					data:{data:{rating:rating_array,description:description},id:id},
					success:function(res)
					{
						if(res.success)
						{
							toastr['success']('You have successfull reported the review','Success');
						}
					}
				})
			}
		})

		$(document).on('keyup','textarea',function(){
			var length = $(this).val().length;
			console.log(length);
			$(this).parent().parent().find('.textlength').eq(0).html(length);
		})
	}

	function initfilter()
	{
		var rect = $('.filter')[0].getBoundingClientRect();
		var doc = document.documentElement;
		var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
		var width = $('.filter')[0].clientWidth;

		var topelement = rect.top;

		if(!enable)
		{
			topelement = rect.top + top - 155;
		}

		enable = true;
		var width = $('.filter')[0].clientWidth;
		var footerelement = $('footer')[0].getBoundingClientRect();
		var recttop = $('#productdetail_tabs')[0].getBoundingClientRect();

		var heightfooter = $('footer')[0].clientHeight;
		
		if(rect.top < top)
		{
			$('.filter').find('.back_white').css('height','500px');
			$('.filter').find('.back_white').css('overflow-y','scroll');
			$('.filter').css('position','fixed');
			$('.filter').css('left',rect.left);
			$('.filter').css('width',width);
			var rect = $('.filter')[0].getBoundingClientRect();
			
			console.log(rect.bottom - rect.top);
			if(rect.bottom < footerelement.top - 30)
			{
				if(rect.top < 112)
				{
					var position = $('.filter').css('top');
					var realposition = position.split('px');
					var depth =  footerelement.top - 30 - rect.bottom;
					$('.filter').css('top',Number(realposition[0]) + Number(depth) + 'px');			
				}
				else
				{
					$('.filter').css('top','112px');	
				}
			}
			else
			{
				var position = $('.filter').css('top');
				var realposition = position.split('px');
				var depth =  footerelement.top - 30 - rect.bottom;
				$('.filter').css('top',Number(realposition[0]) + Number(depth) + 'px');
			}
			
		}
		else
		{
			$('.filter').attr('style','');
			$('.filter').find('.back_white').css('height','auto');
			$('.filter').find('.back_white').css('overflow-y','scroll');
		}	
	}
	function setHeader()
	{
		//To pin main nav to the top of the page when it's reached
		//uncomment the following

		// var controller = new ScrollMagic.Controller(
		// {
		// 	globalSceneOptions:
		// 	{
		// 		triggerHook: 'onLeave'
		// 	}
		// });

		// var pin = new ScrollMagic.Scene(
		// {
		// 	triggerElement: '.main_nav'
		// })
		// .setPin('.main_nav').addTo(controller);

		if(window.innerWidth > 991 && menuActive)
		{
			closeMenu();
		}
	}

	/* 

	3. Init Custom Dropdown

	*/

	function initCustomDropdown()
	{
		

		
	}

	/* 

	4. Init Page Menu

	*/

	function initPageMenu()
	{
		if($('.page_menu').length && $('.page_menu_content').length)
		{
			var menu = $('.page_menu');
			var menuContent = $('.page_menu_content');
			var menuTrigger = $('.menu_trigger');

			//Open / close page menu
			menuTrigger.on('click', function()
			{
				if(!menuActive)
				{
					openMenu();
				}
				else
				{
					closeMenu();
				}
			});

			//Handle page menu
			if($('.page_menu_item').length)
			{
				var items = $('.page_menu_item');
				items.each(function()
				{
					var item = $(this);
					if(item.hasClass("has-children"))
					{
						item.on('click', function(evt)
						{
							evt.preventDefault();
							evt.stopPropagation();
							var subItem = item.find('> ul');
						    if(subItem.hasClass('active'))
						    {
						    	subItem.toggleClass('active');
								TweenMax.to(subItem, 0.3, {height:0});
						    }
						    else
						    {
						    	subItem.toggleClass('active');
						    	TweenMax.set(subItem, {height:"auto"});
								TweenMax.from(subItem, 0.3, {height:0});
						    }
						});
					}
				});
			}
		}
	}

	function openMenu()
	{
		var menu = $('.page_menu');
		var menuContent = $('.page_menu_content');
		TweenMax.set(menuContent, {height:"auto"});
		TweenMax.from(menuContent, 0.3, {height:0});
		menuActive = true;
	}

	function closeMenu()
	{
		var menu = $('.page_menu');
		var menuContent = $('.page_menu_content');
		TweenMax.to(menuContent, 0.3, {height:0});
		menuActive = false;
	}

	/* 

	5. Init Recently Viewed Slider

	*/

	function initViewedSlider()
	{
		if($('.viewed_slider').length)
		{
			var viewedSlider = $('.viewed_slider');

			viewedSlider.owlCarousel(
			{
				loop:true,
				margin:30,
				autoplay:true,
				autoplayTimeout:6000,
				nav:false,
				dots:false,
				responsive:
				{
					0:{items:1},
					575:{items:2},
					768:{items:3},
					991:{items:4},
					1199:{items:6}
				}
			});

			if($('.viewed_prev').length)
			{
				var prev = $('.viewed_prev');
				prev.on('click', function()
				{
					viewedSlider.trigger('prev.owl.carousel');
				});
			}

			if($('.viewed_next').length)
			{
				var next = $('.viewed_next');
				next.on('click', function()
				{
					viewedSlider.trigger('next.owl.carousel');
				});
			}
		}
	}

	/* 

	6. Init Brands Slider

	*/

	function initBrandsSlider()
	{
		if($('.brands_slider').length)
		{
			var brandsSlider = $('.brands_slider');

			brandsSlider.owlCarousel(
			{
				loop:true,
				autoplay:true,
				autoplayTimeout:5000,
				nav:false,
				dots:false,
				autoWidth:true,
				items:8,
				margin:42
			});

			if($('.brands_prev').length)
			{
				var prev = $('.brands_prev');
				prev.on('click', function()
				{
					brandsSlider.trigger('prev.owl.carousel');
				});
			}

			if($('.brands_next').length)
			{
				var next = $('.brands_next');
				next.on('click', function()
				{
					brandsSlider.trigger('next.owl.carousel');
				});
			}
		}
	}

	/* 

	7. Init Quantity

	*/

	function initQuantity()
	{
		// Handle product quantity input
		if($('.product_quantity').length)
		{
			var input = $('#quantity_input');
			var incButton = $('#quantity_inc_button');
			var decButton = $('#quantity_dec_button');

			var originalVal;
			var endVal;

			incButton.on('click', function()
			{
				originalVal = input.val();
				endVal = parseFloat(originalVal) + 1;
				input.val(endVal);
			});

			decButton.on('click', function()
			{
				originalVal = input.val();
				if(originalVal > 0)
				{
					endVal = parseFloat(originalVal) - 1;
					input.val(endVal);
				}
			});
		}
	}

	/* 

	8. Init Color

	*/

	function initColor()
	{
		if($('.product_color').length)
		{
			var selectedCol = $('#selected_color');
			var colorItems = $('.color_list li .color_mark');
			colorItems.each(function()
			{
				var colorItem = $(this);
				colorItem.on('click', function()
				{
					var color = colorItem.css('backgroundColor');
					selectedCol.css('backgroundColor', color);
				});
			});
		}
	}

	/* 

	9. Init Favorites

	*/

	function initFavs()
	{
		// Handle Favorites
		var fav = $('.product_fav');
		fav.on('click', function()
		{
			fav.toggleClass('active');
		});
	}

	/* 

	10. Init Image

	*/

	function initImage()
	{
		var images = $('.image_list li');
		var selected = $('.image_selected');
		images.each(function()
		{
			var image = $(this);
			image.on('mouseover', function()
			{
				if(image.data('video'))
				{
					selected.html('<iframe src="' + image.data('video') + '" width="100%" height="100%"></iframe')
				}
				else
				{
					var imagePath = new String(image.data('image'));
					selected.html('<img src="' + imagePath + '"/>');	
				}
				
				
			});
		});
	}

	function initTab()
	{
		// Variables
		var clickedTab = $(".tabs > .active");
		var tabWrapper = $(".tab__content");
		var activeTab = tabWrapper.find("li.active").eq(0);
		var activeTabHeight = activeTab.outerHeight();
		
		// Show tab on page load
		activeTab.show();
		
		// Set height of wrapper on page load
		tabWrapper.height(activeTabHeight);
		if(window.innerWidth < 800)
		{
			$('.tabs li').each(function(){
				var html = $(this).children().eq(0).find('i').eq(0)[0]['outerHTML'];
				$(this).children().eq(0).html(html);
			})
			
		}
		else
		{
			$('.tabs li').each(function(){
				var html = $(this).children().eq(0).find('i').eq(0)[0]['outerHTML'];
				$(this).children().eq(0).html(html + $(this).children().eq(0).attr('title'));
			})
			
		}
		$(".tabs > li").on("click", function() {
			
			// Remove class from active tab
			$(".tabs > li").removeClass("active");
			
			// Add class active to clicked tab
			$(this).addClass("active");
			
			// Update clickedTab variable
			clickedTab = $(".tabs .active");
			
			activeTab.fadeOut(250);
			$(".tab__content > li").removeClass("active");
				
			// Get index of clicked tab
			var clickedTabIndex = clickedTab.index();

			// Add class active to corresponding tab
			$(".tab__content > li").eq(clickedTabIndex).addClass("active");
			
			// update new active tab
			activeTab = $(".tab__content > .active");
			
			// Update variable
			activeTab.show();
			activeTabHeight = activeTab[0]['clientHeight'];
			activeTab.hide();
			
			tabWrapper.stop().delay(50).animate({
				height:activeTabHeight
			});

			activeTab.delay(50).fadeIn(250);
			// Animate height of wrapper to new tab height
			
		});
		
		// Variables
		var colorButton = $(".colors li");
		
		colorButton.on("click", function(){
			
			// Remove class from currently active button
			$(".colors > li").removeClass("active-color");
			
			// Add class active to clicked button
			$(this).addClass("active-color");
			
			// Get background color of clicked
			var newColor = $(this).attr("data-color");
			
			// Change background of everything with class .bg-color
			$(".bg-color").css("background-color", newColor);
			
			// Change color of everything with class .text-color
			$(".text-color").css("color", newColor);
		});
	}

	$(document).on('change','input[name=app]',function(){
		var id_array = [];
		$('.compare_product_list').each(function(){
			id_array.push($(this).attr('attr_id'));
		})

		if($(this).val().length > 3)
		{
			var data = {name: $(this).val()};
			var productitemlist = [];
			$.ajax({
				url:base_url + 'searchapps',
				type:'post',
				data:data,
				success:function(res){
					
					var productlist = JSON.parse(res);
					for(var item in productlist)
					{
						if(id_array.indexOf(productlist[item].id) == -1)
						{
							productitemlist.push(productlist[item]);
						}
					}

					$('.title').html('The Search Result for ' + data.name);
					$('.searchappresult').html('');
					for(item in productitemlist)
					{
						var html = '';
						html += '<div class="row p-t-10 productlist-item" style=""><div class="product_logo"><div class="productlink"><img src="' + base_url + productitemlist[item].logo + '"/></div></div><div class="col-5"><h5 class=" m-t-20">' + productitemlist[item].name + '</h5></div><div><span class="addcompare m-t-10 btn btn-primary" style="width:150px !important;" attr_id="' + productitemlist[item].id + '">ADD TO COMPARE</span><a class="m-t-10 m-l-10 btn btn-danger" style="width:150px !important;" href="' + productitemlist[item].product_detail['websiteurl'] + '">VISIT WEBSITE</a>'; 

						$('.searchappresult').append(html);
 					}
				}
			})
		}
	})

	$(document).on('click','.addcompare',function(){
		var id_array = [];
		$('.compare_product_list').each(function(){
			if($(this).attr('attr_id'))
			{
				id_array.push($(this).attr('attr_id'));	
			}
		})

		id_array.push($(this).attr('attr_id'));
		window.location.href= base_url + 'productdetail/' + $('input[name=app]').attr('attr_id') + '/' + id_array.join('-') + '/comparision';
	})

	$(document).on('click','.delete_compare_item',function(){
		var id_array = [];
		$('.compare_product_list').each(function(){
			if($(this).attr('attr_id'))
			{
				id_array.push($(this).attr('attr_id'));	
			}
		})

		var index = id_array.indexOf($(this).parent().parent().attr('attr_id'));

		id_array.splice(index,1);
		window.location.href= base_url + 'productdetail/' + $('input[name=app]').attr('attr_id') + '/' + id_array.join('-') + '/comparision';	
	})
});