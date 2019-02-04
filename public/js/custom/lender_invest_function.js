$(document).ready(function(){
  let base_url = $('#base_url').val();
    //photo preview modal
    //for button upload trigger
    $('#buttonGovId').on('click', function() {
      $('#gov_id').click();
    });


    $('#gov_id').click(function(){
      function readIMG(input) {
        if (input.files && input.files[0]) {
          var readerUpdate = new FileReader();

          readerUpdate.onload = function (e) {
               $('#previewPhotoGovId').attr('src', e.target.result);
          }
          readerUpdate.readAsDataURL(input.files[0]);
        }
      }

      $("#gov_id").change(function(){
          readIMG(this);
          let govid = $(this).val();
          if (govid !='') {
              $('#filename1').text('Government ID');
              $('#reviewPhotoGovID').removeClass('invisible');
              $('#animatedGovId').addClass('bounce');
              $('#file1').removeClass('invisible');
          }
      });
    });

//trigger alert for confirmation when the client go back or go to another page

    // $('select.year_terms').change(function(){
    //   $(window).on('beforeunload', function(){
    //     return confirm();
    //   });
    // });

    // $('#gov_id').change(function(){
    //   $(window).on('beforeunload', function(){
    //     return confirm();
    //   });
    // });

  // end of trigger alert for confirmation

//recommendation and review -->
  $('#invest_amount').focusout(function(){
    let invest_amount = Number($('#invest_amount').val());
    let min_invest = Number($('#min_invest').val());
    if (invest_amount < min_invest && invest_amount != '') 
    {
      alert('Invest amount must be minimum of '+min_invest);
    }
  });

  $('#invest_amount').keyup(function(){
    let invest_amount = Number($('#invest_amount').val());
    let max_invest = Number($('#max_invest').val());
    if(invest_amount > max_invest)
    {
      alert('Invest amount must be maximum of '+max_invest);
    }
  });
  
  //for re-apply
  if ($('.year_terms').val() !='') 
  {
     setTimeout(function(){
      $('#invest_amount').keyup();
     },1);
  }

  $('select.year_terms').change(function(){
    $('#invest_amount').keyup();//triggers keyup
  });

  let one_year = '';
  let two_year = '';
  let three_year = '';
  let four_year = '';
  let five_year = '';
  let barangay_for_other = 0;//para makuha niya ang interest rate sa brgy

  if ($('#barangay_for_other').val() != '') 
  {
    barangay_for_other = $('#barangay_for_other').val();
  }

  $.ajax({
    url:base_url+'lender/get_brgy_interest_rates',
    type:'POST',
    data:{barangay_for_other:barangay_for_other},//return registtered brgy account if ang other brgy kay null
    success:function(result){
      result = JSON.parse(result);
      one_year = result[0].one_year;
      two_year = result[0].two_year;
      three_year = result[0].three_year;
      four_year = result[0].four_year;
      five_year = result[0].five_year;
    },
    error:function(result){
      console.log(result);
    }
  });

  //get the interesr when the select term change
  $('#invest_term').change(function(){
    if ($('#invest_term').val() == 1) 
    {
      $('#interest_rate').text(one_year+'%');
    }
    else if ($('#invest_term').val() == 2) 
    {
      $('#interest_rate').text(two_year+'%');
    }
    else if ($('#invest_term').val() == 3) 
    {
      $('#interest_rate').text(three_year+'%');
    }
    else if ($('#invest_term').val() == 4) 
    {
      $('#interest_rate').text(four_year+'%');
    }
    else if ($('#invest_term').val() == 5) 
    {
      $('#interest_rate').text(five_year+'%');
    }
    
  });

  //re-apply
  setTimeout(function(){
    if ($('#invest_amount').val() > 0) 
    {
      setTimeout(function(){
        $('#invest_amount').keyup();
      },100);
    }
  },100);
    
  $('#invest_amount').keyup(function(){
    let year_terms = $('.year_terms option:selected').val();
    let total_interest = 0;
    let interest_rate = 0;
    let monthly_return = 0;
    let total_return = 0;
    let invest_amount = $('#invest_amount').val();

    total_interest.toLocaleString();
    interest_rate.toLocaleString();
    monthly_return.toLocaleString();
    total_return.toLocaleString();
    invest_amount.toLocaleString();

    $('#terms_result').val(year_terms+' year(s)');//pass the result value

    if (isNaN(invest_amount)) 
    {
      alert('Invalid input (invest amount)');
    }
    else if (year_terms !='') //&& invest_amount >= 2000 && invest_amount <= 10000
    {
      if (invest_amount < 1) 
      {
        $('#invest_result').val('₱ 0.00');//invest amount
        $('#interest_rate').text(interest_rate+'%');//interest return in percent
        $('#interest_return').val('₱ 0.00'); //interst rate in value
        $('#monthly_return').val('₱ 0.00');//monhtly return
        $('#total_return').val('₱ 0.00');//total return
      }
      else
      {

        if (year_terms == 1) 
        {
          no_of_mos = 12;//devided 12 mos
          interest_rate = one_year;
          // 20% for 12 mos
         total_interest =  interest_rate * (invest_amount  / 100);
        }
        else if (year_terms == 2)
        {
          no_of_mos = 24;//devided 24 mos
          interest_rate = two_year;
          // 20% for 2 mos
         total_interest =  interest_rate * (invest_amount  / 100);
        }
        else if (year_terms == 3)
        {
          no_of_mos = 36;//devided 36 mos
          interest_rate = three_year;
          // 21% for 2 mos
         total_interest =  interest_rate * (invest_amount  / 100);
        }
        else if (year_terms == 4)
        {
          no_of_mos = 48;//devided 36 mos
          interest_rate = four_year;
          // 22% for46 mos
         total_interest =  interest_rate * (invest_amount  / 100);
        }
        else if (year_terms == 5)
        {
          no_of_mos = 60;//devided 36 mos
          interest_rate = five_year;
          // 22% for 60 mos
         total_interest =  interest_rate * (invest_amount  / 100);
        }

        total_return = (Number(invest_amount) + Number(total_interest));
        monthly_return = Number(total_interest) / Number(no_of_mos); //monhtly interest return
        //console.log(year_terms);
        $('#invest_result').val('₱'+parseFloat(invest_amount).toFixed(2));//invest amount
        $('#interest_rate').text(interest_rate+'%');//interest rate in percent
        $('#interest_return').val('₱'+parseFloat(total_interest).toFixed(2)); //interst rate in value
        $('#monthly_return').val('₱'+parseFloat(monthly_return));//monhtly return
        $('#total_return').val('₱'+parseFloat(total_return).toFixed(2));//total return
      }
    }
      
  });

  //for other brgy
  $('#barangay_for_other').change(function(){
    let brgy_id = $(this).val();
    window.location.href = base_url+'lender/invest?brgy='+brgy_id;
  });

  $('#investment_app_form').submit(function(evt){
    evt.preventDefault();
    let url = $(this).attr('action');
    let investment_app_form = new FormData(this);

    $('input').removeClass('border-bottom border-danger');

    if ($('#invest_term').val() == null) 
    {
      alert('Select terms');
    }
    else if ($('#invest_amount').val() == '') 
    {
      alert('Input invest amount');
    }
    else if (isNaN($('#invest_amount').val())) 
    {
      alert('Invalid input (invest amount)');
    }//add some
    else
    {
      $.ajax({
        url:url,
        type:'POST',
        data:investment_app_form,
        contentType:false,
        cache:false,
        processData:false,
        success:function(result){
          // alert(result);
          result = JSON.parse(result);
          if (result.code == 1) 
          {
              alert(result.message);
              window.location.href = base_url+'lender/review_invest_app';//user login
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

  //re-apply
  $('#re_apply_investment_app_form').submit(function(evt){
    evt.preventDefault();
    let url = $(this).attr('action');
    let re_apply_investment_app_form = new FormData(this);

    $('input').removeClass('border-bottom border-danger');

    if ($('#invest_term').val() == '') 
    {

    }//add some
    else
    {
      $.ajax({
        url:url,
        type:'POST',
        data:re_apply_investment_app_form,
        contentType:false,
        cache:false,
        processData:false,
        success:function(result){
          // alert(result);
          result = JSON.parse(result);
          if (result.code == 1) 
          {
              alert(result.message);
              window.location.href = base_url+'lender/review_invest_app';//user login
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