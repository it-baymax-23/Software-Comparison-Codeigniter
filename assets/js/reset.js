
function resetpassword()
{
	$.ajax({
		url:base_url + 'admin/resetpassword',
		type:'post',
		data:{password:$('input[name=password]').val()},
		success:function(res){
			res = JSON.parse(res);

			if(res.success)
			{
				window.location.href = res.redirect_url;
			}
			else
			{
				toastr['error'](res.message,'Error');
			}
		}
	})
}


var handleLogin = function() {
		$('.reset-password').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                password: {
	                    required: true
	                },
	                rpassword: {
	                    equalTo: '#password'
	                }
	            },

	            messages: {
	                password: {
	                    required: "Password is required."
	                },
	                rpassword: {
	                    equalTo: "Confirm Password must be equal to password"
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.reset-password')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                resetpassword();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    resetpassword()
	                }
	                return false;
	            }
	        });

	        $('#resetpassword').click(function(){
	        	resetpassword();
	        })
	}


	jQuery(document).ready(function(){
		handleLogin();
		$.backstretch([
		        base_url + "assets/img/1.jpg",
		        base_url + "assets/img/2.jpg",
		        base_url + "assets/img/3.jpg",
		        base_url + "assets/img/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    	}
        	);	
	})