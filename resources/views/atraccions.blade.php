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
      <div class="col-sm-4" >
        <div class="card">
           <img class="card-img-top" width="100px" src="{{ $atraccio->path }}" alt="Card image" style="width:100%" >
           <div class="card-body d-flex flex-column align-items-start">
             <h4 class="card-title">   <a href="{{ route('atraccions_generades', $atraccio->id)}}" class="btn btn-primary btn-sm">{{ $atraccio->nom_atraccio }}</h4></a>
             <p class="card-text">{!! $atraccio->descripcio !!}</p>
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
