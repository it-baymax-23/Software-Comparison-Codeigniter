$(document).on('click','.load_more',function(){
	var length = $(this).parent().parent().find('.col-md-12').length;
	var totalhtml = $('.search_result').html();
	console.log(totalhtml);
	var total_num = totalhtml.match(/\d+/)[0];
	console.log(total_num);
	var self = this;
	$.ajax({
		url:base_url + 'searchmore',
		type:'post',
		data:{initialdata:length,type:$(this).attr('attr_type'),search:$(this).attr('attr_search')},
		success:function(res){
			res = JSON.parse(res);
			var html = display_data(res,$(self).attr('attr_type'));
			$(html).insertBefore($(self).parent());
			$('html,body').animate({
				scrollTop:$(self).parent().offset().top
			},1500);
			
			if(res.length + length >= total_num)			
			{
				$(self).parent().fadeOut('slow');
			}
		}
	})
	return false;
})

function display_data(res,type)
{
	var html = '';
	for(item in res)
	{
		html += '<div class="col-md-12 m-l-30 m-t-20">';
		if(type == 'category')
		{
			html += '<h4><a class="search_content" href="' + base_url + 'category/' + res[item]['id'] + '">' + res[item]['name'] + '</a></h4><p class="search_desc">' + res[item]['description'] + '</p>';
		}
		else if(type == 'product')
		{
			html += '<div class="row m-t-20"><div class="logo_image"><img src="' + base_url + res[item]['logo'] + '" style="width:100px;height:100px;"></div><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"><h4><a class="search_content" href="' + base_url + 'productdetail/' + res[item]['id'] + '">' + res[item]['name'] + '</a></h4><p style="overflow:hidden;height:50px;">' + res[item]['description'] + '</p></div></div>';
		}
		else if(type == 'resource')
		{
			html += '<div class="row m-t-20"><div class="logo_image"><img src="' + base_url + res[item]['logo'] + '" style="width:100px;height:100px;"></div><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"><h4><a class="search_content" href="' + base_url + 'blogs/' + res[item]['id'] + '">' + res[item]['title'] + '</a></h4></div></div>';
		}
		html += '</div>';
	}

	
	return html;
}
