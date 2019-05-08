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
    {{-- @forelse($images as $image) --}}
    <div class="col-12 mb-2">
        <div class="row">
            @forelse($images as $image)
            <a href="{{ asset($image->foto_path_aigua) }}" data-toggle="lightbox" data-gallery="example-gallery" 
                data-title="{{ $image->nom_atraccio }} - {{ $image->created_at }}" 
                {{-- data-footer=
                '<form action="{{ route('images.destroy', $image->name) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button id="confirm_delete" class="btn btn-danger" type="submit">{{ __('Eliminar') }}</button>
                </form>'  --}}
                class="col-sm-4 mb-2">
                <img src="{{ asset($image->foto_path_aigua) }}" class="img-fluid">
            </a>
            @empty
            <div class="alert alert-info alert-important btn-block">
                <strong>{{ __('No hi ha imatges.') }}</strong>
            </div>
            @endforelse
        </div>
    </div>

    {{-- <div class="col-lg-2 col-md-4 col-6 p-4">
        <a href="#" data-toggle="modal" data-target="#modalFoto{{$image->id}}">
            <img src="{{ asset($image->thumbnail) }}" class="img-fluid img-thumbnail">
        </a>
    </div> --}}
    {{-- <!-- Modal -->
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
    </div> --}}
    {{-- @empty
    <div class="alert alert-info alert-important">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ __('No hi ha imatges.') }}</strong>
    </div>
    @endforelse --}}
</div>




@endsection