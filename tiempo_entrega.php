<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tiempo De Entrega a Domicilio (Facturas)</title>
<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
<style type="text/css">

.bg2{color:#FF0000;}
.bg1{color:#0049FF;}

#table{	width:50%;}

	table{width:100%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2;font-size:12px;}
	th {background: #94BDAB;color:#fff;border: solid black; border-width:2px;font-size:14px;height:50px;}
	td {padding:2px;border:solid black;border-width:1px;}

tr:nth-child(odd)
{
   background:#F8F9F9;
   color: black;
}
 
tr:nth-child(even)
{
  background:#F8F9F9;
  color: #000000;
}

thead,tbody tr{
    display:table;
    width:100%;
    table-layout:fixed;
}
thead {    
    position:fixed;
    top:0;
}

 .boton_1{
    text-decoration: none;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 12px;
    font-style: italic;
    color:#000000;
    background-color:#BAE5DD;
    border-radius: 15px;
    border: 3px double #006505;
  }
  .boton_1:hover{
    opacity: 0.6;
    text-decoration: none;
  }
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
</head>

<body>
<div align="center">
<br>
<br>
<br>
<table>	
<thead>
<tr>
	<th>Factura</th>
	<th>Fecha Factura</th>
	<th width="150">Cliente</th>
	<th>Hora Salida</th>
	<th>Hora Entrega</th>
	<th>Hora Llegada</th>
	<th>Fecha Entrega</th>
	<th>H.Recibo Factura Almacen</th>
	<th>Chofer</th>
	<th>Vehiculo</th>
	<th width="90">Direccion</th>
	<th width="130">Observaciones</th>
	<!--<th>Tiempo Final de entrega</th>-->	
	<th>Estatus</th>
</tr>
</thead>

<?php
error_reporting(0);
include('conexion.php');
$fecha1=$_POST['finicio'];
$fecha2=$_POST['ffin'];
$contat=0;$contft=0;
$query=mysql_query("SELECT factura, fechafactura, cliente, hrasalida, hraentrega, hrallegada,fechaentrega,horarecibido, chofer, vehiculo, direccion, observaciones from facturacion where estatus='ENTREGA DOMICILIO' AND fechafactura >= '$fecha1' AND fechafactura <= '$fecha2' order by fechafactura DESC");
$cont=mysql_num_rows($query);
if ($cont>0)
{

	while ($array=mysql_fetch_array($query))
	{
        $fefac=$array[1];
        $feent=$array[6];
        $recfac=$array[7];
		$hrini=$array[3];
	 	$hrfin=$array[4];
	 	//hora de llegada menos hora de salida daba informacion en minutos
	 	//$diferencias = strtotime($hrfin) - strtotime($hrini);	
	 	//$mins=$diferencias/60;

             //HORARIO DE 8:30 A 1:30
	 		$horalimite=strtotime("18:00:00");
	 		$hentrega=strtotime($hrfin);
	 	
	 		$hora1=strtotime("08:30:00");
	 		$hora2=strtotime("13:30:00");	 		
	 		$hrecfac=strtotime($recfac);

	 		//HORARIO DE 1:30 A 18:00
	 		$hora3=strtotime("13:31:00");
	 		$hora4=strtotime("18:00:00");
	 		/*$hora5=("18:00:00");
	 		  $horali=date($hora5);
	 		  $horalimite2=date('H:i:s', strtotime($horali.' +19 hours'.' +30 minutes'));
	 		  */
	 		  $horali=date("18:00:00");
              $HL=strtotime($horali);
              $horalimite2=date("H:i:s",mktime(date("H",$HL)+19,date("i",$HL)+30,date("s",$HL)));             

     	 	$f=date($fefac);
	 		$fechalimite=date('Y-m-d', strtotime($f.' +1 days'));

	 		$dia=date($fefac);
	 		$S=date("w", strtotime($dia));

	 		//HORARIO DE SABADO
	 		$hora5=strtotime("08:30:00");
	 		$hora6=strtotime("14:00:00");

	 		$f=date($fefac);
	 		$fechalimite2=date('Y-m-d', strtotime($f.' +2 days'));	

	 		if($S!="6")
	 		{ 
	 	    if($hrecfac>=$hora3 and $hrecfac<=$hora4) 
	 	    { 	 	  
	 		 if($hentrega>strtotime($horalimite2) and strtotime($feent)==strtotime($fefac))                              
	 		  {
	 		  	$status="<label class='bg1' title='Facturas recibidas de la 13:31pm a las 18:00pm están en tiempo si se entregan hasta la 13:30pm del día siguiente, sino estaran fuera de tiempo'
	 		  	>A TIEMPO</label>";
	 		  	$contat=$contat+1;
	 		  }
	 		  else
	 		  { 
	 		   if($hentrega>strtotime($horalimite2) or strtotime($feent)>strtotime($fechalimite)) 
	 		   { 
	 		  	 $status="<label class='bg2' title='Facturas recibidas de la 13:31pm a las 18:00pm están en tiempo si se entregan hasta las 13:30pm del día siguiente, sino estaran fuera de tiempo'
	 		  	 >FUERA DE TIEMPO</label>";
	 		  	 $contft=$contft+1;
	 		  }
	 		  else
	 		  {
	 		  	$status="<label class='bg1' title='Facturas recibidas de la 13:31pm a las 18:00pm están en tiempo si se entregan hasta la 13:30pm del día siguiente, sino estaran fuera de tiempo'
	 		  	>A TIEMPO</label>";
	 		  	$contat=$contat+1;	 		  	
	 		  }
	 		}
	 	 }
	 		else if($hrecfac>=$hora1 and $hrecfac<=$hora2) 
	 		{
	 		   if($hentrega>$horalimite or strtotime($feent)>strtotime($fefac))
	 		   	 {
	 		  	   $status="<label class='bg2' title='Facturas recibidas de las 8:30am a la 13:30pm están en tiempo si se entregan hasta las 18:00pm, del mismo día, sino estaran fuera de tiempo'
	 		  	   >FUERA DE TIEMPO</label>";
	 		  	    $contft=$contft+1;	 
	 		     }
	 		      else
	 		      {    
	 		     	$status="<label class='bg1' title='Facturas recibidas de las 8:30am a la 13:30pm están en tiempo si se entregan hasta las 18:00pm, del mismo día, sino estaran fuera de tiempo'
	 		     	>A TIEMPO</label>";
	 		     	$contat=$contat+1;
	 		      }
	 		    }
	 		  } 	 	  
	 	 else
	 	 {
	 	 	 if($hrecfac>=$hora5 and $hrecfac<=$hora6)
	 	 	 {
	 	 	 	if($hentrega>$horalimite or strtotime($feent)>strtotime($fechalimite2))                              
	 		  {
	 		  	 $status="<label class='bg2' title='Facturas recibidas de 8:30am a 14:00pm estan a tiempo si entregan el lunes antes de las 18:00pm, sino estan fuera de tiempo'
	 		  	 >FUERA DE TIEMPO</label>";
	 		  	  $contft=$contft+1;	 		  	 
	 		  }
	 		  else
	 		  {    
	 		  	$status="<label class='bg1' title='Facturas recibidas de 8:30am a 14:00pm estan a tiempo si entregan el lunes antes de las 18:00pm, sino estan fuera de tiempo'
	 		  	>A TIEMPO</label>";
	 		  	$contat=$contat+1;
	 		  }
	 	 	}	
	 	 }

echo'<tbody><tr><td>'.$array[0].'</td><td>'.$array[1].'</td><td width="150">'.$array[2].'</td><td>'.$array[3].'</td><td>'.$array[4].'</td><td>'.$array[5].'</td><td>'.$array[6].'</td><td>'.$array[7].'</td><td>'.$array[8].'</td><td>'.$array[9].'</td><td width="90">'.$array[10].'</td><td width="130">'.$array[11].'</td><td>'.$status.'</td></tr></tbody>';
	}
}

else
{
	echo'<tr><td>No hay registros</td></tr>';
}
echo '</table>';
/***************************************TERMINA FACTURAS*/


$total_entr= $contat+$contft;
//total_entr es a 100 (total) como $contat es a X
// total_entr:100 :: $contat:X
//multiplicas los medios y luego divides

//Este es el primer porcentaje
$contat_porcen= (100*$contat)/ $total_entr;
//Teniendo ya este valor puedes obtener facilmente el otro %
$contft_porcen= 100 - $contat_porcen;
?>
 <br>
  <table id="table">
  <tr>
    <td align="center">Entregas a Tiempo</td>
    <td><?php echo ($contat);?></td>
     <td><?php echo round($contat_porcen);echo "%"?></td>
  </tr>
  <tr>
    <td align="center">Entregas Fuera de Tiempo</td>
    <td><?php echo ($contft);?></td>
     <td><?php echo round($contft_porcen);echo "%"?></td>
  </tr> 
  <tr>
    <td align="center">Total de Entregas</td>
    <td><?php echo ($total_entr);?></td>
    <td><input type="image" src="images/reporte.png" name="imprimir" onclick="window.print(); return false;" /></td>
  </tr>
   <tr>
  	<td></td>
  	<td>
  		<button onclick="location.href='fechatiementregare.php'" class="boton_1">Indicador de entregas rem</button>
  	</td>
  	<td></td>
  </tr>  
</table>
</div>
<br>
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'INDICADOR DE ENTREGAS (ALMACEN)'
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>Entregas<br/>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,                
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Columna',
        colorByPoint: true,
        data: [{
            name: 'Entregas a Tiempo',
            y: <?php echo ($contat);?>,
            //sliced: true,
            //selected: true
        }, {
            name: 'Entregas Fuera de Tiempo',
            y: <?php echo ($contft);?>
        }, ]
    }]
});
</script>
</body>
</html>