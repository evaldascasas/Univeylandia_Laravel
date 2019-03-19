@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <form method="get">
    <!-- //{!! csrf_field() !!} -->
    <div class="input-group">
        <input type="text" class="form-control" name="nom_search"
            placeholder="Buscar..." value="{{ $reeee }}">
            <select class=".col-md-" name="tipus">
              @if (! is_null($tipus_search) && $tipus_search != -1)
              <option selected value={{ $tipus_search }}>{{ $tipus_producte_seleccionat->nom }}</option>
              <option value="-1">Tipus</option>
              @else
              <option selected value="-1">Tipus</option>
              @endif
              @foreach($tipus_producte as $tipus)
              @if ($tipus->id != $tipus_search)
              <option value={{ $tipus->id }}>{{ $tipus->nom }}</option>
              @else
              @endif
              @endforeach
            </select>
            <select class=".col-md-" name="estat">
              @if (! is_null($estat_search) && $estat_search != -1)
              @if ($estat_search != 0)
              <option selected value={{ $estat_search }}>Actiu</option>
              <option value=0>Desactivat</option>
              @else
              <option selected value={{ $estat_search }}>Desactivat</option>
              <option value=1>Actiu</option>
              @endif
              <option value="-1">Estat</option>
              @else
              <option selected value="-1">Estat</option>
              <option value=1>Actiu</option>
              <option value=0>Desactivat</option>
              @endif
            </select>
            <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                BUSCAR
            </button>
        </span>
    </div>
</form>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Tipus producte</td>
          <td>Mida</td>
          <td>Viatges tickets</td>
          <td>Path foto</td>
          <td>Path foto aigua</td>
          <td>Preu</td>
          <td>Descripcio</td>
          <td>Estat</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @forelse($productes as $producte)
        @if ($producte->estat === 0)
        <tr style="color:lightgrey;">
        @else
        <tr>
        @endif
            <td>{{$producte->id}}</td>
            <td>{{$producte->nom}}</td>
            <td>{{$producte->mida}}</td>
            <td>{{$producte->tickets_viatges}}</td>
            <td><a href="#" data-toggle="modal" data-target="#exampleModal{{$producte->id}}">{{$producte->foto_path}}</a></td>
            @if (! is_null($producte->foto_path))
            <!-- MODAL FOTO -->
            <div class="modal fade" id="exampleModal{{$producte->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" style="width:120%;">
                  <div class="modal-body">
                    <img src="{{ asset($producte->foto_path) }}" style="display:block;margin:auto;width:100%">
                  </div>
                </div>
              </div>
            </div>
            <!-- FI MODAL FOTO -->
            @else
            @endif
            <td>{{$producte->foto_path_aigua}}</td>
            <td>{{$producte->preu}}€</td>
            <td>{{$producte->descripcio}}</td>
            @if ($producte->estat === 1)
            <td>ACTIU</td>
            @else
            <td>DESACTIVAT</td>
            @endif

            <td><a href="{{ route('productes.edit',$producte->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('productes.destroy',$producte->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button id="confirm_delete" class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han productes a llistar</p>
        @endforelse
    </tbody>
  </table>
  <div style="display: table;margin: 0 auto;"> {{ $productes->links() }} </div>


@endsection
