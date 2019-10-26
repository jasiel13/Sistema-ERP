<html>
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
<?php
include ('conexion.php');	
session_start();
$usuario=$_SESSION["name"];
$u=mysql_query("select nombre, apellido from usuarios where usuario='$usuario'");
while ($u1=mysql_fetch_array($u)) {
	$user=$u1[0]."".$u1[1];
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
			$up=mysql_query("update pedido set estadoc='$estadoc' where idpedido='".addslashes(strip_tags($_GET['$id1']))."'");
			if($up){
				?>
					<script language="javascript">
					alert("Registro almacenado con éxito");
					//header("refresh:1;url=coti.php");
					</script>
					<?php
				  }
			else
			{?>
				<script language="javascript">
				alert("Falló el registro Error 0.4");
				</script>
			<?php
			}
			
			}
			if ($_GET['$v']==2) {
				$estadoc='CANCELADA';
				?>
				<form name='motivo' action='updatec.php' method='POST'>
				<div align='center'>
					<strong>MOTIVO DE CANCELACION</strong>
					<p></p>
					<p></p>
				<select name='motivo'>
					<option>Seleccione...</option>
					<option value='precio'>Precio</option>
					<option value='T.E'>T.E</option>
					<option value='sinex'>Sin existencia</option>
					<option value='fc'>Fuera de catálogo</option>
				</select>
				<input type='hidden' name='pedido' value='<?php echo $_GET['$id1']; ?>'>
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
	<tr><td>Fecha</td><td>Cotizacion</td><td>Cliente</td><td><input type='image' src='images/cancelar.jpg'></td></tr>
<?php

$s=mysql_query("select fecha, idpedido, cliente from pedido where tipo='1' AND estadoc='' and vendedor='$user'" );
while($r=mysql_fetch_array($s))
{
?>
<tr><td><?php echo $r[0]?></td><td><?php echo $r[1]?></td><td><?php echo $r[2]?></td><td onclick="window.location='coti.php?$v=2&$id1=<?php echo $r[1];?>'">Cancelado</td></tr>
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