$(document).ready(function(){
	page_init(6);
})

$(document).on('click','.maincategory',function(){
	var self = this;
	$('#loading').fadeIn(50);
	var category_title = $(this).html();
	$.ajax({
		url:base_url + 'admin/blog/getbycategory',
		type:'post',
		data:{id:$(this).attr('attr_id')},
		success:function(res){
			res = JSON.parse(res);
			$('#maincategory').find('.maincategory').each(function(){
				$(this).removeClass('btn-primary');
				$(this).addClass('btn-outline-primary');
			})

			$(self).removeClass('btn-outline-primary');
			$(self).addClass('btn-primary');
			showdata(res);
			if(category_title != 'ALL')
			{
				$('.searchtitle').html('Resources in ' + category_title);
			}
			else
			{
				$('.searchtitle').html('Resources');
			}
			
			$('#loading').fadeOut(50);
		}
	})
})

function showdata(res)
{
	$('#blog_posts').html('');
	var html = '';
	for(item in res)
	{

		html += '<div class="page-card col-12 col-sm-6 col-md-6 col-lg-4 m-t-20"><div class="row"><div class="col-10 col-sm-10 col-md-11 col-lg-11 shadow border_default"  style="height:350px;text-align: center;padding:0px;margin-left:auto;margin-right: auto;"><div class="blog_image" style="background-image:url(' + base_url + res[item]['logo'] + ');border-radius:0px;"></div><div class="blog_text" style="overflow: hidden;height:80px;"><a href="' + base_url + 'blogs/' + res[item]['id'] + '">' + res[item]['title']+'</a></div><a href="' + base_url + 'blogs/' + res[item]['id'] + '" class="btn btn-primary m-t-30">Continue Reading</a></div></div></div>';
	}

	if(res.length == 0)
	{
		html = '<div class="col-md-12"><p> There is no blogs in this category</p></div>';
	}
	$('#blog_posts').append(html);
	currentpage = 1;
	page_init(6);
}
