@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ticket: Assignar Empleat a Ticket</h1>
</div>

<div class="col-12">
  <div class="col-12 table-responsive">
    <table class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="results_table" role="grid">
      <thead class="thead-light">
        <tr>
          <th>Nom</th>
          <th>Cognom1</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($user as $users)
        <tr>
          <td>{{ $users->nom }}</td>
          <td>{{ $users->cognom1 }}</td>
          <td>{{ $users->email }}</td>
      <div class="modal fade" id="ModalEmpleat{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assignar Empleat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('saveTicket', $tiquet->id) }}" >
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <span>Tipus Pregunta:</span>
                  <input type="text" class="form-control" name="tipus_pregunta" value="{{ $tiquet->tipus_pregunta }}"/>
                  <input type="text" class="form-control" name="tiquetID" value="{{ $tiquet->id}}" hidden/>

                </div>
                <div class="col-6">
                  <span>Empleat:</span>
                  <input type="text" class="form-control" name="id_empleat" value="{{ $users->id}}"hidden/>
                  <input type="text" class="form-control" name="nom_empleat" readonly value="{{ $users->nom}}"/>
                </div>
                <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Finalitzar assignament</button>
            </div>
            </form>
            </div>
          <td><a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#ModalEmpleat{{$users->id}}">Assignar</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection
