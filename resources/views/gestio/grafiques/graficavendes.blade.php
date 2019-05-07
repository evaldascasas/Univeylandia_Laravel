@extends("layouts.gestio")

@section("navbarIntranet")
@endsection
@section("menuIntranet")
@endsection
@section("content")

<script src="{{ asset('js/highcharts.js') }}"></script>
<script src="{{ asset('js/graficas.js') }}"></script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grafica dels registres</h1>
</div>

<?php  $nombremes=array("","Gener","Febrer","Març","Abril","Maig","Juny","Juliol","Agost","Septembre","Octubre","Novembre","Decembre"); ?>

<div  class="row" >
    <div class="col-md-6">
        <label>Año</label>
            <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">
                <?php  echo '<option value="'.$anio.'" >'.$anio.'</option>';   ?>
                    <option value="2015" >2015</option>
                    <option value="2016" >2016</option>
                    <option value="2017" >2017</option>
                    <option value="2018">2018</option>
                    <option value="2019" >2019</option>
            </select>
    </div>

    <div class="col-md-6">
        <label>Mes</label>
            <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
                    <option value="1">Gener</option>
                    <option value="2">Febrer</option>
                    <option value="3">Març</option>
                    <option value="4">Abril</option>
                    <option value="5">Maig</option>
                    <option value="6">Juny</option>
                    <option value="7">Juliol</option>
                    <option value="8">Agost</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Decembre</option>      
            </select>
    </div>
</div>


<div  class="row" >
<br>
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
    cargar_grafica_vendes(<?= $anio; ?>,<?= intval($mes); ?>);
</script>

@endsection