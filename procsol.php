<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
session_start();
include ('conexion.php');
$usuario=$_SESSION['name'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$servicio=$_POST['servicio'];
$otro=$_POST['otro'];
$obser=$_POST['obser'];
$q=mysql_query("select nombre, apellido from usuarios where usuario='$usuario'");
$cont=mysql_num_rows($q);

if($cont>0)
{
	while ($arr=mysql_fetch_array($q))
	{
		$nomape=$arr[0]." ".$arr[1];
		
	}
}
else
{
	echo "Favor de iniciar sesion";
}
$select=mysql_query("insert into solicitud (fecha, hora, usuario, servicio, observaciones, otra) values ('$fecha','$hora', '$nomape', '$servicio', '$obser', '$otro')");

if($select)
{
	?>
    <script language="javascript">
	alert ("Solicitud agregada con exito!");
    </script>
    <?php
}
else{
?>
    <script language="javascript">
	alert ("Error!");
    </script>
    <?php
}
?>
</body>
</html>
