<?php
include ('conexion.php');
$mat=$_POST['material'];
$cliente=$_POST['cliente'];
$articulo=$_POST['articulo'];
$codigo=$_POST['cod'];
$precio=$_POST['precio'];
$pcsn=$_POST['pcsn'];
$proveedor=$_POST['proveedor'];
$obra=$_POST['obra'];

date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hoy=date('Y-m-d');
session_start();
    $usuario=$_SESSION["name"];
    $tipou=$_SESSION['autentificado'];
    
    $u=mysql_query("select nombre, apellido from usuarios where usuario='$usuario'");
    //echo "select nombre, apellido from usuarios where usuario='$usuario ";
    $f=mysql_fetch_array($u);
    $us=$f[0]." ".$f[1];
    
$q=mysql_query("insert into precios (material, cliente, fecha, articulo, codigo, precio, preciocsn, proveedor, obra, usuario) values ('$mat', '$cliente', '$hoy', '$articulo','$codigo' , '$precio', '$pcsn', '$proveedor', '$obra', '$us') ");
if ($q) 
{
?>
<script language="javascript">
alert("Registro almacenado con éxito");
</script>
<?php
}
else
{?>
<script language="javascript">
alert("Falló el registro INSERT!");
</script>
<?php
}
?>
