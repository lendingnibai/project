$(document).ready(function(){
	let base_url = $('#base_url').val();

    $('#printInvestApp').click(function(){
        var printContents = document.getElementById('printMe').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });

    $("#toggle_switch").click(function(){
        $("#new_investment").toggle();
    });

    $('.btn_get_id_for_invest_app').click(function(){
        let secret_id = $(this).attr('id');//secret md5
        //get_investment_app_req_registered_brgy
        $('#btn_modal_view_invest_app').click();
        $.ajax({
            url:base_url+'barangay/get_investment_app_req_registered_brgy',
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
                    $('.ajax_invest_amount').text('Amount: ₱'+details.invest_amount);
                    $('.ajax_invest_term').text('Term: '+details.invest_term+' Year(s)');
                    $('.ajax_payment_options').text(' | Payment Option: '+details.payment_options);
                    $('.ajax_gov_id').attr('src', base_url+details.gov_id);
                    $('.ajax_href_gov_id').attr('href',base_url+details.gov_id);
                    $('.ajax_source_of_income').text('Source of Income: '+details.source_of_income);
                    $('.ajax_monthly_income').text('Monthly Income: ₱'+details.monthly_income);

                    $('#ajax_mobile_no_hide').val(details.mobile_no);
                    $('#ajax_user_investment_id_hide').val(details.investment_application_id);
                    $('#ajax_reference_code_hide').val(details.reference_code);
                    $('#ajax_full_name_hide').val(details.full_name);
                    $('#ajax_amount_hide').val(details.invest_amount);

                });
            },
            error:function(){
                alert(result);
            }

        });

    });

    $('.btn_get_id_for_invest_app_details').click(function(){
        let secret_id = $(this).attr('id');//secret md5
        //get_investment_app_req_registered_brgy
        $('#btn_modal_view_invest_app_printable').click();
        $.ajax({
            url:base_url+'barangay/get_investment_app_req_registered_brgy',
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
                    $('.ajax_invest_amount').text('Amount: ₱'+details.invest_amount);
                    $('.ajax_invest_term').text('Term(s): '+details.invest_term+' Year(s)');
                    $('.ajax_payment_options').text(' | Payment Option: '+details.payment_options);
                    $('.ajax_gov_id').attr('src', base_url+details.gov_id);
                    $('.ajax_href_gov_id').attr('href',base_url+details.gov_id);
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
        //get_investment_app_req_registered_brgy
        $('#btn_modal_view_requirements').click();
        $.ajax({
            url:base_url+'barangay/get_this_requirements_investment',
            type:'POST',
            data:{secret_id:secret_id},
            success:function(result){
                result = JSON.parse(result);

                $.each(result, function (index, details) {
                    $('.ajax_gov_id').attr('src', base_url+details.gov_id);
                    $('.ajax_href_gov_id').attr('href',base_url+details.gov_id);
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