@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- SLIDER-->
<div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/img/slider1.jpg" alt="imatge del parc">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/slider2.jpg" alt="imatge del parc">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/slider3.jpg" alt="imatge del parc">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Prèvia</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Següent</span>
  </a>
</div>
<!-- FI SLIDER -->

<!-- PROMOCIONS -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center">TOP PROMOCIONS 2018-2019</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <img src="/img/promocions/promocio1.jpg" class="img-fluid" alt="imatge promoció 1">
    </div>
  </div>
</div>
<!-- FI PROMOCIONS -->

<!-- NOTICIES -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center text-uppercase">noticies</h1>
    </div>
  </div>
  <div class="row">
    @forelse($noticies as $noticia)
    <div class="col-sm-6">
      <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
            <button class="d-inline-block mb-2 text-success" type="submit" style="background: none;border: none;">{{$noticia->categoria}}</button>
          <h3 class="mb-0">
            <a class="text-dark">{{$noticia->titol}}</a>
          </h3>
            <p class="card-text mb-auto">{!!html_entity_decode(str_limit($noticia->descripcio, $limit=200, $end = "..."))!!}</p>
            <form action="{{ route('noticia',$noticia->id)}}" method="get">
              <input type="hidden" name="id" value="{{$noticia->id}}">
              <button type="submit" class="btn btn-outline-info">Continuar llegint</button>
            </form>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="imatge de la noticia" style="width: 200px;height: 300px;" src="{{$noticia->path_img}}">
    </div>
  </div>
  @empty
  <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han noticies a llistar</p>
  @endforelse
</div>
<!-- FI NOTICIES -->

<!-- LOCALITZA -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center">ON ESTEM?</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <iframe title="Localitzacio del parc"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d192184.82159763432!2d1.129910761830178!3d41.180613533420534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe10dd3fa1290f47!2sTANATORI+RIOS+HEVIA!5e0!3m2!1sca!2ses!4v1541009987889" width="100%" height="200px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</div>
<!-- FI LOCALITZA -->
</div>

@endsection

@section("footer")
@endsection
