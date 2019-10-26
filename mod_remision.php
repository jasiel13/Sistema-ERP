<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
	<meta charset="UTF-8">	
	<title>Remision</title>
	<style>
	
	table {width:95%;box-shadow:0 0 10px #ddd;text-align:left; background-color: #F2F2F2;}
	th {padding:5px;background:#555;color:#fff}
	td {padding:5px;border:solid #ddd;border-width:0 0 1px;}
		h1{color:white;text-align:center}
		h2{color:white}

		tr:nth-child(odd){
    background: #E6E6E6;
    color: black;
}
 
tr:nth-child(even){
    background: #FFFFFF;
    color: #000000;
}

/*codigo para el nuevo formulario*/
input[type=text], select {
    width: 80%;
    padding: 8px 16px;
    
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
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 20%;
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

/*codigo para el boton*/
button:hover {
background-color: #45a049;
}

.boton{
  width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
<!--codigo para validar minimo de caracteres-->
 <script> 
     function validar(frm) {
    if (frm.rem.value.length<4) {
    alert('remision incompleta');
    frm.rem.focus();
    return false:
  }
}  
 </script>

</head>
<?php
include('conexion.php');

$fecha=$_POST['fechar'];

$res = mysql_query("SELECT remision, fecharem, cliente,importemn, importedls, estado, tipopago, formapago FROM remision where fecharem = '$fecha'") or die(mysql_error());

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

	echo "<tr>";
	echo "<td>".$row['remision']."</td>";        
	echo "<td>".$row['fecharem']."</td>";
	echo "<td>".$row['cliente']."</td>";
	echo "<td>".$row['importemn']."</td>";
	echo "<td>".$row['importedls']."</td>";	
	echo "<td>".$row['estado']."</td>";	
    echo "<td>".$row['tipopago']."</td>";     
    echo "<td>".$row['formapago']."</td>";     	
	echo "</tr>";
}
echo "</table>";
?>
<body>
<br>
<br>
<form name="modificarr" id="modificarr" method="post" action="rellenar_rem.php">
<div class="color">
<center>
<h3>Modificaciones</h3>
</center>             
Remision
<input name="remision" type="text" id="rem" required minlength="4"> 
<input name="enviar" type="submit" value="Enviar">
<br>
</div>
</form>
</body>
</html>