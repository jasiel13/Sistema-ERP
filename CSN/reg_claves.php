<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bscBusc.css" >
	<script src="query/jquery.min.js"></script>

<?php
error_reporting(0);
session_start();
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
$usuario=$_SESSION["name"];
include ('conexion.php');

$hora=date('G:i');
?>

<title>Documento sin título</title>
</head>

<body>
<br>
<div>
<center><H1>REGISTRO DE CLAVES</H1></center>
		<form action="proc_reg_claves.php" method="POST" >    
						Fecha: 
						<input id="fecha" name="fecha" type="date" 'aaaa/mm/dd'  value="<?php echo date("Y-m-d");?>">	
						Hora:
						<input type="text" name="hora" id="hora" value="<?php echo $hora;?>" readonly="readonly"/>
						Usuario:
						<input type="text" name="usu"  id="usu" value="<?php echo $usuario;?>" >
						Razón:
						<input type="text" name="raz" id="raz" placeholder="Escriba la razon para la peticion de clave" >
						Autoriza:
						<select id="auto" name="auto">
							<option value="David Frias">David Frias</option>
							<option value="Fernando Casas">Fernando Casas</option>
						</select>
		    <input type="submit" value="Enviar">
		</form>
</div>
</body>
</html>