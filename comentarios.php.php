<?php
if($_POST['parada']){

$parada[]=$_POST["parada"];
$contenido[]= $_POST["contenido"];

$lista = array($parada);

for($i=0;$i<count($parada)-1;$i++){
echo $parada[$i]."->".$contenido[$i]."<br>";
}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<meta content="jquery, forumlario dinamico, tutorial" name="keywords"/>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.addfield2.js"></script>

<div id="stylized" class="myform" style="margin:20px auto;">
<form id="form" name="form" method="post" action="procomen.php">
 
	<div id="div_1">
	<label>Fecha</label>
    <input  type="date"  name="fecha" id="fecha" style="width:200px;" /> <br>
	<label>comentarios</label>
	<input  type="text"  name="comentarios" id="comentarios" style="width:200px; height:50px;" cols='30'/>
	<input class="bt_plus" id="1" type="button" value="+" /><div class="error_form">
	</div>
	
	
</div>

<button type="submit" class="boton">Save</button>
<div class="spacer"></div>
</form>
