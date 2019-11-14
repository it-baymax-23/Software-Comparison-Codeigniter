if($('.productlist').length > 0)
{
	$.ajax({
		url:'https://sheets.googleapis.com/v4/spreadsheets/1iy65FgbvVjJN-YshDxkNi8N8LuorXjd-jKky9-2SSQA/values/Totalproductevents!A16:D?key=AIzaSyBlVZAKvmCnn6pX0YGnSTvMAbq_G2Rq3qo',
		type:'get',
		success:function(res)
		{
			var array_value = [];
			for(item in res.values)
			{
				array_value.push(res.values[item][0]);
			}

			var productlist = $('.productlist').DataTable().rows().nodes();
			$.each(productlist,function(){
				$(this).find('td[attr_id]').each(function(){
					if(array_value.indexOf($(this).attr('attr_id')) > -1)
					{
						var index = array_value.indexOf($(this).attr('attr_id'));
						$(this).html(res.values[index][3]);	
					}
				})
			})
		}
	})

	
}

$(document).on('click','#savemaincategory',function(){
	var data = {};
	$('#maincategoryform').find('.form-control').each(function(){
		data[$(this).attr('name')] = $(this).val();
	})

	$.ajax({
		url:base_url + 'admin/category/savemaincategory',
		type:'post',
		data:data,
		success:function(res)
		{
			if(res.success)
			{
				toastr['success'](res.message,'Success');
			}
			else
			{
				toastr['error'](res.message,'Error');
			}
		}
	})
})


$(document).on('click','.category_select',function(){
	if($(this)[0]['checked'])
	{
		var id = $(this).val();
		var name = $(this).parent().parent().parent().find('td').eq(1).html();
		$('.categories').append('<span class="badge badge-dark category" style="margin:2px;" attr_id="' + id + '">' + name + '<i class="fa fa-times-circle deletecategory" style="margin-left:5px;"></i></span>');

	}
	else
	{
		$('.categories').find('span[attr_id=' + $(this).val() + ']').eq(0).remove();
	}
})

$(document).on('click','.popular',function(){
	$.ajax({
		url:base_url + 'admin/product/addpopular',
		type:'post',
		data:{id:$(this).attr('attr_id'),popular:$(this)[0]['checked']},
		success:function(res)
		{

		}

	})
})

$(document).on('click','.activate',function(){
	$.ajax({
		url:base_url + 'admin/product/activate',
		type:'post',
		data:{id:$(this).attr('attr_id'),popular:$(this)[0]['checked']},
		success:function(res)
		{
			
		}
	})
})

$(document).on('click','.deletecategory',function(){
	var data = $('#sample_1').DataTable().rows().nodes();
	var id = $(this).parent().attr('attr_id');
	$('.featureEdit').find('.feature_select[attr_id=' + id + ']').eq(0).remove();
	$(this).parent().remove();
	$.each(data,function(){
		console.log($(this).find('input').val());
		console.log($(self).parent().attr('attr_id'));
		if($(this).find('input').val() == id)
		{
			$(this).find('input')[0]['checked'] = false;
		}
	})
})

	$(document).on('click','.delete',function(){
		var id = [];
		id.push($(this).attr('attr-id'));

		if(confirm('Are you sure want to delete this product?'))
		{
			$.ajax({
				url:base_url + 'admin/product/delete',
				type:'post',
				data:{id:id},
				success:function(res)
				{
					res = JSON.parse(res);
					if(res.success){
						toastr['success'](res.message,'Success');
						window.location.reload();
					}
				}
			})
		}
	})

	$(document).on('click','#delete_product',function(){
		var id = [];
		$('#sample_1').find('tr').each(function(){
			if($(this).hasClass('active'))
			{
				id.push($(this).find('input[type=checkbox]').eq(0).val());
			}
		})

		if(id.length == 0)
		{
			toastr['error']('Please select items to Delete','Error');
			return;
		}
		var result = confirm('Are you sure want to delete this ' + id.length + ' categories?');
		if(result)
		{
			$.ajax({
				url:base_url + 'admin/product/delete',
				type:'post',
				data:{id:id},
				success:function(res){
					res = JSON.parse(res);
					if(res.success)
					{
						toastr['success']('You have Successfully Deleted','Success');
						window.location.reload();
					}
				}
			})
		}
	})

$(document).on('click','.saveproduct',function(){
	$('#productbutton').click();
})

$('#productform').submit(function(){

	var data = {};

	if($(this).attr('attr_id'))
	{
		data['id'] = $(this).attr('attr_id');
	}

	$('#productform').find('.maininfo').each(function(){
		var name = $(this).attr('name');
		if(name)
		{
			data[name] = $(this).val();	
		}
		
	})

	data['screenshot'] = [];
	$('#my-dropzone').find('.screenimage').each(function(){
		data['screenshot'].push($(this).val());
	})

	data['videourl'] = $('input[name=video]').val();

	data['product_detail'] = {};

	$('#product_detail').find('.form-control').each(function(){
		data['product_detail'][$(this).attr('name')] = $(this).val();	
	})

	data['product_detail']['training'] = {};
	$('#training').find('input[type=checkbox]').each(function(){
		data['product_detail']['training'][$(this).val()] = $(this)[0]['checked'];
	})

	data['product_detail']['support'] = {};
	$('#support').find('input[type=checkbox]').each(function(){
		data['product_detail']['support'][$(this).val()] = $(this)[0]['checked'];
	})

	data['product_detail']['deploy'] = [];
	$('#deploy').find('input[type=checkbox]').each(function(){
		if($(this)[0]['checked'])
		{
			data['product_detail']['deploy'].push($(this).val());
		}
	})

	data['product_detail']['pricemodel'] = [];

	$('#pricemodel').find('input[type=checkbox]').each(function(){
		if($(this)[0]['checked'])
		{
			data['product_detail']['pricemodel'].push($(this).val());
		}
	})

	data['product_detail']['deploy'] = data['product_detail']['deploy'].join(',');
	data['feature'] = {};
	
	$('.featureEdit').find('input').each(function(){
		
		if($(this).attr('type') == 'checkbox')
		{
			data['feature'][$(this).attr('id')] = $(this)[0]['checked'];
		}
		else if($(this).attr('type') == 'text')
		{
			data['feature'][$(this).attr('name')] = $(this).val();
		}
	
	})

	data['category'] = [];
	$('.categories').find('.category').each(function(){
		data['category'].push($(this).attr('attr_id'));
	})

	if(data['category'].length > 0)
	{
		data['category'] = data['category'].join(',');	
	}
	else
	{
		toastr['error']('You must select at least one category','Error');
	}

	if($('#logo').val() || $(this).attr('attr_id'))
	{
		if($('#logo').val())
		{
			$.ajaxFileUpload({
				url:base_url + 'admin/product/upload',
				secureuri:false,
				fileElementId:'logo',
				dataType: 'json',
				success: function (datajson, status)
				{
					if(datajson.success)
					{
						data['logo'] = datajson.message;
						$.ajax({
							url:base_url + 'admin/product/addproduct',
							type:'post',
							data:data,
							success:function(res)
							{
								res = JSON.parse(res);
								if(res.success)
								{
									window.location.reload();	
								}
								
							}
						})
					}
					else
					{
						toastr['error'](datajson.message,'Error');
					}
				},
				error: function (data, status, e)
				{										
						
				}
			})
		}
		else
		{
			$.ajax({
				url:base_url + 'admin/product/addproduct',
				type:'post',
				data:data,
				success:function(res){
					res = JSON.parse(res);
					if(res.success)
					{
						window.location.reload();
					}
				}
			})
		}	
	}
	else
	{
		toastr['error']('Please Insert Your Logo Image','Error');
	}
	console.log(data);
	return false;
})


function feature_init(res){
	var html = '';
	$.each(res,function(key,value){
		
		if(value.type == 'checkbox')
		{
			var checked = '';
			if(value.value && value.value == 'true')
			{
				checked = 'checked';
			}
			html += '<div class="form-group row" style="margin-left:20px;"><div class="checkbox checkbox-success"><input id="' + value.id + '" class="styled" type="checkbox" ' + checked + '/><label for="' + value.id + '">' + value.name + '</label></div></div>';
		}
		else
		{
			var valuefield = '';
			if(value.value)
			{
				valuefield = value.value;
			}

			html += '<div class="form-group row" style="margin-left:20px;"><label class="col col-md-4">' + value.name + '</label><div class="col col-md-8"><input type="text" class="form-control" name="' + value.id + '" value ="' + valuefield + '"/></div></div>';
		}

		
	})

	html += '</div></div></form>';
	$('.featureEdit').html(html);
}


$(document).ready(function(){

	
	
	if($('#productform').attr('attr_id'))
	{
		console.log(Dropzone.addFile);
		$.ajax({
			url:base_url + 'admin/product/get',
			type:'post',
			data:{id:$('#productform').attr('attr_id')},
			success:function(res){
				console.log(res);
				res = JSON.parse(res);

				$('#productform').find('.maininfo').each(function(){
					if(res[$(this).attr('name')])
					{
						$(this).val(res[$(this).attr('name')]);
					}
				})

				var screenshot = res.screenshot;
				
				var mydropzone = Dropzone.forElement("form#my-dropzone");
				for(item in screenshot)
				{
					mydropzone.emit("addedfile",{name:screenshot[item],size:12345678});
					mydropzone.emit('thumbnail',{name:screenshot[item],size:12345678},base_url);
				}	
				
				$('#my-dropzone').find('img').each(function(index){
					$(this).attr('src',base_url + screenshot[index]);
					$(this).attr('style','width:120px;height:120px;');
				})
				
				$('#my-dropzone').find('.dz-preview').each(function(index){
					$(this).removeClass('dz-file-preview');
					$(this).addClass('dz-processing dz-success dz-complete dz-image-preview');
					$(this).append('<input class="screenimage" type="hidden" name="screenimage" value="' + screenshot[index] + '">');
				})

				for(item in res.category)
				{
					$('.categories').append('<span class="badge badge-dark category" style="margin:2px;" attr_id="' + res.category[item].id + '">' + res.category[item].name + '<i class="fa fa-times-circle deletecategory" style="margin-left:5px;"></i></span>');

					var data = $('#sample_1').DataTable().rows().nodes();
					$.each(data,function(){
						if($(this).find('input').val() == res.category[item].id)
						{
							$(this).find('input')[0]['checked'] = true;
						}
					})			
				}
				
				$('input[name=video]').val(res.videourl);

				$('#product_detail').find('.form-control').each(function(){
					$(this).val(res.product_detail[$(this).attr('name')]);
				})

				$('#training').find('input[type=checkbox]').each(function(){
					if(res.product_detail.training[$(this).val()] == 'true')
					{
						$(this)[0]['checked'] = true;
					}
				})

				$('#deploy').find('input[type=checkbox]').each(function(){
					if(res.product_detail.deploy.indexOf($(this).val()) > -1)
					{
						$(this)[0]['checked'] = true;
					}
				})

				$('#support').find('input[type=checkbox]').each(function(){
					if(res.product_detail.support[$(this).val()] == 'true')
					{
						$(this)[0]['checked'] = true;
					}
				})

				$('#pricemodel').find('input[type=checkbox]').each(function(){
					if(res.product_detail.pricemodel && res.product_detail.pricemodel.indexOf($(this).val()) > -1)
					{
						$(this)[0]['checked'] = true;
					}
				})
				

				$('.fileinput').attr('class','fileinput fileinput-exists');
				$('.fileinput-preview').addClass('thumbnail');
				$('.fileinput-preview').html('<img src="' + base_url + res.logo + '"/>');
				
				feature_init(res.feature);		
			}
		})
	}
})

$('.moreinfo').click(function(){
	$.ajax({
		url:base_url + 'admin/product/get',
		type:'post',
		data:{id:$(this).attr('attr-id')},
		success:function(res)
		{
			res = JSON.parse(res);
			for(item in res)
			{
				if($('#basic').find('.' + item).length > 0)
				{
					var html = res[item];
					if(item == 'logo')
					{
						html = '<img src="' +base_url + res[item] + '" style="width:100%;height:auto;"/>';
					}
					$('#basic').find('.' + item).eq(0).html(html);
				}		
			}

			$('#basic').modal('show');
		}
	})
	return false;
})

$(document).on('click','.feature_select',function(){
	if($(this)[0]['checked'])
	{
		if($(this).attr('attr_type') == 'checkbox')
		{
			var id = $(this).val();
			var name = $(this).attr('attr_name');
			var type = $(this).attr('attr_type');
			$('.featureEdit').append('<div class="form-group row" style="margin-left:20px;"><div class="checkbox checkbox-success"><input id="' + id + '" class="styled feature_added" type="checkbox" checked/><label for="' + id + '">' + name + '</label></div></div>')	
		}
		else
		{
			$('.featureEdit').append('<div class="form-group row" style="margin-left:20px;"><label class="col col-md-4">' + name + '</label><div class="col col-md-7"><input type="text" class="form-control" name="' + id + '" value =""/></div><i class="fas fa-times removefeature"></i></div>');		
		}
	}
	else
	{
		var id = $(this).val();
		$('.featureEdit').find('input').each(function(){
			if($(this).attr('type') == 'checkbox')
			{
				if($(this).attr('id') == id)
				{
					$(this).parent().parent().remove();
				}
			}
			else
			{
				if($(this).attr('name') == id)
				{
					$(this).parent().parent().remove();
				}
			}
		})
	}
})

$(document).on('click','.feature_added',function(){
	if(!$(this)[0]['checked'])
	{
		var id = $(this).attr('id');
		console.log(id);
		var data = $('#sample_2').DataTable().rows().nodes();
		$.each(data,function(){
			if($(this).find('input').val() == id)
			{
				$(this).find('input')[0]['checked'] = false;
			}
		})			

		$(this).parent().parent().remove();
	}
})

$(document).on('click','.removefeature',function(){
	var id = $(this).parent().find('input').attr('name');
	
	var data = $('#sample_2').DataTable().rows().nodes();
	$.each(data,function(){
		if($(this).find('input').val() == id)
		{
			$(this).find('input')[0]['checked'] = false;
		}
	})			

	$(this).parent().remove();
})