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

$(document).ready(function() {
    $('#results_table_ordenats_id_desc').DataTable({
      "order": [[ 0, "desc" ]],
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

$(document).on('click','#confirm_reactivation', function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    Swal.fire({
        title: 'Estàs segur?',
        text: "Aquesta acció reactivarà l'usuari desactivat!",
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

// Flash-messages all alerts but important ones dissappear
$('div.alert').not('.alert-important').delay(3000).slideUp(350);


var token = $('input[name=_token]').val();

Dropzone.autoDiscover = false;

// var dropzone = new Dropzone('#dropzone', {
//     url: "{{ route('imatges.upload') }}",
//     method: "post",
//     autoProcessQueue: false,
//     uploadMultiple: true,
//     previewTemplate: document.querySelector('#preview-template').innerHTML,
//     parallelUploads: 2,
//     thumbnailHeight: 120,
//     thumbnailWidth: 120,
//     maxFilesize: 3,
//     acceptedFiles: 'image/jpg,png,jpeg',
//     paramName: 'image[]',
//     // previewsContainer: '#dropzonePreview',
//     clickable: false,
//     accept: function(file, done) {
//         console.log("uploaded");
//         done();
//     },
//     error: function(file, msg){
//         alert(msg);
//     },
//     init: function() {
//         dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

//         // for Dropzone to process the queue (instead of default form behavior):
//         document.getElementById("sbmtbtn").addEventListener("click", function(e) {
//             // Make sure that the form isn't actually being sent.
//             e.preventDefault();
//             e.stopPropagation();
//             dzClosure.processQueue();
//         });

//         //send all the form data along with the files:
//         this.on("sendingmultiple", function(data, xhr, formData) {
//             formData.append("attraction", jQuery("#attraction").val());
//         });
//     },
//     thumbnail: function (file, dataUrl) {
//         if (file.previewElement) {
//             file.previewElement.classList.remove("dz-file-preview");
//             var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
//             for (var i = 0; i < images.length; i++) {
//                 var thumbnailElement = images[i];
//                 thumbnailElement.alt = file.name;
//                 thumbnailElement.src = dataUrl;
//             }
//             setTimeout(function () { file.previewElement.classList.add("dz-image-preview"); }, 1);
//         }
//     }
// });
Dropzone.options.myDropzone= {
    // url: 'upload.php',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("attraction", jQuery("#attraction").val());
        });
    }
}
myDropzone.on('sending', function (file, xhr, formData) {
    formData.append("_token", token);
})
