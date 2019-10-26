<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
error_reporting(0);
session_start();
include ('conexion.php');
$cheque=$_POST['nocheque'];
$estado=$_POST['estado'];
$hoy=date('Y-m-d');
$usuario=$_SESSION['name'];

$sql=mysql_query("update cheque set fcobro='$hoy', usuariocobro='$usuario', estado='$estado' where nocheque='$cheque'");

if ($sql)
{?>
<script language="javascript">
alert("CHEQUE REGISTRADO");
</script>

<?php
}
else{
?> 
<script language="javascript">
alert("Error al procesar la solicitud");
</script>
<?php
}
?>
</body>
</html>