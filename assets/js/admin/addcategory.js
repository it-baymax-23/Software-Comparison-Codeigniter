
$(document).ready(function(){
	$(document).on('click','.popular',function(){
		$.ajax({
			url:base_url + 'admin/category/addpopular',
			type:'post',
			data:{id:$(this).attr('attr_id'),popular:$(this)[0]['checked']},
			success:function(res)
			{

			}

		})
	})

	$(document).on('click','.addfeature',function(){
		var data = [];
		$('#features').find('.feature').each(function(){
			data.push($(this).attr('attr_id'));
		})

		var id = $(this).parent().parent().find('input[type=checkbox]').eq(0).val();
		var name = $(this).parent().parent().find('td').eq(1).html();
		if(data.indexOf(id) == -1)
		{
			$('#features').append('<span class="badge badge-dark feature" style="margin:2px;" attr_id="' + id + '">' + name + '<i class="fa fa-times-circle deletefeature" style="margin-left:5px;"></i></span>');
		}
		else
		{
			toastr['warning']('You have seleced before','Select Another Feautre');
		}
	})

	$(document).on('click','.deletecategory',function(){
		var id = [];
		id.push($(this).parent().parent().find('input[type=checkbox]').eq(0).val());
		var name = $(this).parent().parent().find('td').eq(1).html();

		if(confirm('Are you sure want to delete this ' + name + ' category?'))
		{
			$.ajax({
				url:base_url + 'admin/category/delete',
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

	$(document).on('click','#delete_category',function(){
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
				url:base_url + 'admin/category/delete',
				type:'post',
				data:{id:id},
				success:function(res){
					res = JSON.parse(res);
					if(res.success)
					{
						toastr['success'](res.message,'Success');
						window.location.reload();
					}
				}
			})
		}
	})

	$(document).on('click','#clearfeatures',function(){
		$('#features').html('');
	})
	
	$('.savecategory').click(function(){
		$('#categorybutton').click();
		console.log($('#tree_2').jstree('get_selected'));

	})

	$('#categoryform').submit(function(){
		var data = {};
		$('#categoryform').find('.form-control').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		var data_feature = [];
		$('#features').find('.feature').each(function(){
			data_feature.push($(this).attr('attr_id'));
		})

		var selected_node = $('#tree_2').jstree('get_selected');

		var id_array = [];
		for(item in selected_node)
		{
			var selected_obj = $('#tree_2').jstree().get_node(selected_node[item]);
			if(selected_obj.li_attr.attr_id)
			{
				id_array.push(selected_obj.li_attr.attr_id);
			}
		}

		data['related_category'] = id_array;
		
		
		data['feature'] = data_feature;
		if($(this).attr('attr_id'))
		{
			data['id'] = $(this).attr('attr_id');
		}
		
		if($('#category_icon').val())
		{
			$.ajaxFileUpload({
				url:base_url + 'admin/category/do_upload',
				secureuri:false,
				fileElementId:'category_icon',
				dataType: 'json',
				success: function (res, status)
				{
					data['categoryicon'] = res['file'];
					$.ajax({
						url:base_url + 'admin/category/add',
						type:'post',
						data:data,
						success:function(res){
							res = JSON.parse(res);
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
				},
				error: function (res, status, e)
				{										
							
				}
			})
		}
		else
		{
			$.ajax({
				url:base_url + 'admin/category/add',
				type:'post',
				data:data,
				success:function(res){
					res = JSON.parse(res);
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
		}
		return false;
	})
	
	$(document).on('click','.deletefeature',function(){
		$(this).parent().remove();
	})

	$(document).on('click','#savemaincategory',function(){
		$('#maincategory_formsubmit').click();
	});

	
	$('#maincategoryform').submit(function(){
		var data = {};
		$(this).find('.form-control').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		$.ajax({
			url:base_url + 'admin/category/maincategory',
			type:'post',
			data:data,
			success:function(res)
			{
				res = JSON.parse(res);
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

		return false;
	})

	$('#addfeatures').click(function(){
		var data = [];
		$('#features').find('.feature').each(function(){
			data.push($(this).attr('attr_id'));
		})

		var data_element = [];
		$('#sample_1').find('tr').each(function(){
			if($(this).hasClass('active'))
			{
				data_element.push({id:$(this).find('input[type=checkbox]').eq(0).val(),name:$(this).find('td').eq(1).html()});
			}
		})

		for(var index = 0;index<data_element.length;index++)
		{
			if(data.indexOf(data_element[index].id) == -1)
			{
				$('#features').append('<span class="badge badge-dark feature" style="margin:2px;" attr_id="' + data_element[index].id + '">' + data_element[index].name + '<i class="fa fa-times-circle deletefeature" style="margin-left:5px;"></i></span>');		
			}
		}
	})
})