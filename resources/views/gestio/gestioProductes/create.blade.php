@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Registrar producte</h1>
        </div>

        <form class="needs-validation" method="post" action="{{ route('productes.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="nom">Tipus producte</label>
              <select class="form-control" name="tipus">
                @foreach($tipus_producte as $tipus)
                <option value={{ $tipus->id }}>{{ $tipus->nom }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="cognom1">Mida</label>
              <input type="text" class="form-control form-control-sm" name="mida">
            </div>
            <div class="form-group">
              <label >Tickets viatges</label>
              <input type="number" class="form-control form-control-sm" name="tickets_viatges">
            </div>
            <div class="form-group">
              <label>Preu € (preu base del tipus de producte + el indicat)</label>
              <input type="number" class="form-control form-control-sm" name="preu" required>
            </div>
            <div class="form-group">
              <label>Descripcio</label>
              <input type="text" class="form-control form-control-sm" name="descripcio" required>
            </div>
            <div class="form-group">
              <label>Estat</label>
              <select class="form-control" name="estat">
                <option selected value=1>ACTIU</option>
                <option value=0>DESACTIVAT</option>
              </select>
            </div>
            <div class="form-group">
              <label>Imatge</label>
              <input type="file" name="image" class="form-control">
            </div>
          <button class="btn btn-primary" type="submit">Crear</button>
          <a href="{{ url()->previous() }}" class="btn btn-primary">Cancel·lar</a>
        </form>

      
    </div>
  </div>

@endsection
