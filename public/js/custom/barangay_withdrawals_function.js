$(document).ready(function(){
    let base_url = $('#base_url').val();

    $('#withdraw_cash_form').submit(function(evt){
        evt.preventDefault();
        let url = $(this).attr('action');
        let withdraw_cash_form = $(this).serialize();
        $('input').removeClass('border border-danger');
        if ($('#password').val() == '') 
        {
            alert('Input password');
            $('#password').addClass('border border-danger');
        }
        else if ($('#withdraw_amount').val() == '') 
        {
            alert('Opps something went wrong!');
            $('#withdraw_amount').addClass('border border-danger');
        }
        else
        {
            //do ajax
            $.ajax({
                url:url,
                data:withdraw_cash_form,
                type:'POST',
                success:function(result){
                    result = JSON.parse(result);
                    if (result.code == 1) 
                    {
                        alert(result.message);
                        window.location.href  = base_url + 'barangay/withdrawals?claimed&ref_code='+$('#reference_code').val();
                    }
                    else
                    {
                        alert(result.message);
                    }

                },
                error:function(result)
                {

                }
            });
        }
    });
});