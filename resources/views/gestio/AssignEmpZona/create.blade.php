@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")


    @if ($errors->any())
  <div class="alert alert-danger alert-important">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul>
  </div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Assignar empleat al servei de la zona: {{$zona->nom}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary" value="Exportar">
                <span data-feather="save"></span>
                Exportar
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="data_inici_assignacio_empleat">Data inici</label>
                    <input class="form-control" id="data_inici_assignacio_empleat" name="data_inici_assignacio_empleat"
                        type="date" min="<?php echo date('Y-m-d')?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="data_fi_assignacio_empleat">Data fi</label>
                    <input class="form-control" id="data_fi_assignacio_empleat" name="data_fi_assignacio_empleat"
                        type="date" min="<?php echo date('Y-m-d')?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="id_serveis">Serveis</label>
                    <select class="form-control" id="id_serveis" name="id_serveis">
                        @foreach($rols as $rol)
                          <option value="{{ $rol->id }}">{{ $rol->nom_rol }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <button id="submit" value="Consultar" type="button" class="btn btn-primary"
                        onclick="fetchRecords()">Consultar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-12">
  <div class="col-12 table-resposive" id="equisde">
  </div>
</div>



<script>
    function fetchRecords() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          type: 'post',
          url: '{{ route('zones.assignaempleat', $zona->id)}}',
          dataType: 'JSON',
          data: {
            data_inici: jQuery('#data_inici_assignacio_empleat').val(),
            data_fi: jQuery('#data_fi_assignacio_empleat').val(),
            id_serveis: jQuery('#id_serveis option:selected').val()
          },
          error: function (xhr, status, error){
            console.log("Error: " + xhr.status + " - " + error);
          },
          success: function (response) {
            $("#equisde").empty();

            var len = response['empleats'].length;
            var table =
            "<table class='table table-bordered table-hover table-sm' id='results_table' role='grid'>"+
            " <thead class='thead-light'>"+
            "   <tr>"+
            "     <th>Nom</th>"+
            "     <th>Primer Cognom</th>"+
            "     <th>Numero Document</th>"+
            "     <th>Accions</th>"+
            "   </tr>"+
            "  </thead>"+
            "  <tbody>"+
            " </tbody>" +
            "</table>";

            $("#equisde").append(table);
             for (var i = 0; i < len; i++) {
                    var id = response['empleats'][i].id;
                    var nom = response['empleats'][i].nom;
                    var cognom1 = response['empleats'][i].cognom1;
                    var numero_document = response['empleats'][i].numero_document;

             for (var i = 0; i < len; i++) {
                      var id = response['empleats'][i].id;
                      var nom = response['empleats'][i].nom;
                      var cognom1 = response['empleats'][i].cognom1;
                      var numero_document = response['empleats'][i].numero_document;

             var tr_str =
                        "<tr>" +
                        "<td>" + nom + "</td>" +
                        "<td>" + cognom1 + "</td>" +
                        "<td>" + numero_document + "</td>" +
                        "<td><a class='btn btn-success btn-sm' href='#' data-toggle='modal' data-target='#ModalEmpleat"+id+"'>Assignar</a></td>" +
                        "</tr>";
            $("#results_table").append(tr_str);

            var option_selected = jQuery("#id_serveis option:selected").val();

            var modal =
                   '<div class="modal fade" id="ModalEmpleat'+id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog" role="document">' +
                                '<div class="modal-content"> ' +
                                    '<div class="modal-header">' +
                                        '<h5 class="modal-title">Assignar Empleat</h5> ' +
                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                    '</div>' +

                                '<form action="{{route("zona.assignacions.guardar", $zona->id) }}" method="POST"> ' +
                                '@csrf' +
                                '<div class="modal-body"> ' +
                                    '<div class="row"> ' +
                                        '<div class="col-6"> ' +
                                            '<span>Zona:</span>' +
                                            '<input type="text" class="form-control" name="id_zona" value="{{ $zona->id }}" hidden/> ' +
                                            '<input type="text" class="form-control" name="nom_zona" value="{{ $zona->nom }}" disabled /> ' +
                                        '</div>' +
                                        '<div class="col-6"> ' +
                                            '<span>Empleat:</span>' +
                                            '<input type="text" class="form-control" name="id_empleat" value='+id+' hidden /> ' +
                                            '<input type="text" class="form-control" name="nom_empleat" readonly value='+nom+'> ' +
                                        '</div>' +
                                        '<div class="col-6">' +
                                            '<span>Data Inici:</span>' +
                                            '<input type="date" class="form-control" name="data_inici_modal" readonly value="'+jQuery("#data_inici_assignacio_empleat").val()+'"/> ' +
                                        '</div>' +
                                        '<div class="col-6"> ' +
                                            '<span>Data Fi:</span> ' +
                                                         '<input type="date" class="form-control" name="data_fi_modal" readonly value="'+jQuery("#data_fi_assignacio_empleat").val()+'"/> ' +
                                        '</div>' +
                                        '<br> ' +
                                    '</div>' +
                                        '<div class="modal-footer"> ' +
                                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> ' +
                                            '<button type="submit" class="btn btn-primary">Finalitzar assignacio</button> ' +
                                        '</div> ' +
                                    '</div> ' +
                                '</form> ' +
                            '</div>' +
                            '</div> ' +
                        '</div>';


          $("#equisde").append(modal);
        }

//LA DATATABLE AQUI

      }
    }
  });
}
</script>

@endsection
