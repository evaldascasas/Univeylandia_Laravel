@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Registrar atracció</h2>
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

<form method="post" action="{{ route('atraccions.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="nom">Nom de l'atracció</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nom" name="nom_atraccio"
                value="{{ old('nom_atraccio')}}" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="alturamin">Altura mínima</label>
            <input type="text" class="form-control form-control-sm" name="alturamin" value="{{ old('alturamin')}}"
                required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="alturamax">Altura màxima</label>
            <input type="text" class="form-control form-control-sm" name="alturamax" value="{{ old('alturamax')}}"
                required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="datainauguracio">Data d'innauguració</label>
            <input type="date" class="form-control form-control-sm" name="datainauguracio"
                value="{{ old('datainauguracio')}}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="descripcio">Descripció</label>
            <textarea class="form-control form-control-sm" name="descripcio"
                id="descripcio_atraccio">{{ old('descripcio')}}</textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="tipusatraccio">Tipus d'atracció</label>
            <div class="input-group">
                <select class="form-control form-control-sm" name="tipusatraccio">
                    @foreach($tipusAtraccions as $tipus)
                    <option value="{{ $tipus->id }}">{{ $tipus->tipus }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="accessible">Accessible</label>
            <div class="input-group">
                <select class="form-control form-control-sm" name="accessible">
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="accesexpress">Accés expres</label>
            <div class="input-group">
                <select class="form-control form-control-sm" name="accesexpress">
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="image">Imatge</label>
            <input type="file" name="image" class="form-control form-control-sm">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Crear</button>
    <a href="{{ route('atraccions.index') }}" class="btn btn-secondary">Cancel·lar</a>
</form>
</div>
</div>

@endsection