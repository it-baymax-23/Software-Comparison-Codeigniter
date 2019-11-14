function login()
{
	if($('.login-form').validate().form())
	{
		var data = {}; // the login data to be configured

		$('.login-form').find('input').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})


		$.ajax({
			url:'loginuser',
			type:'post',
			data:data,
			datatype:'json',
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					toastr['success'](res.message,'Welcome to Our Website');
					window.location.href = res.redirect_url;
				}
				else
				{
					toastr['error'](res.message,'Login Result');
				}
			}	
		})
	}
}

function forgetpassword()
{
	var data = {};
	if($('.forget-form').validate().form()){

		$('.forget-form').find('input').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		console.log(data);
		$.ajax({
			url:'forgetpassword',
			type:'post',
			data:data,
			success:function(res){
				res = JSON.parse(res);
				if(res.success)
				{
					toastr['success'](res.message,'Success');
					setTimeout(()=>{
						window.location.reload();		
					},1000);
					
				}
				else
				{
					toastr['error'](res.message,'Error');
				}
			}
		})	
	}
}


function confirmnumber()
{
	var data = {};
	
	$('.confirm-form').find('input').each(function(){
		data[$(this).attr('name')] = $(this).val();
	})

	$.ajax({
		url:'confirmnumber',
		type:'post',
		data:data,
		success:function(res){
			res = JSON.parse(res);

			if(res.success)
			{
				toastr['success'](res.message,'Success');
				window.location.reload();	
			}
			else
			{
				toastr['error'](res.message,'Error');
			}
		}
	})
}

function register()
{
	if ($('.register-form').validate().form())
	{
		var data = {}; //register input data
		
		$('.register-form').find('input').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		$('.register-form').find('select').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		console.log(data);
		$.ajax({
			url:'register',
			type:'post',
			data:data,
			success:function(res){

				res = JSON.parse(res);

				if(res.success)
				{
					toastr['success'](res.message,'Register Result');
					window.location.reload();
				}
				else
				{
					toastr['error'](res.error_message,'Register Result');
				}
			}
		})

	}
}

var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                username: {
	                    required: "Username is required."
	                },
	                password: {
	                    required: "Password is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
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
	                login();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    login()
	                }
	                return false;
	            }
	        });

	        $('#login').click(function(){
	        	login();
	        })
	}

	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

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
	                form.submit();
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    forgetpassword();
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form').show();
	        });

	        jQuery('#forget_button').click(function(){
	        	forgetpassword();
	        })

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.forget-form').hide();
	        });

	}

	var confirm = function () {
		$('.confirm-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                confirm_number: {
	                    required: "Confirm Number is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

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
	                confirmnumber();
	            }
	        });

	        $('.confirm-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.confirm-form').validate().form()) {
	                    confirmnumber();
	                }
	                return false;
	            }
	        });

	        jQuery('#confirm_back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.confirm-form').hide();
	        });

	        jQuery('#confirmbutton').click(function(){
	        	confirmnumber()
	        })

	}

	var handleRegister = function () {

		 function format(state) {
            if (!state.id) { return state.text; }
            var $state = $(
             '<span><img src="assets/img/flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
            );
            
            return $state;
        }

        function format_select2(state)
        {
        	if(!state.id){return state.text;}
        	var $state = $(
        		'<span><i class="fa fa-' + state.element.value.toLowerCase() + '"></i>' + state.text + '</span>'
        		);
        	return $state;
        }

        if (jQuery().select2 && $('#country_list').size() > 0) {
            $("#country_list").select2({
	            placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
	            templateResult: format,
                templateSelection: format,
                width: '100%', 
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

            $("#gender").select2({
	            placeholder: '<i class="fa fa-gender"></i>&nbsp;Select a Gender',
	            templateResult: format_select2,
                templateSelection: format_select2,
                width: '100%', 
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

            $('#gender').change(function(){
            	$('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            })

	        $('#country_list').change(function() {
	            $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
    	}

         $('.register-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                
	                firstname: {
	                    required: true
	                },
	                lastname:{
	                	required:true
	                },
	                email: {
	                    required: true,
	                    email: true
	                },
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                rpassword: {
	                    equalTo: "#register_password"
	                },

	                tnc: {
	                    required: true
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                tnc: {
	                    required: "Please accept TNC first."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

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
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                register();
	            }
	        });

		$('.register-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    register();
                }
                return false;
            }
        });

        $('#register-submit-btn').click(function(){
        	register();
        })

        jQuery('#register-btn').click(function () {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function () {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
	}
    

    
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
            handleForgetPassword();
            handleRegister();    
            confirm();
            // init background slide images
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
        }
    };

}();

jQuery(document).ready(function() {
    Login.init();
});