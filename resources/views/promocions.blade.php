@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- Promocions -->
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-12">
            <a href="/promocions" style="text-decoration: none;color:black;">
                <h1 class="font-weight-bold text-center text-uppercase">promocions</h1>
            </a>
        </div>
    </div>
    <div class="row">
        @forelse($promocions as $promocio)
        <div class="col-sm-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
              <img class="card-img-top" alt="imatge de la promocio" style="width: 200px;height: 300px; object-fit: cover;" src="{{$promocio->path_img}}">

                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a class="text-dark">{{$promocio->titol}}</a>
                    </h3>
                    <p class="card-text mb-auto">{!!html_entity_decode(str_limit($promocio->descripcio, $limit=200, $end
                        = "..."))!!}</p>
                    <form action="{{ route('promocio',$promocio->id)}}" method="get">
                        <input type="hidden" name="id" value="{{$promocio->id}}">
                        <button type="submit" class="btn btn-outline-info">Continuar llegint</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han promocions a llistar</p>
        @endforelse
    </div>
    <div style="display: table;margin: 0 auto;"> {{ $promocions->links() }} </div>
</div>

@endsection
@section("footer")
@endsection
