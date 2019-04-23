@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<style>
  input:focus {
  border: 2px solid #7aa9ef;
  background: #F3F3F3;
}
</style>
   <div class="column col-7">
            @if($numeroTickets > 0)
                    @forelse($linia_cistella as $cistella)
                    <p style="display:none"> {{$total = $total + ($cistella->preu* $cistella->quantitat)}} </p>
                    @empty
                    @endforelse
            @endif
            @if($numeroFotos > 0)
                    @foreach($fotos as $cistellafoto)
                        <p style="display:none">
                            {{$total2 = $total2 + ($cistellafoto->preu * $cistellafoto->quantitat)}} </p>
                    @endforeach
                    @endif
                        <p style="display:none"> {{$compteTotal = $total + $total2}} </p>
</div> 
<div class="container jumbotron mt-3">
  <div class="row">
      <div class="col-sm-12">
        <h3 class="font-weight-bold text-center text-uppercase">Formulari de compra</h3>
      </div>
  </div>
    <form id="formulario" action="{{ route('compra_finalitzada')}}" onsubmit="return validar()">
      <div class="form-group">
        <label for="titular"> Titular de la targeta </label>
        <input type="text" name="titular" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Targeta Credit/Debit</label>
        <input type="text" name="ccNum" class="form-control" id="cardNum" required>
        <small class="form-text text-muted">Acceptem Visa, MasterCard i EuroCard</small>
      </div>
      <div class="form-group">
        <label for="num_viatges_mod">Mes de caducitat</label>
        <select class="form-control" name="num_viatges_mod" style="width:60px;" required>
          @for ($i = 01; $i <= 12; $i++)
          <option value={{$i}}>{{$i}}</option>
          @endfor
        </select>
      </div>
      <div class="form-group">
        <label for="num_viatges_mod">Any de caducitat</label>
        <select class="form-control" name="num_viatges_mod" style="width:120px;" required>
          @for ($i = 0; $i <= 12; $i++)
          <option value={{ date('Y')+$i }}>{{ date('Y')+$i }}</option>
          @endfor
        </select>
      </div>
      <div class="form-group">
        <label for="targeta_codi_secret">Codi CVC2:</label>
        <input type="number" id="codi_cvc2" name="targeta_codi_secret" class="form-control" required>
      </div>
      <div class="form-group">
        <div class="row" style="display:none;">
          <div style="padding-left: 13px;">
            <input type="checkbox" value="condiciones" name="condiciones" id="condiciones" checked /> He llegit i accepto les condicions </a>
          </div>
        </div>
      </div>
        <button class="btn btn-success" type="submit">Pagar i finalitzar</button>
        <a href="{{ URL::previous() }}" class="btn btn-secondary" value="Enrere">Enrere</a>
      </form>
      <form method="POST" id="payment-form" action="{!! URL::to('paypal') !!}">
          {{ csrf_field() }}
    	      <input  id="amount" type="text" name="amount" value="{{$compteTotal}}" hidden></p>
            <button class="btn btn-primary" type="submit">Pagar amb Paypal i finalitzar</button>
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
