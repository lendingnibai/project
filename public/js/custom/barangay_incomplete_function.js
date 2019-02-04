$(document).ready(function(){

  let base_url = $('#base_url').val();

  //upload button for gov id
  $('#buttonPhotoGovId').click(function(){
      $('#gov_id').click();

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
          let gov_id = $(this).val();
          if (gov_id !='') {
            $('#filename1').text('Government ID');
            $('#gov_id_selected').removeClass('invisible');
          }
       });

    });

  $('#update_profile_form').submit(function(evt){

    evt.preventDefault();
    let url = $(this).attr('action');
    let update_profile_form = new FormData(this);

    $('input').removeClass('border-bottom border-danger');

    if ($('#first_name').val() == "" && $('#last_name').val() == "" && $('#gender').val() == "" && $('#dob').val() == "" && $('#civil_status').val() == "" && $('#position').val() == "" && $('#mobile_no').val() == "" && $('#barangay').val() == "" && $('#street').val() == "" && $('#city').val() == "" && $('#state_prov').val() == "" && $('#zip_code').val() == "" && $('#oor').val() == '') {
      alert('Fill all required fields');

      $('input').addClass('border-bottom border-danger');
      setTimeout(function(){
        $('#middle_name').removeClass('border-bottom border-danger');
        $('#tel_no').removeClass('border-bottom border-danger');
      },10);
    }
    else if ($('#first_name').val() == '') 
    {
      alert('Input first name');
      $('#first_name').addClass('border-bottom border-danger');
    }
    else if ($('#last_name').val() == '') 
    {
      alert('Input last name');
      $('#last_name').addClass('border-bottom border-danger');
    }
    else if ($('#gender').val() == '') 
    {
      alert('Select gender');
      $('#gender').addClass('border-bottom border-danger');
    }
    else if ($('#dob').val() == '') 
    {
      alert('Select date of birth');
      $('#dob').addClass('border-bottom border-danger');
    }
    else if ($('#civil_status').val() == '') 
    {
      alert('Select civil status');
      $('#civil_status').addClass('border-bottom border-danger');
    }
    else if ($('#position').val() == '') 
    {
      alert('Input position');
      $('#position').addClass('border-bottom border-danger');
    }
    else if ($('#mobile_no').val() == '') 
    {
      alert('Input mobile no.');
      $('#mobile_no').addClass('border-bottom border-danger');
    }
    else if ($('#barangay').val() == '') 
    {
      alert('Input barangay');
      $('#barangay').addClass('border-bottom border-danger');
    }
    else if ($('#street').val() == '') 
    {
      alert('Input street');
      $('#street').addClass('border-bottom border-danger');
    }
    else if ($('#city').val() == '') 
    {
      alert('Input city');
      $('#city').addClass('border-bottom border-danger');
    }
    else if ($('#state_prov').val() == '') 
    {
      alert('Input state/province');
      $('#state_prov').addClass('border-bottom border-danger');
    }
    else if ($('#zip_code').val() == '') 
    {
      alert('Input zip code');
      $('#zip_code').addClass('border-bottom border-danger');
    }
    else if ($('#oor').val() == '') 
    {
      alert('Select owenership of recidence');
      $('#oor').addClass('border-bottom border-danger');
    }
    else
    {
      $('#incompleteProfile').addClass('disabled');

       $.ajax({
        url:url,
        type:'POST',
        data:update_profile_form,
        contentType: false,
        cache: false,
        processData:false,
        success:function(result){
        result = JSON.parse(result);
          if (result.code == 1) 
          {
              //$('#btn_modal_confirmation').click();//trigger click to show modal confirmation
              alert(result.message);
              window.location.href  = base_url + 'barangay';
          }
          else
          {
              alert(result.message);
              $('#incompleteProfile').removeClass('disabled');
          }
        },
        error:function(result){
          alert('Oppps something went wrong');
          $('#incompleteProfile').removeClass('disabled');
        }
      });
    }

  });

});