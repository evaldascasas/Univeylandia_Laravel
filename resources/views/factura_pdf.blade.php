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
      <div>
        <img margin="0px" src="http://i68.tinypic.com/mrwxa1.png">
      </div>
    <br>
    <div style="height:200px;">
      <div style="float: left;">
        <p>C. Madrid, 35-49</p>
        <p>43870 Amposta</p>
        <p>977700043</p>
      </div>
      <div style="float: right;">
        <p><b>Nom i cognoms:</b> {{ $user_vista->nom }} {{ $user_vista->cognom1 }} {{ $user_vista->cognom2 }}</p>
        <p><b>Adreça: </b>{{ $user_vista->adreca }}</p>
        <p><b>Localitat: </b>{{ $user_vista->codi_postal }} {{ $user_vista->ciutat }}</p>

      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
              <th>Tipus producte</th>
              <th>Viatges tickets</th>
              <th>Quantitat</th>
              <th>Preu</th>
            </tr>
          </thead>
          @foreach($venta_pdf as $linia_venta)
          <tr>
            <td>
              {{$linia_venta->tipus_producte}}
            </td>
            <td>
              @if($linia_venta->tickets_viatges == 100)
              Indefinits
              @else
              {{$linia_venta->tickets_viatges}}
              @endif
            </td>
            <td>
              {{$linia_venta->quantitat}}
            </td>
            <td>{{$preu_linia = $linia_venta->preu * $linia_venta->quantitat}}€</td>
          </tr>
          @endforeach
          <tr style="font-weight: bold;">
              <td></td>
              <td></td>
              <td>TOTAL</td>
              <td>{{$linia_venta->preu_total}}€</td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
