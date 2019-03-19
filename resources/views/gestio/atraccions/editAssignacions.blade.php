@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")


<div class="card uper">
  <div class="card-header">
    Modificar l'assignacio del empleat
  </div>

  
  @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>La data fi, és anterior a la data inici</li>
        @endforeach
    </ul>
</div>
@endif


      <form method="post" action="{{ route('atraccions.assignacions.updateAssignacions', $assignacio->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="form-group row">
            <div class="col-md-3 mb-3">
                <label for="nom">Nom del empleat: </label>
                <input type="text" class="form-control form-control-sm" name="nom" value="{{ $dades_user->nom }}" readonly>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cognom1">Cognom del empleat: </label>
                <input type="text" class="form-control form-control-sm" name="cognom1" value="{{ $dades_user->cognom1 }}" readonly>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cognom2">ID de l'atraccio: </label>
                <input type="text" class="form-control form-control-sm" name="cognom2" value="{{ $dades_atraccio->id }}" readonly>
            </div>
            <div class="col-md-3 mb-3">
                <label for="email">Nom de l'atraccio: </label>
                <input type="text" class="form-control form-control-sm" name="nom_atraccio" value="{{ $dades_atraccio->nom_atraccio }}" readonly>
            </div>
            <div class="col-md-6 mb-6">
              <label for="quantity">Data d'inici:</label>
              <input type="date" class="form-control" name="data_inici" value="{{ $assignacio->data_inici }}">
            </div>
            <div class="col-md-6 mb-6">
              <label for="quantity">Data fi:</label>
              <input type="date" class="form-control" name="data_fi" value="{{ $assignacio->data_fi }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Modificar</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancel·lar</a>

      </form>
  </div>
</div>
@endsection
