<head>
<script language="JavaScript" type="text/javascript">
 <!--Funcion que permite validar las cajas de texto-->
function valida(document)
{
if (document.clave.value != document.conclave.value )
    {
       
        alert("[ERROR] Las claves no coinciden por favor intentelo de nuevo.");
		document.clave.focus();
		return false;
	}
			
	else 
	{
        return true;
 
    }
	
}
</script>
</head>
<body>
<div align="center">
<p></p>
<font size="+2" color="#000066"><strong>REGISTRAR USUARIO</strong></font>
<p></p>
<form name="usuario" method="post" action="altausuario.php" onSubmit="return valida(this)">
<table border="1">
<tr>
<td>Usuario</td>
<td><input type="text" name="usuario" onKeyUp="this.value=this.value.toUpperCase();"/></td></tr>
<td>Nombre</td>
<td><input type="text" name="nombre" onKeyUp="this.value=this.value.toUpperCase();"/></td></tr>
<td>Apellido</td>
<td><input type="text" name="apellido" onKeyUp="this.value=this.value.toUpperCase();"/></td></tr>
<tr><td>Clave</td>
<td><input type="password" name="clave"/></td></tr>
<tr><td>Confirmar clave</td>
<td><input type="password" name="conclave"/></td></tr>
<tr><td>Tipo usuario</td>
<td><select name="tipo">
<option value="#">Seleccione</option>
<option value="1">Administrador</option>
<option value="2">Facturacion</option>
<option value="3">Cobranza</option>
<option value="4">Almacen</option>
<option value='5'>Ventas</option>
<option value='6'>Compras</option>
<option value='7'>Contabilidad</option>
<option value='8'>SEA</option>
</select></td>
</tr>
<tr>
<td></td><td><input type="image" src="../csn/images/save.png"/></td>
</tr>
</table>
</form>
</div>
</body>