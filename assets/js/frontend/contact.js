$('.js-tilt').tilt({
	scale: 1.1
})

$('#contact_form').submit(function(){
	var data = {};
	$(this).find('.input100').each(function(){
		data[$(this).attr('name')] = $(this).val();
	})

	$.ajax({
		url:base_url + 'user/contact',
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
	return false;
})