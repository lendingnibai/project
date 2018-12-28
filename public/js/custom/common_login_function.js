$(document).ready(function(){

	let base_url = $('#base_url').val();
	let logout = $('#logout').val();

	setTimeout(function(){
		if (logout) 
		{
			$('#alert_box').removeClass('invisible');
			$('#alert_box').addClass('alert alert-success slideInDown');
			$('#strong_message').text('Successfully!');
			$('#alert_message').text('Logged out.');
		}
	},100);

	$('input').keypress(function(){
		$('input').removeClass('border-bottom border-danger');
	});

	$('#login_admin_form').submit(function(evt){

		evt.preventDefault();
		let login_admin_form = $(this).serialize();
		let url = $(this).attr('action');

		$('input').removeClass('border-bottom border-danger shake');
		$('#alert_box').removeClass('invisible alert alert-danger alert-success slideInDown shake');

		if ($('#email_username').val() == '' && $('#password').val() == '') 
		{
			$('#alert_box').removeClass('invisible');
			$('#alert_box').addClass('alert alert-danger shake');
			$('#strong_message').text('Please');
			$('#alert_message').text('Enter your login credentials.');
			$('input').addClass('border-bottom border-danger shake');
		}
		else if ($('#email_username').val() == '') 
		{	
			$('#alert_box').removeClass('invisible');
			$('#alert_box').addClass('alert alert-danger shake');
			$('#strong_message').text('Please');
			$('#alert_message').text('Enter your email or username.');
			$('#email_username').addClass('border-bottom border-danger shake');
		}
		else if ($('#password').val() == '') 
		{
			$('#alert_box').removeClass('invisible');
			$('#alert_box').addClass('alert alert-danger shake');
			$('#strong_message').text('Please');
			$('#alert_message').text('Enter your password.');
			$('#password').addClass('border-bottom border-danger shake');
		}
		else
		{
			
			$('#alert_box').addClass('alert alert-info slideInDown');
			$('#strong_message').text('Authenticating!');
			$('#alert_message').text('Please wait...');
			$('#btn_login').text('Logging in...');
			$('#login_admin_form').addClass('disabled');

			//do ajax
			$.ajax({
				url:url,
				type:'POST',
				data:login_admin_form,
				success:function(result){
				result = JSON.parse(result);
				
	                if (result.code == 1) 
	                {
	                    setTimeout(function(){
	                    	$('#alert_box').removeClass('alert alert-danger alert-success alert-info slideInDown shake');
	                    	$('#alert_box').addClass('alert alert-success slideInDown');
							$('#strong_message').text('Successfully');
							$('#alert_message').text(result.message);
							$('#btn_login').text('Logged in');

							setTimeout(function(){
		                    	window.location.href = base_url+result.home;//user login
		                    },2000);

	                    },2000);

	                }
	                else
	                {
	                	setTimeout(function(){
	                		$('#alert_box').removeClass('alert alert-danger alert-success alert-info slideInDown shake');
	                    	$('#alert_box').addClass('alert alert-danger shake');
							$('#strong_message').text('Invalid');
							$('#alert_message').text(result.message);
							$('input').addClass('border-bottom border-danger shake');
							$('#login_admin_form').removeClass('disabled');
							$('#btn_login').text('Login');
	                    },2000);
	                }
	                
				},
				error:function(result){
					alert(result);
				}

			});

		}

	});

});

