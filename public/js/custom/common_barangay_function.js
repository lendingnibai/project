// Animations initialization
new WOW().init();

// Data Picker Initialization
$('.datepicker').pickadate();

// SideNav Initialization
$(".button-collapse").sideNav();

  var container = document.querySelector('.custom-scrollbar');
  Ps.initialize(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
});

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
