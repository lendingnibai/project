
// Animations initialization
new WOW().init();

//<!-- navbar change color when scrolled down -->

let $window = $(window);

$(window).on('scroll', function() {
    $topOffset = $(this).scrollTop();
    //console.log($topOffset)

    //hide/show arrow up scroll top
    if ($topOffset > 200) 
    {
      $('#divFixedBottom').removeClass('d-none');
      $('#divFixedBottom').addClass('slideInUp');
    }
    else
    {
      $('#divFixedBottom').addClass('d-none');
    }

    if ($topOffset > 50) 
    {
      $('#navbarTop').addClass('default-color');
      $('#homeMenu').addClass('teal lighten-1');
    }
    else
    {
      $('#navbarTop').removeClass('default-color');
      $('#homeMenu').removeClass('teal lighten-1');
    }
   
});

//<!-- modals form -->

  $(document).ready(function(){

    let base_url = $('#base_url').val();

    $('select.selectLenderBarangayClass').change(function(){

      let selectLenderBarangayClass = $('.selectLenderBarangayClass option:selected').val();

      if (selectLenderBarangayClass == 'Other') 
      {
        $('.lenderOtherBarangayClass').removeClass('d-none');

      }
      else
      {
        $('.lenderOtherBarangayClass').addClass('d-none');
      }

    });

    //lender radio button lender
    $('#radio_lender').click(function(){
      $('#otherBarangayId').removeClass('d-none');
      $('#registeredBaranagay').addClass('d-none');

      $('select.selectLenderBarangayClass').change();

    });

    //borrower radio button borrower
    $('#radio_borrower').click(function(){
      $('#otherBarangayId').addClass('d-none');
      $('#registeredBaranagay').removeClass('d-none');
      $('.lenderOtherBarangayClass').addClass('d-none');//hide input fied for lender from other barangay
    });

    $('#alreadymember').click(function(){
      setTimeout(function(){
      $('#login').trigger('click');
      },800);
    });

    $('#agree').click(function(){
      setTimeout(function(){
      $('#register').trigger('click');
      },500);
    });

    $('#notmember').click(function(){
      setTimeout(function(){
      $('#register').trigger('click');
      },800);
    });

    $('#termsandconditions').click(function(){
      setTimeout(function(){
      $('#viewTermsConidition').trigger('click');
      },500);
    });

  // Add smooth scrolling to all links
  $("#scrollTopId").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1200, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        //window.location.hash = hash;
      });
    } // End if
  });

  $('#loginFormData').submit(function(evt){

    $('input').removeClass('border border-danger');
    $('#loginFormData').addClass('disabled');
    evt.preventDefault();//para di mo refresh
    let url = $(this).attr('action');
    let loginFormData = $(this).serialize();

    if ($('#email_username').val() == '' && $('#login_password').val()== '') 
    {
        alert('Enter your login credentials');
        $('#email_username').addClass('border border-danger');
        $('#login_password').addClass('border border-danger');
    }
    else if ($('#email_username').val() == '') 
    {
        alert('Input your email or username');
        $('#email_username').addClass('border border-danger');
    }
    else if ($('#login_password').val()== '') 
    {
        alert('Input your password');
        $('#login_password').addClass('border border-danger');
    }
    else
    {
      $('#btnLogin').text('Logging in...');
      //do ajax
      $.ajax({
        url:url,
        type:'POST',
        data:loginFormData,
        success:function(result){
          result = JSON.parse(result);
          if (result.code == 1) 
          {
            setTimeout(function(){
              $('#btnLogin').text('Logged in');
              setTimeout(function(){
                if (result.main_user_type == 1) 
                {
                  //direct to borrower incomplete page
                  window.location.href = base_url+'borrower';
                }
                else
                {
                  //direct to lender incomplete page
                  window.location.href = base_url+'lender';
                }
              },2000);
            },2000);
              
          }
          else
          {
            alert(result.message);
            if (result.message == 'Invalid credentials.') 
            {
                $('#email_username').addClass('border border-danger');
                $('#login_password').addClass('border border-danger');
            }
            $('#loginFormData').removeClass('disabled');
            $('#btnLogin').text('Login');
          }
        },
        error:function(result){
          alert('Oppss something went wrong!');
        }
      });

    }

  });


  $('#regFormData').submit(function(evt){

    evt.preventDefault();//para di mo refresh
    let url = $(this).attr('action');
    //let regFormData = $(this).serialize();
    let is_borrower = $('#radio_borrower').prop('checked');//if true asign 1 to is_borrower
    let is_lender = $('#radio_lender').prop('checked');//if true asign
    let main_user_type = 1;//getthis
    let borrower_selected_brgy = $('#borrower_selected_brgy').val();
    let lender_selected_brgy = $('#lender_selected_brgy').val();
    let barangay = '';//getthis
    let other_brgy = $('#other_brgy').val();//getthis
    let username = $('#username').val();//getthis
    let email = $('#email').val();//getthis
    let password = $('#password').val();//getthis
    let cpassword = $('#cpassword').val();

    $('select').removeClass('border border-danger');
    $('input').removeClass('border border-danger');
    $('.custom-radio').removeClass('border border-danger');
    $('.checkbox').removeClass('border-bottom border-danger');

    if (is_borrower == true) 
    {
      main_user_type = 1;
      barangay = borrower_selected_brgy;
    }
    else
    {
      main_user_type = 2;
      barangay = lender_selected_brgy;
    }

    if (barangay == null) 
    {
      barangay = '';
    }

    if (is_borrower == false && is_lender == false && barangay == '' && other_brgy == '' && username == '' && password == '' && cpassword == '') 
    {
      alert('Please fill all the required fields');
      $('#borrower_selected_brgy').addClass('border border-danger');
      $('#lender_selected_brgy').addClass('border border-danger');
      $('#other_brgy').addClass('border border-danger');
      $('#username').addClass('border border-danger');
      $('#email').addClass('border border-danger');
      $('#password').addClass('border border-danger');
      $('#cpassword').addClass('border border-danger');
      $('.custom-radio').addClass('border border-danger'); 
    }
    else if (is_borrower == false && is_lender == false) 
    {
      alert('Please select user type (Borrower or Lender)');
      $('.custom-radio').addClass('border border-danger');
    }
    else if (barangay == '' && other_brgy == '') 
    {
      alert('Please select barangay');
      $('#lender_selected_brgy').addClass('border border-danger');
      $('#borrower_selected_brgy').addClass('border border-danger');
      $('#other_brgy').addClass('border border-danger');
    }
    else if (username == '') 
    {
      alert('Please input username');
      $('#username').addClass('border border-danger');
    }
    else if (email == '') 
    {
      alert('Please input email');
      $('#email').addClass('border border-danger');
    }
    else if (password == '') 
    {
      alert('Please input password');
      $('#password').addClass('border border-danger');
    }
    else if (cpassword == '') 
    {
      alert('Please input confirm password');
      $('#cpassword').addClass('border border-danger');
    }
    else if ($('#defaultCheckbox1').prop('checked') == false) 
    {
      alert('You are not agree with our terms and condition');
      $('.checkbox').addClass('border-bottom border-danger');
    }
    else if (password != cpassword) 
    {
      alert('Password did not match');
      $('#password').addClass('border border-danger');
      $('#cpassword').addClass('border border-danger');
    }
    else
    {
        //do ajax
        $.ajax({
            url:url,
            type:'POST',
            data:{main_user_type:main_user_type, barangay:barangay, other_brgy:other_brgy, username:username, email:email, password:password, cpassword:cpassword},
            success:function(result){
              result = JSON.parse(result);
              if (result.code == 1) 
              {
                alert(result.message);
                if (result.main_user_type == 1) 
                {
                  //direct to borrower incomplete page
                  window.location.href = base_url+'borrower/incomplete';
                }
                else
                {
                  //direct to lender incomplete page
                  window.location.href = base_url+'lender/incomplete';
                }
              }
              else
              {
                alert(result.message);
                if (result.message == 'Email address already exist') 
                {
                    $('#email').addClass('border border-danger');
                }
                else if (result.message = 'Username already exist') 
                {
                    $('#username').addClass('border border-danger');
                }
              }
            },
            error:function(result){
              alert('Oppss something went wrong');
            }
        });
    }



  });

});