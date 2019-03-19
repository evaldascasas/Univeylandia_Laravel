@extends("layouts.plantilla")

@section("menu1")
@endsection

@section("menu2")
@endsection

@section("content")
  <div class="container jumbotron text-center d-flex justify-content-center align-items-center" style="margin-top:30px">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="font-weight-bold text-center text-uppercase">Multimèdia</h3>
      </div>
      <div class="col-sm-12 border-bottom pt-3 pb-2 mb-3">
        <p class="text font-weight-bold">Vídeo de l'atracció Dragon Coaster</p>
        <video width="100%" controls preload>
          <source src="{{ asset('storage/multimedia/dragon_coaster.mp4') }}" type="video/mp4">
            <track kind="subtitles" srclang="cat" src="{{ asset('storage/multimedia/captions_dragon_coaster.vtt') }}" label="Català" default>
          El teu navegador no té suport per a elements de video.
        </video>
        <a class="btn btn-outline-primary" href="{{ asset('storage/multimedia/amusement_park.mp3') }}" download>Descarregar àudio descripció del vídeo</a>
      </div>
      <div class="col-sm-12 border-bottom pt-3 pb-2 mb-3">
        <p class="text font-weight-bold">So d'ambient del parc</p>
        <audio controls>
          <source src="{{ asset('storage/multimedia/amusement_park.mp3') }}" type="audio/mpeg">
          El teu navegador no té suport per a elements d'àudio.
        </audio>
      </div>
      <div class="col-sm-12">
          <p class="text font-weight-bold">Entrevista al client nº 10000 del parc</p>
          <audio controls>
            <source src="{{ asset('storage/multimedia/interview.mp3') }}" type="audio/mpeg">
            El teu navegador no té suport per a elements d'àudio.
          </audio>
          <br>
          <a class="btn btn-outline-primary" href="{{ asset('storage/multimedia/interview.txt') }}">Transcripció de l'àudio en format TXT</a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
      </div>
    </div>
  </div>

  <!-- Anunci -->
  <div class="container jumbotron text-center d-flex justify-content-center align-items-center" style="margin-top:30px">
    <div class=row>
      <div class="col-sm-12">
        <h5>Anuncis</h5>
        <iframe src="{{ asset('storage/anunci/anunci.html') }}" height="255" width="304"></iframe>
      </div>
    </div>
  </div>
  <!-- Fi Anunci -->




@endsection

@section("footer")
@endsection