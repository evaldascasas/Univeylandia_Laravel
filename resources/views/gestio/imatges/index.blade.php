@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Galeria d'imatges</h2>
</div>

<div class="row">
    @forelse($images as $image)
    <div class="col-lg-2 col-md-4 col-6 p-4">
        <a href="#" data-toggle="modal" data-target="#modalFoto{{$image->id}}">
            <img src="{{ asset($image->thumbnail) }}" class="img-fluid img-thumbnail">
        </a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalFoto{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="modalFoto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $image->nom_atraccio }} - {{ $image->created_at }}</h5>
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