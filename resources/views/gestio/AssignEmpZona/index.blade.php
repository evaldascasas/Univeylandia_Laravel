@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Assignar Empleats a Zones </h1>
    </div>

    <div class="col-12">
        <div class="col-12 table-responsive">
            <table class="table table-bordered table-hover table-sm dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                id="results_table" role="grid">
      <thead class="thead-light">
        <tr>
          <td>Nom</td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($assignacions as $assign)
        <tr>
            <td>{{$assign->nom}}</td>

            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('zones.assignacions.create', $assign->id )}}" class="btn btn-primary btn-sm">Assignar Empleat</a>
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
