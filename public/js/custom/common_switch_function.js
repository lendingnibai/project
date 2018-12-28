$(document).ready(function() {
	let base_url = $('#base_url').val();

	$('#switch_form').submit(function(evt){

		evt.preventDefault();
		let switch_form = $(this).serialize();
		let url = $(this).attr('action');

		$('#password').removeClass('border border-danger');

		if ($('#password').val() == '') 
		{
			alert('Input your password');
			$('#password').addClass('border border-danger');
		}
		else
		{
			//do ajax
			$.ajax({
				url:url,
				type:'POST',
				data:switch_form,
				success:function(result){
				result = JSON.parse(result);
	                if (result.code == 1) 
	                {
	                    alert(result.message);
	                    window.location.href = base_url+result.home;//user login
	                }
	                else
	                {
	                	alert(result.message);
	                }
	                
				},
				error:function(result){
					alert(result);
				}

			});
		}

	});

	$('#register_to_verify_form').submit(function(evt){

		evt.preventDefault();
		//let register_to_verify_form = $(this).serialize();
		let url = $(this).attr('action');
    	let register_to_verify_form = new FormData(this);

		$('#password').removeClass('border border-danger');
		$('#register_to_brgy').removeClass('border border-danger');

		if ($('#register_to_brgy').val() == null) 
		{
			alert('Select your barangay first');
			$('#register_to_brgy').addClass('border border-danger');
		}
		else if ($('#request_gov_id').val() == '') 
	    {
	        alert('Upload government ID');
	    }
		else if ($('#password').val() == '') 
		{
			alert('Input your password');
			$('#password').addClass('border border-danger');
		}
		else
		{
			//do ajax
			$.ajax({
				url:url,
				type:'POST',
				data:register_to_verify_form,
				contentType: false,
         	 	cache: false,
          		processData:false,
				success:function(result){
				result = JSON.parse(result);
	                if (result.code == 1) 
	                {
	                    alert(result.message);
	                    if (result.count_request > 0) 
	                    {
	                    	$('.memo_div1').text(result.memo);
	                    	$('.memo_div1').removeClass('alert-danger');
	                    	$('.memo_div1').addClass('alert-warning');
	                    }
	                    else
	                    {
	                    	$('#memo_div2').text(result.memo);
	                    	$('#memo_div2').removeClass('d-none');
	                    }
	                    $('#password').val('');
	                }
	                else
	                {
	                	alert(result.message);
	                }
	                
				},
				error:function(result){
					alert(result);
				}

			});
		}

	});

});