@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Editar Incidència: {{ $incidencia->titol }}</h2>
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

<form method="post" action="{{ route('incidencies.update', $incidencia->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <div class="col-md-6 mb-3">
            <label for="title">Títol</label>
            <input type="text" class="form-control form-control-sm" name="title" value="{{ $incidencia->titol }}"
                readonly>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea class="form-control form-control-sm" style="resize:none" name="description" rows="3"
                    readonly>{{ $incidencia->descripcio }}</textarea>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="priority">Prioritat</label>
            <select class="form-control form-control-sm" name="priority">
                @foreach ($prioritats as $prioritat)
                @if ($incidencia->id_prioritat == $prioritat->id)
                <option selected value="{{ $incidencia->id_prioritat }}">{{ $prioritat->nom_prioritat }}</option>
                @else
                <option value="{{ $prioritat->id }}">{{ $prioritat->nom_prioritat }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="assigned-employee">Assignar a:</label>
            <select id="employees" name="assigned-employee" class="chosen-select form-control form-control-sm form-control-chosen" data-placeholder="Selecciona un treballador">
              <option> </option>
              @foreach ($rols as $rol)
              <optgroup label="{{ $rol->nom_rol }}">
                @foreach ($treballadors as $treballador)
                    @if ($treballador->id_rol == $rol->id)
                      @if ($treballador_assignat != null && $treballador_assignat->id == $treballador->id)
                      <option selected value="{{ $treballador->id }}">{{ $treballador->nom }} {{ $treballador->cognom1 }} {{ $treballador->cognom2 }} {{ $treballador->numero_document }}</option>
                      @else
                      <option value="{{ $treballador->id }}">{{ $treballador->nom }} {{ $treballador->cognom1 }} {{ $treballador->cognom2 }} {{ $treballador->numero_document }}</option>
                      @endif
                    @endif
                  @endforeach
              </optgroup>
              @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-outline-success" type="submit" value="Assignar">Assignar</button>
    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Cancel·lar</a>
</form>

<script>
$(document).ready(function() {
    $(".chosen-select").chosen({
      no_results_text: "No hem trobat al treballador:"
    })
});
</script>

@endsection
