@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Pujar imatges</h2>
</div>

@if ($errors->any())
<div class="alert alert-danger alert-important">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{ route('imatges.upload') }}" method="post" enctype="multipart/form-data" class="dropzone dz-clickable"
    id="my-awesome-dropzone">
    @csrf
    <div class="col-md-6 mb-3">
        <label for="attraction">{{ __('Atracció a la que pertanyen les imatges') }}</label>
        <select class="form-control form-control-sm" id="attraction" name="attraction">
            @foreach ($atraccions as $atraccio)
            <option value="{{ $atraccio->id }}">{{ $atraccio->nom_atraccio }}</option>
            @endforeach
        </select>
    </div>
    <div></div>
    <button type="submit" id="submit-all" class="btn btn-success">Pujar</button>
</form>


<script>
    Dropzone.autoDiscover = false;
    var $ = window.$; // use the global jQuery instance

    if ($("#my-awesome-dropzone").length > 0) {
        var token = $('input[name=_token]').val();

        var myDropzone = new Dropzone("#my-awesome-dropzone", {
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 5,
            maxFilesize: 2,
            acceptedFiles: 'image/png, image/jpg, image/jpeg',
            addRemoveLinks: true,
            paramName: 'image',
            dictDefaultMessage: '<i class="fas fa-cloud-upload-alt fa-3x"></i><br />{{ __("Arrastrar i soltar o fer clic") }}<br />{{ __("Màxim de 5 imatges de 2MB") }}',
            dictFileTooBig: 'Arxiu massa gran.',
            dictInvalidFileType: 'No és un format d\'imatge vàlid',
            timeout: 120000,
            error: function (file, response) {
                if ($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                if (message.includes("SQLSTATE[23000]: Integrity constraint violation")) {
                    message = "Este archivo ya existe en el servidor."
                }
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            },

            init: function () {

                var submitBtn = document.querySelector("#submit-all");
                // for Dropzone to process the queue (instead of default form behavior):
                submitBtn.addEventListener("click", function (e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

            },

        });

        //send all the form data along with the files:
        myDropzone.on("sendingmultiple", function (data, xhr, formData) {
            formData.append("attraction", jQuery("#attraction").val());
            formData.append("image", jQuery('#image').val());
        });

        myDropzone.on('sending', function (file, xhr, formData) {
            formData.append("_token", token);
        });

        // Show alert when upload queue is completed
        myDropzone.on("queuecomplete", function (file) {
            setTimeout(function () {
                Swal.fire({
                    title: 'Pujada finalitzada',
                    type: 'success',
                    confirmButtonColor: '#28a745',
                    confirmButtonText: 'D\'acord',
                }).then((result) => {
                    if (result.value) {
                        window.location = "/gestio/productes/imatges"
                    }
                });
            }, 3000);
        });

    }

</script>

@endsection
