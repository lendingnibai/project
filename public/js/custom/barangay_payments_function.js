$('document').ready(function(){
	let base_url = $('#base_url').val();

	$('#btn_pay').click(function(){
		$('#btn_submit_pay').click();//click submit form for payment
	});

	$('#payment_search_form').submit(function(evt){
		evt.preventDefault();
		let url = $(this).attr('action');
        let payment_search_form = $(this).serialize();
        let ctr = 0;// user_details indicator
        let table_data_str = '';
        let table_loan_details_str = '';
        let seq = 1;
        let total_outstanding = 0;
        if ($('#reference_code').val() == '') 
        {
        	alert('Input reference no.')
        }
        else
        {
        	$.ajax({
        		url:url,
	            type:'POST',
	            data:payment_search_form,
	            success:function(result){
	            	// EMPTY THE DATA FIRST
	            	$('#monthly_repayment_table').empty();
	            	$('#loan_details_table').empty();

	            	result = JSON.parse(result);
	            	if (result == null) 
	            	{
	            		$('#no_data_found').removeClass('d-none');//show no data found section
	            		$('#loan_repayment_details').addClass('d-none');//hide details section
	            		$('#monthly_payment_form').addClass('d-none');//hide form section
	            		$('#btn_pay').addClass('disabled');

	            	}
	            	$.each(result, function(index, val){
	            		//LOAN AND USER DETAILS
	            		if (ctr == 0) 
	            		{
	            			$('#loan_repayment_details').removeClass('d-none');
	            			$('#no_data_found').addClass('d-none');
	            			$('#monthly_payment_form').removeClass('d-none');//hide form section
	            			$('#btn_pay').removeClass('disabled');
	            			$('#ref_code').val(val.reference_code);
	            			table_loan_details_str = '\
            					<tr>\
	                                <td>'+val.full_name+'</td>\
	                                <td class="text-right">'+val.loan_amount+'</td>\
	                                <td class="text-right">'+val.interest_rate+'</td>\
	                                <td class="text-right">'+val.total_repayment+'</td>\
	                                <td>'+val.loan_term+'</td>\
	                                <td>'+val.date_begin+'</td>\
	                                <td>'+val.date_end+'</td>\
	                                <td>'+val.status+'</td>\
	                            </tr>';
	            		}
	            		else
	            		{
	            			total_outstanding += val.countable_outstanding;
	            			table_data_str +='\
	            				<tr>\
			                        <th scope="row">'+seq+'</th>\
			                        <td class="text-right">'+val.monthly_repayment+'</td>\
			                        <td class="text-right">'+val.amount_paid+'</td>\
			                        <td class="text-right">'+val.penalty+'</td>\
			                        <td class="text-right">'+val.penalty_paid+'</td>\
			                        <td class="text-right">'+val.outstanding+'</td>\
			                        <td class="text-right">'+val.rebate+'</td>\
			                        <td>'+val.due_date+'</td>\
			                        <td>'+val.status+'</td>\
			                    </tr>';
						    seq++;
	            		}
	            		
	            		ctr++;
					});
					if (total_outstanding > 0) 
					{
						$('.is_fully_paid').removeClass('d-none');
					}
					else
					{
						$('.is_fully_paid').addClass('d-none');
					}
	            	$('.ajax_total_outstanding').text(total_outstanding.toFixed(2));
					$('#monthly_repayment_table').append(table_data_str);
					$('#loan_details_table').append(table_loan_details_str);
	            },
	            error:function(result){
	            	alert(result);
	            }
        	});
        }
	});

	$('#monthly_payment_form').submit(function(evt){
		evt.preventDefault();
		let url = $(this).attr('action');
        let monthly_payment_form = $(this).serialize();
        let reference_code = $('#ref_code').val();

        let total_outstanding = 0;
        let ctr = 0;

        $.ajax({
    		url:base_url+'barangay/get_monthly_repayment',
            type:'POST',
            data:{reference_code:reference_code},
            success:function(result){
            	result = JSON.parse(result);
            	//console.log(result);
	        	$.each(result, function(index, val){
	        		//LOAN AND USER DETAILS
	        		if (ctr == 0) 
	        		{
	        			
	        		}
	        		else
	        		{
	        			total_outstanding += val.countable_outstanding;
	        		}
	        		ctr++;
	        	});
		        if ($('#payment_amount').val() == '' && $('#password').val() == '') 
		        {
		        	alert('Input payment amount & password');
		        }
		        else if ($('#payment_amount').val() == '') 
		        {
		        	alert('Input payment amount');
		        }
		        else if (isNaN($('#payment_amount').val())) 
		        {
		        	alert('Invalid payment amount');
		        }
		        else if ($('#password').val() == '') 
		        {
		        	alert('Input password');
		        }
		        else if ($('#ref_code').val() == '') {
		        	alert('Opps something went wrong!');
		        }
		        // else if ($('#payment_amount').val() > total_outstanding) {
		        // 	alert('Payment amount must be less than or equal to total outstanding of monthly repayment');
		        // 	$('#password').val('');
		        // }
		        else
		        {
		        	$.ajax({
		        		url:url,
			            type:'POST',
			            data:monthly_payment_form,
			            success:function(result){
			            	result = JSON.parse(result);
							if (result.code == 1) 
							{
								alert(result.message);
								$('#password').val('');
								$('#payment_amount').val('');
								$('#reference_code').val($('#ref_code').val());//add valye to avoid changing of val
								$('#btn_search').click();//click the btn search to refresh the data
							}
							else 
							{
								alert(result.message);
								$('#password').val('');
							}
			            },
			            error:function(result){
			            	alert(result)
			            }
			        });
		        }

            },
            error:function(result){

            }
        });
        
	});
});