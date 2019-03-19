@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Crear zona</h2>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('zones.store') }}">
    @csrf
    <div class="form-group">
        <div class="col-md-6 mb-3">
            <label for="nom">Nom</label>
            <input type="text" class="form-control form-control-sm" name="nom" required>
        </div>
    </div>
    <button class="btn btn-outline-success" type="submit" value="Crear">Crear</button>
    <button class="btn btn-outline-secondary" type="reset" value="Cancel·lar">Cancel·lar</button>
</form>

@endsection