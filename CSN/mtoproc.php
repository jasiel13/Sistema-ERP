<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<!--se le dio estilo a la tabla  JB-->
<style type="text/css">
	table {
    border-collapse: collapse;
    width: 50%;}
 td {
    text-align: center;
    padding: 8px;}

tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #4CAF50;
    color: white;}

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
    }
</style>

<body>
	<h2 align="center">Equipo Seleccionado para Mantenimiento</h2>
	<!--se creo una tabla para que el dato no apareciera solo $r[0]-->
<?php
error_reporting(0);
include ('conexion.php');
$fprog=$_POST['fprog'];
for ($i=1; $i<=23; $i++) {
	$equipo=$_POST['eq'.$i];
	if($equipo!=''){
		$e=mysql_query("select equipo from usuarios where idequipo='$i'");
		$r=mysql_fetch_array($e);
		echo
		"<center>
	  <table>
	     <tr>
			<th>EQUIPO</th>			
		</tr>
		<tr>
			<td>$r[0]</td>			
		</tr>
	  </table>
	    </center>";		
	    $m=mysql_query("insert into mto_equipo (equipo, fprog) values ('$r[0]', '$fprog')");
	}
   }
?>
<br>
<center>
<a href="mto.php" ><button class="boton">Atras</button></a>
</center>
</body>
</html> 

