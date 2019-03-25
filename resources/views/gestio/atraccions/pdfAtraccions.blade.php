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
        <h1 class="h2">Llistat d'atraccions </h1>
      </div>
      <br>

    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
              <th>Nom Atraccio</th>
              <th>Tipus Atraccio</th>
              <th>Data Inauguracio</th>
              <th>Altura Minima</th>
              <th>Altura Maxima</th>
              <th>Accessibilitat</th>
              <th>Acces Express</th>
            </tr>
          </thead>
          @foreach($atraccionetes as $atraccio)
          <tr>
            <td>
              {{$atraccio->nom_atraccio}}
            </td>
            <td>
              {{$atraccio->nom}}
            </td>
            <td>
              {{$atraccio->data_inauguracio}}
            </td>
            <td>
              {{$atraccio->altura_min}}
            </td>
            <td>  
              {{$atraccio->altura_max}}
            </td>
            @if($atraccio->accessibilitat == 0)
            <td>NO</td>
            @else
            <td>SI</td>
            @endif
            @if($atraccio->acces_express == 0)
            <td>NO</td>
            @else
            <td>SI</td>
            @endif
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>