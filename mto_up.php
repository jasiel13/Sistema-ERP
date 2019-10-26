<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
div
{
    position:absolute;
    left:100px;
    top: 100px;
    background-color: #EDF6F8;
    border: 3px solid black;
    height: 40px;
    width: 20%;
   
}
h3{text-align: center;}

button:hover {
background:#318aac;
color: #fff !important;
}
 .boton{
 color: #000205 !important;
  font-size: 15px;
  font-weight: 500;
  padding: 0.2em 1.2em;
  background: #BFC9CA;
  border: 2px solid;
  border-color: #318aac;
  transition: all 1s ease;
  position: relative;
  border-radius: 5px
  left:100px;
  top: 100px;
    }
</style>
</head>
<body>
<?php
error_reporting(0);
include ('conexion.php');
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hoy=date('Y-m-d'); 
    $count=$_POST['count'];
    for ($i=0; $i<=$count; $i++)
    {
    $equipo=$_POST['equipo'.$i];
    $liberar=$_POST['liberar'.$i];
    $obser=$_POST['observ'.$i];

    if ($liberar!='')
    {
    $up=mysql_query("update mto_equipo set fhecho='$hoy', liberar='$liberar', observ='$obser' where equipo='$equipo'");
    //echo "update mto_equipo set fhecho='$hoy', liberar='$liberar', observ='$obser' where equipo=$equipo";
    if ($up) {
        echo "<div><h3>GUARDADO!!!</h3></div>";
    }
    }
}
?>
<a href="vistamto.php" ><button class="boton">Atras</button></a> 
</body>
</html>