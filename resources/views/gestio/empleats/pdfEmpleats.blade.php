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
        <h1 class="h2">Llistat d'empleats </h1>
      </div>
      <br>

    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
              <th>Nom</th>
              <th>Primer Cognoms</th>
              <th>Número de document</th>
              <th>Codi Seguretat Social</th>
              <th>Càrrec</th>
              <th>Horari</th>
            </tr>
          </thead>
          @foreach($empleats as $empleat)
          <tr>
            <td>
              {{$empleat->nom}}
            </td>
            <td>
              {{$empleat->cognom1}}
            </td>
            <td>
              {{$empleat->numero_document}}
            </td>
            <td>
              {{$empleat->codi_seg_social}}
            </td>
            <td>
              {{$empleat->carrec}}
            </td>
            <td>
              {{$empleat->id_horari}}
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
