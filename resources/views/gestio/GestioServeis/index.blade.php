@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

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
    <h1 class="h2">Administrar Serveis</h1>
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
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Servei</th>
                <th colspan="2">Acció</th>
            </tr>
        </thead>
        <tbody>
            @foreach($serveis as $servei)
            <tr>
                <td>{{ $servei->id }}</td>
                <td>{{ $servei->nom }}</td>
                <td><a class="btn btn-primary" href="{{ route('GestioServeis.edit', $servei->id) }}">Modificar</a></td>
                <td>
                    <form action="{{ route('GestioServeis.destroy', $servei->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button id="confirm_delete" class="btn btn-danger" type="submit"
                            value="Eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection