//<!-- A SMARTER LOAN IN JUST 3 STEPS HOME PA NAA -->
  $(document).ready(function(){

    var counter = 0;
    var interval = setInterval(function() {
        counter++;

        $('#1').click(function(){
          $('#1').addClass('default-color');
          $('#2').removeClass('default-color');
          $('#3').removeClass('default-color');
          //picture
          $('#step1').removeClass('d-none');
          $('#step2').addClass('d-none');
          $('#step3').addClass('d-none');

          $('#11').addClass('teal-text');
          $('#22').removeClass('teal-text');
          $('#33').removeClass('teal-text');
          counter = 0;
        });
        $('#2').click(function(){
          $('#1').removeClass('default-color');
          $('#2').addClass('default-color');
          $('#3').removeClass('default-color');

          //picture
          $('#step1').addClass('d-none');
          $('#step2').removeClass('d-none');
          $('#step3').addClass('d-none');

          $('#11').removeClass('teal-text');
          $('#22').addClass('teal-text');
          $('#33').removeClass('teal-text');
          counter = 6;
        });
        $('#3').click(function(){
          $('#1').removeClass('default-color');
          $('#2').removeClass('default-color');
          $('#3').addClass('default-color');

          //picture
          $('#step1').addClass('d-none');
          $('#step2').addClass('d-none');
          $('#step3').removeClass('d-none');

          $('#11').removeClass('teal-text');
          $('#22').removeClass('teal-text');
          $('#33').addClass('teal-text');
          counter = 11;
        });
        // Display 'counter' wherever you want to display it.
      if (counter <= 5)
      {
        $('#1').addClass('default-color');
        $('#2').removeClass('default-color');
        $('#3').removeClass('default-color');

        //picture
        $('#step1').removeClass('d-none');
        $('#step2').addClass('d-none');
        $('#step3').addClass('d-none');

        $('#11').addClass('teal-text');
        $('#22').removeClass('teal-text');
        $('#33').removeClass('teal-text');
      }
      else if(counter <= 10)
      {
        $('#1').removeClass('default-color');
        $('#2').addClass('default-color');
        $('#3').removeClass('default-color');

        //picture
        $('#step1').addClass('d-none');
        $('#step2').removeClass('d-none');
        $('#step3').addClass('d-none');

        $('#11').removeClass('teal-text');
        $('#22').addClass('teal-text');
        $('#33').removeClass('teal-text');
      }
      else
      {
        $('#1').removeClass('default-color');
        $('#2').removeClass('default-color');
        $('#3').addClass('default-color');

        //picture
        $('#step1').addClass('d-none');
        $('#step2').addClass('d-none');
        $('#step3').removeClass('d-none');

        $('#11').removeClass('teal-text');
        $('#22').removeClass('teal-text');
        $('#33').addClass('teal-text');

        if (counter == 15) 
        {
          counter = 0;
        }
      }

    }, 1000);
   
  });