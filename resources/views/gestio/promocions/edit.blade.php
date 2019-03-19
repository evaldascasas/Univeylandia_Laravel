@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar promoció</h1>
</div>

<form class="needs-validation" method="post" action="{{ route('promocions.update', $promocio->id)}}"
    enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="cognom1">Títol</label>
        <input type="text" class="form-control" name="titol" value={{ $promocio->titol }}>
    </div>
    <div class="form-group">
        <label>Descripció</label>
        <textarea name="descripcio" id="descripcio_atraccio">{{ $promocio->descripcio }}</textarea>
    </div>
    <div class="form-group">
        @if (! is_null($promocio->path_img))
        <label>Imatge</label> <img src="https://image.flaticon.com/icons/png/512/16/16647.png" data-toggle="modal"
            data-target="#exampleModal{{$promocio->id}}" style="width:20px">
        <!-- MODAL FOTO -->
        <div class="modal fade" id="exampleModal{{$promocio->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body align-self-center">
                        <img src="{{ asset($promocio->path_img) }}">
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

    <button class="btn btn-outline-primary" type="submit">Modificar</button>
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel·lar</a>
</form>
</div>

@endsection
