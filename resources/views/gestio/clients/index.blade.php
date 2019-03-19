@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Llistar clients actius</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary" value="Exportar">
                <span data-feather="save"></span>
                Exportar
            </button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
        id="results_table" role="grid">
        <thead class="thead-light">
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
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                        <a href="{{route('clients.edit', $usuari->id)}}"
                            class="btn btn-outline-primary btn-sm">Modificar</a>
                        <form method="post" action="{{route('clients.destroy', $usuari->id)}}">
                            @csrf
                            @method('DELETE')
                            <button id="confirm_delete" class="btn btn-outline-danger btn-sm" type="submit"
                                value="Eliminar">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection