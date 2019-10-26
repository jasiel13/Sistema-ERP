<?php
error_reporting(0);
session_start();
include ("conexion.php");
//Establecemos zona horaria por defecto
    date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

$factura=$_POST['factura'];

$fecha=$_POST['fecha'];
$cliente=$_POST['cliente'];
$importemn=$_POST['impmn'];
$importedls=$_POST['impdls'];
$fcontra=$_POST['fechacr'];
$fpago=$_POST['fechacobro'];
$tipo=$_POST['tpago'];
$dias=$_POST['dias'];
$forma=$_POST['forma'];
$obser=$_POST['observ'];
$vendedor=$_POST['vendedor'];
$hora=date ("G:i");
$usuario=$_SESSION["name"];

//echo $cliente;
$query=mysql_query("INSERT INTO facturacion (factura, fechafactura, horafactura, cliente, importemn, importe_dls, fechacontrarecibo, fechapago, tipopago,dias, formapago, obserfac, usuario, restomn, restodls, vendedor) VALUES('$factura', '$fecha', '$hora', '$cliente', '$importemn', '$importedls', '$fcontra', '$fpago', '$tipo','$dias', '$forma','$obser', '$usuario','$importemn','$importedls', '$vendedor')")or die(mysql_error());
if ($tipo=='CREDITO')
{//die (mysql_error());
$s=mysql_query("select saldo from clientes where cliente ='$cliente'");
$a= mysql_fetch_array($s);

	if($importemn!='')
	{
	$res=$a[0]+$importemn;
	//echo $a[0]."-". $importemn."=".$res;
	}
else if($importedls!='')
	{
	$res=$a[0]+$importedls;
	//echo $a[0]."-". $importedls."=".$res;
	}
	if ($query){
	$up=mysql_query("update clientes set saldo='$res' where cliente='$cliente'");}
	else
	{
		?>
        <script language="javascript">
alert("Falló el registro update!");
</script>
<?php

	}
}
if($query)
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
alert("Falló el registro INSERT!");
</script>
<?php
}
?>
