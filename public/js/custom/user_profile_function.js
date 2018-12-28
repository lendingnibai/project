// user profile
  $(document).ready(function(){
      $('#updateButton').click(function(){
          $('#profileSection').addClass('d-none');
          $('#updateButton').addClass('d-none');

          $('#cancelButton').removeClass('d-none');
          $('#formSection').removeClass('d-none');
      });

      $('#cancelButton').click(function(){
          $('#profileSection').removeClass('d-none');
          $('#updateButton').removeClass('d-none');


          $('#cancelButton').addClass('d-none');
          $('#profileSection').addClass('pulse');
          $('#formSection').addClass('d-none');
          
      });
  });


 $(document).ready(function(){
      // photo preview

  $('#buttonProfilePic').on('click', function() {

    $('#profilepicture').click();

  });

  $('#buttonGovId').on('click', function() {

    $('#govId').click();

  });

  $('#profilepicture').click(function(){

    function readIMG(input) {
      if (input.files && input.files[0]) {
         var readerUpdate = new FileReader();

        readerUpdate.onload = function (e) {
             $('#previewPhotoProfilePic').attr('src', e.target.result);
        }

        readerUpdate.readAsDataURL(input.files[0]);
      }

    }

   $("#profilepicture").change(function(){
      readIMG(this);
      let profilepicture = $(this).val();
      if (profilepicture !='') {
        $('#filename1').text('Profile Picture');
        $('#reviewPhotoProfilePic').removeClass('invisible');
        $('#animatedProfilePic').addClass('bounce');
        $('#file1').removeClass('invisible');
      }
   });

  }); 

  $('#govId').click(function(){

    function readIMG(input) {
      if (input.files && input.files[0]) {
         var readerUpdate = new FileReader();

        readerUpdate.onload = function (e) {
             $('#previewPhotoGovId').attr('src', e.target.result);
        }

        readerUpdate.readAsDataURL(input.files[0]);
      }

    }

   $("#govId").change(function(){
      readIMG(this);
      let govId = $(this).val();
      if (govId !='') {
        $('#filename2').text('Government ID');
        $('#reviewPhotogovId').removeClass('invisible');
        $('#animatedGovId').addClass('bounce');
        $('#file2').removeClass('invisible');
      }
   });

  }); 

 });
