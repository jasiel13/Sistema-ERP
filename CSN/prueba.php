<!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Highcharts Example</title>
    <?php
        error_reporting(0);
        date_default_timezone_set('America/Mexico_City');
        //preguntamos la zona horaria
        $zonahoraria = date_default_timezone_get();
        $hora2=date('G:i'); 

$coche = $_GET['coche'];
$modelo = $_GET['modelo'];
$color = $_GET['color'];
echo "El coche es de la marca $coche, el modelo es un $modelo y su color es $color";
    ?>
    <style type="text/css">
#container {
  min-width: 310px;
  max-width: 800px;
  height: 400px;
  margin: 0 auto
}
    </style>
  </head>
  <body>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
<br>
<div id="container"></div>
    <script type="text/javascript">

Highcharts.chart('container', {

    title: {
        text: 'Proyeccion de Ventas'
    },

    subtitle: {
        text: ' Balanced Scorecard Ventas'
    },

    yAxis: {
        title: {
            text: 'Montos'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    xAxis: {
        categories: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4']
    },

    series: [{
        name: 'Prueba 1',
        data: [860000000, 525030000, 571770000, 696580000]
    }, {
        name: 'Prueba 2',
        data: [249160000, 240640000, 297420000, 298510000]
    }, {
        name: 'Prueba 3',
        data: [117440000, 177220000, 160050000, 197710000]
    }, {
        name: 'prueba 4',
        data: [null, null, 79880000, 121690000]
    }, {
        name: 'Other',
        data: [129080000, 59480000, 81050000, 112480000]
    }]

});
    </script>
  </body>
</html>
