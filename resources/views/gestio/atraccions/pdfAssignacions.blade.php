<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    </title>
  </head>
  <body>

      <div class="col-md-6 mb-6">
          <img margin="0px" src="http://i68.tinypic.com/mrwxa1.png">
      </div>
      <div class="col-md-6 mb-6">
        <h1 class="h2">Assignacions d'empleats a les Atraccions </h1>
      </div>
      <br>




    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
        <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom Empleat</th>
                        <th>Cognom Empleat</th>
                        <th>Nom Atraccio</th>
                        <th>Data Inici</th>
                        <th>Data Fi</th>s
                    </tr>
                </thead>
                    @foreach($assignacio as $assigna)
                    <tr>
                        <td>{{$assigna->id}}</td>
                        <td>{{$assigna->nom_empleat }}</td>
                        <td>{{$assigna->cognom_empleat }}</td>
                        <td>{{$assigna->nom_atraccio }}</td>
                        <td>{{$assigna->data_inici }}</td>
                        <td>{{$assigna->data_fi }}</td>
                    </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>