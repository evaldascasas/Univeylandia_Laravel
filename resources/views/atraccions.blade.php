@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- NOTICIES -->
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center text-uppercase">Atraccions </1>
    </div>
  </div>

  <div class="row">
  @foreach($atraccionetes as $atraccio)
      <div class="col-sm-4 mb-3">
        <div class="card">
           <img class="card-img-top" width="100px" src="{{ $atraccio->path }}" alt="Card image" style="width:100%" >
           <div class="card-body d-flex flex-column align-items-start">
             <h4 class="card-title">{{ $atraccio->nom_atraccio }}</h4></a>
             <p class="card-text" id="descripcio">{!! html_entity_decode(str_limit($atraccio->descripcio, $limit = 200, $end = '...')) !!}</p>
             <h4 class="card-title">   <a href="{{ route('atraccions_generades', $atraccio->id)}}" class="btn btn-primary btn-sm">Més informació</h4></a>

           </div>
        </div>
  </div>
  @endforeach

</div>
</div>
</div>
</div>

@endsection
@section("footer")
@endsection
