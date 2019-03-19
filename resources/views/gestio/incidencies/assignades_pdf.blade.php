<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_SERVER["DOCUMENT_ROOT"]."/css/style.css"?>">
</head>

<body>
    <div>
        <img margin="0px" src="<?php echo $_SERVER["DOCUMENT_ROOT"]."/img/univeylandia_logo_petit.png"?>">
    </div>
    <div>
        <h4 style="font-family: 'Open Sans', 'sans-serif'; font-weight: bold; text-align: center;">Incidències assignades</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Títol</th>
                        <th>Descripció</th>
                        <th>Prioritat</th>
                        <th>Reportador</th>
                        <th>Assignat a</th>
                    </tr>
                </thead>
                @foreach($incidencies as $incidencia)
                <tr>
                    <td>
                        {{$incidencia->titol}}
                    </td>
                    <td>
                        {{$incidencia->descripcio}}
                    </td>
                    <td>
                        {{$incidencia->nom_prioritat}}
                    </td>
                    <td>
                        {{$incidencia->nom_usuari_reportador}}
                    </td>
                    <td>
                        {{$incidencia->nom_usuari_assignat}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>