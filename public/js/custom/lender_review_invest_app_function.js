$(document).ready(function(){
	let base_url = $('#base_url').val();

	$('#printInvestApp').click(function(){
		var printContents = document.getElementById('printMe').innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	});

	$('.btn_get_id_for_app').click(function(){
		let secret_id = $(this).attr('id');
		$('#btn_modal_view_details').click();

		$.ajax({
    		url:base_url+'lender/get_investment_app_req_registered_brgy',
    		type:'POST',
    		data:{secret_id:secret_id},
    		success:function(result){
    			//alert(result);
    			result = JSON.parse(result);

    			$.each(result, function (index, details) {
    				$('.ajax_full_name').text('Name: '+details.full_name);
    				$('.ajax_mobile_no').text('Mobile No.: '+details.mobile_no);
    				$('.ajax_email').text('Email: '+details.email);
    				$('.ajax_address').text('Address: '+details.address);
    				$('.ajax_date_created').text('Date & Time Submitted: '+details.date_created);
    				$('.ajax_reference_code').text('Ref. Code: '+details.reference_code);
    				$('.ajax_invest_amount').text('Amount: ₱'+details.invest_amount);
    				$('.ajax_invest_term').text('Term(s): '+details.invest_term+' Year(s)');
    				$('.ajax_payment_options').text(' | Payment Option: '+details.payment_options);
                    
                    //wala mni gamit pa
    				$('.ajax_gov_id').attr('src', base_url+details.gov_id);
    				$('.ajax_source_of_income').text('Source of Income: '+details.source_of_income);
    				$('.ajax_monthly_income').text('Monthly Income: ₱'+details.monthly_income);

                    //wala pa ni gamit
    				$('.ajax_mobile_no_hide').val(details.mobile_no);
    				$('.ajax_user_account_id_hide').val(details.investment_application_id);
    				$('.ajax_reference_code_hide').val(details.reference_code);
    				$('.ajax_full_name_hide').val(details.full_name);
    				$('.ajax_amount_hide').val(details.invest_amount);

    				//brgy details starts here
    				$('.ajax_photo_bgry').attr('src',base_url+details.b_photo_brgy);
                    $('.ajax_b_barangay').text(details.b_barangay);
    				$('.ajax_b_barangay').text(details.b_barangay);
    				$('.ajax_b_street').text(details.b_street);
    				$('.ajax_b_city').text(details.b_city);
    				$('.ajax_b_state_prov').text(details.b_state_prov);
    				$('.ajax_b_zip_code').text(details.b_zip_code);
    				$('.ajax_b_mobile_no').text(details.b_mobile_no);
    				$('.ajax_b_tel_no').text(details.b_tel_no);
    				
				});
    		},
    		error:function(){
    			alert(result);
    		}
    	});

	});
});

