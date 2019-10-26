<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

	<?php
		session_start();
		include('conexion.php');
		$nc=$_POST['nc'];
		$fecha=$_POST['fecha'];
		$cliente=$_POST['cliente'];
		$importemn=$_POST['importemn'];
		$importedls=$_POST['importedls'];
		$factura=$_POST['factura'];
		$desc=$_POST['desc'];
		$usuario=$_SESSION["name"];


		$q=mysql_query("insert into nccta (nc, fecha, cliente, importemn, importedls, factura, descr,usuario) values ('$nc','$fecha', '$cliente', '$importemn', '$importedls', '$factura', 'desc', '$usuario')");
		/*echo "insert into ncsea (nc, fecha, cliente, importemn, importedls, factura, descr) values ('$nc','$fecha', '$cliente', '$importemn', '$importedls', '$factura', '$desc', '$usuario')";*/
		if($q){
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
	?>
</body>
</html>