<html>
<head>
<title>Mi primer Grafica en PHP</title>

<style type="text/css">
.t
{
	background-color: #0040FF;
	color: #FFFFFF;
	font-weight:bold;
}
.l
{
	background-color: #0040FF;
	color: #FFFFFF;
width: 40%;
}
.s
{
	background-color: #0040FF;
	color: #FFFFFF;
width: 10%;
}
  
table {
   width: 100%;
   border: 2px solid #000;
   margin-left: 0%;
}
tr, td {

   text-align: left;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
   font-size: 12;
   font-family: arial;
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
</style>
</head>

<body>
<div align='center'>

<?php
//error_reporting(0);
$finicio=$_POST['finicio'];
$ffin=$_POST['ffin'];
$mate=$_POST['mate'];
$art=$_POST['articulo'];
include ('conexion.php');
?>
<p></p>
<div align='center'>
<font size='+2' color="white"><strong>ESTADISTICAS DE PRECIOS DE <?php echo $mate; ?> DEL DIA <?php echo $finicio?> AL DIA <?php echo $ffin?></strong></font>
</div>
<p></p>
<p></p>
<table border='1'>
	<tr class='t'><td>FECHA</td><td>CLIENTE</td><td class='s'>MAT.</td><td class='l'>ARTICULO</td><td>P. COMPETENCIA</td><td>PRECIO CSN</td><td>PROVEEDOR</td><td>OBRA</td></tr>

<?php
if ($mate=='TODOS' and $art=='TODOS')
{
	$s=mysql_query("select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin' order by fecha desc");
	//echo "select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin'";
}
if ($mate=='TODOS' and $art!='TODOS')
{
	$s=mysql_query("select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin' and articulo='$art' order by fecha desc");
	//echo "select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin'";
}
if ($mate!='TODOS' and $art!='TODOS')
{
	$s=mysql_query("select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin' and material='$mate' and articulo='$articulo' order by fecha desc");
	//echo "select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin'";
}

if ($mate!='TODOS' and $art=='TODOS')
{
	$s=mysql_query("select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin' and material='$mate' order by fecha desc");
	//echo "select fecha, cliente, material, articulo, precio, preciocsn, proveedor, obra from precios where fecha >= '$finicio' AND fecha <= '$ffin'";
}
	
while ($s1=mysql_fetch_array($s)) {
	?>
		<tr><td><?php echo $s1[0]; ?></td><td><?php echo $s1[1]; ?></td><td><?php echo $s1[2]; ?></td><td><?php  echo $s1[3]; ?></td><td><?php echo $s1[4]; ?></td><td><?php echo $s1[5]; ?></td><td><?php echo $s1[6]; ?></td><td><?php echo $s1[7]; ?></td></tr>
	<?php
	}

	?>
</table>
</div>