<!--codigo para la tabla donde se muestran los datos-->
<style>
	.contenedor{margin:28px auto;width:960px;font-family:sans-serif;font-size:12px;
		}
	table {width:95%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2;}
	th {padding:5px;background:#555;color:#fff}
	td {padding:5px;border:solid #ddd;border-width:0 0 1px;}
		.editable span{display:block;}
		.editable span:hover {background:url(images/edit.png) 90% 50% no-repeat;cursor:pointer}
		
		td input{height:24px;width:200px;border:1px solid #ddd;padding:0 5px;margin:0;border-radius:6px;vertical-align:middle}
		a.enlace{display:inline-block;width:24px;height:24px;margin:0 0 0 5px;overflow:hidden;text-indent:-999em;vertical-align:middle}
			.guardar{background:url(images/save2.png) 0 0 no-repeat}
			.cancelar{background:url(images/cancel.png) 0 0 no-repeat}
	
	.mensaje{display:block;text-align:center;margin:0 0 20px 0}
		.ok{display:block;padding:10px;text-align:center;background:green;color:#fff}
		.ko{display:block;padding:10px;text-align:center;background:red;color:#fff}
		h1{color:white;text-align:center}

		tr:nth-child(odd){
    background: #E6E6E6;
    color: black;
}
 
tr:nth-child(even){
    background: #FFFFFF;
    color: #000000;
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

$factura=$_POST['factura'];
$observ=$_POST['observ'];
$id=$_POST['id'];
$formadepago=$_POST['formadepago'];
$estado=$_POST['estado'];
$tipo=$_POST['tipo'];

$query= mysql_query("UPDATE facturacion SET obserfac='$observ', formapago='$formadepago', estado='$estado',tipopago='$tipo' where factura = '$factura' AND ID='$id' ") or die(mysql_error());
$res = mysql_query("SELECT ID,factura,importemn, importe_dls, formapago, fechafactura, obserfac, estado, tipopago FROM facturacion  where factura = '$factura' AND ID='$id'") or die(mysql_error());

echo "
     <center>
	<table border = 1 cellspacing = 1 cellpadding = 1>

		<tr>

			<th>ID</th>
			<th>Factura</th>
			<th>Importe MXN</th>
			<th>Importe DLS</th>
			<th>Forma de pago</th>
			<th>FechaFactura</th>			
			<th>Observaciones</th>
			<th>Estado</th>
			<th>Tipo de pago</th>			
		</tr>";


while($row = mysql_fetch_array($res)){

	echo "

		<tr>

			<td>".$row["ID"]."</td>
			<td>".$row["factura"]."</td>
			<td>".$row["importemn"]."</td>
			<td>".$row["importe_dls"]."</td>
			<td>".$row["formapago"]."</td>
			<td>".$row["fechafactura"]."</td>
			<td>".$row["obserfac"]."</td>
			<td>".$row["estado"]."</td>
			<td>".$row["tipopago"]."</td>
		</tr>
		</table>
		</center>";

}


?>
<br>
<center>
<a href="buscarfac.php" ><button class="boton">Atras</button></a>
</center>