@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Llistat d'imatges</h2>
</div>

<div class="row">
    @forelse($images as $image)
    <div class="col-1">
        <a href="#" data-toggle="modal" data-target="#modalFoto{{$image->id}}">
            <img src="{{ asset($image->thumbnail) }}" class="img-responsive img-thumbnail">
        </a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalFoto{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="modalFoto" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFoto">Imatge</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset($image->foto_path_aigua) }}" class="card-img">
                </div>
            </div>
        </div>
    </div>
    @empty
    No hi ha imatges.
    @endforelse
</div>



@endsection