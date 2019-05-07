@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Pujar imatges</h2>
</div>

@if ($errors->any())
<div class="alert alert-danger alert-important">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('imatges.upload') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="col-md-6 mb-3">
            <label for="image">Imatges</label>
            <input type="file" class="form-control-file" name="image[]" multiple="true" accept="image/*" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="attraction">Atracció a la que pertanyen les imatges</label>
            <select class="form-control form-control-sm" name="attraction">
                @foreach ($atraccions as $atraccio)
                <option value="{{ $atraccio->id }}">{{ $atraccio->nom_atraccio }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn- type="submit">Pujar</button>
    <button class="btn btn-y" type="reset">Cancel·lar</button>
</form>


@endsection
