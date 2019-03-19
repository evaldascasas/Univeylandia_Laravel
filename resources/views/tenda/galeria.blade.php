@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center text-uppercase">Atraccions </H1>
    </div>
  </div>

  <div class="row">
  @foreach($atraccions as $atraccio)
      <div class="col-sm-4" >
        <div class="card">
           <img class="card-img-top" width="100px" src="{{url('/')}}/{{ $atraccio->foto_path_aigua}}" alt="Card image" style="width:100%" >
           <div class="card-body d-flex flex-column align-items-start">
             <a href="{{url("/comprarFotos/{$atraccio->id}")}}" type="button" class="btn btn-primary">Comprar</a>
           </div>
        </div>
      </div>
  @endforeach
  </div>
</div>

@endsection
@section("footer")
@endsection
