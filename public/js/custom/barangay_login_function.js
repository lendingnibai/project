
$(document).ready(function(){
	let base_url = $('#base_url').val();
	let logout = $('#logout').val();
	//alert(logout);
	setTimeout(function(){
		if (logout != '') 
		{
			$('#alertBox').css('visibility', '');
			$('#alertBox').addClass('alert alert-success slideInDown');
			$('#strongMessage').text('Success!');
			$('#alertMessage').text('Logged out.');
		}
	},100);
	
	$( ".pressEnter" ).keypress(function(enter) {
	  	if (enter.which == 13) {
	  		$('#btnLogin').trigger('click');
	  	}
	});

	$('#btnLogin').click(function(){
		let loginFormData = $('#loginFormData').serialize();
		let emailUsername = $('#emailUsername').val();
		let password = $('#password').val();

		loginFormData = loginFormData.replace(/&?[^=&]+=(&|$)/g,'');//remove the empty data

		if (emailUsername == '' && password == '') 
		{
			$('#emailUsername').addClass('animated bounce border border-danger');
			$('#password').addClass('animated bounce border border-danger');
			setTimeout(function(){
				$('#emailUsername').removeClass('animated bounce border border-danger');
				$('#password').removeClass('animated bounce border border-danger');
				alert('Enter your credentials');
			},100);
		}
		else if(emailUsername == '')
		{
			$('#emailUsername').addClass('animated bounce border border-danger');
			setTimeout(function(){
				$('#emailUsername').removeClass('animated bounce border border-danger');
				alert('Enter your email or username');
			},100);
		}
		else if(password =='')
		{
			$('#password').addClass('animated bounce border border-danger');
			setTimeout(function(){
				$('#password').removeClass('animated bounce border border-danger');
				alert('Enter your password');
			},100);
		}
		else
		{
			//do ajax
			$.ajax({

				url: base_url+'login/account',
				type:'POST',
				data: loginFormData,
				success:function(ret){
					//alert(ret);
					if (ret == 'disabled account') 
					{

						$('#alertBox').removeClass('alert alert-danger shake');
						
						setTimeout(function(){
							$('#alertBox').addClass('alert alert-danger shake');
							$('#alertBox').css('visibility', '');
							$('#strongMessage').text('Disabled!');
							$('#alertMessage').text('account pls contact admin.');
						},1);

					}				
					else if (ret != '') 
					{	
						$('#alertBox').removeClass('alert alert-danger');
						$('#strongMessage').text('Authenticating!');
						$('#alertMessage').text('Please wait...');
						$('#alertBox').addClass('alert alert-success slideInUp');
						$('#loginFormData').addClass('disabled');
						$('#alertBox').css('visibility', '');
						setTimeout(function(){
							$('#strongMessage').text('Success!');
							$('#alertMessage').text('Logged in as ' +ret+ '. Redirecting...');
							setTimeout(function(){
									if (ret == 'admin') 
									{
										window.location.href = base_url+"dashboard";
									}
									else
									{
										window.location.href = base_url+"home";
									}
							},2000);
						},2000);

					}
					else
					{
						$('#alertBox').removeClass('alert alert-danger shake');
						
						setTimeout(function(){
							$('#alertBox').addClass('alert alert-danger shake');
							$('#alertBox').css('visibility', '');
							$('#strongMessage').text('Invalid!');
							$('#alertMessage').text('credentials.');
						},1);
						
					}
				},
				error:function(){

					alert('Something went wrong');
					
				}
			});
		}

	});
});
