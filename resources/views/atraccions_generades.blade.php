@extends("layouts.plantilla")
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<style>


.full-width-image img {
  width: 100%;
  height: 70%;
  position: relative;
    display: inline-block;
    text-align: center;
}

.centrado{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.ml1 {
  font-weight: 900;
  font-size: 3.5em;
}

.ml1 .letter {
  display: inline-block;
  line-height: 1em;
}

.ml1 .text-wrapper {
  position: relative;
  display: inline-block;
  padding-top: 0.1em;
  padding-right: 0.05em;
  padding-bottom: 0.15em;
}

.ml1 .line {
  opacity: 0;
  position: absolute;
  left: 0;
  height: 3px;
  width: 100%;
  background-color: #fff;
  transform-origin: 0 0;
}

.ml1 .line1 { top: 0; }
.ml1 .line2 { bottom: 0; }

.letters{
  color: white;
}
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
             <h3>Descripcio</h3>
             <p class="card-text">{!! $atraccions->descripcio !!}</p>
           </div>
           <div class="col-sm-6 offset-md-3">
             <table id="t01" class="table table-striped">
               <tr>
                 <th><span><i class="fas fa-dice"></i></span> &nbsp;&nbsp;Tipus atraccio: </th>
                 <td style="height:30px">{{ $tipus_atraccio->tipus }}</td>
               </tr>
              <tr>
                <th><span><i class="fas fa-user"></i></span> &nbsp;&nbsp;Altura minima: &nbsp;&nbsp;&nbsp;&nbsp;</th>
                <td style="height:30px">{{ $atraccions->altura_min }}</td>
              </tr>
              <tr>
                <th><span><i class="fas fa-user"></i></span> &nbsp;&nbsp;Altura maxima: </th>
                <td style="height:30px">{{ $atraccions->altura_max }}</td>
              </tr>
              <tr>
                <th><span><i class="fas fa-wheelchair"></i></span> &nbsp;&nbsp;Accés per a minusvàlids: &nbsp;&nbsp;&nbsp;&nbsp;</th>
                @if($atraccions->accessibilitat == 1)
                <td style="height:30px">Si</td>
                @else
                <td style="height:30px">No</td>
                @endif
              </tr>
              <tr>
                <th><span><i class="fas fa-running"></i></span> &nbsp;&nbsp;Acces Express: </th>
                @if($atraccions->acces_express == 1)
                <td style="height:30px">Si</td>
                @else
                <td style="height:30px">No</td>
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
