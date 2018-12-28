// user incomplete
 $(document).ready(function(){

  let base_url = $('#base_url').val();

  // photo preview
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
      let gov_id = $(this).val();
      if (gov_id !='') {
        $('#filename2').text('Government ID');
        $('#reviewPhotogovId').removeClass('invisible');
        $('#animatedGovId').addClass('bounce');
        $('#file2').removeClass('invisible');
      }
   });

  });

  $('#update_user_profile_form').submit(function(evt){

    evt.preventDefault();
    let url = $(this).attr('action');
    let update_user_profile_form = new FormData(this);

    $('input').removeClass('border-bottom border-danger');

    if ($('#first_name').val() == '' && $('#last_name').val() == '' && $('#gender').val() == '' && $('#dob').val() == '' && $('#civil_status').val() == '' && $('#spouse_name').val() == '' && $('#gov_id').val() == '' && $('#mobile_no').val() == '' && $('#barangay').val() == '' && $('#street').val() == '' && $('#city').val() == '' && $('#state_prov').val() == '' && $('#zip_code').val() == '' && $('#oor').val() == '') 
    {
        alert('Fill all required fields');
    }
    else if ($('#first_name').val() == '') 
    {
        alert('Input first name');
    }
    else if ($('#last_name').val() == '') 
    {
        alert('Input last name');
    }
    else if ($('#gender').val() == null) 
    {
        alert('Select gender');
    }
    else if ($('#dob').val() == '') 
    {
        alert('Select date of birth');
    }
    else if ($('#civil_status').val() == null) 
    {
        alert('Select civil status');
    }
    else if ($('#mobile_no').val() == '') 
    {
        alert('Input mobile no.');
    }
    else if ($('#barangay').val() == '') 
    {
        alert('Input barangay');
    }
    else if ($('#street').val() == '') 
    {
        alert('Input street');
    }
    else if ($('#city').val() == '') 
    {
        alert('Input city');
    }
    else if ($('#state_prov').val() == '') 
    {
        alert('Input state/province');
    }
    else if ($('#zip_code').val() == '') 
    {
        alert('Input zip code');
    }
    else if ($('#oor').val() == null) 
    {
        alert('Select Ownership of residence');
    }
    else
    {
        //do ajax
        $.ajax({
          url:url,
          type:'POST',
          data:update_user_profile_form,
          contentType: false,
          cache: false,
          processData:false,
          success:function(result){
          result = JSON.parse(result);
            if (result.code == 1) 
            {
                alert(result.message);
                window.location.href  = base_url + 'lender/incomplete';
            }
            else
            {
                alert(result.message);
            }
          },
          error:function(result){
            alert('Oppps something went wrong');
          }
      });
    }


  });

 });