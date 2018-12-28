//<!-- Preview photo of modal -->
$(document).ready(function() {
    //photo preview modal
    let base_url = $('#base_url').val();
    //for button upload trigger
    $('#btn_gov_id').on('click', function() {
        $('#gov_id').click();
    });

    $('#buttonBill').on('click', function() {
        $('#bill').click();
    });

    $('#buttonPayslip1').on('click', function() {
        $('#payslip1').click();
    });

    $('#buttonBrgyPermit').on('click', function() {
        $('#brgy_permit').click();
    });

    $('#buttonMayorPermit').on('click', function() {
        $('#mayor_permit').click();
    });

    $('#gov_id').click(function() {
        function readIMG(input) {
            if (input.files && input.files[0]) {
                var readerUpdate = new FileReader();
                readerUpdate.onload = function(e) {
                    $('#previewPhotoGovId').attr('src', e.target.result);
                }
                readerUpdate.readAsDataURL(input.files[0]);
            }
        }
        $("#gov_id").change(function() {
            readIMG(this);
            let gov_id = $(this).val();
            if (gov_id != '') {
                $('#filename1').text('Government ID');
                $('#reviewPhotoGovID').removeClass('invisible');
                $('#animatedGovId').addClass('bounce');
                $('#file1').removeClass('invisible');
            }
        });
    });

    $('#payslip1').click(function() {
        function readIMG(input) {
            if (input.files && input.files[0]) {
                var readerUpdate = new FileReader();
                readerUpdate.onload = function(e) {
                    $('#previewPhotopayslip1').attr('src', e.target.result);
                }
                readerUpdate.readAsDataURL(input.files[0]);
            }
        }
        $("#payslip1").change(function() {
            readIMG(this);
            let payslip1 = $(this).val();
            if (payslip1 != '') {
                $('#filename2').text('Latest payslip');
                $('#reviewPhotopayslip1').removeClass('invisible');
                $('#animatedPayslip1').addClass('bounce');
                $('#file2').removeClass('invisible');
            }
        });
    });

    $('#brgy_permit').click(function() {
        function readIMG(input) {
            if (input.files && input.files[0]) {
                var readerUpdate = new FileReader();
                readerUpdate.onload = function(e) {
                    $('#previewPhotoBrgyPermit').attr('src', e.target.result);
                }
                readerUpdate.readAsDataURL(input.files[0]);
            }
        }
        $("#brgy_permit").change(function() {
            readIMG(this);
            let brgy_permit = $(this).val();
            if (brgy_permit != '') {
                $('#filename5').text('Barangay Permit');
                $('#reviewPhotoBrgyPermit').removeClass('invisible');
                $('#animatedBrgyPermit').addClass('bounce');
                $('#file5').removeClass('invisible');
            }
        });
    });

    $('#mayor_permit').click(function() {
        function readIMG(input) {
            if (input.files && input.files[0]) {
                var readerUpdate = new FileReader();
                readerUpdate.onload = function(e) {
                    $('#previewPhotoMayorPermit').attr('src', e.target.result);
                }
                readerUpdate.readAsDataURL(input.files[0]);
            }
        }
        $("#mayor_permit").change(function() {
            readIMG(this);
            let mayorPermit = $(this).val();
            if (mayorPermit != '') {
                $('#filename6').text('Mayor\'s Permit');
                $('#reviewPhotoMayorPermit').removeClass('invisible');
                $('#animatedMayorPermit').addClass('bounce');
                $('#file6').removeClass('invisible');
            }
        });
    });


    $('#bill').click(function() {
        function readIMG(input) {
            if (input.files && input.files[0]) {
                var readerUpdate = new FileReader();
                readerUpdate.onload = function(e) {
                    $('#previewPhotoBill').attr('src', e.target.result);
                }
                readerUpdate.readAsDataURL(input.files[0]);
            }
        }
        $("#bill").change(function() {
            readIMG(this);
            let bill = $(this).val();
            if (bill != '') {
                $('#filename9').text('Water/Electrict Bill');
                $('#reviewPhotoBill').removeClass('invisible');
                $('#animatedBill').addClass('bounce');
                $('#file9').removeClass('invisible');
            }
        });
    });



    // $('select.loan_term').change(function(){
    //   $(window).on('beforeunload', function(){
    //     return confirm();
    //   });
    // });

    // $('#loan_amount').change(function(){
    //   let loan_amount = $('#loan_amount').val();
    //   if (loan_amount != '') 
    //   {
    //     $(window).on('beforeunload', function(){
    //       return confirm();
    //     });
    //   }
    // });

    // $('#gov_id').change(function(){
    //   $(window).on('beforeunload', function(){
    //     return confirm();
    //   });
    // });

    let min_loan = Number($('#min_loan').val());
    let max_loan = Number($('#max_loan').val());

    $('#loan_amount').focusout(function() {
        let loan_amount = $('#loan_amount').val();
        if (loan_amount < min_loan && loan_amount != '') {
            alert('Loan amount must be minimum of ' + min_loan);
        }
    });

    $('#loan_amount').keyup(function() {
        let loan_amount = $('#loan_amount').val();
        if (loan_amount > max_loan) {
            alert('Loan amount must be maximum of ' + max_loan);
        }
    });

    $('select.loan_term').change(function() {
        $('#loan_amount').keyup(); //triggers keyup
    });

    let one_mo
    let two_mo
    let three_mo
    let four_mo
    let five_mo
    let six_mo
    let seven_mo
    let eight_mo
    let nine_mo
    let ten_mo
    let eleven_mo
    let twelve_mo

    $.ajax({
        url: base_url + 'borrower/get_brgy_interest_rates_loan',
        success: function(result) {
            result = JSON.parse(result);
            one_mo = result[0].one_mo;
            two_mo = result[0].two_mo;
            three_mo = result[0].three_mo;
            four_mo = result[0].four_mo;
            five_mo = result[0].five_mo;
            six_mo = result[0].six_mo;
            seven_mo = result[0].seven_mo;
            eight_mo = result[0].eight_mo;
            nine_mo = result[0].nine_mo;
            ten_mo = result[0].ten_mo;
            eleven_mo = result[0].eleven_mo;
            twelve_mo = result[0].twelve_mo;
        },
        error: function(result) {
            console.log(result);
        }
    });

    $('#loan_amount').keyup(function() {
        let loan_term = $('.loan_term option:selected').val();
        let interestRate = 0;
        let interest_rate = 0;
        let monthly_repayment = 0;
        let total_repayment = 0;
        let loan_amount = $('#loan_amount').val();

        interestRate.toLocaleString();
        interest_rate.toLocaleString();
        monthly_repayment.toLocaleString();
        total_repayment.toLocaleString();
        loan_amount.toLocaleString();

        $('#termsResult').val(loan_term + ' month(s)'); //pass the result value
        if (loan_term != 'Select') //&& loan_amount >= 2000 && loan_amount <= 10000
        {
            if (loan_amount < 1) {
                loan_amount = 0.00;
            }

            if (loan_term == 12) {
                interest_rate = twelve_mo;
                // 30% for 12 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 11) {
                interest_rate = eleven_mo;
                // 12% for 3 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 10) {
                interest_rate = ten_mo;
                // 12% for 3 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 9) {
                interest_rate = nine_mo;
                // 24% for 9 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 8) {
                interest_rate = eight_mo;
                // 12% for 3 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 7) {
                interest_rate = seven_mo;
                // 12% for 3 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 6) {
                interest_rate = six_mo;
                // 18% for 6 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 5) {
                interest_rate = five_mo;
                // 12% for 3 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 4) {
                interest_rate = four_mo;
                // 12% for 3 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term == 3) {
                interest_rate = three_mo;
                // 12% for 3 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term = 2) {
                interest_rate = two_mo;
                // 10% for 2 mos
                interestRate = interest_rate * (loan_amount / 100);
            } else if (loan_term = 1) {
                interest_rate = one_mo;
                // 10% for 2 mos
                interestRate = interest_rate * (loan_amount / 100);
            }
            total_repayment = (Number(loan_amount) + Number(interestRate));
            monthly_repayment = (Number(loan_amount) + Number(interestRate)) / Number(loan_term); //monhtly repayment
            //console.log(loan_term);
            $('#loan_result').val(parseFloat(loan_amount).toFixed(2)); //loan amount
            $('#interest_rate').text(interest_rate + '%'); //interest rate in percent
            $('#interest_result').val(parseFloat(interestRate).toFixed(2)); //interst rate in value
            $('#monthly_repayment').val(parseFloat(monthly_repayment).toFixed(2)); //monhtly reypayment
            $('#total_repayment').val(parseFloat(total_repayment).toFixed(2));
        }

    });

});

//re-apply
  setTimeout(function(){
    if ($('#loan_amount').val() > 0) 
    {
      setTimeout(function(){
        $('#loan_amount').keyup();
        $('.source_of_income').change();
      },100);
    }
  },100);

//<!-- select options -->
$(document).ready(function() {

let base_url = $('#base_url').val();

    $('select.source_of_income').change(function() {
        let source_of_income = $('.source_of_income option:selected').val();
        if (source_of_income == 'Employee') {
            $('#selfEmployeeOptions').removeClass('d-none');
            $('#mediumBusinessFile').addClass('d-none');
            $('#microBusinessFile').addClass('d-none');
        } else if (source_of_income == 'Business') {
            $('#microBusinessFile').removeClass('d-none');
            $('#mediumBusinessFile').addClass('d-none');
            $('#selfEmployeeOptions').addClass('d-none');
        } else {
            $('#mediumBusinessFile').removeClass('d-none');
            $('#selfEmployeeOptions').addClass('d-none');
            $('#microBusinessFile').addClass('d-none');
        }
    });

    $('#loan_app_form').submit(function(evt){
      evt.preventDefault();
      let url = $(this).attr('action');
      let loan_app_form = new FormData(this);

      $('input').removeClass('border-bottom border-danger');
      if ($('#loan_term').val() == null) 
      {
        alert('Select loan term');
      }
      else if ($('#loan_amount').val() == '') 
      {
        alert('Input loan amount');
      }
      else if ($('#co_maker_1').val() == null && $('#co_maker_2').val() == null) 
      {
        alert('Select at least 1 co-maker');
      }
      else {

        $.ajax({
          url:url,
          type:'POST',
          data:loan_app_form,
          contentType:false,
          cache:false,
          processData:false,
          success:function(result){
            // alert(result);
            result = JSON.parse(result);
            if (result.code == 1) 
            {
                alert(result.message);
                window.location.href = base_url+'borrower/review_loan_app';//user login
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

    //re apply loan
    $('#re_apply_loan_app_form').submit(function(evt){
      evt.preventDefault();
      let url = $(this).attr('action');
      let re_apply_loan_app_form = new FormData(this);

      $('input').removeClass('border-bottom border-danger');
      if ($('#loan_term').val() == null) 
      {
        alert('Select loan term');
      }
      else if ($('#loan_amount').val() == '') 
      {
        alert('Input loan amount');
      }
      else if ($('#co_maker_1').val() == null && $('#co_maker_2').val() == null) 
      {
        alert('Select at least 1 co-maker');
      }
      else {
        
        $.ajax({
          url:url,
          type:'POST',
          data:re_apply_loan_app_form,
          contentType:false,
          cache:false,
          processData:false,
          success:function(result){
            // alert(result);
            result = JSON.parse(result);
            if (result.code == 1) 
            {
                alert(result.message);
                window.location.href = base_url+'borrower/review_loan_app';//user login
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