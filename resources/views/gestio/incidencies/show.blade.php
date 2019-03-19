@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Consultar Incidència: {{ $incidencia->titol }}</h2>
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
<form method="#" action="#">
    <div class="form-group">
        <div class="col-md-6 mb-3">
            <label for="title">Títol</label>
            <input type="text" class="form-control form-control-sm" name="title" value="{{ $incidencia->titol }}"
                disabled>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea class="form-control form-control-sm" style="resize:none" name="description" rows="3"
                    disabled>{{ $incidencia->descripcio }}</textarea>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="priority">Prioritat</label>
            @foreach ($prioritats as $prioritat)
            @if ($incidencia->id_prioritat == $prioritat->id)
            <input type="text" class="form-control form-control-sm" name="title" value="{{ $prioritat->nom_prioritat }}"
                disabled>
            @endif
            @endforeach
        </div>
        <div class="col-md-6 mb-3">
            <label for="assigned-employee">Assignada a:</label>
            @foreach ($treballadors as $treballador)
            @if ($incidencia->id_usuari_assignat == $treballador->id)
            <input list="employees" name="assigned-employee" class="form-control form-control-sm"
                value="{{ $treballador->nom }} {{ $treballador->cognom1 }} {{ $treballador->cognom2 }} {{ $treballador->numero_document }}"
                disabled>
            @endif
            @endforeach
            </datalist>
        </div>
    </div>
    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Cancel·lar</a>
</form>

@endsection