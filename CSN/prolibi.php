<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
include ('conexion.php');
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hoy=date('Y-m-d');

$id=$_POST['id'];
echo $id;
$q=mysql_query("update mto_equipo set flibusu='$hoy', libusu='on' where id='$id'");
echo "update mto_equipo set flibusu='$hoy', liberada='on' where id='$id'";
if($q)
{
?>
<script language="javascript">
alert("Registro almacenado con éxito");
</script>
<?php
}
else
{?>
<script language="javascript">
alert("Falló el registro (Error 0.1)");
</script>
<?php
}
?>
?>
</body>
</html>