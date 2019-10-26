<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">

.fuente
{
	font-size:9px;
}
.fuente2
{
	font-size:13px;
}
.ti{ background-color:#009; font-size:14px; color:#FFF;
}
/* AMARILLO */
.pen
{
	background-color:#FCFC41;
}
/* AZUL */
.rev
{
	background-color:#6CB6FF;
}
/* VERDE */
.can
{
	background-color:#97FF97;
}
/* ROJO */
.rnop
{
	background-color:#FF8080;
}
.nap
{
	background-color:#FFFFFF;
}
</style>

</head>

<body>
<?php
error_reporting(0);
include ("conexion.php");
$factura=$_POST['factura'];
$fecha=$_POST['fecha'];
$tipo=$_POST['tipo'];
$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];
//setTimeout(Location.reload(),9000);
?>

<strong><font size="+2" color="#000066"><center>CONSECUTIVO FACTURACIÓN</center></font></strong>
<table border="1" align="center">
<tr><td class="can">PAGADA</td><td class="rev">EN REVISION/NO APLICA REVISION</td><td class="pen">PENDIENTE PARA REVISION</td><td class="rnop">PAGO VENCIDO/FUERA DE TIEMPO</td><td class="nap">CONTADO</td></tr>
</table>
<p></p>
<table border="1" align="center">
<tr class="ti">
  <td>FACTURA</td>
  <td width="80">FECHA</td>
  <td>CLIENTE</td>
  <td>ESTADO</td>
  <td width="70">REVISION</td>
  <td>PAGADA</td>
  <td>OBSERVACIONES ALM</td>
  <td>OBSERVACIONES FYC</td>
  </tr>

<?php
if ($tipo=='TODAS'){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago, dias FROM facturacion where estado!='CANCELADA' GROUP BY factura DESC order by factura ASC"); 
}
if ($tipo=='CREDITO'){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago, dias FROM facturacion WHERE tipopago='CREDITO' AND estado!='CANCELADA' GROUP BY factura DESC order by factura ASC"); 
}
if ($tipo=='CONTADO'){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago, dias FROM facturacion WHERE tipopago='CONTADO' AND estado!='CANCELADA' GROUP BY factura DESC order by factura ASC"); 
}
if ($factura!=''){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago, dias FROM facturacion where factura='$factura' AND estado!='CANCELADA' GROUP BY factura DESC order by factura ASC"); 
}
if ($fecha!=''){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago, dias FROM facturacion where fechafactura='$fecha' AND estado!='CANCELADA' GROUP BY factura DESC order by factura ASC"); 
}
if ($finicio!=''){
 $query = mysql_query("SELECT factura, fechafactura, cliente, estado, fechacontrarecibo, pagada, observaciones, obserfac, tipopago, dias FROM facturacion where fechafactura>='$finicio' and fechafactura<='$ffin' AND estado!='CANCELADA' GROUP BY factura DESC order by factura ASC"); 
}

 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i');	
$hoy=date("Y-m-d");	
//echo $hoy;
$contador =mysql_num_rows($query);
if ($contador!=0)
{
	echo $array[0];
	
	while ($array=mysql_fetch_array($query))
	{	
		$c=mysql_query("select dias, revision from clientes where cliente='$array[2]'");
		while ($d=mysql_fetch_array($c))
		{
			
				if($array['tipopago']=='CONTADO')
				{
					$revision='NO APLICA';
					$pagada='CONTADO';
					$estilo='nap';
				}
				else
				{
					if ($array[4]!='0000-00-00')
					{
						
						 $queryc = mysql_query("SELECT facped, fechacobro FROM cobranza where facped='$array[0]'"); 

						while ($arrayc=mysql_fetch_array($queryc))
						{
							if ($array['pagada']=='')
					 		{
						    	$nuevafecha = strtotime ( '+'.$array[9].'day' , strtotime ($array['fechacontrarecibo']) ) ;
						    	$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
								$fc=$nuevafecha;
								
								if ($fc<$arrayc[1])
								{
									$revision='FUERA DE TIEMPO DIAS DE CREDITO';
									$estilo='rnop';
									$pagada='NO';
								}
								else
								{
									$revision='PAGO PENDIENTE';
									$revision='EN REVISION';
									$estilo='rev';
									$pagada='NO';
								}
							}
					 		else
					 		{
					 			$pagada='PAGADA';
					 			$revision='REVISION COMPLETA';
								$estilo='can';
					 		}
					 	}
					}
					if($d['revision']=='no')
	 				{
						 $revision='NO APLICA REVISION';
						 $estilo='rev';
	 				}
					else
					{		
							if ($array[4]=='0000-00-00')
							{

							$nuevafecha = strtotime ( '+7day' , strtotime ($array['fechafactura']) ) ;
							$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
							$estilo='pen';

								if ($hoy<=$nuevafecha)
								{ 
									if($d['revision']=='no')
									{
										$revision='NO APLICA REVISION';
										$estilo='rev';
										$pagada='NO';
									}
									else
									{	
										$revision='PENDIENTE PARA REVISION';
										$estilo='pen';
										$pagada='NO';
									}
									
								}
								else
								{
									$revision='FUERA DE TIEMPO PARA REVISION';
									$estilo='rnop';
									$pagada='NO';
								}
							}
						}
					}	
				

				
		
		
	//if($d['revision']=='')
	//{
	//	$revision='NA REVISION';
	//	$estilo='cont';
	//}

	 
	 echo "<tr class='$estilo'>
	<td width='80'>".$array[0]."</td><td width='80'>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$revision."</td><td>".$pagada."</td><td>".$array[6]."</td><td>".$array[7]."</td></tr>";
	}//WHILE DIAS
 }//while

}//if
else
{
echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }//else
echo "</table>";

?>
</body>
</html>