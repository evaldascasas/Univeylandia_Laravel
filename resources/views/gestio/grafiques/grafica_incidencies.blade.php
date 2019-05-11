@extends("layouts.gestio")

@section("content")

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Incidències') }}</h1>
</div>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script src="https://code.highcharts.com/highcharts.src.js"></script>
		<script type="text/javascript">
      Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Incidències registrades mensualment'
        },
        subtitle: {
            text: 'Any 2019'
        },
        xAxis: {
            categories: ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Desembre'],
            tickmarkPlacement: 'on',
            title: {
                text: 'Mes'
            }
        },
        yAxis: {
            title: {
                text: 'Incidències'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ' incidències'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'Incidències reportades',
            data: [{{$gener}}, {{$febrer}}, {{$març}}, {{$abril}}, {{$maig}}, {{$juny}}, {{$juliol}}, {{$agost}}, {{$setembre}}, {{$octubre}}, {{$novembre}}, {{$desembre}}]
        }]
    });
	</script>
@endsection