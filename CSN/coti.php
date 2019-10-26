<html>
    <link rel="stylesheet" type="text/css" href="css/bscBusc.css" >
<script type="text/javascript">
    function marcar(source) 
    {
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
    }
</script>
<script language="JavaScript" type="text/javascript">

function valida(document)
{
  
  if (document.motivo.value =="#" )
    {
       
        alert("Ingrese el motivo de la cancelación .");
        document.motivo.focus();
    return false;
  }
}
</script>
<?php
	include ('conexion.php');	
	session_start();
	$usuario=$_SESSION["name"];
	$tipo=$_SESSION["autentificado"];
	$u=mysql_query("select nombre, apellido from usuarios where usuario='$usuario'");
	while ($u1=mysql_fetch_array($u)) {
		$user=$u1[0]." ".$u1[1];
	}
?>
</head>
<body>
	<?php
		if (isset($_GET['$id1'])) 
		{
			$id=$_GET['$id1'];
			if ($_GET['$v']==1) {
				$estadoc='ACEPTADA';
				?>
				<form name='motivo' action='updatec_acep.php' method='POST' onsubmit="return valida(this);">
				<div align='center'>
					<strong>IMPORTE FINAL</strong>
					<p></p>
					<p></p>
				<input type="text" name="imp_finalmxn" id="imp_finalmxn" placeholder="IMPORTE MXN">
				<input type="text" name="imp_finaldls" id="imp_finaldls" placeholder="IMPORTE DLS">
				<input type='date' name='fecha_canc' value="<?php echo date("Y-m-d");?>">
				<input type='text' name='pedido' id="pedido" value='<?php echo $_GET['$id1']; ?>' readonly='readonly'>
				<p></p>
				<input type='image' src='images/save.png'>
			    </div>	
			</form>
				<?php
			}
			
			if ($_GET['$v']==2) {
				$estadoc='CANCELADA';
				?>
				<form name='motivo' action='updatec.php' method='POST' onsubmit="return valida(this);">
				<div align='center'>
					<strong>MOTIVO DE CANCELACION</strong>
					<p></p>
					<p></p>
				<select name='motivo'>
					<option value='#'>Seleccione...</option>
					<option value='Precio'>Precio</option>
					<option value='T.E'>T.E</option>
					<option value='Recotización'>Recotización</option>
					<option value='Cambio de material'>Cambio de material</option>
					<option value='Credito'>Credito</option>
					<option value='Existencia'>Existencia</option>
					<option value='Cambio de preoyecto'>Cambio de preoyecto</option>
					<option value='Cotizacion tardia'>Cotizacion tardia</option>
					<option value='Otros'>Otros</option>
				</select>
				<input type="text" name="com" id="com">
				<input type='hidden' name='pedido' value='<?php echo $_GET['$id1']; ?>'>
				<input type='date' name='fecha_canc' value="<?php echo date("Y-m-d");?>">
				<p></p>
				<input type='image' src='images/save.png'>
			    </div>	
			</form>
				<?php
			}
				//echo $estadoc;
			
			//echo "update pedido set estadoc='$estadoc' where idpedido='".addslashes(strip_tags($_GET['$id1']))."'";
			
			
		}
		else
		{
	?>
	<div align='center'>
		<p></p>
		<strong><font size='+2'>Cotizaciones Pendientes</font></strong>
		<p></p>
	<form name='coti' action='coti.php'>
<table border='1'>
	<tr><td>Fecha</td><td>Cotizacion</td><td>Vendedor</td><td>Cliente</td><td><input type='image' src='images/aceptar.jpg'></td><td><input type='image' src='images/cancelar.jpg'></td></tr>
<?php
if($tipo==1 or $tipo==6 or $tipo==10){
$s=mysql_query("select fecha, idpedido, cliente, vendedor from pedido where tipo='2' AND estadoc='' order by fecha desc" );
}
else 
{
$s=mysql_query("select fecha, idpedido, cliente, vendedor from pedido where tipo='2' AND estadoc='' and vendedor='$user' order by fecha desc" );
}
while($r=mysql_fetch_array($s))
{
?>
<tr><td><?php echo $r[0]?></td><td><?php echo $r[1]?></td><td><?php echo $r[3]?></td><td><?php echo $r[2]?></td><td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#F7FE2E'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='coti.php?$v=1&$id1=<?php echo $r[1];?>'">Aceptada</td><td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#0040FF'" onmouseout="this.style.backgroundColor = 'white'" onclick="window.location='coti.php?$v=2&$id1=<?php echo $r[1];?>'">Cancelada</td></tr>
<?php
}
?>
</table>
</form>
</div>	
<?php
}
?>
</body>
</html>