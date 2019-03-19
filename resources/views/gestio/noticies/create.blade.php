@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Registrar notícia</h1>
</div>

<form class="needs-validation" method="post" action="{{ route('noticies.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="cognom1">Títol</label>
        <input type="text" class="form-control form-control-sm" name="titol">
    </div>
    <div class="form-group">
        <label>Descripció</label>
        <textarea name="descripcio" id="descripcio_atraccio"></textarea>
    </div>
    <div class="form-group">
        <label for="nom">Categoría</label>
        <select class="form-control" name="categoria">
            @foreach($categories as $categoria)
            <option value={{ $categoria->id }}>{{ $categoria->nom }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Imatge</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <button class="btn btn-outline-success" type="submit">Crear</button>
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel·lar</a>
</form>


</div>
</div>


@endsection