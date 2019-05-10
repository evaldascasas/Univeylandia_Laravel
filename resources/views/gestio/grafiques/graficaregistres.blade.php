@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")
<script src="{{ asset('js/highcharts.js') }}"></script>
<script src="{{ asset('js/graficas.js') }}"></script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Usuaris registrats') }}</h1>
</div>

<div  class="row" >
    <div class="col-md-6">
        <label>Any</label>
            <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">
                <option value="2015" {{ $anio == 2015 ? 'selected' : '' }}>2015</option>
                <option value="2016" {{ $anio == 2016 ? 'selected' : '' }} >2016</option>
                <option value="2017" {{ $anio == 2017 ? 'selected' : '' }} >2017</option>
                <option value="2018" {{ $anio == 2018 ? 'selected' : '' }} >2018</option>
                <option value="2019" {{ $anio == 2019 ? 'selected' : '' }}>2019</option>
            </select>
    </div>

    <div class="col-md-6">
        <label>Mes</label>
            <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                <option value="1" {{ $mes == 1 ? 'selected' : '' }}>Gener</option>
                <option value="2" {{ $mes == 2 ? 'selected' : '' }}>Febrer</option>
                <option value="3" {{ $mes == 3 ? 'selected' : '' }}>Març</option>
                <option value="4" {{ $mes == 4 ? 'selected' : '' }}>Abril</option>
                <option value="5" {{ $mes == 5 ? 'selected' : '' }}>Maig</option>
                <option value="6" {{ $mes == 6 ? 'selected' : '' }}>Juny</option>
                <option value="7" {{ $mes == 7 ? 'selected' : '' }}>Juliol</option>
                <option value="8" {{ $mes == 8 ? 'selected' : '' }}>Agost</option>
                <option value="9" {{ $mes == 9 ? 'selected' : '' }}>Setembre</option>
                <option value="10" {{ $mes == 10 ? 'selected' : '' }}>Octubre</option>
                <option value="11" {{ $mes == 11 ? 'selected' : '' }}>Novembre</option>
                <option value="12" {{ $mes == 12 ? 'selected' : '' }}>Desembre</option>
            </select>
    </div>
</div>


<div  class="row" >
<br>
    <div class="col-md-12">
	    <div class="box box-primary">
		
            <div class="box-header">
		    </div>

	        <div class="box-body" id="div_grafica_lineas">
            </div>
	    
             <div class="box-footer">
		    </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        cargar_grafica_registres({{ $anio }}, {{ $mes }});
    });
</script>

@endsection