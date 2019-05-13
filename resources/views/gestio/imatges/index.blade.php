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
    <div class="col-12 mb-2">
        <div class="row">
            @forelse($images as $image)
            <a href="{{ asset($image->foto_path_aigua) }}" data-toggle="lightbox" data-gallery="example-gallery" 
                data-title="{{ $image->nom_atraccio }} - {{ $image->created_at }}" 
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
</div>
@endsection