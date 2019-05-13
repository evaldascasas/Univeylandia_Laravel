@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Modificar atracció - {{ $atraccio->nom_atraccio }}</h1>
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

<form method="post" action="{{ route('atraccions.update', $atraccio->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="name">Nom de l'atracció</label>
            <input type="text" class="form-control form-control-sm" name="nom" value="{{ $atraccio->nom_atraccio }}" />
        </div>
        <div class="col-md-3 mb-3">
            <label for="quantity">Altura mínima</label>
            <input type="text" class="form-control form-control-sm" name="alturamax" value={{ $atraccio->altura_min}} />
        </div>
        <div class="col-md-3 mb-3">
            <label for="quantity">Altura màxima</label>
            <input type="text" class="form-control form-control-sm" name="alturamax" value={{ $atraccio->altura_max}} />
        </div>
        <div class="col-md-3 mb-3">
            <label for="datainauguracio">Data d'innauguració</label>
            <input type="date" class="form-control form-control-sm" name="datainauguracio" value={{ $atraccio->data_inauguracio }} />
        </div>
        <div class="col-md-12 mb-3">
            <label for="name">Descripció</label>
            <textarea name="descripcio" class="form-control form-control-sm" id="descripcio_atraccio">{{ $atraccio->descripcio }}</textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="tipusatraccio">Tipus d'atracció</label>
            <select class="form-control form-control-sm" name="tipusatraccio">
                @foreach($tipus as $tipo)
                @if($atraccio->tipus_atraccio == $tipo->id)
                <option selected value="{{ $tipo->id }}">{{ $tipo->tipus }}</option>
                @else
                <option value="{{ $tipo->id }}">{{ $tipo->tipus }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="quantity">Accessible</label>
            <select class="form-control form-control-sm" name="accessible" value={{ $atraccio->accessibilitat }}>
                @if($atraccio->accessibilitat == 1)
                <option selected value=1> SI</option>
                <option value=0> NO</option>
                @else
                <option selected value=0> NO</option>
                <option value=1> SI</option>
                @endif
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="quantity">Accés expres</label>
            <select class="form-control form-control-sm" name="accesexpress" value={{ $atraccio->acces_express }}>
                @if($atraccio->acces_express == 1)
                <option selected value=1> SI</option>
                <option value=0> NO</option>
                @else
                <option selected value=0> NO</option>
                <option value=1> SI</option>
                @endif
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            @if (! is_null($atraccio->path))
            <label>Imatge</label>
            <img src="https://image.flaticon.com/icons/png/512/16/16647.png" data-toggle="modal"
                data-target="#exampleModal{{$atraccio->id}}" style="width: 20px">
            <!-- MODAL FOTO -->
            <div class="modal fade" id="exampleModal{{$atraccio->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content" style="width:120%;">
                        <div class="modal-body">
                            <img style="width: 100%" src="{{ asset($atraccio->path) }}" style="display:block;margin:auto;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FI MODAL FOTO -->
            @else
            <label>Imatge</label>
            @endif
            <input type="file" name="image" class="form-control form-control-sm">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Modificar</button>
    <a href="{{ route('atraccions.index') }}" class="btn btn-secondary">Cancel·lar</a>
</form>
</div>
@endsection