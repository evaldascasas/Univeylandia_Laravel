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
<!-- ENTRADES -->
<div class="container" style="margin-top:30px">
    <form class="needs-validation" method="POST" action="{{ action('HomeController@parc_afegir_cistella') }}" id="form_ticket">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="nom">Tipus ticket</label>
            <select class="form-control" name="tipus_select" id="tipus_select">
                @foreach($tipus_producte as $tipus)
                <option value="{{ $tipus->id }}">{{ $tipus->nom }} || {{ $tipus->preu_base }}€</option>
                @endforeach
            </select>
        </div>
        <div id="viatges">
            <div class="form-group">
                <label for="nom">Viatges</label>
                <select class="form-control" name="num_viatges">
                    <option value=3>3 || Preu base + 5€</option>
                    <option value=6>6 || Preu base + 10€</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="nom">Quantitat</label>
            <select class="form-control" name="quantitat">
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
            </select>
        </div>
        <button class="btn btn-success" type="submit">Comprar</button>
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
<script>
    (function () {
        'use strict';
        /* jshint browser: true */
        var d = document;
        var mf = d.getElementById('form_ticket');
        var se = d.getElementById('viatges');
        var lo = d.getElementById('tipus_select')
        var temp;
        mf.reset();
        se.className = 'hide';
        lo.onchange = function () {
            if (this.value === '6' || this.value === '7') {
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
</script>
@endsection
@section("footer")
@endsection