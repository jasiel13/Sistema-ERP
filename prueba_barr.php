<!DOCTYPE html>
<html lang="es">
<head>
    <title>Usando highcharts </title>
    <meta charset="utf-8" />
    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
  
    
</head>
<body>
   <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    
    <script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'TIEMPOS DE RESPUESTA'
    },
    subtitle: {
        text: 'GRAFICA'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'FUERA DE TIEMPO'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> fuera de tiempo<br/>'
    },

    series: [{
        name: 'columna',
        colorByPoint: true,
        data: [{
            name: 'PRECIO',
            y: 6,
            drilldown: 'PRECIO'
        }, {
            name: 'T.E',
            y: 2,
            drilldown: 'T.E'
        }, {
            name: 'COMPRA',
            y: 5,
            drilldown: 'COMPRA'
        }, {
            name: 'FLETE',
            y: 4,
            drilldown: 'FLETE'
        }, {
            name: 'INFORMACION',
            y: 1,
            drilldown: 'Opera'
        }, {
            name: 'MUESTRA',
            y: 0,
            drilldown: null
        }]
    }],
    drilldown: {
        series: [{
            name: 'PRECIO',
            id: 'PRECIO',
            data: [
                [
                    'v7.0',
                    6
                ]
            ]
        }, {
            name: 'COMPRA',
            id: 'COMPRA',
            data: [
                [
                    'v30.0',
                    2
                ]
            ]
        }, {
            name: 'Firefox',
            id: 'Firefox',
            data: [
                [
                    'v35',
                    5
                ]
            ]
        }, {
            name: 'Safari',
            id: 'Safari',
            data: [
                [
                    'v8.0',
                    4
                ]
            ]
        }, {
            name: 'Opera',
            id: 'Opera',
            data: [
                [
                    'v12.x',
                    1
                ]
            ]
        }]
    }
});
    </script>
</body>
</html>