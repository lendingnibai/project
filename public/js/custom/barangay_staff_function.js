$(document).ready(function(){
	let base_url = $('#base_url').val();

    $('#brgy_staff').click(function(){
        //show/hide add brgy officials form
        $('#addBrgyStaffDiv').removeClass('d-none');
    });

    $('#addBrgyStaffForm').submit(function(evt){
    	evt.preventDefault();
    	let url = $(this).attr('action');
    	let addBrgyStaffForm = $(this).serialize();

    	$('input').removeClass('border-bottom border-danger');

    	if ($('#first_name').val() == '' && $('#last_name').val() == '' && $('#email').val() == '' && $('#position').val() == '' && $('#mobile_no').val() == '') 
    	{
    		alert('Fill all required fields');
    		$('input').addClass('border-bottom border-danger');
    		$('#middle_name').removeClass('border-bottom border-danger');
    	}
    	else if ($('#first_name').val() == '')
    	{
    		alert('Input first name');
      		$('#first_name').addClass('border-bottom border-danger');
    	}
    	else if ($('#last_name').val() == '') 
    	{
    		alert('Input last name');
      		$('#last_name').addClass('border-bottom border-danger');
    	}
    	else if ($('#email').val() == '') 
    	{
    		alert('Input email address');
      		$('#email').addClass('border-bottom border-danger');
    	}
    	else if ($('#position').val() == '') 
    	{
    		alert('Input position');
      		$('#position').addClass('border-bottom border-danger');
    	}
    	else if ($('#mobile_no').val() == '') 
    	{
    		alert('Input mobile no.');
      		$('#mobile_no').addClass('border-bottom border-danger');
    	}
    	else
    	{
    		//do ajax
    		$.ajax({
    			url:url,
    			type:'POST',
    			data:addBrgyStaffForm,
    			success:function(result){
    				result = JSON.parse(result);
    				if (result.code == 1) 
    				{
    					alert(result.message);
    					location.reload();
    				}
    				else 
    				{
    					alert(result.message);
    				}
    			},
    			error:function(result){

    			}

    		});

    	}

    });

});