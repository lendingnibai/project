//<!-- FOR BORROWER/LOANS PAGE ONLY -->
  $(document).ready(function(){
    $('#applyforloanbutton').click(function(){
      $('#defaultInline1').attr("checked", "checked");
      $('#defaultInline2').removeAttr("checked", "checked");
    });
  });
