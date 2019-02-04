$(document).ready(function(){

	let base_url = $('#base_url').val();

	$('#btn_cancel').click(function(){
		let click = confirm('Are you sure you want to cancel?');
		if (click  == true) 
		{
			$('#btn_close').click();
		}
	});

	$('#withdraw_data_form').submit(function(evt){

		evt.preventDefault();//para di mo refresh
    	let url = $(this).attr('action');
    	let withdraw_data_form = $(this).serialize();

        $('input').removeClass('border border-danger');
    	$('#barangay_for_other_w').removeClass('border border-danger');


        if ($('#other_brgy_indicator_w').val() != null && $('#barangay_for_other_w').val() == null) 
        {
            alert('Select barangay where you want to withdraw');
            $('#barangay_for_other_w').addClass('border border-danger');
        }
    	else if ($('#amount').val() == '' && $('#password_w').val() == '') 
    	{
    		alert('Enter amount & password');
    		$('#amount').addClass('border border-danger');
    		$('#password_w').addClass('border border-danger');
    	}
    	else if ($('#amount').val() == '')
    	{
    		alert('Enter amount');
    		$('#amount').addClass('border border-danger');
    	}
    	else if ($('#password_w').val() == '')
    	{
    		alert('Enter password');
    		$('#password_w').addClass('border border-danger');
    	}
    	else if (isNaN($('#amount').val()))
    	{
    		alert('Invalid amount');
    		$('#amount').addClass('border border-danger');
    	}
    	else
    	{

    		$.ajax({
    			url:url,
    			type:'POST',
    			data:withdraw_data_form,
    			success:function(result){
    				result  = JSON.parse(result);
    				if (result.code == 1) 
    				{
                        $('#barangay_for_other_w').addClass('d-none');
    					$('#withdraw_submited').removeClass('d-none');
			    		$('#withdraw_data').addClass('d-none');
			    		$('#btn_cancel').addClass('d-none');
			    		$('#btn_withdraw').addClass('d-none');
			    		$('#btn_close_href').removeClass('d-none');
                        $('#btn_close_modal_1').addClass('d-none');
                        $('#btn_close_modal_2').removeClass('d-none');
			    		alert(result.message);
			    		$('#withdraw_amount').text(result.amount);
			    		$('#date_time').text(result.date_time);
			    		$('#reference_code').text(result.reference_code);
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