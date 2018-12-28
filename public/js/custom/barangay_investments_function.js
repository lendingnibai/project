//<!-- barangay investment page -->
Chart.defaults.global.defaultFontColor = '#fff';
$(function () {
  
    //line
    var ctxL = document.getElementById("monthly_investment").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [

                {
                    label: "Monthly Investment",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    backgroundColor: [
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)',
                        'rgba(255, 255, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)'
                    ],
                    borderWidth: 1,
                    data: [28, 48, 40, 19, 86, 27, 90, 40, 19, 86, 27, 90]
                }
            ]
        },
        options: {
            responsive: true
        }
    });

});

$(document).ready(function(){
    let base_url = $('#base_url').val();

    $('#investment_received_form').submit(function(evt){
        evt.preventDefault();
        let url = $(this).attr('action');
        let investment_received_form = $(this).serialize();
        $('input').removeClass('border border-danger');
        if ($('#password').val() == '' && $('#invest_amount').val() == '') 
        {
            alert('Input amount & password');
            $('#invest_amount').addClass('border border-danger');
            $('#password').addClass('border border-danger');
        }
        else if ($('#invest_amount').val() == '') 
        {
            alert('Input amount');
            $('#invest_amount').addClass('border border-danger');
        }
        else if ($('#password').val() == '') 
        {
            alert('Input password');
            $('#password').addClass('border border-danger');
        }
        else
        {
            //do ajax
            $.ajax({
                url:url,
                data:investment_received_form,
                type:'POST',
                success:function(result){
                    result = JSON.parse(result);
                    if (result.code == 1) 
                    {
                        alert(result.message);
                        window.location.href  = base_url + 'barangay/investments?received&ref_code='+$('#reference_code').val();
                    }
                    else
                    {
                        alert(result.message);
                    }

                },
                error:function(result)
                {
                    alert(result);
                }
            });
        }
    });
});