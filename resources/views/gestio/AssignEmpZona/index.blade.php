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

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Administrar Assignacions d'empleats a zones</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" value="Exportar">
                    <span data-feather="save"></span>
                    Exportar
                </button>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="col-12 table-responsive">
            <table
                class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                id="results_table" role="grid">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Zona</th>
                    <th>Empleat</th>
                    <th>Data Inici</th>
                    <th>Data Fi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignacions as $assignacio)
                <tr>
                    <td>{{ $assignacio->id }}</td>
                    <td>{{ $assignacio->nom_zona }}</td>
                    <td>{{ $assignacio->nom_empleat }}</td>
                    <td>{{ $assignacio->data_inici }}</td>
                    <td>{{ $assignacio->data_fi }}</td>
                    <td>
                      <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                        <a class="btn btn-primary btn-sm"
                            href="{{ route('AssignEmpZona.edit', $assignacio->id) }}">Modificar</a>
                        <form action="{{ route('AssignEmpZona.destroy', $assignacio->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button id="confirm_delete" class="btn btn-danger btn-sm" type="submit"
                                value="Eliminar">Eliminar</button>
                        </form>
                      </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>


@endsection