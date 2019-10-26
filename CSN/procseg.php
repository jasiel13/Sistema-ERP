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
$fecha=$_POST['fechar'];
$cliente=$_POST['cliente'];
$obser=$_POST['obser'];
$usuario=$_SESSION['name'];
$sql=mysql_query("INSERT INTO seguimiento (fechareg, cliente, observ, usuario) VALUES ('$fecha', '$cliente', '$obser', '$usuario')")or die (mysql_error());
if ($sql)
{
	?>
    <script language="javascript">
	alert('Registro almacenado con éxito');
    </script>
<?php
}
else
{
?>
    <script language="javascript">
	alert('Registro almacenado con éxito');
    </script>
<?php
}
?>
</body>
</html>