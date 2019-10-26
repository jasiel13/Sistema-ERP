<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="css/bscBusc.css" >
<script type="text/javascript" src="jquery.js"></script>
<script src="jquery-1.4.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<script>

$(document).ready(function(){
 $("#art").autocomplete("autocom_tub.php", {
    selectFirst: true
  });
});
</script>


  <?php
      include ('conexion.php');
    session_start();
    if ($_SESSION["autentificado"]!=="5" && $_SESSION["autentificado"]!=="1" && $_SESSION["autentificado"]!=="10" ){
    header("Location: accesodenegado.php");
    exit();
    }
    $usuario=$_SESSION["name"];
  ?>

</head>
<body>

<form action="reg_sinex.php" name="registro" id="registro" method="post">	
  <div>
    <center>  
      <h2>REGISTRO DE: SIN EXISTENCIAS</h2>
    </center>
    <br>
    FECHA
    <input name="fecha" id="fecha" type="date" 'aaaa/mm/dd'  value="<?php echo date("Y-m-d");?>">
    ARTICULO
    <input type="text" name="art" id="art" required/>
    CANTIDAD
    <input type="text" name="cant"  id="cant" required/>
    IMPORTE MXN
    <input type="text" name="impmn" id="impmn" />
    IMPORTE DLS
    <input type="text" name="impdls" id="impdls" />
    COMENTARIOS
    <input type="text" name="com" id="com"/>
    USUARIO
    <input type="text" name="usu"  id="usu" value="<?php echo $usuario;?>">
    <input type="submit" value="Enviar" name="enviar" />
  </div>
</form>
</body>