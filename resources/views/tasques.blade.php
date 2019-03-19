@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="font-weight-bold text-center text-uppercase">Tasques</h3>
        </div>
    </div>

    @if(session()->get('success'))
    <div class="uper">
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
    </div>
    @endif

    <div class="table-responsive">
        <h6 class="font-weight-bold text-center">Incidències assignades - In Progress</h6>
        <table
            class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
            id="results_table" role="grid">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Prioritat</th>
                    <th>Estat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($incidencies_per_fer as $incidencia)
                <tr>
                    <td>{{ $incidencia->id }}</td>
                    <td>{{ str_limit($incidencia->titol, $limit = 20, $end = '...') }}</td>
                    <td>{{ str_limit($incidencia->descripcio, $limit = 20, $end = '...') }}</td>
                    <td>{{ $incidencia->nom_prioritat }}</td>
                    <td>{{ $incidencia->nom_estat }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Accions">
                            <a class="btn btn-success btn-sm"
                                href="#" data-toggle="modal" data-target="#ModalTasca{{$incidencia->id}}">Mostrar</a>

                            <form method="post" action="{{ route('incidencies.conclude', $incidencia->id) }}">
                                @method('PATCH')
                                @csrf
                                <button class="btn btn-warning btn-sm" type="submit">Marcar com a fet</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="ModalTasca{{$incidencia->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Incidència: {{$incidencia->titol}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <label>Títol</label>
                                    <input type="text" class="form-control" name="titol_incidencia" value="{{ $incidencia->titol }}" disabled />
                                </div>
                                <div class="col-12">
                                    <label>Títol</label>
                                    <textarea type="text" class="form-control" name="descripcio_incidencia" disabled rows="5">{{ $incidencia->descripcio }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label>Prioritat</label>
                                    <input type="text" class="form-control" name="prioritat_incidencia" value="{{ $incidencia->nom_prioritat }}" disabled />
                                </div>
                                <div class="col-12">
                                    <label>Estat</label>
                                    <input type="text" class="form-control" name="estat_incidencia" value="{{ $incidencia->nom_estat }}" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Enrere</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Fi modal -->
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
      <h6 class="font-weight-bold text-center">Assignacions a atraccions</h6>
      <table
          class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
          id="results_table" role="grid">
          <thead class="thead-light">
              <tr>
                <th>Nom Atraccio</th>
                <th>Data Inici</th>
                <th>Acces Finalitzacio</th>
              </tr>
          </thead>
          <tbody>
              @foreach($assignacio as $atraccio)
              <tr>
                  <td>{{$atraccio->nom_atraccio}}</td>
                  <td>{{$atraccio->data_inici}}</td>
                  <td>{{$atraccio->data_fi}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
    </div>

</div>

@endsection

@section("footer")
@endsection
