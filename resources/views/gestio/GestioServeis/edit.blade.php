@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Editar Servei: {{ $servei->nom }}</h2>
</div>

<main role="main">
<div class="card uper">
  <div class="card-header">
    Editar Servei: {{ $servei->nom }}
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ route('GestioServeis.update', $servei->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="nom">Servei Nom:</label>
          <input type="text" class="form-control" name="nom" value="{{ $servei->nom }}">
        </div>
        <button type="submit" class="btn btn-primary" value="Actualitzar">Actualitza</button>
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel·lar</a>
      </form>
  </div>
</div>
@endsection
