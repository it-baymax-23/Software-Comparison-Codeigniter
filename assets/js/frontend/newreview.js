var rating = {};
var step = 1;


$(document).on('click','#next',function(){
	var enable = true;
	$('.screen_1').find('p[attr_name]').each(function(){
		if(!rating[$(this).attr('attr_name')])
		{
			toastr['error']('You must add the review for ' + $(this).attr('attr_name'),'Error');
			enable = false;
		}
	})

	if(!enable)
	{
		return;
	}
	$(this).attr('id','submit');
	$(this).html('Submit Review');
	$(this).removeClass('btn-primary');
	$(this).addClass('btn-success');
	$('.screen_1').fadeOut(500);
	$('.screen_2').fadeIn(500);
	$('#prev').fadeIn(500);
})

$(document).on('click','#prev',function(){
	$(this).fadeOut(500);
	$('#submit').show();
	$('#submit').html('Next');
	$('#submit').attr('id','next');
	$('.screen_2').fadeOut(500);
	$('.screen_1').fadeIn(500);
	$('#next').removeClass('btn-success');
	$('#next').addClass('btn-primary');
})

$(document).on('click','#submit',function(){
	$('#submitreview').click();
})

$('#reviewdetail').submit(function(){

	var data = {description:[],rating:[]};

	$('#reviewdetail').find('.form-control').each(function(){
		data.description.push({label:$(this).attr('name'),content:$(this).val()});
	})

	for(item in rating)
	{
		data.rating.push({label:item,value:rating[item]});
	}

	var id = $('.product_logo').attr('attr_id');
	$.ajax({
		url:base_url + 'reviews/addreview',
		data:{data:data,id:id},
		type:'post',
		success:function(res){
			res = JSON.parse(res);
			if(res.success)
			{
				toastr['success']('You have added this review to the software product','Success');
				window.location.reload();
			}
		}
	})
	return false;
})