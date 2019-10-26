<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
	<meta charset="UTF-8">	
	<title>Notas</title>
	<style>
/*codigo para el nuevo formulario*/
input[type=text], select {
    width: 100%;
    padding: 8px 16px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

h3
{
display: inline-block;
color: white; text-shadow: black 0.1em 0.1em 0.2em

}
input[type=date]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 40%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div.color{
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 40%;  
    margin-left: auto;
    margin-right: auto;
    font-family: helvetica,arial,sans-serif;
}
</style>

<script> 
    $(document).ready(function(){   
     $("#cliente").autocomplete("autocomplete.php", {
        selectFirst: true
      });         
    });

 </script>
</head>
<!--codigo para mandar datos a input-->
<?php
include('conexion.php');
error_reporting(0);
$nota=$_POST['nota'];

$res = mysql_query("SELECT /*nota,*/fechanota,cliente,importemn, importedls,estado FROM notacredito  where nota = '$nota'") or die(mysql_error());
while($row = mysql_fetch_array($res)){

      /*$nota=$row["nota"];*/
      $fechas=$row["fechanota"];
      $cliente=$row["cliente"];
      $importemn = $row['importemn'];
	  $importedls = $row['importedls'];
	  $estado = $row['estado'];
	     }
?>
<body>

<div class="color">
<center>
<h3>Modificaciones</h3>
</center> 

<form name="update" id="update" method="post" action="modnota_actualizar.php">

Nota de credito
<input name="nota" type="text" value="<?php echo "$nota";?>">

Fecha
<input name="fechas" type="text" value="<?php echo "$fechas";?>">

Cliente
<input name="cliente" type="text" id="cliente" value="<?php echo "$cliente";?>">

ImporteMN
<input name="importemn" type="text" value="<?php echo "$importemn";?>">

ImporteDLS
<input name="importedls" type="text" value="<?php echo "$importedls";?>">

Estado
<input name="estado" type="text" value="<?php echo "$estado";?>">
<center>
	<input name="enviar" type="submit" value="Actualizar">
</center>

</form>
</div>
</body>
</html>




