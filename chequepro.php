<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 
session_start();
include('conexion.php');
$nocheque=$_POST['nocheque'];
$fechaexp=$_POST['fechaexp'];
$banco=$_POST['banco'];
$cliente=$_POST['cliente'];
$fcobro=$_POST['fcobro'];
$importe=$_POST['importe'];
$impdl=$_POST['importedl'];
$usuario=$_SESSION['name'];

$q=mysql_query("insert into cheque (nocheque, fechaexp, banco, cliente, fechacobro, importemn, importedls, usuario) values ('$nocheque','$fechaexp', '$banco', '$cliente', '$fcobro', '$importe', '$impdl', '$usuario')") or die (mysql_error()) ;

if (!$q)
{//die (mysql_error());?>
<script language="javascript">
alert("Falló el registro");
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