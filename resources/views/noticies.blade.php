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
            <a href="/noticies" style="text-decoration: none;color:black;">
                <h1 class="font-weight-bold text-center text-uppercase">noticies</h1>
            </a>
        </div>
    </div>
    <div class="row">
        @forelse($noticies as $noticia)
        <div class="col-sm-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
              <img class="card-img-top" alt="imatge de la noticia" style="width: 200px;height: 300px; object-fit: cover;" src="{{$noticia->path_img}}">

                <div class="card-body d-flex flex-column align-items-start">
                    <form method="get">
                        <input type="hidden" name="catId" value="{{$noticia->catId}}">
                        <button class="d-inline-block mb-2 text-success" type="submit"
                            style="background: none;border: none;">{{$noticia->categoria}}</button>
                    </form>
                    <h3 class="mb-0">
                        <a class="text-dark">{{$noticia->titol}}</a>
                    </h3>
                    <p class="card-text mb-auto">{!!html_entity_decode(str_limit($noticia->descripcio, $limit=100, $end
                        = "..."))!!}</p>
                    <form action="{{ route('noticia',$noticia->id)}}" method="get">
                        <input type="hidden" name="id" value="{{$noticia->id}}">
                        <button type="submit" class="btn btn-outline-info">Continuar llegint</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han noticies a llistar</p>
        @endforelse
    </div>
    <div style="display: table;margin: 0 auto;"> {{ $noticies->links() }} </div>
</div>

@endsection
@section("footer")
@endsection
