<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<META HTTP-EQUIV="Refresh" CONTENT="100"; URL="">-->
<title>Documento sin título</title>
<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">

     <script>
function limpiar(){
            var d = document.getElementById('grafica');
            while (d.hasChildNodes())
            d.removeChild(d.firstChild);
        }

function cargar(){
             var ini= document.getElementById('ini').value;
            var fin= document.getElementById('fin').value;

            var url="linear_plot.php?n1="+ini+"&n2="+fin;
             /*aqui mandamos llamar la función que limpia*/

            limpiar();

            /*despues creamos la grafica*/
            fi = document.getElementById('grafica');
            var imagen = document.createElement('img');
            imagen.src=url
            fi.appendChild(imagen);
        }
     </script>

<style type="text/css">

.bg0
{
	background-color:#009;
	color:#FFF; font-size:12px;
}
table {
   width: 97%;
   border: 1px solid #000;
}
tr, td {
   text-align: left;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
tr {
   background: #eee;
}
</style>
</head>

<body>

<?php
error_reporting(0);
include ("conexion.php");
//setTimeout(Location.reload(),9000);
$finicio=$_POST["finicio"];
$ffin=$_POST["ffin"];
?>
<br>
<strong><font size="+2" color="#800040"><center>Cotizaciones "SIN EXISTENCIAS"</center></font></strong>
<font size="+1" color="#800040"><center>Del: <?php echo $finicio;?> al <?php echo $ffin;?> </center></font>
<br>
<p></p>

<table border="5" align="center">
<tr class="bg0">
  <td>FECHA</td>
  <td width="77%">ARTICULO</td>
  <td>CANTIDAD</td>
  </tr>

<?php
    $query = mysql_query("SELECT fecha, articulo, sum(cantidad) FROM sin_existencia where fecha>=' $finicio' and fecha<='$ffin' group by articulo"); 
    date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $contador =mysql_num_rows($query);
    if ($contador!=0)
      {	
        while ($array=mysql_fetch_array($query))
        {
        	 echo "<tr>
        	 <td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td></tr>";
        }
      }     
    else
      {
        echo "<tr><td>No hay registros</td></tr></table>";
      }
      echo "</table>";
?>    

           
           <input type="hidden" id="ini" value="<?php echo $finicio; ?> " />
           <input type="hidden" id="fin" value="<?php echo $ffin; ?> " />


  <center>
  <br>
  <div id="grafica"></div>
               <input type="submit" value="Crear grafica" onclick="cargar()">
               <input type="submit" value="Limpiar grafica" onclick="limpiar()">
  <br>
  <input type="image" name="imprimir" src="images/print.png" onclick="window.print(); return false;"/>
  </center>
</body>
</html>
