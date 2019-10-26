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

<?php
include('conexion.php');
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
	
	$fecha= date('Y-m-d');
	$factura=$_POST['factura'];
	$cliente=$_POST['cliente'];
	$importemn=$_POST['importemn'];
	$importedls=$_POST['importedls'];
	$forma=$_POST['forma'];
	$obser=$_POST['obser'];

$q=mysql_query("INSERT INTO consorciocob (factura, fechacobro, cliente, importemn, importedls, formapago, observaciones) VALUES('$factura', '$fecha', '$cliente', '$importemn', '$importedls', '$forma', '$obser')")or die(mysql_error());

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