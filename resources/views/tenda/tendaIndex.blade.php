@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="font-weight-bold text-center text-uppercase">tenda</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <img src="/img/tenda_fotos.jpg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover">
                <div class="card-body align-self-center">
                    <a href="{{URL::route('tendaFotos')}}" class="btn btn-primary">Fotos</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
        <div class="card">
              <img src="/img/tendaRoba.jpg " class="card-img-top" alt="..." style="height: 300px; object-fit: cover">
            <div class="card-body align-self-center">
                <a href="#" class="btn btn-primary">Roba Univeylandia</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <img src="/img/Merchandising.jpg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover">
            <div class="card-body align-self-center">
                <a href="#" class="btn btn-primary">Merchandising Univeylandia</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section("footer")
@endsection
