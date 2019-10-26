<html>
<title>Datos A Graficar</title>
<head>
<style>
table {
   width: 40%;
   border: 2px solid #000;
}
tr, td {

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
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>



</head>
<center>
<body>
<form name="fact" id="fact" method="post" action="grafica.php">
<div align="center">
<font size="+2" aria-atomic="false" color="#330099" style="border-color:#000">INGRESE EL RANGO DE FECHA:</font>
&nbsp;
&nbsp;
<p></p>
<center>
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
   <td>Vendedor:</td>
    <td><select name="ven">
      <option value='#'>Seleccione</option>
      <option value="TODOS">TODOS</option>
      <?php
      include('conexion.php');
        $q=mysql_query("select vendedor from vendedor");
        while($q1 = mysql_fetch_array($q))
{
echo'<OPTION VALUE="'.$q1['0'].'">'.$q1['0'].'</OPTION>';
}
?>
</SELECT>
</td></tr>
<tr align="center"><td></td>
<td><input name="enviar" type="image" title="Enviar" src="images/1396468944_34.png" align="middle"/></td>
</tr>
  </tr>
</table>
</center>
</div>
</form>
</body>

</html>