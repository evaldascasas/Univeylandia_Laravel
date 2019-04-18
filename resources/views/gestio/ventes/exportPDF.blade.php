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
      <!-- <h3>Llistat de ventes</h3> -->
      <div style="height:50px;">
        <div style="float: left;">
          <p><b>Número de ventes:</b> {{$numero_ventes}} </p>
          <p><b>Número productes venuts:</b> {{$productes_venuts}} </p>
        </div>
        <div style="float: right;">
          <p><b>Total:</b> {{$total}}€</p>
          <p><b>Dates exportació:</b> {{$dates[0]}} - {{$dates[1]}}</p>
        </div>
      </div>
      <br>

    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
              <th>Usuari</th>
              <th>Email</th>
              <th>Número document</th>
              <th>Preu total</th>
              <th>Realització de la compra</th>
          </tr>
          </thead>
          @foreach($ventes as $venta)
          <tr>
            <td>{{$venta->nom}} {{$venta->cognom1}} {{$venta->cognom2}}</td>
            <td>{{$venta->email}}</td>
            <td>{{$venta->numero_document}}</td>
            <td>{{$venta->preu}}€</td>
            <td>{{$venta->temps_compra}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
