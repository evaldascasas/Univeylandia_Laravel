@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<script src="{{ asset('js/highcharts.js') }}"></script>
<script src="{{ asset('js/graficas.js') }}"></script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Vendes') }}</h1>
</div>

<div  class="row" >
    <div class="col-md-6">
        <label>{{ __('Any') }}</label>
            <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">
                <option value="2015" {{ $anio == 2015 ? 'selected' : '' }}>2015</option>
                <option value="2016" {{ $anio == 2016 ? 'selected' : '' }} >2016</option>
                <option value="2017" {{ $anio == 2017 ? 'selected' : '' }} >2017</option>
                <option value="2018" {{ $anio == 2018 ? 'selected' : '' }} >2018</option>
                <option value="2019" {{ $anio == 2019 ? 'selected' : '' }}>2019</option>
            </select>
    </div>

    <div class="col-md-6">
        <label>{{ __('Mes') }}</label>
            <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                <option value="1" {{ $mes == 1 ? 'selected' : '' }}>{{ __('Gener') }}</option>
                <option value="2" {{ $mes == 2 ? 'selected' : '' }}>{{ __('Febrer') }}</option>
                <option value="3" {{ $mes == 3 ? 'selected' : '' }}>{{ __('Març') }}</option>
                <option value="4" {{ $mes == 4 ? 'selected' : '' }}>{{ __('Abril') }}</option>
                <option value="5" {{ $mes == 5 ? 'selected' : '' }}>{{ __('Maig') }}</option>
                <option value="6" {{ $mes == 6 ? 'selected' : '' }}>{{ __('Juny') }}</option>
                <option value="7" {{ $mes == 7 ? 'selected' : '' }}>{{ __('Juliol') }}</option>
                <option value="8" {{ $mes == 8 ? 'selected' : '' }}>{{ __('Agost') }}</option>
                <option value="9" {{ $mes == 9 ? 'selected' : '' }}>{{ __('Setembre') }}</option>
                <option value="10" {{ $mes == 10 ? 'selected' : '' }}>{{ __('Octubre') }}</option>
                <option value="11" {{ $mes == 11 ? 'selected' : '' }}>{{ __('Novembre') }}</option>
                <option value="12" {{ $mes == 12 ? 'selected' : '' }}>{{ __('Desembre') }}</option>
            </select>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
	    <div class="box box-primary">
		
            <div class="box-header">
		    </div>

	        <div class="box-body" id="div_grafica_vendes">
            </div>
	    
             <div class="box-footer">
		    </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        cargar_grafica_vendes({{ $anio }}, {{ $mes }});
    });
</script>

@endsection