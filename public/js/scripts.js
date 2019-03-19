$(document).ready(function() {
    $('#results_table').DataTable({
        language: {
            "sProcessing":   "Processant...",
            "sLengthMenu":   "Mostra _MENU_ registres",
            "sZeroRecords":  "No s'han trobat registres.",
            "sEmptyTable":   "No hi ha dades a mostrar.",
            "sInfo":         "Mostrant de _START_ a _END_ de _TOTAL_ registres",
            "sInfoEmpty":    "Mostrant de 0 a 0 de 0 registres",
            "sInfoFiltered": "",
            "sInfoPostFix":  "",
            "sSearch":       "Filtrar:",
            "sUrl":          "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Carregant...",
            "oPaginate": {
                "sFirst":    "Primer",
                "sPrevious": "Anterior",
                "sNext":     "Següent",
                "sLast":     "Últim"
            }
        }
    });
});

$(document).on('click','#confirm_delete', function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    Swal.fire({
        title: 'Estàs segur?',
        text: "Aquesta acció no es pot revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
});

feather.replace({style: "width:1em"});

CKEDITOR.replace('descripcio_atraccio');