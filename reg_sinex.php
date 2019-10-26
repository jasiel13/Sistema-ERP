<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bscBusc.css" >
<title>Documento sin título</title>
</head>


<body>
<?php
$fecha=$_POST['fecha'];
$art=$_POST['art'];
$cant=$_POST['cant'];
$impmn=$_POST['impmn'];
$impdls=$_POST['impdls'];
$com=$_POST['com'];
$usu=$_POST['usu'];

include ('conexion.php');
$sql=mysql_query("INSERT INTO sin_existencia (fecha, articulo, cantidad,importemn,importedls,comentarios, usuario) VALUES ('$fecha','$art','$cant','$impmn','$impdls','$usu','$com',) ");
if ($sql)
{
?>
    <script language="javascript">
	alert("Registro Almacenado con éxito");
	</script>
    <?php
}
else
{?>
    <script language="javascript">
	alert("Ocurrió un error");
	</script>
    <?php
    }
?>
</body>
</html>