<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php
include('conexion.php');
$id=$_POST['id'];
date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
	$hora=date('G:i');
	
$q=mysql_query("update solicitud set libusuario='on', horausu='$hora' where ID='$id'");
if($q)
{
	?>
    <script language="javascript">
	alert ("Solicitud liberada!");
    </script>
<?php
}
else
{
	?>
<script language="javascript">
	alert ("Solicitud liberada!");
    </script>
    <?php
}
?>
</body>
</html>