<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form name="f1"> 
<select name=tpago onchange="cambia_forma()"> 
<option value="0" selected>Seleccione... 
<option value="CONTADO">CONTADO 
<option value="CREDITO">CREDITO 
<option value="MUESTRA">MUESTRA  
</select>

<select name=fpago> 
<option value="-">- 
</select> 
</form>



<script language="javascript">
var formapago=new Array("-","EFECTIVO","CHEQUE", "TARJETA","TRASP SALDO");

function cambia_forma(){ 
   	//tomo el valor del select del pais elegido 
   	var fp 
   	fp = document.f1.tpago[document.f1.tpago.selectedIndex].value 
   	//miro a ver si el pais está definido 
   	if (fp == 'CONTADO') { 
      	 //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
      	 //selecciono el array de provincia adecuado 
      	 mis_formas=eval("formapago") 
      	 //calculo el numero de provincias 
      	 num_formas = mis_formas.length 
      	 //marco el número de provincias en el select 
      	 document.f1.fpago.length = num_formas
      	 //para cada provincia del array, la introduzco en el select 
      	 for(i=0;i<num_formas;i++){ 
          document.f1.fpago.options[i].value=mis_formas[i] 
          document.f1.fpago.options[i].text=mis_formas[i] 
      	 }	
   	}else{ 
      	 //si no había provincia seleccionada, elimino las provincias del select 
      	 document.f1.fpago.length = 1 
      	 //coloco un guión en la única opción que he dejado 
      	 document.f1.fpago.options[0].value = "-" 
      	 document.f1.fpago.options[0].text = "-" 
   	} 
   	//marco como seleccionada la opción primera de provincia 
   	document.f1.provincia.options[0].selected = true 
}

</script>
</body>
</html>