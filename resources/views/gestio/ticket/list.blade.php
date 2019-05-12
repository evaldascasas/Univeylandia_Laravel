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
          <th>Empleat</th>
          <th>Client</th>
          <th>tipus_pregunta</th>
          <th>Estat</th>
          <th>Missatge</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($linia as $users)
        <tr>
          <td>{{ $users->nom_empleat }}</td>
          <td>{{ $users->email }}</td>
          <td>{{ $users->pregunta }}</td>
          <td>{{ $users->missatge}}</td>
          <td>{{ $users->nom_estat}}</td>
          <td>
            <form action="{{ route('ticket.assign.destroy', $users->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button id="confirm_delete" class="btn btn-danger btn-sm" type="submit">Suprimir</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection
