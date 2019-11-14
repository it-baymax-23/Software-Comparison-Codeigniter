function disable_edit()
{
	$('.add_feature_to_table').hide();
	$('#compareproduct').hide();
	$(document).find('.form-control').each(function(){
		$(this).attr('disabled',true);
	})	
}

function enable_edit(){
	$('.add_feature_to_table').show();
	$('#compareproduct').show();
	$(document).find('.form-control').each(function(){
		$(this).attr('disabled',false);
	})	

}

$('#comparetype').change(function(){
	if($('.savecompare').length == 0)
	{
		return;
	}
	$('#comparetable').attr('class',$(this).val());
})

if($('.savecompare').length == 0)
{
	disable_edit();
}
$(document).on('click','.add_to_compare',function(){
	if($('.savecompare').length == 0)
	{
		return;
	}
	var enable = true;

	var id = $(this).attr('attr_id');

	$('#comparetable').find('tbody').eq(0).find('tr').each(function(){
		if($(this).attr('attr_id') == id)
		{
			enable = false;
			toastr['warning']('You have added this product already','warning');
		}
	})

	if(!enable)
	{
		return;
	}
	
	var html = '';
	$('#comparetable').find('thead').eq(0).find('th').each(function(){
		if($(this).attr('attr_id'))
		{
			var type = $(this).attr('attr_type');
			if(type == 'text')
			{
				html += '<td><input type="' + type + '" class="form-control" style="background-color:transparent;border:1px solid;"/></td>';	
			}
			else
			{
				html += '<td><input type="checkbox"/></td>';
			}
			
		}
	})
	$('#comparetable').find('tbody').eq(0).append('<tr attr_id="' + $(this).attr('attr_id') + '"><td style="position:relative;">' + $(this).parent().parent().children().eq(1).html() + '<i class="fas fa-times delete-product"></i></td><td>' + $(this).parent().parent().children().eq(2).html() + '</td>' + html + '</tr>');


})

$(document).on('click','.delete-product',function(){
	$(this).parent().parent().remove();
})

$(document).on('click','.delete-feature',function(){
	var self = this;
	var index_num;
	$(this).parent().parent().find('th').each(function(index){
		if($(self).parent()[0] == $(this)[0])
		{
			$('tbody').find('tr').each(function(){
				$(this).find('td').eq(index).remove();
			})	
		}
		
	})

	$(this).parent().remove();
})
$(document).on('click','.addfeature',function(){
	if($('.savecompare').length == 0)
	{
		return;
	}
	var enable = true;
	var id = $(this).attr('attr_id');

	$('#comparetable').find('thead').eq(0).find('th').each(function(){
		if($(this).attr('attr_id') == id)
		{
			enable = false;
			toastr['warning']('You have added this feature already','warning');
		}
	})

	if(!enable)
	{
		return;
	}

	var name = $(this).parent().parent().children().eq(0).html();
	var type = $(this).parent().parent().children().eq(1).html();
	$('#comparetable').find('thead').eq(0).find('tr').eq(0).append('<th attr_id = "' + id + '" attr_type="' + type + '" style="position:relative;">' + name + '<i class="fas fa-times delete-feature" style=""></i></th>');

	$('#comparetable').find('tbody').eq(0).find('tr').each(function(){
		html = '';
		if(type == 'text')
		{
			html += '<td><input type="' + type + '" class="form-control" style="background-color:transparent;border:1px solid;"/></td>';	
		}
		else
		{
			html += '<td><input type="checkbox"/></td>';
		}
		$(this).append(html);
	})
})

$(document).on('click','.savecompare',function(){

	var id = $(this).attr('attr_id');
	var data = {}; var enable = true;
	if(id)
	{
		data['id'] = id;
	}
	$(document).find('.form-control').each(function(){
		if($(this).attr('name'))
		{
			if($(this).val())
			{
				data[$(this).attr('name')] = $(this).val();	
			}
			else
			{
				toastr['error']('Please Type in ' + $(this).attr('name'),'Error');
				enable = false;
			}
		}
	})

	if(!enable)
	{
		return;
	}


	var self = this;
	$.ajax({
		url:base_url + 'admin/comparetable/checkcompare',
		type:'post',
		data:data,
		success:function(res){
			res = JSON.parse(res);
			if(res.success)
			{
				$('#comparetable').find('td').each(function(){
					if($(this).find('input').length != 0)
					{
						if($(this).find('input').eq(0).attr('type') == 'text')
						{
							$(this).html($(this).find('input').eq(0).val());
						}
						else
						{
							if($(this).find('input').eq(0)[0]['checked'])
							{
								$(this).html('<i class="fas fa-check" style="color:blue;"></i>');
							}
							else
							{
								$(this).html('<i class="fas fa-check"></i>');
							}
						}
					}
				})

				$('#comparetable').find('i').each(function()
				{
					$(this).remove();
				})

				data['content'] = $('#comparetable')[0]['outerHTML'];
				$.ajax({
					url:base_url + 'admin/comparetable/savecompare',
					data:data,
					type:'post',
					success:function(res_data){
						res_data = JSON.parse(res_data);
						if(res_data.success){
							window.location.href = base_url + 'admin/comparetable/newtable/' + res_data.id;
						}
					}
				})
			}
			else
			{
				toastr['error'](res.message,'Error');
			}
		}
	})
})

$(document).on('click','.editcompare',function(){

	var id_array = [];
	$('#comparetable').find('th').each(function(index){
		if($(this).attr('attr_id'))
		{
			$(this).append('<i class="fas fa-times delete-feature"></i>');
			id_array.push(index);
		}
	})

	$('#comparetable').find('tbody').eq(0).find('tr').each(function(){
		$(this).children().eq(0).append('<i class="fas fa-times delete-product"></i>');
		for(var index = 0;index<id_array.length;index++)
		{
			var tdelement = $(this).find('td').eq(id_array[index]);
			if(tdelement.find('i').length > 0)
			{
				var icheck = tdelement.find('i').eq('0');
				var checked = 'checked';
				if(!icheck.attr('style'))
				{
					checked = '';
				}

				tdelement.html('<input type="checkbox" ' + checked + '/>');
			}
			else
			{
				tdelement.html('<input type="text" class="form-control" style="background-color:transparent;border:1px solid;" value="' + tdelement.html() + '"/>');
			}

		}
	})

	$(this).removeClass('editcompare');
	$(this).addClass('savecompare');
	$(this).html('<i class="fas fa-save" style="margin-right:10px;"></i>Save Compare');
	enable_edit();

})

$(document).on('click','.activate',function(){
	
	var data = {id:$(this).attr('attr_id'),activated:$(this)[0]['checked']};
	$.ajax({
		url:base_url + 'admin/comparetable/activate',
		data:data,
		type:'post',
		success:function(res)
		{

		}
	})
})

$(document).on('click','.deletecompare',function(){
	var result = confirm('Are you sure want to delete this compare table really?');

	var self = this;
	var table = $('#sample_1').DataTable();
	if(result)
	{
		$.ajax({
			url:base_url + 'admin/comparetable/delete',
			data:{id:$(this).attr('attr_id')},
			type:'post',
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					toastr['success']('You have successfully delete this item','Success');
					table.row($(self).parent().parent()).remove().draw();
				}
			}
		})
	}
})