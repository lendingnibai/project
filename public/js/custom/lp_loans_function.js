//<!-- FOR BORROWER/LOANS PAGE ONLY -->
  $(document).ready(function(){
    $('#applyforloanbutton').click(function(){
      $('#radio_borrower').attr("checked", "checked");
      $('#radio_lender').removeAttr("checked", "checked");
      $('#radio_borrower').click();
    });
  });