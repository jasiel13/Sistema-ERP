<!--codigo para la tabla donde se muestran los datos-->
<style>
	
	table {width:95%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2;}
	th {padding:5px;background:#555;color:#fff}
	td {padding:5px;border:solid #ddd;border-width:0 0 1px;}		
		
	td{height:24px;width:200px;border:1px solid #ddd;padding:0 5px;margin:0;border-radius:6px;vertical-align:middle}		
	h3{color:#1C1A19;text-align:center}

	tr:nth-child(odd){
    background: #E6E6E6;
    color: black;}
 
tr:nth-child(even){
    background: #FFFFFF;
    color: #000000;
}

div.color{
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 30%;  
    margin-left: auto;
    margin-right: auto;
    font-family: helvetica,arial,sans-serif;
}
/*codigo para el boton*/
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

<?php
include ('conexion.php');

$remision=$_POST['remision'];
$fechar=$_POST['fechar'];
$cliente=$_POST['cliente'];
$importemn=$_POST['importemn'];
$importedls=$_POST['importedls'];
$estado=$_POST['estado'];
$tipo=$_POST['tipo'];
$forma=$_POST['forma'];

$query= mysql_query("UPDATE remision SET fecharem='$fechar', cliente='$cliente', importemn='$importemn', importedls='$importedls', estado='$estado', tipopago='$tipo', formapago='$forma' where remision = '$remision'") or die(mysql_error());
if (mysql_affected_rows()>0){
$res = mysql_query("SELECT remision,fecharem,cliente,importemn, importedls,estado,tipopago,formapago FROM remision where remision = '$remision'") or die(mysql_error());
echo "
     <center>
	<table border = 1 cellspacing = 1 cellpadding = 1>
		<tr>
			<th>Remision</th>
            <th>Fecha</th>
			<th>Cliente</th>			
			<th>Importe MXN</th>
			<th>Importe DLS</th>
			<th>Estado</th>	
            <th>TipoPago</th>
            <th>FormaPago</th>
		</tr>";
while($row = mysql_fetch_array($res)){

	echo "
		<tr>
			<td>".$row["remision"]."</td>
			<td>".$row["fecharem"]."</td>
			<td>".$row["cliente"]."</td>
			<td>".$row["importemn"]."</td>
			<td>".$row["importedls"]."</td>			
			<td>".$row["estado"]."</td>
			<td>".$row["tipopago"]."</td>
			<td>".$row["formapago"]."</td>
		</tr>
		</table>
		</center>";
 }
}
else
{
	 echo '<div class="color"><h3>Sin Modificaciones</h3></div>'; 
}
?>
<br>
<center>
<a href="buscarremision.php" ><button class="boton">Atras</button></a>
</center>