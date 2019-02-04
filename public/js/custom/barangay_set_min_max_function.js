$(document).ready(function(){
	let base_url = $('#base_url').val();

	$('#loan_amount_form').submit(function(evt){
		evt.preventDefault();
		let loan_amount_form = $(this).serialize();
		let url = $(this).attr('action');

		if ($('#min_loan_amount').val() == '' && $('#max_loan_amount').val() == '' && $('#loan_amount_password').val() == '') 
		{
			alert('Fill all fields!');
		}
		else if ($('#min_loan_amount').val() == '') 
		{
			alert('Input minimum amount!');
		}
		else if ($('#max_loan_amount').val() == '') 
		{
			alert('Input maximum amount!');
		}
		else if ($('#loan_amount_password').val() == '') 
		{
			alert('Input password!');
		}
		else if (isNaN($('#min_loan_amount').val())) 
		{
			alert('Invalid minimum loan amount!');
		}
		else if (isNaN($('#max_loan_amount').val())) 
		{
			alert('Invalid maximum loan amount!');
		}
		else
		{
			$.ajax({
				url:url,
				type:'POST',
				data:loan_amount_form,
				success:function(result){
					result = JSON.parse(result);
		            if (result.code == 1) 
		            {
		                alert(result.message);
		                window.location.href  = base_url + 'barangay/set_min_max?loan-amount-updated';
		            }
		            else
		            {
		                alert(result.message);
		                $('#loan_amount_password').val('');
		            }
				},
				//error
				error:function(){
					console.log('Error');
				}
			});
		}
	});

	$('#loan_rate_form').submit(function(evt){
		evt.preventDefault();
		let loan_rate_form = $(this).serialize();
		let url = $(this).attr('action');

		if ($('#one_mo').val() == '' && $('#two_mo').val() == '' && $('#three_mo').val() == '' && $('#four_mo').val() == '' && $('#five_mo').val() == '' && $('#six_mo').val() == '' && $('#seven_mo').val() == '' && $('#eight_mo').val() == '' && $('#nine_mo').val() == '' && $('#ten_mo').val() == '' && $('#eleven_mo').val() == '' && $('#twelve_mo').val() == '' && $('#loan_rate_password').val() == '') 
		{
			alert('Fill all fields');
		}
		else if ($('#one_mo').val() == '') 
		{
			alert('Input one month rate');
		}
		else if ($('#two_mo').val() == '') 
		{
			alert('Input two months rate');
		}
		else if ($('#three_mo').val() == '') 
		{
			alert('Input three months rate');
		}
		else if ($('#four_mo').val() == '') 
		{
			alert('Input four months rate');
		}
		else if ($('#five').val() == '') 
		{
			alert('Input five months rate');
		}
		else if ($('#six').val() == '') 
		{
			alert('Input six months rate');
		}
		else if ($('#seven').val() == '') 
		{
			alert('Input seven month rate');
		}
		else if ($('#eight_mo').val() == '') 
		{
			alert('Input eight months rate');
		}
		else if ($('#nine_mo').val() == '') 
		{
			alert('Input nine months rate');
		}
		else if ($('#ten_mo').val() == '') 
		{
			alert('Input ten months rate');
		}
		else if ($('#eleven_mo').val() == '') 
		{
			alert('Input eleven months rate');
		}
		else if ($('#twelve_mo').val() == '') 
		{
			alert('Input twelve months rate');
		}
		else if ($('#loan_rate_password').val() == '') 
		{
			alert('Input password');
		}
		else
		{
			$.ajax({
				url:url,
				type:'POST',
				data:loan_rate_form,
				success:function(result){
					result = JSON.parse(result);
		            if (result.code == 1) 
		            {
		                alert(result.message);
		                window.location.href  = base_url + 'barangay/set_min_max?loan-rate-updated';
		            }
		            else
		            {
		                alert(result.message);
		                $('#loan_rate_password').val('');
		            }
				},
				//error
				error:function(){
					console.log('Error');
				}
			});
		}
	});

	$('#loan_term_form').submit(function(evt){
		evt.preventDefault();
		let loan_term_form = $(this).serialize();
		let url = $(this).attr('action');

		if ($('#mt_one_mo').val() == '' || $('#mt_two_mo').val() == '' || $('#mt_three_mo').val() == '' || $('#mt_four_mo').val() == '' || $('#mt_five_mo').val() == '' || $('#mt_six_mo').val() == '' || $('#mt_seven_mo').val() == '' || $('#mt_eight_mo').val() == '' || $('#mt_nine_mo').val() == '' || $('#mt_ten_mo').val() == '' || $('#mt_eleven_mo').val() == '' || $('#mt_twelve_mo').val() == '') 
		{
			alert('Opps something went wrong!');
		}
		else if ($('#mt_one_mo').val() == '') 
		{
			alert('Input one month rate');
		}
		else if ($('#mt_two_mo').val() == '') 
		{
			alert('Input two months rate');
		}
		else if ($('#mt_three_mo').val() == '') 
		{
			alert('Input three months rate');
		}
		else if ($('#mt_four_mo').val() == '') 
		{
			alert('Input four months rate');
		}
		else if ($('#mt_five').val() == '') 
		{
			alert('Input five months rate');
		}
		else if ($('#mt_six').val() == '') 
		{
			alert('Input six months rate');
		}
		else if ($('#mt_seven').val() == '') 
		{
			alert('Input seven month rate');
		}
		else if ($('#mt_eight_mo').val() == '') 
		{
			alert('Input eight months rate');
		}
		else if ($('#mt_nine_mo').val() == '') 
		{
			alert('Input nine months rate');
		}
		else if ($('#mt_ten_mo').val() == '') 
		{
			alert('Input ten months rate');
		}
		else if ($('#mt_eleven_mo').val() == '') 
		{
			alert('Input eleven months rate');
		}
		else if ($('#mt_twelve_mo').val() == '') 
		{
			alert('Input twelve months rate');
		}
		else if ($('#loan_term_password').val() == '') 
		{
			alert('Input password');
		}
		else
		{
			$.ajax({
				url:url,
				type:'POST',
				data:loan_term_form,
				success:function(result){
					result = JSON.parse(result);
		            if (result.code == 1) 
		            {
		                alert(result.message);
		                window.location.href  = base_url + 'barangay/set_min_max?loan-term-updated';
		            }
		            else
		            {
		                alert(result.message);
		                $('#loan_term_password').val('');
		            }
				},
				//error
				error:function(){
					console.log('Error');
				}
			});
		}
	});

	$('#rebate_rate_form').submit(function(evt){
		evt.preventDefault();
		let rebate_rate_form = $(this).serialize();
		let url = $(this).attr('action');

		if ($('#rebate_rate').val() == '' && $('#rebate_rate_password').val() == '') 
		{
			alert('Fill all fields');
		}
		else if ($('#rebate_rate').val() == '') 
		{
			alert('Input rebate rate');
		}
		else if ($('#rebate_rate_password').val() == '') 
		{
			alert('Input password');
		}
		else if (isNaN($('#rebate_rate').val())) 
		{
			alert('Invalid rebate rate!');
		}
		else
		{
			$.ajax({
				url:url,
				type:'POST',
				data:rebate_rate_form,
				success:function(result){
					result = JSON.parse(result);
		            if (result.code == 1) 
		            {
		                alert(result.message);
		                window.location.href  = base_url + 'barangay/set_min_max?rebate-rate-updated';
		            }
		            else
		            {
		                alert(result.message);
		            }
				},
				//error
				error:function(){
					console.log('Error');
				}
			});
		}
	});

	$('#penalty_rate_form').submit(function(evt){
		evt.preventDefault();
		let penalty_rate_form = $(this).serialize();
		let url = $(this).attr('action');

		if ($('#penalty_rate').val() == '' && $('#penalty_rate_password').val() == '') 
		{
			alert('Fill all fields');
		}
		else if ($('#penalty_rate').val() == '') 
		{
			alert('Input penalty rate');
		}
		else if ($('#penalty_rate_password').val() == '') 
		{
			alert('Input password');
		}
		else if (isNaN($('#penalty_rate').val())) 
		{
			alert('Invalid penalty rate!');
		}
		else
		{
			$.ajax({
				url:url,
				type:'POST',
				data:penalty_rate_form,
				success:function(result){
					result = JSON.parse(result);
		            if (result.code == 1) 
		            {
		                alert(result.message);
		                window.location.href  = base_url + 'barangay/set_min_max?penalty-rate-updated';
		            }
		            else
		            {
		                alert(result.message);
		                $('#penalty_rate_password').val('');
		            }
				},
				//error
				error:function(){
					console.log('Error');
				}
			});
		}
	});

	$('#invest_amount_form').submit(function(evt){
		evt.preventDefault();
		let invest_amount_form = $(this).serialize();
		let url = $(this).attr('action');

		if ($('#min_invest_amount').val() == '' && $('#max_invest_amount').val() == '' && $('#invest_amount_password').val() == '') 
		{
			alert('Fill all fields!');
		}
		else if ($('#min_invest_amount').val() == '') 
		{
			alert('Input minimum amount!');
		}
		else if ($('#max_invest_amount').val() == '') 
		{
			alert('Input maximum amount!');
		}
		else if ($('#invest_amount_password').val() == '') 
		{
			alert('Input password!');
		}
		else if (isNaN($('#min_invest_amount').val())) 
		{
			alert('Invalid minimum invest amount!');
		}
		else if (isNaN($('#max_invest_amount').val())) 
		{
			alert('Invalid maximum invest amount!');
		}
		else
		{
			$.ajax({
				url:url,
				type:'POST',
				data:invest_amount_form,
				success:function(result){
					result = JSON.parse(result);
		            if (result.code == 1) 
		            {
		                alert(result.message);
		                window.location.href  = base_url + 'barangay/set_min_max?invest-amount-updated';
		            }
		            else
		            {
		                alert(result.message);
		                $('#invest_amount_password').val('');
		            }
				},
				//error
				error:function(){
					console.log('Error');
				}
			});
		}
	});

});