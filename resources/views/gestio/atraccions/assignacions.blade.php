@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")


    @if(session()->get('success'))
    <div class="uper">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Assignacions d'empleats a les Atraccions </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <form action="{{action('AtraccionsController@guardarPDF')}}">
                    <button class="btn btn-sm btn-outline-secondary">
                        <span data-feather="save"></span>
                        Exportar</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="col-12 table-responsive">
            <table class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                id="results_table" role="grid">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nom Empleat</td>
                        <td>Cognom Empleat</td>
                        <td>Nom Atraccio</td>
                        <td>Data Inici</td>
                        <td>Data Fi</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignacio as $assigna)
                    <tr>
                        <td>{{$assigna->id}}</td>
                        <td>{{$assigna->nom_empleat }}</td>
                        <td>{{$assigna->cognom_empleat }}</td>
                        <td>{{$assigna->nom_atraccio }}</td>
                        <td>{{$assigna->data_inici }}</td>
                        <td>{{$assigna->data_fi }}</td>

                        <td>
                        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                          <a href="{{ route('atraccions.assignacions.editAssignacions',$assigna->id)}}" class="btn btn-primary btn-sm">Modificar</a>

                            <form action="{{ route('atraccions.assignacions.destroy', $assigna->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button id="confirm_delete" class="btn btn-danger btn-sm" type="submit">Suprimir</button>
                            </form>
                          </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection
