$.ajax({
	url:'https://sheets.googleapis.com/v4/spreadsheets/1iy65FgbvVjJN-YshDxkNi8N8LuorXjd-jKky9-2SSQA/values/Totalproductevents!A16:D?key=AIzaSyBlVZAKvmCnn6pX0YGnSTvMAbq_G2Rq3qo',
	type:'get',
	success:function(res)
	{
		for(item in res.values)
		{
			$('.visitnumber[attr_id=' + res.values[item][0] + ']').html('Followers: ' + res.values[item][3]);
		}
	}
})

function addcompare(products)
{
	console.log(products);

	if(!products)
	{
		$('.compare').parent().parent().hide();	
		return;
	}

	if(products.length > 0)
	{
		$('.compare').parent().parent().show();
	}
	else
	{
		$('.compare').parent().parent().hide();
	}
	$('.compare').html('');
	$(document).find('.compare_button').each(function(){
		if($(this).attr('attr_id'))
		{
			$(this).addClass('addcompare');
			$(this).addClass('btn-primary');
			$(this).removeClass('removecompare');
			$(this).removeClass('btn-danger');
			$(this).html('Add To Compare<i class="fa fa-plus-circle" style="margin-left:12px;"></i>');
			
			for(item in products)
			{
				if(products[item] == $(this).attr('attr_id'))
				{
					$(this).removeClass('addcompare');
					$(this).removeClass('btn-primary');
					$(this).addClass('removecompare');
					$(this).addClass('btn-danger');
					$(this).html('Remove From Compare<i class="fa fa-trash" style="margin-left:12px;"></i>')
					
					var html = '<i class="fa fa-times removecompareelem" attr_id="' + products[item] + '"></i>' + $(this).parent().parent().parent().children().eq(0)[0]['outerHTML'];


					$('.compare').append('<div class="col-5 col-md-5 col-sm-5 col-lg-2" style="margin:10px;"><div class="row">' + html + '</div></div>');

				}
			}
			$('.compare').find('.product_logo').css('margin','0px');
		}
	})
}

$(document).on('click','.button-checkbox',function(){
	if($(this).find('input').eq(0)[0]['checked'])
	{
		$(this).find('input').eq(0)[0]['checked'] = false;
		$(this).find('span').eq(0).addClass('btn-default');
		$(this).find('span').eq(0).removeClass('btn-primary');
		$(this).find('i').eq(0).remove();
	}
	else
	{
		$(this).find('input').eq(0)[0]['checked'] = true;
		$(this).find('span').eq(0).removeClass('btn-default');
		$(this).find('span').eq(0).addClass('btn-primary');
		var html = $(this).find('.btn-primary').eq(0).html();

		html = '<i class="fas fa-check"></i>' + html;

		$(this).find('.btn-primary').eq(0).html(html);
	}
	
	$('#filter').submit();
})

$(document).on('click','.collapse',function(){
	var href = $(this).attr('attr_href');
})

$(document).on('click','.removecompareelem',function(){
	var products = JSON.parse(window.sessionStorage.getItem('compareproducts'));
	for(item in products)
	{
		if(products[item] == $(this).attr('attr_id'))
		{
			products.splice(item,1);
		}
	}

	var id = $(this).attr('attr_id');
	$(document).find('.removecompare').each(function(){
		if($(this).attr('attr_id') == id)
		{
			$(this).addClass('addcompare');
			$(this).addClass('btn-success');
			$(this).removeClass('removecompare');
			$(this).removeClass('btn-danger');
			$(this).html('Add To Compare<i class="fa fa-plus-circle" style="margin-left:12px;"></i>')	
		}
	})

	window.sessionStorage.setItem('compareproducts',JSON.stringify(products));
	
	addcompare(products);
	
})

var rect = $('.sticky')[0].getBoundingClientRect();

$('.sticky').css('left',-rect.left);

$(window).resize(function(){
	var rect = $('.sticky')[0].getBoundingClientRect();
	rect.left = -rect.left;
	$('.sticky').css('left',-rect.left);
})
$(document).ready(function(){

	if($('.compare').attr('attr_id') && window.sessionStorage.getItem('categoryid') != $('.compare').attr('attr_id'))
	{
		window.sessionStorage.setItem('compareproducts','[]');
	}

	
	
	var products = JSON.parse(window.sessionStorage.getItem('compareproducts'))
	console.log(products);

	addcompare(products);
	
	
	$(document).on('click','.addcompare',function(){
		if($(this).attr('attr_id'))
		{
			if(!window.sessionStorage.getItem('compareproducts'))
			{
				window.sessionStorage.setItem('compareproducts',"[]");
			}

			var products = JSON.parse(window.sessionStorage.getItem('compareproducts'));

			if(products.length >= 4)
			{
				toastr['error']("You can't add 4 more products to compare",'Error' );
				return;
			}
			var enable = true;
			for(item in products)
			{
				if(products[item] == $(this).attr('attr_id'))
				{
					enable = false;
					toastr['error']('You have added already this product','Error');
					return;
				}
			}

			
			products.push($(this).attr('attr_id'));

			addcompare(products);
			
			console.log(products);
			window.sessionStorage.setItem('compareproducts',JSON.stringify(products));
			window.sessionStorage.setItem('categoryid',$('.compare').attr('attr_id'));
		}
		
	})

	$(document).on('click','.removecompare',function(){
		var products = JSON.parse(window.sessionStorage.getItem('compareproducts'));

		for(item in products)
		{
			if(products[item] == $(this).attr('attr_id'))	
			{
				products.splice(item,1);
			}
		}

		console.log(products);
		addcompare(products);
		$(this).addClass('addcompare');
		$(this).addClass('btn-success');
		$(this).removeClass('removecompare');
		$(this).removeClass('btn-danger');
		$(this).html('Add To Compare<i class="fa fa-plus-circle" style="margin-left:12px;"></i>')
		window.sessionStorage.setItem('compareproducts',JSON.stringify(products));
	}) 
})


$(document).on('click','.comparestart',function(){
	var products = JSON.parse(window.sessionStorage.getItem('compareproducts'));
	if(products.length < 2)
	{
		toastr['error']("You can't compare with only one software element",'Error');
		return;
	}
	window.location.href = base_url + 'compare/' + window.sessionStorage.getItem('categoryid') + '/' + products.join('-');
})

$(document).on('click','.removeone',function(){
	var products = JSON.parse(window.sessionStorage.getItem('compareproducts'));
	for(item in products)
	{
		if(products[item] == $(this).attr('attr_id'))
		{
			products.splice(item,1);
		}
	}

	window.sessionStorage.setItem('compareproducts',JSON.stringify(products));
	window.location.href = base_url + 'compare/' + window.sessionStorage.getItem('categoryid') + '/' + products.join('-');
})

$(document).on('click','#remove_all',function(){
	window.sessionStorage.setItem('compareproducts','[]');
	var product = [];
	addcompare(product);

})
$(document).on('click','.removeall',function(){
	window.sessionStorage.setItem('compareproducts','[]');
	window.location.href = base_url + 'category/' + window.sessionStorage.getItem('categoryid');
})

$(document).on('click','.addproduct',function(){
	window.location.href = base_url + 'category/' + window.sessionStorage.getItem('categoryid');
})