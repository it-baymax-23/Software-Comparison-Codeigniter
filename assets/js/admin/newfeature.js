$(document).ready(function(){


	$('#newfeature').submit(function(){
		var data = {};
		$('#newfeature').find('.form-control').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		console.log(data);
		$.ajax({
			url:base_url + 'admin/feature/addfeature',
			type:'post',
			data:data,
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					toastr['success'](res.message,'Feaure Add Success');
				}
				else
				{
					toastr['error'](res.message,'Feature Add Error');
				}
			}
		})

		return false;
	})

	
	$(document).on('click','.delete',function(){
		var id = $(this).parent().parent().find('input[type=checkbox]').eq(0).val();

		console.log(id);
		var name = $(this).parent().parent().find('td').eq(1).html();
		var result = confirm('Are you sure want to delete this ' + name + ' property?');
		if(result)
		{
			var data_id = [];
			data_id.push(id);
			$.ajax({
				url:base_url + 'admin/feature/delete',
				type:'post',
				data:{id:data_id},
				success:function(res)
				{
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

	$('#delete_feature').click(function(){

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
		var result = confirm('Are you sure want to delete this ' + id.length + ' property items?');
		if(result)
		{
			$.ajax({
				url:base_url + 'admin/feature/delete',
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
})