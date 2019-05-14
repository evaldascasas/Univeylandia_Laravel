@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Administrar Zones</h1>
</div>

<div class="table-responsive">
    <table
        class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
        id="results_table" role="grid">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($zones as $zona)
            <tr>
                <td>{{ $zona->id }}</td>
                <td>{{ $zona->nom }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                        <a class="btn btn-outline-primary btn-sm"
                            href="{{ route('zones.edit', $zona->id) }}">Modificar</a>
                        <form action="{{ route('zones.destroy', $zona->id)}}" method="post">
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