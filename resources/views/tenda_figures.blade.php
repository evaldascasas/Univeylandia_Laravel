@extends("layouts.plantilla")
<style>
#dino{
  width: 100px;
  /*display: block;*/
  display: none;
  height: 150px;
  background-color: red;
  border-radius: 5px;
  background: url(http://31.media.tumblr.com/2e8986a1b1c062623cea1b9edaddcc52/tumblr_mup3qzOPsX1rk0k2jo1_500.gif);
  background-size: 100px 150px;
  position: relative;
  -webkit-animation-name: example;
  -webkit-animation-duration: 10s;
  -webkit-animation-iteration-count: infinite;
  animation-name: example;
  animation-duration: 10s;
  animation-iteration-count: infinite;"
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
    0%   {background-color:red; left:400px; top:0px;}
    25%  {background-color:yellow; left:900px; top:0px;}
    50%  {background-color:blue; left:900px; top:750px;}
    75%  {background-color:green; left:400px; top:750px;}
    100% {background-color:red; left:400px; top:0px;}
}

/* Standard syntax */
@keyframes example {
  0%   {background-color:red; left:0px; top:50px;}
  25%  {background-color:yellow; left:800px; top:50px;}
  50%  {background-color:blue; left:800px; top:-20px;}
  75%  {background-color:green; left:0px; top:-20px;}
  100% {background-color:red; left:0px; top:50px;}
}
  width: 1800px;
  height: 500px;
  float: left;
  background: url(http://31.media.tumblr.com/2e8986a1b1c062623cea1b9edaddcc52/tumblr_mup3qzOPsX1rk0k2jo1_500.gif);
  background-color: yellow;
  background-size: 100%;
  animation-iteration-count: infinite;
@keyframes example {
    0%   {background-color:red; left:400px; top:60px;}
    25%  {background-color:yellow; left:900px; top:60px;}
    50%  {background-color:blue; left:900px; top:700px;}
    75%  {background-color:green; left:400px; top:700px;}
    100% {background-color:red; left:400px; top:60px;}
}

</style>
@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")

<div style="display: table; margin: 0 auto; margin-top: 50px; width: 80%;">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <button id="imatges_button" class="btn btn-outline-secondary">Mostrar/amagar imatges</button>
  <script src="/js/test.js"> </script>
  <div id="flip" style="  padding: 5px; text-align: center; background-color: #212529; border: solid 1px #c3c3c3; color:white; font-weight: bold;">Mostrar o amagar la cistella</div>
  <div id="taula_generada" style="margin-bottom: 50px;">

    <table id="data-table" class="table table-hover table-striped">
      <thead id="header_taula">
      </thead>
      <tbody id="tbody">
      </tbody>
    </table>
    <div id="dino">
      <h1 style="width: 500px; margin-left: 100px;"> Promoció: fes la compra ara i ahorra't els gastos d'enviament! </h1>
    </div>
</div>
<button id="hide" class="btn btn-primary" >Amagar dino</button>
<button id="show" class="btn btn-primary" style="margin-left:20px;">Mostrar dino</button>
<button id="mutar" class="btn btn-primary" style="margin-left:20px;">Mutar dino</button>
<button id="btnapp" class="btn btn-primary" style="margin-left:20px;">Afegir</button>
<button id="dimensions" class="btn btn-primary" style="margin-left:20px;">¿Dimensions dino?</button>
<button onclick="location.href = '/compra.html';" class="btn btn-primary" style="margin-left:20px;" onmouseover="bigImg(this)" onmouseout="normalImg(this)">Comprar</button>
<p> text </p>
<p id="dino_dim">  </p>
<div id="updown">Press down and release the mouse button over this div element.</div>
<div onmousemove="myFunction(event)" onmouseout="clearCoor()" style="width: 200px;height: 100px;border: 1px solid black;"></div>
Nom: <input type="text" id="ok">
<p>Keypress: <span id="contador">0</span></p>
</div>
<p id="demo"></p>


@endsection
@section("footer")
@endsection
