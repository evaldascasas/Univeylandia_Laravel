@extends("layouts.plantilla")
<style>

</style>

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- foto -->
<div class="full-width-image">
  <img class="img-fluid" src="{{ $atraccions->path }}">
  <div class="centrado">
      <h1 class="ml1">
          <span class="text-wrapper">
              <span class="line line1"></span>
              <span class="letters">{{ $atraccions->nom_atraccio }} </span>
              <span class="line line2"></span>
          </span>
      </h1>
  </div>
</div>

<div class="container" style="margin-top:30px; text-align:justify">
  <div class="row">
      <div class="col-sm-12">
          <div class="jumbotron">
              <div class="card-body d-flex flex-column align-items-start">
                  <h3>{{ __('Descripció') }}</h3>
                  <p class="card-text">{!! $atraccions->descripcio !!}</p>
              </div>
              <div class="col-sm-6 offset-md-3">
                  <table id="t01" class="table table-striped">
                      <tr>
                          <th><span><i class="fas fa-dice"></i></span>{{ __('  Tipus atracció:') }}</th>
                          <td style="height:30px">{{ $tipus_atraccio->tipus }}</td>
                      </tr>
                      <tr>
                          <th><span><i class="fas fa-user"></i></span>{{ __('  Altura minima:') }}</th>
                          <td style="height:30px">{{ $atraccions->altura_min }}</td>
                      </tr>
                      <tr>
                          <th><span><i class="fas fa-user"></i></span>{{ __('  Altura màxima:') }}</th>
                          <td style="height:30px">{{ $atraccions->altura_max }}</td>
                      </tr>
                      <tr>
                          <th><span><i class="fas fa-wheelchair"></i></span>{{ __('  Accés per a minusvàlids:') }}</th>
                          @if($atraccions->accessibilitat == 1)
                          <td style="height:30px">{{ __('Si') }}</td>
                          @else
                          <td style="height:30px">{{ __('No') }}</td>
                          @endif
                      </tr>
                      <tr>
                          <th><span><i class="fas fa-running"></i></span>{{ __('  Accés Exprès:') }}</th>
                          @if($atraccions->acces_express == 1)
                          <td style="height:30px">{{ __('Si') }}</td>
                          @else
                          <td style="height:30px">{{ __('No') }}</td>
                          @endif
                      </tr>
                      </tr>
                  </table>
              </div>
            </div>
          <!-- llistar dades atraccio-->
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section("footer")
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script>
$('.ml1 .letters').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
  .add({
    targets: '.ml1 .letter',
    scale: [0.3,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 600,
    delay: function(el, i) {
      return 70 * (i+1)
    }
  }).add({
    targets: '.ml1 .line',
    scaleX: [0,1],
    opacity: [0.5,1],
    easing: "easeOutExpo",
    duration: 700,
    offset: '-=875',
    delay: function(el, i, l) {
      return 80 * (l - i);
    }
  }).add({
    targets: '.ml1',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });

</script>
@endsection
