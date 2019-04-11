@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
    <style>
      .uper {
        margin-top: 40px;
      }
    </style>

    @if(session()->get('success'))
    <div class="uper">
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
    </div>
    @endif
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Manteniment: Assignar Empleats a Atraccio</h1>
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
                      <div class="col-5">
                        <label for="example-date-input" class="col-6 col-form-label">Data inici</label>
                        <input class="form-control" name="data_inici_assignacio_empleat" type="date"  min="<?php echo date('Y-m-d')?>">
                      </div>
                      <div class="col-5">
                        <label for="example-date-input" class="col-6 col-form-label">Data fi</label>
                        <input class="form-control" name="data_fi_assignacio_empleat"  type="date"  min="<?php echo date('Y-m-d')?>">
                      </div>
                      <div class="col-2">
                      <form method="post">
                      @csrf
                        <button id="submit" value="Consultar" type="button" class="btn btn-primary" onclick="fetchRecords()">ASD</button>
                      </form>
                      </div>
                    </div>
                    
        <div class="col-12">
        <div class="col-12 table-responsive" id="memes">
            
        </div>
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
      type: 'get',
      url: '{{ route('atraccions.assignaempleat', $atraccio->id) }}',
      dataType: 'JSON',
      error: function(xhr, status, error) {
        console.log("Error:"+xhr.status+" -"+error);
      },
      success: function(response) {
        $("#memes").empty();

        var len = response['emp_manteniment'].length;

        var table = 
          "<table class='table table-bordered table-hover table-sm' id='results_table' role='grid'>"+
          " <thead class='thead-light'>"+  
          "   <tr>"+
          "     <th>Nom</th>"+
          "     <th>Cognom1</th>"+
          "     <th>Cognom2</th>"+
          "     <th>Num Document</th>"+
          "     <th>Accions</th>"+
          "   </tr>"+
          " </thead>"+
          " <tbody>"+
          " </tbody>"+
          "</table>";

        $("#memes").append(table);
        for (var i=0; i < len; i++) {
          var id = response['emp_manteniment'][i].id;
          var nom = response['emp_manteniment'][i].nom;
          var cognom1 = response['emp_manteniment'][i].cognom1;
          var cognom2 = response['emp_manteniment'][i].cognom2;
          var numero_document = response['emp_manteniment'][i].numero_document;

          var tr_str = 
            "<tr>" +
            "<td>" + nom +"</td>" +
            "<td>" + cognom1 +"</td>" +
            "<td>" + cognom2 +"</td>" +
            "<td>" + numero_document +"</td>" +
            "<td></td>"+
            "</tr>";
            $("#results_table tbody").append(tr_str); 
        }
        
        // DataTable
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
        
      }
    });
  }
</script>

@endsection
