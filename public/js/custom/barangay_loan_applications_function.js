$(document).ready(function(){
	let base_url = $('#base_url').val();

    $('#printLoanApp').click(function(){
        var printContents = document.getElementById('printMe').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });

    $("#toggle_switch").click(function(){
        $("#new_loan").toggle();
    });

    $('.btn_get_id_for_loan_app').click(function(){
        let secret_id = $(this).attr('id');//secret md5
        //get_loan_app_req_registered_brgy
        $('#btn_modal_view_loan_app').click();
        $.ajax({
            url:base_url+'barangay/get_loan_app_req_registered_brgy',
            type:'POST',
            data:{secret_id:secret_id},
            success:function(result){
                result = JSON.parse(result);

                $.each(result, function (index, details) {
                    $('.ajax_full_name').text('Name: '+details.full_name);
                    $('.ajax_mobile_no').text('Mobile No.: '+details.mobile_no);
                    $('.ajax_email').text('Email: '+details.email);
                    $('.ajax_address').text('Address: '+details.address);
                    $('.ajax_date_created').text('Date & Time Submitted: '+details.date_created);
                    $('.ajax_reference_code').text('Ref. Code: '+details.reference_code);
                    $('.ajax_loan_amount').text('Amount: ₱'+details.loan_amount);
                    $('.ajax_loan_term').text('Term: '+details.loan_term+' Month(s)');
                    $('.co_maker_1').text('1st Co-Maker: '+details.co_maker_1);
                    $('.co_maker_2').text('2nd Co-Maker: '+details.co_maker_2);
                    $('.ajax_gov_id').attr('src', base_url+details.gov_id);
                    $('.ajax_href_gov_id').attr('href', base_url+details.gov_id);
                    $('.ajax_href_bill').attr('href', base_url+details.bill);
                    $('.ajax_bill').attr('src', base_url+details.bill);

                    $('.ajax_text_view').text('View');
                    if (details.brgy_permit != null) 
                    {
                    	$('.ajax_req_title').text('Brgy Permit: ');
	                    $('.ajax_text_view').attr('href',base_url+details.brgy_permit);
                    }
                    else if (details.mayor_permit != null) 
                    {
                    	$('.ajax_req_title').text('Mayor Permit: ');
	                    $('.ajax_text_view').attr('href',base_url+details.mayor_permit);
                    }
                    else if (details.payslip != null) 
                    {
                    	$('.ajax_req_title').text('Payslip: ');
	                    $('.ajax_text_view').attr('href',base_url+details.payslip);
                    }
	                    
                    $('.ajax_source_of_income').text('Source of Income: '+details.source_of_income);
                    $('.ajax_monthly_income').text('Monthly Income: ₱'+details.monthly_income);

                    $('#ajax_mobile_no_hide').val(details.mobile_no);
                    $('#ajax_user_loan_id_hide').val(details.loan_application_id);
                    $('#ajax_reference_code_hide').val(details.reference_code);
                    $('#ajax_full_name_hide').val(details.full_name);
                    $('#ajax_amount_hide').val(details.loan_amount);

                });
            },
            error:function(){
                alert(result);
            }

        });

    });

    $('.btn_get_id_for_loan_app_details').click(function(){
        let secret_id = $(this).attr('id');//secret md5
        //get_loan_app_req_registered_brgy
        $('#btn_modal_view_loan_app_printable').click();
        $.ajax({
            url:base_url+'barangay/get_loan_app_req_registered_brgy',
            type:'POST',
            data:{secret_id:secret_id},
            success:function(result){
                result = JSON.parse(result);

                $.each(result, function (index, details) {
                    $('.ajax_full_name').text('Name: '+details.full_name);
                    $('.ajax_mobile_no').text('Mobile No.: '+details.mobile_no);
                    $('.ajax_email').text('Email: '+details.email);
                    $('.ajax_address').text('Address: '+details.address);
                    $('.ajax_date_created').text('Date & Time Submitted: '+details.date_created);
                    $('.ajax_reference_code').text('Ref. Code: '+details.reference_code);
                    $('.ajax_loan_amount').text('Amount: ₱'+details.loan_amount);
                    $('.ajax_loan_term').text('Term: '+details.loan_term+' Month(s)');
                    $('.co_maker_1').text('1st Co-Maker: '+details.co_maker_1);
                    $('.co_maker_2').text('2nd Co-Maker: '+details.co_maker_2);
                    $('.ajax_gov_id').attr('src', base_url+details.gov_id);
                    $('.ajax_bill').attr('src', base_url+details.bill);
                    $('.ajax_source_of_income').text('Source of Income: '+details.source_of_income);
                    $('.ajax_monthly_income').text('Monthly Income: ₱'+details.monthly_income);

                });
            },
            error:function(){
                alert(result);
            }

        });

    });

    $('.btn_get_id_for_req').click(function(){
        let secret_id = $(this).attr('id');//secret md5
        //get_loan_app_req_registered_brgy
        $('#btn_modal_view_requirements').click();
        $.ajax({
            url:base_url+'barangay/get_this_requirements_loan',
            type:'POST',
            data:{secret_id:secret_id},
            success:function(result){
                result = JSON.parse(result);

                $.each(result, function (index, details) {
                	$('.ajax_text_view').text('View');
                    if (details.brgy_permit != null) 
                    {
                    	$('.ajax_req_title').text('Brgy Permit: ');
	                    $('.ajax_text_view').attr('href',base_url+details.brgy_permit);
                    }
                    else if (details.mayor_permit != null) 
                    {
                    	$('.ajax_req_title').text('Mayor Permit: ');
	                    $('.ajax_text_view').attr('href',base_url+details.mayor_permit);
                    }
                    else if (details.payslip != null) 
                    {
                    	$('.ajax_req_title').text('Payslip: ');
	                    $('.ajax_text_view').attr('href',base_url+details.payslip);
                    }
                    
                    $('.ajax_gov_id').attr('src', base_url+details.gov_id);
                    $('.ajax_href_gov_id').attr('href', base_url+details.gov_id);
                    $('.ajax_bill').attr('src', base_url+details.bill);
                    $('.ajax_href_bill').attr('href', base_url+details.bill);
                    $('.ajax_source_of_income').text('Source of Income: '+details.source_of_income);
                    $('.ajax_monthly_income').text('Monthly Income: ₱'+details.monthly_income);
                });
            },
            error:function(){
                alert(result);
            }

        });

    });
    
});