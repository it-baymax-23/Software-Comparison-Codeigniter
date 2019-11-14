var update = false;

$(document).ready(function(){
	$('#saveuser').click(function(){
		update = false;
		$('#userbutton').click();
	})

	$('#userform').submit(function(){
		var data = {};
		var enable = true;
		$('#userform').find('.form-control').each(function(){

			if($(this).attr('name') == 'password' && !$(this).val()){
				return;
			}

			if($(this).attr('name') == 'confirmpassword')
			{
				if($('input[name=password]').val() != $(this).val())
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

		$('#socialnetwork').find('.form-control').each(function(){
			if($(this).val())
			{
				data['socialnetwork'][$(this).attr('name')] = $(this).val();	
			}
		})

		console.log(data);
		if($('#profile').val())
		{
			$.ajaxFileUpload({
				url:base_url + 'user/do_upload',
				secureuri:false,
				fileElementId:'profile',
				dataType:'json',
				success: function (res, status)
				{
					console.log(res);

					if(res.success)
					{
						data['profile'] = res.message;
						if(update)
						{
							update_user(data);
						}
						else
						{
							add_user(data);
						}
					}
					else{
						toastr['error'](res.message,'Error');
					}
				},
				error: function (res, status, e)
				{										
							
				}
			})
		}
		else if(update)
		{
			update_user(data);
		}
		
		
		return false;
	})

	$('#updateaccount').click(function(){
		update = true;
		$('#userbutton').click();
	})

	$('#login').submit(function(){
		var data = {};
		$('#login').find('.form-control').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		$.ajax({
			url:base_url + 'user/loginuser',
			type:'post',
			data:data,
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.href = base_url;
				}
				else
				{
					toastr['error'](res.message,'Error');
				}
			}
		})

		return false;
	})

	$('#forget_pass').submit(function(){
		var data = {};

		$('#forget_pass').find('.form-control').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})
		$.ajax({
			url:base_url + 'user/forgetpassword',
			type:'post',
			data:data,
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.href = base_url;	
				}
				else
				{
					toastr['error'](res.message,'Error');
				}
				
			}

		})

		return false;
	})

	$('#reset_pass').submit(function(){
		var data = {};

		$('#reset_pass').find('.form-control').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		if(data['password'] != data['rpassword'])
		{
			toastr['error']('The Confirm password must be equal to password','Error');
			return false;
		}

		$.ajax({
			url:base_url + 'user/resetpassword',
			type:'post',
			data:data,
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.href = base_url + 'signin';
				}
			}
		})

		return false;
	})

	function add_user(data)
	{
		$.ajax({
			url:base_url + 'user/adduser',
			type:'post',
			data:data,
			success:function(res)
			{
				res = JSON.parse(res);
				if(res.success)
				{
					
					window.location.reload();
				}
				else
				{
					toastr['error'](res.error_message,'Error');
				}
			}
		})
	}

	function update_user(data)
	{
		$.ajax({
			url:base_url + 'user/updateuser',
			type:'post',
			data:data,
			success:function(res)
			{
				res = JSON.parse(res);
				if(res.success)
				{
					window.location.reload();
				}
				else
				{
					toastr['error'](res.error_message,'Error');
				}
			}
		})
	}
})