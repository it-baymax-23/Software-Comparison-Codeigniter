var currentpage = 1;
var socketenable = false;
function pageinit()
{
	var preparepage = $(document).find('.page-card').length;
	var pages = parseInt(preparepage / 6);
	console.log(pages);
	if(pages * 6 < preparepage)
	{
		pages ++;	
	}

	console.log(pages);
	$('.aria-pagination').html('');
	if(pages>0)
	{
		$('.aria-pagination').html('<ul class="pagination" id="pagination" style=""></ul>');

		if(currentpage > pages)
		{
			currentpage = pages;
		}
		window.pagObj = $('#pagination').twbsPagination({
			startPage:currentpage,
	        totalPages: pages,
	        visiblePages: 10,
	        onPageClick: function (event, page) {
	        	currentpage = page;
	            $(document).find('.page-card').each(function(index){
	            	if(index >= 6*(page-1) && index<6*page)
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
}
//socket control
	pageinit();
console.log(io);
if(io != undefined)
{
	var socket = io.connect('http://localhost:3000');

	socket.on('connection',function(){
		console.log('connection');
		socketenable = true;
		
	})

	socket.on('disconnect',function(){
		socketenable = false;
	})

	$(document).on('click','.state_change',function(){

		if(socketenable)
		{
			$(this).find('i').removeClass('fa-play');
			$(this).find('i').addClass('fa-stop');
			socket.emit('start',$(this).attr('attr_id'));	
		}
		else
		{
			toastr['error']('Your Server is not connected to socket server');
		}
		
	})

	socket.on('stop',function(data){
		
		console.log(data);
		$('.state_change').each(function(){
			if($(this).attr('attr_id') == data)
			{
				$(this).find('i').removeClass('fa-stop');
				$(this).find('i').addClass('fa-play');
			}
		})
	})	
}



if($('input[name=created_date]').length > 0){
	$('input[name=created_date]').datepicker({
		format:'yyyy-mm-dd'
	});	

	$('.calendar').click(function(){
		$('input[name=created_date]').focus();
	})
}

$(document).on('mouseover','.rating',function(){


	if($(this).parent().find('.ratinged').length > 0)
	{
		return;
	}
	var value = $(this).attr('value');
	
	$(this).parent().find('.rating').each(function(){
		if($(this).attr('value') <= value)
		{
			$(this).addClass('fas');
			$(this).removeClass('far');
			$(this).css('color','yellow');
		}
		else
		{
			$(this).addClass('far');
			$(this).removeClass('fas');
			$(this).css('color','grey');	
		}
	})
})

$(document).on('click','.rating',function(){
	if($(this).parent().find('.ratinged').length > 0)
	{
		$(this).parent().find('.ratinged').eq(0).removeClass('ratinged');	
	}
	else
	{
		$(this).parent().find('.rating').eq(0).addClass('ratinged');
	}

	var value = $(this).attr('value');
	
	$(this).parent().find('.rating').each(function(){
		if($(this).attr('value') <= value)
		{
			$(this).addClass('fas');
			$(this).removeClass('far');
			$(this).css('color','yellow');
		}
		else
		{
			$(this).addClass('far');
			$(this).removeClass('fas');
			$(this).css('color','black');	
		}
	})
})
$(document).on('click','.deletesource',function(){
	var result = confirm('                                 Are you sure want to delete source?\n If you delete this resource then you will delete all review related with this resource,\n                 You can only deactivate it then you will not delete the review');
	if(result)
	{
		$.ajax({
			url:base_url + 'admin/review/deletesource',
			type:'post',
			data:{id:$(this).attr('attr_id')},
			success:function(res)
			{
				res = JSON.parse(res);
				console.log(res);
				if(res.success)
				{
					window.location.reload();
				}
			}
		})	
	}
	
})

$(document).on('click','#addrating',function(){
	if(!$('input[name=rating]').val())
	{
		toastr['error']('Please Type in rating label','Error');
		return;
	}

	var label = $('input[name=rating]').val();
	var enable = false;
	$('.ratingcontainer').find('.rating_label').each(function(){
		if($(this).html() == label)
		{
			toastr['error']('You have added this rating for this product','Error');
			enable = true;
		}
	})

	if(enable)
	{
		return;
	}
	var label = $('input[name=rating]').val();
	$('.ratingcontainer').append('<div class="row ratingelement m-t-20" attr_label = "' + label +'"><div class="col-md-7"><h4 class="rating_label">' + label + '</h4></div><div class="col-md-4"><h4><i class="far fa-star rating" value="1"></i><i class="far fa-star rating" value="2"></i><i class="far fa-star rating" value="3"></i><i class="far fa-star rating" value="4"></i><i class="far fa-star rating" value="5"></i></h4></div><div class="col-md-1"><i class="fa fa-times delete_rating"></i></div></div>');
	$('#rating').modal('hide');

})

$(document).on('click','#adddescription',function(){
	if(!$('input[name=adddescription]').val())
	{
		toastr['error']('Please Type in Description Title');
		return;
	}

	var description = $('input[name=adddescription]').val();

	var enable = false;
	$('.description_add').find('.description_label').each(function(){
		if($(this).html() == description)
		{
			toastr['error']('You have added this description for this product','Error');
			enable = true;
		}
	})

	if(enable)
	{
		return;
	}

	$('.description_add').append('<div class="row m-t-30"><label class="col-md-3 description_label">' + description + '</label><div class="col-md-8"><textarea class="form-control" name="' + description + '"></textarea></div><div class="col-md-1"><i class="fa fa-times delete_description"></i></div></div>');

	$('#description').modal('hide');
})

$(document).on('click','.delete_description',function(){
	$(this).parent().parent().remove();
})

$(document).on('click','.delete_rating',function(){
	$(this).parent().parent().remove();
})

$(document).on('click','.savereview',function(){
	var data = {rating:[],description:[]};

	var reviewid = $(this).attr('review_id');

	$('.ratingcontainer').find('.ratingelement').each(function(){
		var value = 0;
		$(this).find('.rating').each(function(){
			if($(this).hasClass('fas'))
			{
				value = $(this).attr('value');
			}
		})

		data.rating.push({label:$(this).attr('attr_label'),value:value});
	})

	var enable = true;

	$('.description_add').find('.form-control').each(function(){

		if($(this).val())
		{
			data.description.push({label:$(this).attr('name'),content:$(this).val()});	
		}
		else
		{
			if($(this).attr('name') == 'resource')
			{
				return;
			}
			toastr['error']("You didn't typed in " + $(this).attr('name') + ' Section','Error');
			enable = false;
		}
	})

	if(!enable)
	{
		return;
	}

	var id = $(this).attr('product_id');
	var url = 'admin/review/addreview';
	if(reviewid)
	{
		id = reviewid;
		url = 'admin/review/updatereview';
	}
	
	$.ajax({
		url:base_url + url,
		data:{data:data,id:id},
		type:'post',
		success:function(res){
			res = JSON.parse(res);
			if(res.success)
			{
				if(!reviewid)
				{
					toastr['success']('You have added this review to the software product','Success');
					window.location.href = base_url + 'admin/product';
				}
				else
				{
					toastr['success']('You have updated this review','Success');	
				}
			}
		}
	})
	console.log(data);
})

$(document).on('click','.deletereview',function(){
	var result = confirm('Are you sure you really want to delete this one item?');
	if(result){
		$.ajax({
			url:base_url + 'admin/review/delete',
			data:{id:$(this).attr('attr_id')},
			type:'post',
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					toastr['success']('You have successfully deleted this review');
					window.location.reload();
				}
			}
		})	
	}
})

$(document).on('click','.activate',function(){
	$.ajax({
		url:base_url + 'admin/review/activate',
		data:{id:$(this).attr('attr_id'),activate:$(this)[0]['checked']},
		type:'post',
		success:function(res){

		}
	})
})

$(document).on('click','.resourceactivate',function(){
	var data = {id:$(this).attr('attr_id'),status:$(this)[0]['checked']};

	$.ajax({
		url:base_url + 'admin/review/resourceactive',
		type:'post',
		data:data,
		success:function(res){

		}
	})
})

$(document).on('click','.editsource',function(){
	var website = $(this).parent().parent().find('td').eq(0).html();
	var websiteid = $(this).parent().parent().find('td').eq(1).html();

	$('#websitesource').attr('attr_id',$(this).attr('id'));
	$('input[name=website]').val(website);
	$('input[name=webid]').val(websiteid);
	$('#basic').modal('show');
})

$(document).on('click','.addsource',function(){
	$('#websitesource').attr('attr_id','');
	$('#websitesource').find('.form-control').each(function(){
		$(this).val('');
	})

	$('#basic').modal('show');
})

$('#websitesource').submit(function(){
	var data = {};
	if($(this).attr('attr_id'))
	{
		data['id'] = $(this).attr('attr_id');
	}

	$(this).find('.form-control').each(function(){
		data[$(this).attr('name')] = $(this).val();
	})

	$.ajax({
		url:base_url + 'admin/review/addsource',
		type:'post',
		data:data,
		success:function(resource)
		{
			resource = JSON.parse(resource);
			if(resource.success)
			{
				window.location.reload();
			}
			else
			{
				toastr['error'](resource.message,'Error');
			}
		}
	})

	return false;
})

$(document).on('click','#savewebresource',function(){
	$('#websiteresourcesubmit').click();
})