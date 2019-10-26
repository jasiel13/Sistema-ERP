<form name="f1" id="remision" method="post" action="procrem.php" >

<table>
<tr><td>Tipo de pago</td>
<td><select name=tpago onchange="cambia_forma()"> 
<option value="0" selected>Seleccione... 
<option value="PAGO">PAGO
<option value="ANTICIPO">ANTICIPO 
</select>
</td>
</tr>
<tr>
<td>Importe</td>
<td><input type="text" name=fpago id="fpago" disabled="disabled" /> 
</td>
</tr>
</table>

<select name="factura">
<option>Seleccione una Opcion...</option>
<?php 
include ("conexion.php");
 
$clavebuscadah=mysql_query("select * from facturacion where cliente='CONSTRUCTORA HUV, S.A. DE C.V.'
");
while($row = mysql_fetch_array($clavebuscadah))
{
echo'<OPTION VALUE="'.$row['1'].'">'.$row['1'].'</OPTION>';
}
 
?>
</SELECT>

</form>
<script language="javascript">
var formapago=new Array("-","EFECTIVO","CHEQUE", "TARJETA","TRASPSALDO");

function cambia_forma(){ 
   	//tomo el valor del select del pais elegido 
   	var fp 
   	fp = document.f1.tpago[document.f1.tpago.selectedIndex].value 
   	//miro a ver si el pais está definido 
   	if (fp == 'ANTICIPO') { 
      	  document.f1.fpago.disabled = false;
      	 
   	}else{ 
      	 //si no había provincia seleccionada, elimino las provincias del select 
      	       	  document.f1.fpago.disabled = true;

		    	} 
   	//marco como seleccionada la opción primera de provincia 
}
</script>
