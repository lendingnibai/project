//<!-- FOR INVEST PAGE ONLY -->
  $(document).ready(function(){
    $('#startinvestingnow').click(function(){
      $('#radio_borrower').removeAttr("checked", "checked");
      $('#radio_lender').attr("checked", "checked");
      $('#radio_lender').click();
    });
  });
