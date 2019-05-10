
function cambiar_fecha_grafica() {

    var anio_sel = $("#anio_sel").val();
    var mes_sel = $("#mes_sel").val();

    cargar_grafica_registres(anio_sel, mes_sel);
    cargar_grafica_vendes(anio_sel, mes_sel);
}

function cargar_grafica_registres(anio, mes) {

    var options = {
        chart: {
            renderTo: 'div_grafica_lineas',

        },
        title: {
            text: 'Registres d\'usuaris',
            x: -20 //center
        },
        subtitle: {
            text: 'Parc Univeylandia',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Registres per dia'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Registres'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: ' Registres',
            data: []
        }]
    }

    $("#div_grafica_lineas").html($("#cargador_empresa").html());
    var url = "registres/" + anio + "/" + mes + "";
    $.get(url, function (resul) {
        var datos = jQuery.parseJSON(resul);
        var totaldias = datos.totaldias;
        var registrosdia = datos.registrosdia;
        var i = 0;
        for (i = 1; i <= totaldias; i++) {

            options.series[0].data.push(registrosdia[i]);
            options.xAxis.categories.push(i);


        }
        //options.title.text="aqui e podria cambiar el titulo dinamicamente";
        chart = new Highcharts.Chart(options);

    })


}

function cargar_grafica_vendes(anio, mes) {

    var options = {
        chart: {
            renderTo: 'div_grafica_vendes',

        },
        title: {
            text: 'Vendes',
            x: -20 //center
        },
        subtitle: {
            text: 'Parc Univeylandia',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Vendes per dia'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Vendes'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: ' Vendes',
            data: []
        }]
    }

    $("#div_grafica_vendes").html($("#cargador_empresa").html());
    var url = "ventes/" + anio + "/" + mes + "";
    $.get(url, function (resul) {
        var datos = jQuery.parseJSON(resul);
        var totaldias = datos.totaldias;
        var registrosdia = datos.registrosdia;
        var i = 0;
        for (i = 1; i <= totaldias; i++) {

            options.series[0].data.push(registrosdia[i]);
            options.xAxis.categories.push(i);


        }
        //options.title.text="aqui e podria cambiar el titulo dinamicamente";
        chart = new Highcharts.Chart(options);

    })


}
