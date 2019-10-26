<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<style>
input.text{
display:block;
}
</style>
<script language="javascript">
var fpago=new Array("-","EFECTIVO", "TARJETA", "CHEQUE","TRASALDO");
</script>

<?php
session_start();
include('conexion.php');
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
	
	$fecha= $_POST['fecha'];
	$factura=$_POST['factura'];
	$cliente=$_POST['cliente'];
	$importemn=$_POST['importemn'];
	$importedls=$_POST['importedls'];
	$tipo=$_POST['tipo'];
	$forma=$_POST['forma'];
	$usuario=$_SESSION["name"];

$q=mysql_query("INSERT INTO serviciosfac (factura, fechafactura, cliente, importemn, importedls, tipopago, formapago, usuario) VALUES('$factura', '$fecha', '$cliente', '$importemn', '$importedls', '$tipo', '$forma', '$usuario')")or die(mysql_error());

if (!$q)
{//die (mysql_error());?>
<script language="javascript">
alert("Falló el registro INSERT!");
</script>
<?php
}
else
{?>
<script language="javascript">
alert("Registro almacenado con éxito");
</script>
<?php
}
?>
</body>
</html>