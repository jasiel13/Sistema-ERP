<html>
<title>Datos A Graficar</title>

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
<body>
<form name="indped" id="fact" method="post" action="proind.php">
<div align="center">
<font size="+2" aria-atomic="false" color="white" style="border-color:#000">INGRESE EL RANGO DE FECHA:</font>
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
    <td><input name="ffin" type="date" 'aaaa/mm/dd'id="ffin"  />
</td></tr>

<tr align="center"><td></td>
<td><input name="enviar" type="image" title="Enviar" src="images/1396468944_34.png" align="middle"/></td>
</tr>
  </tr>
</table>

</div>
</form>
</body>
</html>