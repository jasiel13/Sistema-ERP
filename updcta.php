<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include ('conexion.php');
$factura=$_POST['factura'];
$estado=$_POST['status'];

$query=mysql_query("UPDATE consorciofac set estado='$estado' WHERE factura='$factura'");

if (!$query)
{
	?>
    <script language="javascript">
	alert("Error al modificar!");
	</script>
<?php
}
else
{
?>
     <script language="javascript">
	alert("Factura modificada con éxito!");
	</script>

<?php
}
?>
</body>
</html>