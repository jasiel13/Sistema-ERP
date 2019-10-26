<html>
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
</head>
<body>
<form name="fact" id="fact" method="post" action="repesta.php">
<div align="center">
<font size="+2" aria-atomic="false" color="#330099" style="border-color:#000">INGRESE EL RANGO DE FECHA:</font>
&nbsp;
&nbsp;
<p></p>
<table width="300" border="1" align="center">
  <tr>
    <td><label>Fecha Inicio</label></td>
    <td><input name="finicio" type="date"  id="finicio" /></td>
  </tr>
  <tr>
    <td><label>Fecha Final</label></td>
    <td><input name="ffin" type="date" id="ffin"  />
</td></tr>
<tr>
    <td><label>Material</label></td>
    <td><select name='mate'>
      <option>SELECICIONE...</option>
      <option>TODOS</option>
      <option>POLIETILENO</option>
      <OPTION>PVC</OPTION>
      <option>CONEXIONES FOFO</option>
      <option>CONEXIONES PVC</option>
      <option>CONEXIONES PEAD</option>
      <option>BROCAL POLIMERICO</option>
      <option>BROCAL PEAD</option>
      <option>BROCAL FOFO</option>
      <option>PE AL PE</option>
      <option>RD9</option>
    </select>
</td></tr>
<tr><td>Artículo: </td><td><select name='articulo'>
      <option value='#'>SELECCIONE...</option>
      <option value='TODOS'>TODOS</option>
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
<tr align="center"><td></td>
<td><input name="enviar" type="image" title="Enviar" src="images/1396468944_34.png" align="middle"/></td>
</tr>
  </tr>
</table>

</div>
</form>
</body>
</html>