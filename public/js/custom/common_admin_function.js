
// Animations initialization
new WOW().init();

var container = document.querySelector('.custom-scrollbar');
Ps.initialize(container, {
  wheelSpeed: 2,
  wheelPropagation: true,
  minScrollbarLength: 20
});


$(document).ready(function () {
	 // Data Picker Initialization
    $('.datepicker').pickadate({
        // Escape any “rule” characters with an exclamation mark (!).
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy/mm/dd',
        selectYears: true,
        selectMonths: true
    });
        

	// Material Select Initialization
	$('.mdb-select').material_select();

	// datatables Initialization
	$('#datatables').DataTable();
	// Material Select Initialization
  	$('select[name="datatables_length"]').material_select();

  	// Tooltips Initialization
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});

	// SideNav Initialization
  	$(".button-collapse").sideNav();

  	$(document).ready(function () {
	  $('#dtBasicExample').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});

});


