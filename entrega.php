<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/tablas.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
  .tamaño
  {
    height:100%;
  }
</style>
</head>

<body>
<form method="post" name="entrega" action="procentrega.php">
<?php
error_reporting(0);
$factura=$_POST['factura'];
$cliente=$_POST['cliente'];
$hrasalida=$_POST['hrasalida'];
$hraentrega=$_POST['hraentrega'];
$hrallegada=$_POST['hrallegada'];
$direccion=$_POST['direccion2'];
$chofer=$_POST['chofer'];
$vehiculo=$_POST['vehiculo'];
$observaciones=$_POST['observaciones'];
$fechaentrega=$_POST['fechaentrega'];
?>
<div align="center">
<font size="+2" color="#FFFFFF"><strong>REGISTRAR VIAJE DE: <?php echo $cliente?> FACTURA: <?php echo $factura?></strong></font>
<p></p>
<table border="1">
<tr>
    <td>Hora salida</td>
    <td><input type="text" name="horasa" id="horasa" value="<?php echo $hrasalida?>"/></td>
  </tr>
  <tr>
    <td>Hora entrega</td>
    <td><input type="text" name="horaen" id="horaen" value="<?php echo $hraentrega?>"/></td>
  </tr>
<tr>
    <td>Hora llegada</td>
    <td><input type="text" name="horalle" id="horalle" value="<?php echo $hrallegada?>"/></td>
  </tr>
<tr>
    <td>Chofer</td>
    <td><select name="chofer" id="chofer">
    <option  value="<?php echo $chofer?>"><?php echo $chofer?></option>
    <option value="Luis Mejia">Luis Mejia</option>   
    <option value="Javier Rodriguez">Javier Rodriguez</option>  
    <option value="Alfredo Vallejo">Alfredo Vallejo</option>
    <option value="David Frias">David Frias</option>
    <option value="David Guerrero">David Guerrero</option>    
    <option value="Manuel Gaytan">Manuel Gaytan</option>
    <option value="Adrian Gallegos">Adrian Gallegos</option>
    <option value="Fernando Baca">Fernando Baca</option>
    <option value="Jorge Jimenez">Jorge Jimenez</option>
    <option value="Jorge Lopez">Jorge Lopez</option>
    <option value="Luis A. Hernández">Luis A. Hernández</option>
    <option value="Ricardo Galindo">Ricardo Galindo</option>
    <option value="Cristian de la Paz">Cristian de la Paz</option>
          <option value="OTRO">OTRO</option>
    </select>
    </td>
  </tr>
<tr>
    <td>Vehículo</td>
    <td><select name="vehiculo" id="vehiculo">
    <option  value="<?php echo $vehiculo?>"><?php echo $vehiculo?></option>
     <option value="02">02</option>
    <option value="03">03</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="3T">3T</option>
    <option value="SE">SE</option>
    <option value="ST">ST</option>
    <option value="V">V</option>
    <option value="EXTERNO">EXTERNO</option></select>
    </td>
  </tr>
<tr>
    <td>Dirección</td>
    <td><input type="text" name="direccion" id="direccion" value="<?php echo $direccion?>" onKeyUp="this.value=this.value.toUpperCase();" size="50" maxlength="50"></td>
  </tr>
<tr>
<td>Observaciones</td>
<td height="50"><input type="text" name="obser" value="<?php echo $observaciones?>" class="tamaño"></td>
</tr>
  <tr>
  <td>Fecha Entrega</td>
  <td><input id="fechaent" type="date" name="fechaent" value="<?php echo $fechaentrega?>"></td>
  </tr>
  <tr>
  <td><input type="hidden" name="factura" value="<?php echo $factura?>"></td>
  <td><input type="image" src="images/1396468944_34.png"/></td>
  </tr>  
  </table>
  </div>
  </form>
</body>
</html>