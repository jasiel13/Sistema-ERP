<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include('conexion.php');
$remision=$_POST['remision'];
$hsalida=$_POST['horasa'];
$hraentrega=$_POST['horaen'];
$hllegada=$_POST['horalle'];
$chofer=$_POST['chofer'];
$vehiculo=$_POST['vehiculo'];
$direccion=$_POST['direccion'];
$fecha_entrega=$_POST['fechaent'];
$observaciones=$_POST['obser'];
$query=mysql_query("update remision set horasalida='$hsalida', horaentrega='$hraentrega', horallegada='$hllegada', chofer='$chofer', vehiculo='$vehiculo', direccion='$direccion',fechaentrega='$fecha_entrega',observ='$observaciones' where remision='$remision'");

if($query)
{
	?>
    <script language="javascript">
	alert("Registro almacenado!");
    </script>
 <?php
}
else
{
?>
?>
    <script language="javascript">
	alert("Registro almacenado!");
    </script>
<?php
}
?>
</body>
</html>