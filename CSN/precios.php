<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
.bg0
{
  background-color:#009;
  color:#FFF; font-size:12px;
}
table {
   width: 78%;
   border: 1px solid #000;
}
tr, td {
   width: 25%;
   text-align: left;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
tr {
   background: #eee;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
function click() {
    document.getElementById("registro").value = document.getElementById("#cod").value;
</script>



<head>
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
 $("#cliente").autocomplete("autocomplete.php", {
    selectFirst: true
  });
  $("#cod").autocomplete("autocod.php", {
    selectFirst: true    
  });
    $("#articulo").autocomplete("autoarti.php", {
     selectFirst: true
  });


});
</script>
</head>
<body>

	
	<div align='center'>
	<font size='+2'><strong>ESTADÍSTICAS DE PRECIOS</strong></font>
<p></p>
	<form name='precios' method='post' action='proprecio.php'>
	<table border='1'>
		<tr><td>Material: </td><td><select name='material' id='material'>
			<option value='#'>SELECCIONE...</option>
			<option value='POLIETILENO'>POLIETILENO</option>
			<option value='PVC'>PVC</option>
      <option value='CONEXIONES FOFO'>CONEXIONES FOFO</option>
      <option value='CONEXIONES PVC'>CONEXIONES PVC</option>
      <option value='CONEXIONES PEAD'>CONEXIONES PEAD</option>
      <option value='BROCAL POLIMERICO'>BROCAL POLIMERICO</option>
      <option value='BROCAL PEAD'>BROCAL PEAD</option>
      <option value='BROCAL FOFO'>BROCAL FOFO</option>
      <option value='PE AL PE'>PE AL PE</option>
      <option value='RD9'>RD9</option>
		</select></td></tr>
    <tr><td>Cliente: </td><td><input name="cliente" type="text" id="cliente" size="80" /></td></tr>
    <tr><td>Artículo: </td><td><select name='articulo'>
      <option value='#'>SELECCIONE...</option>
      <?php
      include('conexion.php');
      $q=mysql_query("select nombre from articulos");
      while ($q1=mysql_fetch_array($q)) {
        ?>
        <option value='<?php echo $q1[0];?>'><?php echo $q1[0];?></option>
        <?php
      }
      ?>
    </select></td></tr>
    
    <tr><td>Codigo</td><td><input type='text' name='cod' id="cod" onKeyUp="this.value=this.value.toUpperCase();">-</td></tr>
    <tr><td>Precio competencia: </td><td><input type='text' name='precio' onKeyUp="this.value=this.value.toUpperCase();"></td></tr>
    <tr><td>Precio CSN: </td><td><input type='text' name='pcsn' onKeyUp="this.value=this.value.toUpperCase();"></td></tr>
    <tr><td>Proveedor: </td><td><input type='text' name='proveedor' onKeyUp="this.value=this.value.toUpperCase();"></td></tr>
    <tr><td>Obra: </td><td><input type='text' name='obra' onKeyUp="this.value=this.value.toUpperCase();"></td></tr>
    <tr><td></td><td><input type='image' src='images/save.png' align='center'></td></tr>
  </table>

  </form>
</div>
<br>
<br><center>
<form method="POST" action="" onSubmit="return validarForm(this)">
 
    <input type="text" placeholder="Buscar usuario" name="palabra">
 
    <input type="submit" value="Buscar" name="buscar" id="buscar">
 
</form></center>
<br>
<?php       
      include('conexion.php');
//si existe una petición  
if($_POST['buscar']) 
{   
   ?>
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
   <table width="100%" border="1" align="center" cellpadding="1" cellspacing="1">
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="50" align="center"><strong>Codigo</strong></td>
            <td width="150" align="center"><strong>Nombre</strong></td>
            <td width="150" align="center"><strong>Medida</strong></td>
            <td width="150" align="center"><strong>Linea</strong></td>
            <td width="50" align="center">Seleccione</td>
       </tr> 
       <?php
       $buscar = $_POST["palabra"];
 
       $consulta_mysql= mysql_query ("SELECT * FROM articulos WHERE Codigo like '%$buscar%' or nombre like '%$buscar%'");
 
       while($registro = mysql_fetch_assoc($consulta_mysql)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center"><?=$registro['Codigo']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['nombre']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['medida']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['linea']?></td>
               <td class=”estilo-tabla” align="center"><input type="button" name="Seleccion" value="Seleccionar" onclick="return click();"></td>
           </tr> 
           <?php 
       } //fin blucle
    ?>
    </table>
    <?php
} // fin if  
?>

</body>
</html>