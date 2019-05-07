@extends("layouts.plantilla")

@section("menu1")
@endsection

@section("menu2")
@endsection

@section("content")
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center">Atraccions</h1>
        </div>
    </div>

    <div class="row">
        @foreach($atraccions as $atraccio)
        <div class="col-sm-4 mb-2">
            <div class="card">
                <img class="card-img-top" src="{{ $atraccio->path }}" style="width:100%">
                <div class="card-body align-self-center">
                    <a href="{{ route('atraccions.fotos', $atraccio->id) }}" type="button"
                        class="btn btn-primary">{{ $atraccio->nom_atraccio }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section("footer")
@endsection