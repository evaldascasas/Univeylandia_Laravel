@extends("layouts.plantilla")


@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<style>
  html,body{

  height:100%;
  width:100%;

}
.foto{
  position: absolute;
  z-index: 0;
  /*height: 100%;*/
  height: 120%;
  background-image: url("img/atraccio.jpg");
}
.content{
  position: relative;
  height: 120%;
  z-index: 1;
  background: rgb(255,255,255);
    background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 40%);
}
.fototitol{
  margin-top: 50px;
  height: 100%;
    width: 255px;
    background: transparent;
}
.col-sm-12.col-md-4.offset-md-5.col-lg-4.offset-lg-5.col-xl-4.offset-xl-5 {
    height: 100%;
}
img.tick {
    height: 30px;
}
.secondfooter {
    background: black;
    color: white;
    height: 59px;
    margin-bottom: 0px;
    max-width: 100%;
}
.col-sm-12.col-md-12.col-lg-6.col-xl-6 {
    margin-top: 55px;
}
.contingut {
    padding-top: 60px;
}
.submit-contacte{
    width: 100%;
}
.message {
    padding-top: 30px;
}
.jumbotron.text-center.mt-3 {
    margin-top: 0px !important;
}
.container {
    margin-bottom: 25px;
}
</style>
  <div class="container-fluid foto"></div>
    <div class="foto"></div>
  <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4 offset-md-5 col-lg-4 offset-lg-5 col-xl-4 offset-xl-5">
            <img class= "fototitol" src="img/logo.png">
          </div>
        </div>
        <div class="row contingut">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
          <div class="row">
            <div class="col-sm-1 offset-sm-3 col-md-1 offset-md-3 col-lg-1 offset-lg-3 col-xl-1 offset-xl-3"><img class="tick" src="img/61343.svg"></div>
            <div class="col-lg-7"><h3>Contacta amb nosaltres</h3></div>
          </div>
          <div class="row">
            <div class="col-sm-1 offset-sm-3 col-md-1 offset-md-3 col-lg-1 offset-lg-3 col-xl-1 offset-xl-3"><img class="tick" src="img/61343.svg"></div>
            <div class="col-lg-7"><h3>Consulta'ns dubtes</h3></div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
          <form id="form">
              <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" aria-describedby="nameHelp" placeholder="Introdueix el nom">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email"  name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introdueix el correu">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Opcions</label>
                    <select class="custom-select" name="tipus_pregunta" id="tipus_pregunta">
                      <option value="" disabled selected>Selecciona una opció</option>
                      <option value="Entrades">Entrades</option>
                      <option value="Botiga">Botiga</option>
                      <option value="Horaris">Horaris</option>
                      <option value="Devolucions">Devolucions</option>
                      <option value="Comandes">Comandes</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Consulta</label>
                    <textarea class="form-control"  name="consulta" id="consulta" rows="3"></textarea>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="checkE" id="check1">
                    <label class="form-check-label" for="owo">Acceptar les condicions</label>
                  </div>
                  <button id="submit" type="submit" class="btn btn-primary submit-contacte">Submit</button>
                  <p id="sol"></p>
          </form>
        </div>
        </div>
      </div>
<script>



$(document).ready(function(){
   jQuery('#submit').click(function(e){
     e.preventDefault();
    if($("#nom").val() == ""  || $("#email").val() == "" || $("tipus_pregunta").val() == "" || $("#consulta").val() == "" || !($("#check1").is(':checked')))
        $("#sol").html("Revisa els camps")
     else

     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


  $.ajax({
      url: "contacte",
      type: "post",
      data: {
        nom: jQuery('#nom').val(),
        email: jQuery('#email').val(),
        tipus_pregunta: jQuery('#tipus_pregunta').val(),
        consulta: jQuery('#consulta').val()
      },
      success: function(result) {
          $("#submit").html("Enviat Correctament");
          $("#sol").html("Gracias");
         $("#submit").attr("disabled", true);

         $("#submit").removeClass("btn btn-primary");

         $("#submit").addClass("btn btn-success");

         $("#form")[0].reset();
          console.log(result);
      }});
  });
});

</script>

<!--  FI CONTACTA -->


<!--El chat-->
{{-- 
<div class="chatbox chatbox--tray chatbox--empty">
    <div class="chatbox__title">
        <h5><a href="#">Chat</a></h5>
        <button class="chatbox__title__tray">
            <span></span>
        </button>
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body">
        <div class="chatbox__body__message chatbox__body__message--left">

         @forelse($chat as $chats)

            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="Picture">
            <p>{{ $chats->msg }}</p>

            @empty
            <p>sense missatges</p>

            @endforelse


        </div>
    </div>

    <!--login al chat-->
    <form class="chatbox__credentials">
        <div class="form-group">
            <label for="inputName">Nom:</label>
            <input type="text" class="form-control" id="inputName" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Correu:</label>
            <input type="email" class="form-control" id="inputEmail" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Accedir </button>
    </form>

    <!--enviar-->
    <input class="chatbox__message" placeholder="Write something interesting"></input>
</div> --}}
@endsection

@section("footer")
@endsection
