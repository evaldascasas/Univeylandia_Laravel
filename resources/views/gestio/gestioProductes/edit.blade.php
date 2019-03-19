@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Editar producte</h1>
        </div>

        <form class="needs-validation" method="post" action="{{ route('productes.update', $producte->id)}}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
            <div class="form-group">
              <label for="nom">Tipus producte</label>
              <select class="form-control" name="tipus">
                <option selected value={{ $tipus_producte->id }}>{{ $tipus_producte->nom }}</option>
                @foreach($tipus_producte_list as $tipus)
                <option value={{ $tipus->id }}>{{ $tipus->nom }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="cognom1">Mida</label>
              <input type="text" class="form-control" name="mida" value={{ $atributs_producte->mida }}>
            </div>
            <div class="form-group">
              <label >Tickets viatges</label>
              <input type="number" class="form-control form-control-sm" name="tickets_viatges" value={{ $atributs_producte->tickets_viatges }}>
            </div>
            <div class="form-group">
              <label>Preu</label>
              <input type="number" class="form-control form-control-sm" name="preu" required value={{ $atributs_producte->preu }}>
            </div>
            <div class="form-group">
              <label>Descripcio</label>
              <input type="text" class="form-control form-control-sm" name="descripcio" required value="{{ $producte->descripcio }}">
            </div>
            <div class="form-group">
              <label>Estat</label>
              <select class="form-control" name="estat">
                @if ($producte->estat === 1)
                <option selected value={{ $producte->estat }}>ACTIU</option>
                <option value=0>DESACTIVAT</option>
                @else
                <option selected value={{ $producte->estat }}>DESACTIVAT</option>
                <option value=1>ACTIU</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              @if (! is_null($atributs_producte->foto_path))
              <label>Imatge</label> <img src="https://image.flaticon.com/icons/png/512/16/16647.png" data-toggle="modal" data-target="#exampleModal{{$producte->id}}" style="width:20px">
                <!-- MODAL FOTO -->
                <div class="modal fade" id="exampleModal{{$producte->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content" style="width:120%;">
                      <div class="modal-body">
                        <img src="{{ asset($atributs_producte->foto_path) }}" style="display:block;margin:auto;width:100%">
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

          <button class="btn btn-primary" type="submit">Modificar</button>
          <a href="{{ url()->previous() }}" class="btn btn-primary">Cancel·lar</a>
        </form>

      
  </div>

@endsection
