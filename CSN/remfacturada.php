<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">

  
table {
   width: 80%;
   border: 2px solid #000;
   margin-left: 0%;
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
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.bg0
{
	background-color:#009;
	color:#FFF; font-size:12px; font-style:inherit;
}
</style>

</head>

<body>
<div align="center">

<p></p>
<font size="+2" color="#FFFFFF"><strong>REMISIONES PENDIENTES DE FACTURAR</strong></font>
<p></p>
<table border="1">
<tr class="bg0">
<td>REMISION</td>
<td>CLIENTE</td>
<td>FECHA</td>
<td>FACT</td>
</tr>
<?php
include('conexion.php');
$q=mysql_query("select remision, fecharem, cliente from remision where facturada=' ' order by remision DESC");
$c=mysql_num_rows($q);
if ($c!=0)
{
	while ($array=mysql_fetch_array($q))
	{
		echo "<tr>
	<td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td><form action='factrem.php' method='post'><input type='hidden' name='remision' value='".$array[0]."'><input type='hidden' name='cliente' value='".$array[2]."'><input type='image' name='registrar' src='images/txt.png' align='center'></form></td></tr>";
 
		/******************************/
	}
}
else
{
echo "<tr><td>No hay registros</td></tr></table>";
	 //Mensaje de no hay registros
 }//else
echo "</table>";
?>
<input type="image" src="images/print.png" onclick="window.print(); return false;"/>

</div>
</body>
</html>