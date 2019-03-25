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
        <h1 class="h2">Productes </h1>
      </div>
      <br>
      
      <div class="row">
      <div class="col-12">
        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                    <th>ID</td>
                    <th>Tipus producte</th>
                    <th>Mida</th>
                    <th>Viatges tickets</th>
                    <th>Preu</th>
                    <th>Descripcio</th>
                    <th>Estat</th>
              </tr>
            </thead>
            @forelse($productes as $producte)
            <tbody>
              <td>{{$producte->id}}</td>
              <td>{{$producte->nom}}</td>
              <td>{{$producte->mida}}</td>
              <td>{{$producte->tickets_viatges}}</td>
              <td>{{$producte->preu}}€</td>
              <td>{{$producte->descripcio}}</td>
              <td>{{$producte->estat}}</td>
            </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>