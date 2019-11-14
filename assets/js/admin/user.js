if($('.image-picker').length > 0)
{
	$('.image-picker').imagepicker();
}


$('#selectimage').click(function(){
	var image_select = $('.image-picker').val();
	$('.image_view').html('<img src="' + base_url  + image_select + '"/ attr_src="' + image_select + '">');
	$('#basic').modal('hide');
})

$('.uploadimage').click(function(){
	$.ajaxFileUpload({
		url:base_url + 'admin/user/do_upload',
		secureuri:false,
		fileElementId:'profile',
		dataType: 'json',
		success: function (data, status)
		{
			$('.image_picker_selector').find('.thumbnail').each(function(){
				$(this).removeClass('selected');
			})
			$('.image_picker_selector').prepend('<li><div class="thumbnail selected"><img class="image_picker_image" src="' + base_url + data.filename + '"></div></li>');
			$('.image-picker').prepend('<option data-img-src="' + base_url + data.filename + '" value="' + data.filename + '" selected></option>');

		},
		error: function (data, status, e)
		{										
					
		}
	})
})

function get_rolesettings()
{
	$('#tree_2').jstree().get_selected();
	var selected_obj = $('#tree_2').jstree('get_selected');
	console.log(selected_obj);

	var id_array = [];
	for(item in selected_obj)
	{
		var selected_node = $('#tree_2').jstree().get_node(selected_obj[item]);
		console.log(selected_node);
		if(selected_node.parent != '#')
		{
			var parent = $('#tree_2').jstree().get_node(selected_node.parent);
			var inserted = false;
			for(item_array in id_array)
			{
				if(id_array[item_array].name == parent.text)
				{
					if(!id_array[item_array].children)
					{
						id_array[item_array].children = [];
					}

					id_array[item_array].children.push({
						name:selected_node.text,
						href:selected_node.li_attr['attr_href']
					});
					inserted = true;
				}
			}

			if(!inserted)
			{
				id_array.push({
					name:parent.text,
					href:parent.li_attr['attr_href'],
					icon:parent.icon,
					children:[{
						name:selected_node.text,
						href:selected_node.li_attr['attr_href']
					}]
				})
			}
		}
		else
		{
			if(selected_node.children.length == 0)
			{
				id_array.push({
					name:selected_node.text,
					href:selected_node.li_attr['attr_href'],
					icon:selected_node.icon
				})
			}
		}
	}

	return id_array;
}

$(document).ready(function(){
	$('#saveuser').click(function(){
		$('#userbutton').click();
	})

	$('.deactivate').click(function(){
		var id = $(this).attr('attr_id');
		$.ajax({
			url:base_url + 'admin/user/deactivate',
			type:'post',
			data:{id:id},
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.reload();
				}
			}
		})
	})

	if($('#feature').length > 0)
	{
		var data = $('#sample_1').DataTable().rows().nodes();
		var id_array = [];
		$('#feature').find('.feature').each(function(){
			id_array.push($(this).attr('attr_id'));
		})
		
		$.each(data,function(){
			if(id_array.indexOf($(this).find('input').val()) > -1)
			{
				$(this).find('input')[0]['checked'] = true;
			}
		})
	}

	$(document).on('click','.popular',function(){
		$.ajax({
			url:base_url + 'admin/user/addpopular',
			type:'post',
			data:{id:$(this).attr('attr_id'),popular:$(this)[0]['checked']},
			success:function(res)
			{

			}

		})
	})
	$('.activate').click(function(){
		var id = $(this).attr('attr_id');
		$.ajax({
			url:base_url + 'admin/user/activate',
			type:'post',
			data:{id:id},
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.reload();
				}
				else
				{
					toastr['error'](res.message,'Error');
				}
			}
		})
	})
	$('#userform').submit(function(){
		var data = {};
		var enable = true;
		if($(this).attr('attr_id'))
		{
			data['id'] = $(this).attr('attr_id');
		}
		
		if($('#tree_2').length > 0)
		{
			data['role_manage'] = get_rolesettings();
		}
		data['usertype'] = $(this).attr('attr_type');

		$('#userform').find('.form-control').each(function(){
			if($(this).attr('name') == 'confirmpassword')
			{
				if(data['password'] != $(this).val())
				{
					enable = false;
					toastr['error']('Password must be equal to Confirm Password','Error');
				}
			}
			else
			{
				if(!$(this).hasClass('extra'))
				{
					data[$(this).attr('name')] = $(this).val();		
				}
			}
		})

		if(!enable)
		{
			return false;
		}
		data['socialnetwork'] = {};

		if($('.image_view').find('img').length > 0)
		{
			data['profile'] = $('.image_view').find('img').eq(0).attr('attr_src');
		}

		$('#socialnetwork').find('.form-control').each(function(){
			if($(this).val())
			{
				data['socialnetwork'][$(this).attr('name')] = $(this).val();	
			}
		})

		var self = this;
		console.log(data);
		$.ajax({
			url:base_url + 'admin/user/adduser',
			type:'post',
			data:data,
			success:function(res)
			{
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.href = base_url + 'admin/user/all/' + $(self).attr('attr_type');
				}
				else
				{
					toastr['error'](res.error_message,'Error');
				}
			}
		})
		
		return false;
	})

	$(document).on('click','.delete',function(){
		var id = [$(this).attr('attr-id')];
		var name = $(this).parent().parent().parent().parent().find('td').eq(2).html();
		var result = confirm('Are you sure want to delete ' + name + ' user?');
		if(result)
		{
			$.ajax({
				url:base_url + 'admin/user/delete',
				type:'post',
				data:{id:id},
				success:function(res){
					res = JSON.parse(res);
					if(res.success)
					{
						window.location.reload();
					}
				}
			})	
		}
	})

	$('.moreinfo').click(function(){
		$.ajax({
			url:base_url + 'admin/user/getinfo',
			type:'post',
			data:{id:$(this).attr('attr-id')},
			success:function(res)
			{
				res = JSON.parse(res);
				if(res.success)
				{
					for(item in res.data)
					{
						var html = res.data[item];
						if(item == 'profile')
						{
							html = '<img src="' + base_url + html + '" style="width:100px;height:100px"/>';
						}
						$('#basic').find('.' + item).eq(0).html(html);
					}					
				}

				$('#basic').modal('show');
			}
		})
		return false;
	})
	$('#delete_user').click(function(){
		var ids = [];
		$('#sample_1').find('tr').each(function(){
			if($(this).hasClass('active'))
			{
				ids.push($(this).find('input[type=checkbox]').eq(0).val());
			}
		})

		if(ids.length > 0)
		{
			var result = confirm('Are you sure want to delete this ' + ids.length + ' users?');
			if(result)
			{
				$.ajax({
					url:base_url + 'admin/user/delete',
					type:'post',
					data:{id:ids},
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
			toastr['error']('You must select at least one user to delete','Erorr');
		}
	})

	$(document).on('click','.deactivate',function(){
		
	})
})

$(document).on('click','.feature_select',function(){
	var id = $(this).val();
	var name = $(this).attr('attr_name');
	if($(this)[0]['checked'])
	{
		var enable = true;
		
		$('#features').find('.feature').each(function(){
			if($(this).attr('attr_id') == id)
			{
				enable = false;
			}
		})

		
		$('#feature').append('<span class="badge badge-dark feature" style="margin:2px;" attr_id="' + id + '">' + name + '<i class="fa fa-times-circle deletefeature" style="margin-left:5px;"></i></span>');
	}
	else
	{

		$('#feature').find('.feature').each(function(){
			if($(this).attr('attr_id') == id)
			{
				$(this).remove();
			}
		})
	}
})

$(document).on('click','.feature_all',function(){

	$('.feature_select_each').find('.feature_select').each(function(){
		if(!$(this)[0]['checked'] && $(this).attr('attr_name'))
		{
			var enable = true;
			var id = $(this).val();
			var name = $(this).attr('attr_name');
			$('#feature').find('.feature').each(function(){
				if($(this).attr('attr_id') == id)
				{
					enable = false;
				}
			})

			if(enable)
			{
				$('#feature').append('<span class="badge badge-dark feature" style="margin:2px;" attr_id="' + id + '">' + name + '<i class="fa fa-times-circle deletefeature" style="margin-left:5px;"></i></span>');
			}
		}
		else
		{
			var id = $(this).val();
			$('#feature').find('.feature').each(function(){
				if($(this).attr('attr_id') == id)
				{
					$(this).remove();
				}
			})
		}
	})
})

$(document).on('click','.deletefeature',function(){
	var data = $('#sample_1').DataTable().rows().nodes();
	var id = $(this).parent().attr('attr_id');
	$(this).parent().remove();
	$.each(data,function(){
		if($(this).find('input').val() == id)
		{
			$(this).find('input')[0]['checked'] = false;
		}
	})
	$(this).parent().remove();
})