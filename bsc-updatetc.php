<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include('conexion.php');
$idtc=$_POST['idtc'];
$ftc=$_POST['ftc'];
$vtc=$_POST['vtc'];
$ustc=$_POST['ustc'];

$query=mysql_query("update tipo_de_cambio set id='$idtc', fecha='$ftc', valor='$vtc', usuario='$ustc' where id='$idtc'");

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