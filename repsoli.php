<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.bg1
{
	background-color:#999;
}
.bg2
{
	background-color:#C70039;
}
.titulo
{
	background-color:#006;
	font-size:18px;
	color:#FFF;
}

table {
    border-collapse: collapse;
    width: 70%;
    border: 3px solid black;
    background-color: #F2F2F2;
    box-shadow:0 0 10px;}

td{text-align: center;
    padding: 3px;
    border: 2px solid black;}

tr:hover {background-color: #7D8D90;}

th {background-color: #94BDAB;
	 padding: 8px;
	 border: 2px solid black;
    color: white;}
</style>
</head>

<body>
<?php
include ('conexion.php');

?>
<div align="center">
<p></p>
<font size="+2" color="#040405"><strong>Indicadores de solicitudes de servicio</strong></font>
<p></p>
<table border="1">
<tr class="titulo">
<th>Fecha</th>
<th>Hora</th>
<th>Servicio</th>
<th>Otra</th>
<th>Usuario</th>
<th>Liberada info.</th>
<th>Hora</th>
<th>Liberada Usu</th>
<th>Hora</th>
</tr>
<?php
$q=mysql_query("select fecha, hora, servicio, otra, usuario, libinfo, libusuario, horainfo, horausu from solicitud");
$cont=mysql_num_rows($q);
if ($cont!=0)
{
	
	while ($array=mysql_fetch_array($q))
	{
		if($array[5]=='on')
	{
		$libinfo='SI';
		$estilo='';
	}
	else if ($array[6]=="")
	{
		$libinfo='NO';
		$estilo='bg2';
	}
	if($array[6]=='on')
	{
		$libusu='SI';
		$stilo='';
	}
	else if ($array[6]=="")
	{
		$libusu='NO';
		$stilo='bg2';
	}
	echo "<tr><td>".$array[0]."</td><td>".$array[1]."</td><td>".$array[2]."</td><td>".$array[3]."</td><td>".$array[4]."</td><td  class='$estilo'>".$libinfo."</td><td>".$array[7]."</td><td class='$stilo'>".$libusu."</td><td>".$array[8]."</td></tr>";
	}
}
echo "</table>";
?>
</div>
</body>
</html>