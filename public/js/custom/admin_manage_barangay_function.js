$(document).ready(function(){

  let base_url = $('#base_url').val();

  let btn_add_click = 0;
	//add brgy button
	$('#manage_brgy').click(function(){
	    //show/hide add brgy officials form
	    $('#addBrgyDiv').removeClass('d-none');
      btn_add_click++;

      if (btn_add_click > 1) 
      {
        $('#addBrgyDiv').removeClass('zoomIn shake');
        setTimeout(function(){
          $('#addBrgyDiv').addClass('shake');
        },100);
      }
	});


  //trigger alert for confirmation when the user will go back or go to another page 
  // $('#add_brgy_account_form').click(function(){
  //   $(window).on('beforeunload', function(){
  //       return confirm();
  //     });
  // });
  

	//upload button for brgy hall picture
	$('#buttonPhotoBrgy').click(function(){

      $('#photo_brgy').click();

      function readIMG(input) {

          if (input.files && input.files[0]) {
             var readerUpdate = new FileReader();

            readerUpdate.onload = function (e) {
                 $('#previewPhotoBrgyHall').attr('src', e.target.result);
            }

            readerUpdate.readAsDataURL(input.files[0]);
          }

        }

        $("#photo_brgy").change(function(){
          readIMG(this);
          let photo_brgy = $(this).val();
          if (photo_brgy !='') {
            $('#filename1').text('Barangay Hall Picture');
            $('#photo_brgy_selected').removeClass('invisible');
          }
       });

    });

	//upload button for brgy ordinance picture
    $('#buttonPhotoDocs').click(function(){

      $('#photo_docs').click();

      function readIMG(input) {

          if (input.files && input.files[0]) {
             var readerUpdate = new FileReader();

            readerUpdate.onload = function (e) {
                 $('#previewPhotoBrgyDocs').attr('src', e.target.result);
            }

            readerUpdate.readAsDataURL(input.files[0]);
          }

        }

        $("#photo_docs").change(function(){
          readIMG(this);
          let photo_docs = $(this).val();
          if (photo_docs !='') {
            $('#filename2').text('Barangay Ordinance');
            $('#photo_docs_selected').removeClass('invisible');
          }
       });

    });

    $('#add_brgy_account_form').submit(function(evt){

    evt.preventDefault();
    let url = $(this).attr('action');
    let add_brgy_account_form = new FormData(this);

    $('input').removeClass('border-bottom border-danger');

    if ($('#first_name').val() == "" && $('#last_name').val() == "" && $('#email').val() == "" && $('#cap_mobile_no').val() == "" && $('#barangay').val() == "" && $('#city').val() == "" && $('#state_prov').val() == "" && $('#zip_code').val() == "" && $('#street').val() == "") {
      alert('Fill all required fields');

      $('input').addClass('border-bottom border-danger');
      setTimeout(function(){
        $('#mobile_no').removeClass('border-bottom border-danger');
        $('#tel_no').removeClass('border-bottom border-danger');
        $('#middle_name').removeClass('border-bottom border-danger');
      },10);
    }
    else if ($('#first_name').val() == "") 
    {
      alert('Input first name');
      $('#first_name').addClass('border-bottom border-danger');
    }
    else if ($('#last_name').val() == "") 
    {
      alert('Input last name');
      $('#last_name').addClass('border-bottom border-danger');
    }
    else if ($('#email').val() == "") 
    {
      alert('Input email');
      $('#email').addClass('border-bottom border-danger');
    }
    else if ($('#cap_mobile_no').val() == "") 
    {
      alert('Input client\'s mobile no.');
      $('#cap_mobile_no').addClass('border-bottom border-danger');
    }
    else if ($('#barangay').val() == "") 
    {
      alert('Input barangay');
      $('#barangay').addClass('border-bottom border-danger');
    }
    else if ($('#street').val() == "") 
    {
      alert('Input street');
      $('#street').addClass('border-bottom border-danger');
    }
    else if ($('#city').val() == "") 
    {
      alert('Input city');
      $('#city').addClass('border-bottom border-danger');
    }
    else if ($('#state_prov').val() == "") 
    {
      alert('Input state/province');
      $('#state_prov').addClass('border-bottom border-danger');
    }
    else if ($('#zip_code').val() == "") 
    {
      alert('Input zip code');
      $('#zip_code').addClass('border-bottom border-danger');
    }
    else
    {

      $('#addBrgyDiv').addClass('disabled');

      $.ajax({
        url:url,
        type:'POST',
        data:add_brgy_account_form,
        contentType: false,
        cache: false,
        processData:false,
        success:function(result){
        result = JSON.parse(result);
          if (result.code == 1) 
          {
              //$('#btn_modal_confirmation').click();//trigger click to show modal confirmation
              alert(result.message);
              window.location.href  = base_url + 'admin/manage_barangay';
          }
          else
          {
              alert(result.message);
              $('#addBrgyDiv').removeClass('disabled');
          }
        },
        error:function(result){
          alert('Oppps something went wrong');
          $('#addBrgyDiv').removeClass('disabled');
        }
      });

    }


  });

});
