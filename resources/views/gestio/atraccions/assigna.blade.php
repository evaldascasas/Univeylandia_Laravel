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
            <h1 class="h2">Assignar Empleats a Atraccio </h1>
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
      <thead class="thead-light">
        <tr>
          <td>ID</td>
          <td>Nom Atraccio</td>
          <td>Tipus Atraccio</td>
          <td>Data Inauguracio</td>
          <td>Altura Minima</td>
          <td>Altura Maxima</td>
          <td>Accessibilitat</td>
          <td>Acces Express</td>
          <td>Foto</td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($atraccionetes as $atraccio)
        <tr>
            <td>{{$atraccio->id}}</td>
            <td>{{$atraccio->nom_atraccio}}</td>
            <td>{{$atraccio->nom }}</td>
            <td>{{$atraccio->data_inauguracio}}</td>
            <td>{{$atraccio->altura_min}}</td>
            <td>{{$atraccio->altura_max}}</td>
            <td>{{$atraccio->accessibilitat}}</td>
            <td>{{$atraccio->acces_express}}</td>
            <td><a href="#" data-toggle="modal" data-target="#exampleModal{{$atraccio->id}}"><i data-feather="image"></i></a></td>

            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('atraccions.crearassignaciomantenimentdate', $atraccio->id)}}" class="btn btn-primary btn-sm">Manteniment</a>
            <a href="{{ route('atraccions.crearassignacionetejadate',$atraccio->id)}}" class="btn btn-primary btn-sm">Neteja</a>
            <a href="{{ route('atraccions.crearassignaciogeneraldate',$atraccio->id)}}" class="btn btn-primary btn-sm">Treballador</a>
</div>
          </td>

        </tr>


        @if (! is_null($atraccio->path))
            <!-- MODAL FOTO -->
            <div class="modal fade" id="exampleModal{{$atraccio->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" style="width:120%;">
                  <div class="modal-body">
                    <img style="width:100%" src="{{ asset($atraccio->path) }}" style="display:block;margin:auto;">
                  </div>
                </div>
              </div>
            </div>
            <!-- FI MODAL FOTO -->
            @else
            @endif
        @endforeach
    </tbody>
  </table>
</div>
</div>
</div>

@endsection
