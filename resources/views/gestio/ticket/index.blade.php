@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Llistar tickets actius</h1>
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
                <th>Email</th>
                <th>Tipus pregutna</th>
                <th>Misssatge</th>
                <th>Estat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($ticket as $tickets)
            <tr>
                <td>{{$tickets->nom}}</td>
                <td>{{$tickets->email}}</td>
                <td>{{$tickets->pregunta}}</td>
                <td>{{$tickets->missatge}}</td>
                <td>{{$tickets->nom_estat}}</td>
                <td>
                    <a href="{{ route('ticket.assign', $tickets->id) }}" class="btn btn-primary btn-sm">Assignar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
