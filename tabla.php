<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<style>
input.text{
display:block;
}
</style>
<script language="javascript">
var fpago=new Array("-","EFECTIVO", "TARJETA", "CHEQUE","TRASALDO");
</script>
<form id='f1' name="f1" action='Document.htm'>
<div><select onchange='formapago();' name="tipo">
<option value='SELECCIONE'>SELECCIONE</option>
<option value='CONTADO'>CONTADO</option>
<option value='CREDITO'>CREDITO</option>
<option value='MUESTRA'>MUESTRA</option>
</select>


<select name="formapago">
</select>

</form>

<script language="javascript">
function formapago(){ 
   	//tomo el valor del select del pais elegido 
   	var tipo 
   	tipo = document.f1.tipo[document.f1.tipo.selectedIndex].value 
   	//miro a ver si el pais está definido 
   	if (tipo == 'CONTADO') { 
      	 //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
      	 //selecciono el array de provincia adecuado 
      	 forma_pago=eval("fpago") 
      	 //calculo el numero de provincias 
      	 numforma = forma_pago.length 
      	 //marco el número de provincias en el select 
      	 document.f1.formapago.length = numforma 
      	 //para cada provincia del array, la introduzco en el select 
      	 for(i=0;i<numforma;i++){ 
          document.f1.formapago.options[i].value=forma_pago[i] 
          document.f1.formapago.options[i].text=forma_pago[i] 
      	 }	
   	}else{ 
      	 //si no había provincia seleccionada, elimino las provincias del select 
      	 document.f1.formapago.length = 1 
      	 //coloco un guión en la única opción que he dejado 
      	 document.f1.formapago.options[0].value = "-" 
      	 document.f1.formapago.options[0].text = "-" 
   	} 
   	//marco como seleccionada la opción primera de provincia 
   	document.f1.formapago.options[0].selected = true 
}
</script>
<?php
echo php_uname('192.168.1.86');
?>
</body>
</html>