<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.div
{
	position:absolute;
	right:370px;
	top: 288px;
	background-color: #EDF6F8;
	border: 3px solid black;
	height: 60px;
	width: 20%;
}
table {
    border-collapse: collapse;
    width: 20%;
    background-color: #EDF6F8;
    border: 3px solid black;
    box-shadow:0 0 10px;}

 td {text-align: center;
    padding: 5px;
    border: 3px solid black;}

tr:hover {background-color: #7D8D90;}

th {background-color: #94BDAB;
    color: white;
    padding: 8px;}
</style>
</head>
<?php
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
	
	$hora=date('G:i');
	$fecha=date('Y-m-d');
?>
<body>
<form name="soli" method="post" action="procsol.php">
<div align="center">
<p></p>
<font size="+2" color="040405"><strong>REGISTRAR SOLICITUD DE SERVICIO</strong></font>
<p></p>
<table>
<tr>
<td>FECHA</td>
<td><input type="date" name="fecha" value="<?php echo $fecha; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>HORA</td>
<td><input type="text" name="hora" value="<?php echo $hora; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>SERVICIO</td>
<td><select name="servicio" onchange="mostrarotra()">
<option value="#">SELECCIONE</option>
<option value="MTOEQUIPO"> MTO EQUIPO</option>
<option value="MICROSIP">MICROSIP</option>
<option value="CORTE">CORTE</option>
<option value="IMPRESORA">IMPRESORA</option>
<option value="ESCANER">ESCANER</option>
<option value="OTRA">OTRA</option>
 </select></td>
</tr>

<tr>
<div id="desdeotro" style="display:none;" class="div">	
ESPECIFIQUE
<textarea name="otro" class="input" onKeyUp="this.value=this.value.toUpperCase();"></textarea>
</div>
</tr>

<tr><td>OBSERVACIONES</td>
<td><textarea name="obser" onKeyUp="this.value=this.value.toUpperCase();"></textarea></td>
</tr>
<tr>
<td></td><td><input type="image" src="images/accept.png"/></td>
</tr>
</table>

<script type="text/javascript">
<!--
function mostrarotra(){
//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
if (document.soli.servicio.value == 'OTRA') {
//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
document.getElementById('desdeotro').style.display='block';
//por el contrario, si no esta seleccionada
} else {
//oculta el div con id 'desdeotro'
document.getElementById('desdeotro').style.display='none';
}
}
-->
</script>

</div>
</form>
</body>
</html>
