<html>
<head>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>

<title>Mi primer Grafica en PHP</title>
<script>
<!--
 

    //var rows = document.getElementById('pop').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
     //window.open('','window','width=400,height=200,scrollbars=yes');

function myFunction() {
    //$('#idpedido2').click(function(){
    //pop = $(this).closest('table').attr('idpedido');
    //var rows = document.getElementById('pop').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	var idc= document.getElementById('idpedido').value;

	var campo1 ="?idpedido=";
	//var porId=document.getElementsByTagName("tbody").value;
    
    window.open("prueba/indexpop.php"+campo1+idc, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=600,height=400");
};
//-->
</script>
<style type="text/css">
.ta
{
	background-color: #5f8bfa;
}
body
{
	width:100%;
   background:url(images/bg_rtm.jpg) repeat center;
}

.bg0
{
	background-color:#009;
	color:#FFF; font-size:12px;
}
.p
{
		background-color: #007199;
}
.t
{
	background-color:#CC9900;
}
.s
{
	background-color: #22b822;
}
.f
{
	background-color: #1fd2bf;
}
.r
{
	background-color: #1fd2bf;
}
.c
{
	background-color: #9e42ea;
}
.cre
{
	background-color: #e82626;
}
.cam
{
	background-color: #D4CA06;
}
.cot
{
	background-color: #f7b13e;
}
.lici
{
	background-color: #E8BB87;
}

/*.table {
    border-collapse: collapse;  
    background-color: #EDF6F8;
    border: 3px solid black;
    box-shadow:0 0 10px;}*/

 .td{text-align: center;
    border: 2px solid black;
    font-size:12px;}

.tr:hover {background-color: #7D8D90;}

.th {background-color: #94BDAB;
    text-align: center;
    border: 2px solid black;
    font-size:12px;
    }
</style>

</head>

<body>
<div align='center'>
<strong><font size='+2'>COTIZACIONES</font></strong>
</div>
<?php
error_reporting(0);
//Primero leemos los datos enviados
//por el formulario
/*$v1 = $_POST['v1'];
$v2 = $_POST['v2'];
$v3 = $_POST['v3'];*/
$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];
$ven=$_POST['ven'];
//echo "vendedor".$ven;
$v1=0;$v2=0;$v3=0;$p=0; $t=0; $se=0; $f=0; $rec=0; $camb=0; $cred=0; $proy=0; $tard=0;
include ('conexion.php');
?>
<p></p>
<div align='center'>
<strong>REPORTE DE COTIZACIONES DEL DIA <?php echo $finicio?> AL DIA <?php echo $ffin?> DEL VENDEDOR --> <?php echo $ven ?></strong>
</div>
<p></p>
<p></p>
<?php
if ($ven=='TODOS') {
	$s=mysql_query("select estadoc, motivo, importemn, importedls from pedido where fecha >= '$finicio' AND fecha <= '$ffin'");

		$sql=mysql_query("select estadoc, motivo, importemn, importedls from pedido where fecha >= '$finicio' AND fecha <= '$ffin'");
	//echo "select estadoc, motivo, importemn, importedls from pedido where tipo='2' and fecha >= '$finicio' AND fecha <= '$ffin'";
}
if ($ven=='NALLELI REYNA') {
	$s=mysql_query("select estadoc, motivo, importemn, importedls from pedido where fecha >= '$finicio' AND fecha <= '$ffin' AND vendedor='$ven'");
	//echo "select estadoc, motivo, importemn, importedls from pedido where tipo='2' and fecha >= '$finicio' AND fecha <= '$ffin'";
}
if ($ven=='SILVIA MEDINA') {
	$s=mysql_query("select estadoc, motivo, importemn, importedls from pedido where fecha >= '$finicio' AND fecha <= '$ffin' AND vendedor='$ven'");
	//echo "select estadoc, motivo, importemn, importedls from pedido where tipo='2' and fecha >= '$finicio' AND fecha <= '$ffin'";
}
if ($ven=='YADIRA SIFUENTES') {
	$s=mysql_query("select estadoc, motivo, importemn, importedls from pedido where fecha >= '$finicio' AND fecha <= '$ffin' AND vendedor='$ven'");
	//echo "select estadoc, motivo, importemn, importedls from pedido where tipo='2' and fecha >= '$finicio' AND fecha <= '$ffin'";
}

while ($s1=mysql_fetch_array($s))
{
if($s1[0]=='CANCELADA')
{
	$tc=$tc+$s1[2];
	$tcd=$tcd+$s1[3];
	$v1=$v1+1;
}
if($s1[0]=='ACEPTADA')
{
	$ta=$ta+$s1[2];
	$tad=$tad+$s1[3];
	$v2=$v2+1;
}
if($s1[0]=='')//pendiente
{
	$tp=$tp+$s1[2];
	$tpd=$tpd+$s1[3];
	$v3=$v3+1;
}
if($s1[1]=='Precio' && $s1[0]=='CANCELADA')
{

	$p=$p+1;
	$m=$s1[2];
	$d=$s1[3];
}
if($s1[1]=='T.E' && $s1[0]=='CANCELADA')
{
	$t=$t+1;
		$m1=$s1[2];
		$d1=$s1[3];
}
if($s1[1]=='Existencia' && $s1[0]=='CANCELADA')
{
	$se=$se+1;
	$m2=$s1[2];
	$d2=$s1[3];
}
if($s1[1]=='Fuera de catalogo' && $s1[0]=='CANCELADA')
{
	$f=$f+1;
		$m3=$s1[2];
	$d3=$s1[3];
}
if($s1[1]=='Recotización' && $s1[0]=='CANCELADA')
{
	$rec=$rec+1;
		$m4=$s1[2];
	$d4=$s1[3];
}
if($s1[1]=='Cambio de material')
{
	$camb=$camb+1;
		$m5=$s1[2];
	$d5=$s1[3];
}
if($s1[1]=='Credito' && $s1[0]=='CANCELADA')
{
	$cred=$cred+1;
		$m6=$s1[2];
	$d6=$s1[3];
}
if($s1[1]=='Cambio de proyecto' && $s1[0]=='CANCELADA')
{
	$proy=$proy+1;
		$m7=$s1[2];
	$d7=$s1[3];
}
if($s1[1]=='Cotizacion tardia' && $s1[0]=='CANCELADA')
{
	$tard=$tard+1;
		$m8=$s1[2];
	$d8=$s1[3];
}
if($s1[1]=='Licitacion Perdida' && $s1[0]=='CANCELADA')
{
	$lici=$lici+1;
	$m9=$s1[2];
	$d9=$s1[3];
}
//echo $s1[1];

/*******importes********/
/**************pesos**************/
if ($s1[0]=='CANCELADA' and $s1[2]!=0.00) {
	$imnc=$imnc+$s1[2];
	//echo "imp".$s1[2];
}

if ($s1[0]=='ACEPTADA' and $s1[2]!=0.00) {
	$imna=$imna+$s1[2];
}
/*******dolares*****/
if ($s1[0]=='CANCELADA' and $s1[3]!=0.00) {
	$dlsc=$dlsc+$s1[3];
}

if ($s1[0]=='ACEPTADA' and $s1[3]!=0.00) {
	$dlsa=$dlsa+$s1[3];
}
}
//sumamos para saber cual es el
//total o 100%
$total = $v1+$v2+$v3;
//echo $total ."= ".$v1."+".$v2."+".$v3;

//El valor maximo de longitud
//de la barra es 400
$long = 400;

//calculamos la longitud de
//cada valor enviado
$long_v1 = $v1 * $long / $long;
$long_v2 = $v2 * $long / $long;
$long_v3 = $v3 * $long / $long;

//Es hora de los porcentajes a
//mostrar
$por_v1 = 100 * $v1 / $total;
$por_v2 = 100 * $v2 / $total;
$por_v3 = 100 * $v3 / $total;

/************************* motivos***************/

$tm=$p+$t+$se+$f+$rec+$camb+$cred+$proy+$tard+$lici;
$lp= $p * $long / $long;
$lt= $t * $long / $long;
$ls= $se * $long / $long;
$lf= $f * $long / $long;
$lrec= $rec * $long / $long;
$lcamb= $camb * $long / $long;
$lcred= $cred * $long / $long;
$lproy= $proy * $long / $long;
$ltard= $tard * $long / $long;
$llici= $lici * $long / $long;



$porp= 0;
$port= 0;
$pors= 0;
$porf= 0;
$porrec= 0;
$porcamb= 0;
$porcred= 0;
$porproy= 0;
$portard= 0;
$porlici= 0;


$porp= 100* $p/$tm;
$porp = round($porp, 2);

$port= 100* $t/$tm;
$port = round($port, 2);

$pors= 100* $se/$tm;
$pors = round($pors, 2);

$porf= 100* $f/$tm;
$porf = round($porf, 2);

$porrec= 100* $rec/$tm;
$porrec = round($porrec, 2);

$porcamb= 100* $camb/$tm;
$porcamb = round($porcamb, 2);

$porcred= 100* $cred/$tm;
$porcred = round($porcred, 2);

$porproy= 100* $proy/$tm;
$porproy = round($porproy, 2);

$portard= 100* $tard/$tm;
$portard = round($portard, 2);

$porlici= 100* $lici/$tm;
$porlici = round($porlici, 2);


/******************fin*******************/
?>
<!– Ahora muestra la gráfica can o acep–>
<table border='0'>
<tr>
<td width='99'><b>CANCELADA</b></td>
<td>&nbsp;</td><td height='70' width='<?php echo $long_v1; ?>'  bgcolor='#000066'> </td>
<td>&nbsp;<?php echo $v1; ?>&nbsp;(<i><?php echo "$ ".number_format($tc,2)." MX "."$ ".number_format($tcd,2)." DLL "; ?></i>)</td>
<p><td><?php ?></td></p>
</tr>
</table>
<br>

<table border='0'>
<tr>
<td width='99'><b>  ACEPTADA </b></td>
<td>&nbsp;</td><td height='70' width='<?php echo $long_v2; ?>' bgcolor='#CC9900'> </td>
<td>&nbsp;<?php echo $v2; ?>&nbsp;(<i><?php echo "$ ".number_format($ta,2)." MX "."$ ".number_format($tad,2)." DLL "; ?></i>)</td>
</tr>
</table>
<br>

<table border='0'>
<tr>
<td width='99'><b>PENDIENTE</b></td>
<td>&nbsp;</td><td height='70' width='<?php echo $long_v3; ?> ' bgcolor='#006600'></td>
<td>&nbsp;<?php echo $v3; ?>&nbsp;(<i><?php echo "$ ".number_format($tp,2)." MX "."$ ".number_format($tpd,2)." DLL "; ?></i>)</td>
</tr>
</table>
<br>

<hr>

<!-- Motivos-->
<strong><font size='+2'>MOTIVOS DE CANCELACION</font></strong>
<P></P>
<table border='0'>
<tr>
<td width='6%'><b>PRECIO</b><br>(<i><?php echo $p; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"> <div class="p" style="width: <?php echo $porp; ?>%; height: 69px" ><strong><font color="black"><strong><center><?php echo $porp; ?>%</center></font></strong></div> </td>
<td width='15%'><?php echo "($ ".number_format($m,2)." MX /"." $ ".number_format($d,2)." DLL) "; ?></td>
</p></tr>
</table>

<table border='0'>
<tr>
<td width='7%'><b>T.E </b><br>(<i><?php echo $t; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="t" style="width: <?php echo $port; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $port; ?>%</center></font></strong></div></td>
<td width='15%'><?php echo "($ ".number_format($m1,2)." MX /"." $ ".number_format($d1,2)." DLL) "; ?></td>
</p></tr>
</table>

<table border='0'>
<tr>
<td width='6%'><b>  Sin existencia </b><br>(<i><?php echo $se; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="s" style="width: <?php echo $pors; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $pors; ?>%</center></font></strong></div> </td>
<td width='15%'><?php echo "($ ".number_format($m2,2)." MX /"." $ ".number_format($d2,2)." DLL) "; ?></td>
</tr>
</table>

<table border='0'>
<tr>
<td width='7%'><b>  Fuera catálogo </b><br>(<i><?php echo $f; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="f" style="width: <?php echo $porf; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $porf; ?>%</center></font></strong></div> </td>
<td width='15%'><?php echo "($ ".number_format($m3,2)." MX /"." $ ".number_format($d3,2)." DLL) "; ?></td>
</p></tr>
</table>

<table border='0'>
<tr>
<td width='3%'><b>  Recotización </b><br>(<i><?php echo $rec; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="r" style="width: <?php echo $porrec; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $porrec; ?>%</center></font></strong></div></td>
<td width='15%'><?php echo "($ ".number_format($m4,2)." MX /"." $ ".number_format($d4,2)." DLL) "; ?></td>
</tr>
</table>

<table border='0'>
<tr>
<td width='7%'><b>  Cambio de material </b><br>(<i><?php echo $camb; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="c" style="width: <?php echo $porcamb; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $porcamb; ?>%</center></font></strong></div> </td>
<td width='15%'><?php echo "($ ".number_format($m5,2)." MX /"." $ ".number_format($d5,2)." DLL) "; ?></td>
</tr>
</table>

<table border='0'>
<tr>
<td width='7%'><b>  Credito </b><br>(<i><?php echo $cred; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="cre" style="width: <?php echo $porcred; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $porcred; ?>%</center></font></strong></div></td>
<td width='15%'><?php echo "($ ".number_format($m6,2)." MX /"." $ ".number_format($d6,2)." DLL) "; ?></td>
</tr>
</table>

<table border='0'>
<tr>
<td width='7%'><b>  Cambio de proyecto </b><br>(<i><?php echo $proy; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="cam" style="width: <?php echo $porproy; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $porproy; ?>%</center></font></strong></div></td>
<td width='15%'><?php echo "($ ".number_format($m7,2)." MX /"." $ ".number_format($d7,2)." DLL) "; ?></td>
</tr>
</table>

<table border='0'>
<tr>
<td width='5%'><b>  Cotizacion tardia </b><br>(<i><?php echo $tard; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="cot" style="width: <?php echo $portard; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $portard; ?>%</center></font></strong></div></td>
<td width='15%'><?php echo "($ ".number_format($m8,2)." MX /"." $ ".number_format($d8,2)." DLL) "; ?></td>
</tr>
</table>

<table border='0'>
<tr>
<td width='5%'><b>  Licitacion Perdida </b><br>(<i><?php echo $lici; ?></i>)</td>
<td height='70' width='35%' style="border:2px solid grey"><div class="lici" style="width: <?php echo $porlici; ?>%; height: 69px" ><font color="black"><strong><center><?php echo $porlici; ?>%</center></font></strong></div></td>
<td width='15%'><?php echo "($ ".number_format($m9,2)." MX /"." $ ".number_format($d9,2)." DLL) "; ?></td>
</tr>
</table>
<!-- importes-->
<p></p>
<hr>
<center>
<strong><font size='+2'>MONTOS TOTALES</font></strong>
<p></p>
<table border='1'>
	<tr class="ta"><td colspan="3"><strong><center>COTIZACIONES</center></strong></td></tr>
<tr><td>TOTAL</td><td>ACEPTADAS</td><td>CANCELADAS</td></tr>
<tr><td>PESOS</td><td><?php echo "$ ".number_format($imna,2); ?></td><td><?php echo "$ ".number_format($imnc,2); ?></td></tr>
<tr><td>DOLARES</td><td><?php echo "$ ".number_format($dlsa,2); ?></td><td><?php echo "$ ".number_format($dlsc,2); ?></td></tr>
</table>
<?php
$sp=mysql_query("select estadoc, importemn, importedls from pedido where tipo='1' and fecha >= '$finicio' AND fecha <= '$ffin'");
while ($sp1=mysql_fetch_array($sp))
{
	
}
?>
</center>

<br>
<br>
<hr>
<hr>
<div style="background-color: #F8F9F9;">
<strong><font size="+2" color="#800040"><center>COTIZACIONES CANCELADAS</center></font></strong>
<p></p>
    

<table border="3" align="center">
<tr class="tr">
 <th class="th" width="70">FECHA</th>
  <th class="th">FECHA CANCELACION</th><!--Se inserto una nueva columna en la tabla-->
  <th class="th">COTIZACION</th>
  <th class="th">IMPORTE MN.</th>
  <th class="th">IMPORTE DLS.</th>
  <th class="th">VENDEDOR</th>
  <th class="th">CLIENTE</th>
   <th class="th">SOLICITO</th>
  <th class="th">MOTIVO</th>
  <th class="th">COMENTARIOS DE CANCELACION</th>
  </tr>

<?php
 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i');	

//Se separo el nombre de diana con 2 espacios para que mandara los datos y se puso fecha desc,vendedor
  if ($ven=='TODOS')
 	{
 $query = mysql_query("select fecha, fecha_canc, idpedido, importemn, importedls, vendedor, cliente, solicito , motivo, com_cancelada  from pedido where estadoc='CANCELADA' and fecha_canc >= '$finicio' AND fecha_canc <= '$ffin' order by fecha DESC, vendedor"); 
 	}
  if ($ven=='SILVIA MEDINA')
 	{
 		$query = mysql_query("select fecha, fecha_canc, idpedido, importemn, importedls, vendedor, cliente, solicito , motivo, com_cancelada  from pedido where estadoc='CANCELADA' and fecha_canc >= '$finicio' AND fecha_canc <= '$ffin' AND vendedor='$ven'"); 
 	}
  if ($ven=='NALLELI REYNA')
 	{
 		$query = mysql_query("select fecha, fecha_canc, idpedido, importemn, importedls, vendedor, cliente, solicito , motivo, com_cancelada  from pedido where estadoc='CANCELADA' and fecha_canc >= '$finicio' AND fecha_canc <= '$ffin' AND vendedor='$ven'" ); 
 	}
  if ($ven=='YADIRA SIFUENTES')
 	{
 		$query = mysql_query("select fecha, fecha_canc, idpedido, importemn, importedls, vendedor, cliente, solicito , motivo, com_cancelada  from pedido where estadoc='CANCELADA' and fecha_canc >= '$finicio' AND fecha_canc <= '$ffin' AND vendedor='$ven'");
 	}

 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr class='tr'>
	<td class='td'>".$array[0]."</td><td class='td'>".$array[1]."</td><td class='td'>".$array[2]."</td><td class='td'>".$array[3]."</td><td class='td'>".$array[4]."</td><td class='td'>".$array[5]."</td><td class='td'>".$array[6]."</td><td class='td'>".$array[7]."</td><td class='td'>".$array[8]."</td><td class='td'>".$array[9]."</td></tr>";
 }//while

echo "</table>";
?>
<br>
</div>
<hr>
<hr>

<div style="background-color:  #F8F9F9;">
<strong><font size="+2" color="#800040"><center>COTIZACIONES PENDIENTES</center></font></strong>
<p></p>
    

<table border="1" align="center" name="pop" id="pop">
<tr class="tr">
  <th class="th"  width="80">FECHA</th>
  <th class="th">COTIZACION</th>
  <th class="th">IMPORTE MN.</th>
  <th class="th">IMPORTE DLS.</th>
  <th class="th">VENDEDOR</th>
  <th class="th">CLIENTE</th>
   <th class="th">SOLICITO</th>
   <th class="th">VER MAS</th>
  </tr>

<?php

 date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$hora2=date('G:i');	

  if ($ven=='TODOS')
 	{
 		$query = mysql_query("select fecha, idpedido, importemn, importedls, vendedor, cliente, solicito from pedido where estadoc='' and fecha >= '$finicio' AND fecha <= '$ffin' order by fecha DESC, vendedor"); 
 	}
  if ($ven=='SILVIA MEDINA')
 	{
 		$query = mysql_query("select fecha, idpedido, importemn, importedls, vendedor, cliente, solicito from pedido where estadoc='' and fecha >= '$finicio' AND fecha <= '$ffin' AND vendedor='$ven' order by fecha DESC, vendedor"); 
 	}
  if ($ven=='NALLELI REYNA')
 	{
 		$query = mysql_query("select fecha, idpedido, importemn, importedls, vendedor, cliente, solicito from pedido where estadoc='' and fecha >= '$finicio' AND fecha <= '$ffin' AND vendedor='$ven' order by fecha DESC, vendedor"); 
 	}
  if ($ven=='YADIRA SIFUENTES')
 	{
 		$query = mysql_query("select fecha, idpedido, importemn, importedls, vendedor, cliente, solicito from pedido where estadoc='' and fecha >= '$finicio' AND fecha <= '$ffin' AND vendedor='$ven' order by fecha DESC, vendedor");
 	}


 while ($array=mysql_fetch_array($query))
 {
	 echo "<tr class='tr'>
	<td class='td'>".$array[0]."</td><td class='td'>".$array[1]."</td><td class='td'>".$array[2]."</td><td class='td'>".$array[3]."</td><td class='td'>".$array[4]."</td><td class='td'>".$array[5]."</td><td class='td'>".$array[6]."</td><td class='td'><form id='form1' target='blank' action='prueba_indi\indexpop.php' method='get'><input type='hidden' name='idpedido' id='idpedido' value='".$array[1]."'><input type='image' name='registrar' src='images/txt.png' align='center'></form></td></tr>";
 }//while
//<button id='pop' name='pop' onclick='myFunction()'>PopUp prueba</button>
echo "</table>";
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>