@extends("layouts.plantilla")
<style media="screen">
    .hide  {
    display: none;
 }
</style>
@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
@if(session()->get('success'))
<div class="uper">
    <div class="alert alert-success" style="text-align:center;">
        {{ session()->get('success') }}
    </div>
</div>
@endif

@if(session()->get('error'))
<div class="uper">
    <div class="alert alert-danger" style="text-align:center;">
        {{ session()->get('error') }}
    </div>
</div>
@endif
<div class="row" style="margin-top:20px;">
    <div class="col-sm-12">
            <h1 class="font-weight-bold text-center text-uppercase">validació de tickets</h1>
    </div>
</div>

<div class="container" style="margin-top:30px">
  <form  class="needs-validation" method="POST" action="{{ route('validacio_accio')}}" id="form_validacio" >
    @method('POST')
    @csrf
    <div class="form-group">
    <label for="tipus_cua">Ticket</label>
    <input type="number" name="ticket" placeholder="Ticket..." class="form-control" autofocus/>
    </div>
    <div class="form-group">
    <label for="tipus_cua">Lloc de validació</label>
    <select class="form-control" name="atraccio_selector" id="atraccio_select">
      <option value="-1" express = "0">Entrada del parc</option>
      @if(! is_null(session()->get('atraccio_seleccionada')))
      <option selected value={{ session()->get('atraccio_seleccionada')->id }} express = {{ session()->get('atraccio_seleccionada')->acces_express }}>{{ session()->get('atraccio_seleccionada')->nom_atraccio }}</option>
      @endif
      @foreach($atraccions as $atraccio)
      @if(session()->get('atraccio_seleccionada') != $atraccio)
      <option value={{ $atraccio->id }} express={{ $atraccio->acces_express }}>{{ $atraccio->nom_atraccio }}</option>
      @endif

      @endforeach
    </select>
  </div>
  <div id="tipus_cua_div">
    <div class="form-group">
      <label for="tipus_cua">Tipus de cua</label>
      <select class="form-control" name="tipus_cua_selector" id="tipus_cua_select">
        @if(! is_null(session()->get('tipus_cua')))
        @if(session()->get('tipus_cua') == 0)
        <option value="0" selected>Normal</option>
        <option value="1">Express</option>
        @else
        <option value="1" selected>Express</option>
        <option value="0" >Normal</option>
        @endif
        @else
        <option value="0" selected>Normal</option>
        <option value="1">Express</option>
        @endif

      </select>
    </div>
  </div>

</form>
@if(session()->get('ticket'))
<div>
    <div class="alert alert-info" style="overflow: auto;">
      <h1 style="text-align: center;"> INFORMACIÓ DEL TICKET </h1>
      <hr />
      <p> <b>ID:</b> {{ session()->get('ticket')->id }} </p>
      <p> <b>Tipus entrada:</b> {{ session()->get('tipus_ticket')->nom }} </p>
      @if(session()->get('tipus_ticket')->id == 6 || session()->get('tipus_ticket')->id == 7)
      <p> <b>Número viatges:</b> {{ session()->get('ticket_atributs')->tickets_viatges }} </p>
      @endif
      <p> <b>Data entrada al parc:</b> {{ session()->get('ticket_atributs')->data_entrada }} </p>
    </div>
</div>
@endif

</div>
<script>
    (function () {
        'use strict';
        /* jshint browser: true */
        var d = document;
        var mf = d.getElementById('form_validacio');
        var se = d.getElementById('tipus_cua_div');
        var lo = d.getElementById('atraccio_select')
        var temp;
        mf.reset();
        se.className = 'hide';
        lo.onchange = function () {
            if (this.options[this.selectedIndex].getAttribute("express") === '1') {
                se.className = se.className.replace('hide', '');
            }
            else {
                temp = this.value;
                se.className = 'hide';
                mf.reset();
                lo.value = temp;
            }
        };
    }());

      function load() {
        var lo = document.getElementById('atraccio_select')
        if (lo.options[lo.selectedIndex].getAttribute("express") === '1') {
            document.getElementById("tipus_cua_div").removeAttribute("class");
        }
      }
      window.onload = load;
</script>
@endsection
@section("footer")
@endsection
