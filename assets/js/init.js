$(".button-collapse").sideNav();
$(".dropdown-button").dropdown();
$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );

$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 40 // Creates a dropdown of 15 years to control year
});

$(document).ready(function() {
    $('select').material_select();
});
