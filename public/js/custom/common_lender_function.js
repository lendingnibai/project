// Animations initialization
new WOW().init();

// Data Picker Initialization
//$('.datepicker').pickadate();

//datatables
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');

  // Tooltips Initialization
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

// Material Select Initialization
    $('.mdb-select').material_select();
});


