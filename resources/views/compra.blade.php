@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<style>
  .fakeimg {
    height: 200px;
    background: #aaa;
}
input:focus {
border: 2px solid #7aa9ef;
background: #F3F3F3;
}
</style>
<div style="margin: 0 auto;display: table;">
  <h1> Formulari de compra </h1>
  <div class="container jumbotron" style="margin-top:30px">
    <form id="formulario" class="align-items-center justify-content-center d-flex" action="{{ route('compra_finalitzada')}}" onsubmit="return validar()">
      <div class="form-group">
        <div class="row">
            <label> Titular de la targeta </label>
            <input type="text" name="titular" class="form-control" required></input>
        </div>
        <div class="row">
            <label>Targeta Credit/Debit</label>
            <input type="text" name="ccNum" class="form-control" id="cardNum" required></input>
            <!-- <small id="targetaHelp" class="form-text text-muted">Acceptem Visa, MasterCard i EuroCard</small> -->
          <br>
          <div class="form-group">
            <div class="row">
              <div class="col-8">
                <label>Mes de caducitat</label>
                <select class="form-control" name="num_viatges_mod" style="width:60px;" required>
                  @for ($i = 01; $i <= 12; $i++)
                    <option value={{$i}}>{{$i}}</option>
                  @endfor
              </select>
              </div>
              <div class="col-8">
                <label>Any de caducitat</label>
                <select class="form-control" name="num_viatges_mod" style="width:120px;" required>
                  @for ($i = 0; $i <= 12; $i++)
                    <option value={{ date('Y')+$i }}>{{ date('Y')+$i }}</option>
                  @endfor
              </select>
              </div>
            </div>
            <label>Codi CVC2:</label>
            <input type="number" id="codi_cvc2" name="targeta_codi_secret" class="form-control" required></input>
            <br>
            <div class="row" style="display:none;">
              <div style="padding-left: 13px;">
                <input type="checkbox" value="condiciones" name="condiciones" id="condiciones" checked /> He llegit i accepto les <a href="https://www.youtube.com/watch?v=e7AeEOb9Ebg">condicions </a>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-success" type="submit" style="padding-left: 50px;padding-right: 50px;margin-left: -15px;">Pagar i finalitzar</button>
        <!-- <input type="button" value="Pagar" onclick="enviar()" class="btn btn-success" style="padding-left: 50px;padding-right: 50px;" /> -->
    </form>
  </div>
</div>
<script>
  function validar() {
    var elemento = document.getElementById("condiciones");
    var isValidcon = false;
    if (elemento.checked == true) {
      var isValidcon = true;
    } else {
      alert("Acepta les condicions");
    }

    var ccNum = document.getElementById("cardNum").value;
    var visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var mastercardRegEx = /^(?:5[1-5][0-9]{14})$/;
    var amexpRegEx = /^(?:3[47][0-9]{13})$/;
    var discovRegEx = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
    var isValid = false;

    if (visaRegEx.test(ccNum)) {
      isValid = true;
    } else if (mastercardRegEx.test(ccNum)) {
      isValid = true;
    } else if (amexpRegEx.test(ccNum)) {
      isValid = true;
    } else if (discovRegEx.test(ccNum)) {
      isValid = true;
    }else {
      alert("Targeta incorrecta");
    }

    var lcvc2 = document.getElementById("codi_cvc2").value;
    var isValidcvc = false;
    if (lcvc2.length != 3) {
      alert("Codi CVC2 incorrecte");
    }else {
      isValidcvc = true;
    }

    if (isValid && isValidcon && isValidcvc) {
    } else {
      return false;
    }
  }
</script>
@endsection
@section("footer")
@endsection
