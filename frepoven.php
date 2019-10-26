<html>
<title>Datos A Graficar</title>

<style type="text/css">

table {
   width: 30%;
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
<form name="fact" id="fact" method="post" action="repvendedor.php">
<div align="center">
<font size="+2" aria-atomic="false" color="#330099" style="border-color:#000">INGRESE EL RANGO DE FECHA:</font>
&nbsp;
&nbsp;
<p></p>
<table width="300" border="1" align="center">
  <tr>
    <td><label>Fecha Inicio</label></td>
    <td><input name="finicio" type="date" 'aaaa/mm/dd'  id="finicio" /></td>
  </tr>
  <tr>
    <td><label>Fecha Final</label></td>
    <td><input name="ffin" type="date" 'aaaa/mm/dd' id="ffin"  /></td>
  </tr>

<tr align="center"><td></td>
<td><input name="enviar" type="image" title="Enviar" src="images/1396468944_34.png" align="middle"/></td>
</tr>
  </tr>
</table>

</div>
</form>
</body>
</html>