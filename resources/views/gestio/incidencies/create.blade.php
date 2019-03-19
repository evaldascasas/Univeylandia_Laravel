@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Crear Incidència</h2>
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

<form method="post" action="{{ route('incidencies.store') }}">
    @csrf
    <div class="form-group">
        <div class="col-md-6 mb-3">
            <label for="title">Títol</label>
            <input type="text" class="form-control form-control-sm" name="title" required>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea class="form-control form-control-sm" style="resize:none" name="description" rows="5"
                    required></textarea>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="priority">Prioritat</label>
            <select class="form-control form-control-sm" name="priority">
                @foreach ($prioritats as $prioritat)
                <option value=" {{ $prioritat->id }}">{{ $prioritat->nom_prioritat }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-outline-success" type="submit" value="Crear">Crear</button>
    <button class="btn btn-outline-secondary" type="reset" value="Cancel·lar">Cancel·lar</button>
</form>

@endsection