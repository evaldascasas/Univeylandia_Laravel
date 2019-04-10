@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
    <head> 
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.tableTools.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.editor.js"></script>
    </head>
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
                      <br><br>
                        <input id="submit" value="Consultar" type="button" class="btn btn-primary submit-contacte"></button>
                      </div>
                    </div>

      <div class="col-12">
        <div class="col-12 table-responsive">
            <table class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="results_table" role="grid">
              <br>
                    <thead class="thead-light">
                      <tr>
                        <th>Nom</th>
                        <th>Cognom1</th>
                        <th>Cognom2</th>
                        <th>Num Document</th>
                        <th>Accions</th>
                      </tr>
                    </thead>
                <tbody></tbody>
            </table>
        </div>
       </div>
                 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --> <!-- jQuery CDN -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>                
                 
<script type='text/javascript'>
     $(document).ready(function(){

       // Fetch all records
       $('#but_fetchall').click(function(){
	      fetchRecords(0);
       });

       // Buscar per dates
       $('#submit').click(function(){
          var data_inici = $('#data_inici_assignacio_empleat').val();
          var data_fi = $('#data_fi_assignacio_empleat').val();

	      
	      fetchRecords(data_inici, data_fi);
       });

     });  
     
  function fetchRecords(data_inici, data_fi){
    $.ajax({
      url: '/gestio/atraccions/crearassignaciomanteniment/+id';
      type: 'get',
      dataType: 'json',
      succes: function(response){

        var len=0;
        $('#results_table tbody').empty();
        if(response['data'] !=null){
          len = response['data'].length;
        }

        if(len >0){
          for (var i=0; i<len; i++){
            var nom = response['data'][i].nom;
            var cognom1 = response['data'][i].cognom1;
            var cognom2 = response['data'][i].cognom2;
            var num_document = response ['data'][i].num_document;

            var tr_str = "<tr>" + 
            "      <td align='center'>" + nom + "</td>" +
                   "<td align='center'>" + username + "</td>" +
                   "<td align='center'>" + name + "</td>" +
                   "<td align='center'>" + email + "</td>" +
               "</tr>";

               $("#results_table tbody").append(tr_str);
          }
        }else if(response['data'] !=null){
          var tr_str = "<tr>" + 
            "<td align='center'>" + response['data'].nom + "</td>" +
            "<td align='center'>" + response['data'].cognom1 + "</td>" +
            "<td align='center'>" + response['data'].cognom2 + "</td>" +
            "<td align='center'>" + response['data'].num_document + "</td>" + 
            "</tr>";

            $("#result_table tbody").append(tr_str);
        }else{
          var tr_str = "<tr>" +
            "<td> align='center' colspans='4'> No record found.</td>" +
            "</tr>";

            $("#result_table tbody").append(tr_str);
        }
      }
    });
  }
  </script>
                           
</div>
        

@endsection
