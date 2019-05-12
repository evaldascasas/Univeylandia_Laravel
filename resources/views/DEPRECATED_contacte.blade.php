@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- CONTACTE -->
<div id="app" class="container jumbotron mt-3">
  <div class="row">
      <div class="col-sm-12">
        <h3 class="font-weight-bold text-center text-uppercase">Formulari de contacte</h3>
      </div>
  </div>
  <input-form></input-form>
</div>
<!--  FI CONTACTA -->
<script src="https://unpkg.com/vue"></script>
<script src="{{ asset('js/contacte.js') }}"></script>
@endsection

@section("footer")
@endsection