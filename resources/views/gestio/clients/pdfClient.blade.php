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
        <h1 class="h2">Clients del parc </h1>
      </div>
      <br>

    <div class="row">
      <div class="col-6">
        <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
                <th>Nom</th>
                <th>Primer Cognom</th>
                <th>Segon Cognom</th>
                <th>Email</th>
                <th>Data Naixement</th>
                <th>Adreça</th>
                <th>Ciutat</th>
                <th>Provincia</th>
                <th>Codi Postal</th>
                <th>Tipus Document</th>
                <th>Numero Document</th>
                <th>Sexe</th>
                <th>Telèfon</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($usuaris as $usuari)
            <tr>
                <td>{{$usuari->nom}}</td>
                <td>{{$usuari->cognom1}}</td>
                <td>{{$usuari->cognom2}}</td>
                <td>{{$usuari->email}}</td>
                <td>{{$usuari->data_naixement}}</td>
                <td>{{$usuari->adreca}}</td>
                <td>{{$usuari->ciutat}}</td>
                <td>{{$usuari->provincia}}</td>
                <td>{{$usuari->codi_postal}}</td>
                <td>{{$usuari->tipus_document}}</td>
                <td>{{$usuari->numero_document}}</td>
                <td>{{$usuari->sexe}}</td>
                <td>{{$usuari->telefon}}</td>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>