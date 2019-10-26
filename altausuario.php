<?php
include ('conexion.php');
$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$clave=$_POST['clave'];
$conclave=$_POST['conclave'];
$tipo=$_POST['tipo'];

$q=mysql_query("insert into usuarios (usuario, nombre, apellido, clave, tipo) values ('$usuario', '$nombre', '$apellido', '$clave', '$tipo')");
	
	
	if($q!=0)
	{
		?>
        <script language="javascript">
		alert ("Usuario agregado con exito");
        </script>
        <?php
	}
	else
	{
		?>
        <script language="javascript">
		alert ("El usuario no se pudo guardar");
        </script>
        <?php

	}

?>