@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="card uper">
  <div class="card-header">
    Modificar Atraccions
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

      <form method="post" action="{{ route('atraccions.update', $atraccio->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nom:</label>
          <input type="text" class="form-control" name="nom" value="{{ $atraccio->nom_atraccio }}" />
        </div>

        <div class="form-group">
          <label for="name">Descripcio</label>
          <textarea name="descripcio" id="descripcio_atraccio">{{ $atraccio->descripcio }}</textarea>
        </div>

        <div class="form-group">
          <label for="price">Altura minima :</label>
        </div>
          <input type="text" class="form-control" name="alturamin" value={{ $atraccio->altura_min }} />
        <div class="form-group">
          <label for="quantity">Altura maxima:</label>
          <input type="text" class="form-control" name="alturamax" value={{ $atraccio->altura_max}} />
        </div>
        <div class="form-group">
          <label for="quantity">Data d'ignauguracio:</label>
          <input type="date" class="form-control" name="datainauguracio" value={{ $atraccio->data_inauguracio }} />
        </div>
        <div class="form-group">
            <label for="quantity">Tipus d'atraccio:</label>
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
        <div class="form-group">
          <label for="quantity">Accessible:</label>
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
        <div class="form-group">
          <label for="quantity">Acces express:</label>
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

        <div class="form-group">
              @if (! is_null($atraccio->path))
              <label>Imatge</label> <img src="https://image.flaticon.com/icons/png/512/16/16647.png" data-toggle="modal" data-target="#exampleModal{{$atraccio->id}}" style="width:20px">
                <!-- MODAL FOTO -->
                <div class="modal fade" id="exampleModal{{$atraccio->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="file" name="image" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Modificar</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancel·lar</a>
      
</form>
  </div>
</div>
@endsection
