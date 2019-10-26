<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
error_reporting(0);
include('conexion.php');
$pedido=$_POST['pedido'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$cliente=$_POST['cliente'];
$v=$_POST['v'];
$solicito=$_POST['solicito'];
$comventas=$_POST['comventas'];
$vendedor=$_POST['vendedor'];
$importe=$_POST['importe'];

$varimporte=$importe;
$st= quitar($varimporte);
function quitar($varimporte){
$sig[]=',';
$sig[]='$';
return str_replace($sig,'',$varimporte);} 

$importedls=$_POST['importedls'];
$vardls=$importedls;
$sts= quitar2($vardls);
function quitar2($vardls){
$sig[]=',';
$sig[]='$';
return str_replace($sig,'',$vardls);} 
$cont=$_POST['contacto'];
$tel=$_POST['tel'];
$prioridad=$_POST['prioridad'];
if ($solicito=='SEGUIMIENTO')
{
	$estado='SEGUIMIENTO';
}
else
{
	$estado='PENDIENTE';
}
//$cont=$_POST['cont'];
$q=mysql_query("insert into pedido (idpedido, fecha, hora, cliente, solicito,  vendedor, comventas, estado, importemn, importedls, tipo, contacto, telefono, prioridad) values ('$pedido','$fecha','$hora','$cliente','$solicito','$vendedor','$comventas','$estado', '$st', '$sts', '$v','$cont', '$tel', '$prioridad')");
//echo "idpedido, fecha, hora, cliente, solicito,  vendedor, comventas, estado, importemn, importedls, tipo) values ('$pedido','$fecha','$hora','$cliente','$solicito','$vendedor','$comventas','PENDIENTE', '$importe', '$importedls', '$v')";
if($q)
{
	//$i=1;
	for ($i=1; $i<=24; $i++) {
	$material=$_POST['mat'.$i];
	if($material!=''){
	$m=mysql_query("insert into pedmat (idpedido, idmaterial, material) values ('$pedido', '$i', '$material')");
	}
}
}
if ($q)
{	
?>
<script language="javascript">
alert("Registro almacenado con éxito");
</script>
<?php
}
else
{?>
<script language="javascript">
alert("Falló el registro (Error 0.1)");
</script>
<?php
}
?>
<br/>
<br/>
<center>
<strong><h2><font face="arial" color="#000D6D">¿Deseas hacer otro pedido?</font></h2></strong>
<input type="button" name="button" id="button" value="Sì" style='width:70px; height:25px'
onMouseOver="this.style.backgroundColor='#808080'; this.style.cursor='hand';" 
onMouseOut="this.style.backgroundColor='#FFFFFF';" 
onclick="document.location.href=' /csn/pedido.php';" />
<input type="button" name="button" id="button" value="No" style='width:70px; height:25px' 
onMouseOver="this.style.backgroundColor='#808080'; this.style.cursor='hand';" 
onMouseOut="this.style.backgroundColor='#FFFFFF';" 
onclick="document.location.href=' /csn/junta.php';" />
</center>
</body>
</html>