$(document).ready(function(){
	let base_url = $('#base_url').val();

    $("#toggle_switch").click(function(){
        $("#user_registered").toggle();
    });

    $('.btn_get_id').click(function(){
        let secret_id = $(this).attr('id');//secret md5
        //get_investment_app_req_registered_brgy
        $('#btn_modal_view_user_details').click();
        $.ajax({
            url:base_url+'barangay/get_this_for_approval_account',
            type:'POST',
            data:{secret_id:secret_id},
            success:function(result){
                result = JSON.parse(result);

                $.each(result, function (index, details) {
                    $('#ajax_full_name').text(details.full_name);
                    $('#ajax_address').text(details.address);
                    $('#ajax_user_type').text(details.user_type);
                    $('#ajax_gov_id').attr('src',base_url + details.gov_id);
                    $('#ajax_user_type').text(details.main_user_type);

                    $('#ajax_user_account_id_hide').val(details.user_account_id);
                    $('#ajax_mobile_no_hide').val(details.mobile_no);

                });
            },
            error:function(){
                alert(result);
            }

        });

    });

    $('.btn_get_id_2').click(function(){
        let secret_id = $(this).attr('id');//secret md5
        //get_investment_app_req_registered_brgy
        $('#btn_modal_view_user_details_2').click();
        $.ajax({
            url:base_url+'barangay/get_this_for_verification_account',
            type:'POST',
            data:{secret_id:secret_id},
            success:function(result){
                result = JSON.parse(result);

                $.each(result, function (index, details) {
                    $('#ajax_full_name_2').text(details.full_name);
                    $('#ajax_address_2').text(details.address);
                    $('#ajax_user_type_2').text(details.user_type);
                    $('#ajax_gov_id_2').attr('src',base_url + details.gov_id);
                    $('#ajax_user_type_2').text(details.main_user_type);

                    $('#ajax_user_account_id_hide_2').val(details.user_account_id);
                    $('#ajax_mobile_no_hide_2').val(details.mobile_no);

                });
            },
            error:function(){
                alert(result);
            }

        });

    });

});