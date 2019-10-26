<?php
error_reporting(0);
session_start();
include ("conexion.php");
//Establecemos zona horaria por defecto
    date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();

$fecha=$_POST['fecha'];
$hora=date ("G:i");
$usuario=$_SESSION["name"];
$raz=$_POST['raz'];
$auto=$_POST['auto'];
$est='PENDIENTE';

//echo $cliente;
$query=mysql_query("INSERT INTO reg_claves (fecha, hora, usuario, razon, autoriza, estado) VALUES('$fecha', '$hora', '$usuario', '$raz', '$auto', '$est')")or die(mysql_error());

if($query)
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
alert("Falló el registro INSERT!");
</script>
<?php
}
?>
