


var selected_element;
var element_path;
var type = 'rating';
require_field = ['over_all','title'];
$('.iframe_view').click(function(){
	selected_element = $(this).parent().find('input').eq(0);
	if(element_path != $('#sample').val())
	{
		element_path = $('#sample').val();
		$('iframe').attr('src',base_url + 'admin/iframe_view?url='+$('#sample').val());
		
	}
	else
	{
		$('#basic').modal('show');
	}
})

if($('iframe').length >0)
{
	$('iframe')[0].onload = function(){
		if(selected_element)
		{
			$('#basic').modal('show');
			var current = $('iframe');
			console.log(current[0].contentWindow.document);
			console.log($('iframe').contents());
			$('iframe').contents().find('head').append(
				$('<link/>',{
					rel:'stylesheet',
					type:'text/css',
					href:base_url + 'assets/css/iframe.css',
					id:'compare_scrape'
				}));

			$('iframe').contents()
			.on('mouseover',function(event){
				$(event.target).addClass('ol_scrapes_inspector');
			})
			.on('mouseout',function(event){
				$(event.target).removeClass('ol_scrapes_inspector');
			})
			.on('click',function(event){
				var path = [];
				$(event.target).removeClass('ol_scrapes_inspector');
				if(selected_element.attr('attr_type') && selected_element.attr('attr_type') == 'rating')
				{
					var entry = $(event.target)[0].tagName.toLowerCase();
					entry += "." + $(event.target)[0].className.replace(/ /g,'.');
					selected_element.val(entry);
				}
				else
				{
					$(event.target).parents().addBack().not('html').each(function(){
						var entry = this.tagName.toLowerCase();
						if(this.className)
						{
							var filter = this.className.split(' ');
							var classlist = [];
							for(item in filter)
							{
								if(filter[item])
								{
									classlist.push(filter[item]);
								}
							}
							entry += "." + classlist.join('.');
						}
						path.push(entry);
					})
					selected_element.val(path.join(" "));
				}
				
				$('#basic').modal('hide');
			})	
		}
		
	}	
}

$('.savereviewsetting').click(function(){
	var data = {};
	var enable = true;
	$('#setting_content').find('.form-control').each(function(){
		if(!$(this).val())
		{
			if(enable && require_field.indexOf($(this).attr('name')) > -1)
			{
				toastr['error']('Please type in ' + $(this).attr('name'),'Error');
				$(this).focus();
				enable = false;
			}
		}
		data[$(this).attr('name')] = $(this).val();
	})

	if(!enable)
	{
		return;
	}
	if(data['extra_rating_label'] || data['extra_rating_content'])
	{
		if(!data['rating_unit'])
		{
			toastr['error']('Please Type in Extra rating Unit','Error');
			return;		
		}
		
	}

	
	data['resource_id'] = $(this).attr('attr_id');
	$.ajax({
		url:base_url + 'admin/settingsave',
		type:'post',
		data:data,
		success:function(res){
			if(res.success)
			{
				toastr['success'](res.message,'Success');	
			}
			
		}
	})
})

$('.save_product_review').click(function(){
	var data = {};

	var enable = true;
	$(document).find('.form-control').each(function(){
		if(!$(this).val())
		{
			toastr['error']('Please Insert into ' + $(this).attr('name'),'Error');
			enable = false;
		}
		data[$(this).attr('name')] = $(this).val();
	})

	if(enable)
	{
		data['product_id'] = $(this).attr('product_id');
		$.ajax({
			url:base_url + 'admin/product/reviewsetting',
			type:'post',
			data:data,
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					toastr['success']('You have added successfully the new review setting');
				}
			}
		})
	}
})