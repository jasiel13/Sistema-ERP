<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bscBusc.css" >
	<script src="query/jquery.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function(){
            $("#prebttn").click(function(){
            $('#previsto').show();
                 $('#cambio').hide(); // Remove player from DOM            
                 });
            $("#cambttn").click(function(){
            $('#cambio').show();
                 $('#previsto').hide(); // Remove player from DOM            
                 });

    $("#vmes, #vsem, #vdia").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});
             });
        </script>
<?php
error_reporting(0);
session_start();
if ($_SESSION["autentificado"]=="4" ){
header("Location: accesodenegado.php");
exit();
}
if ($_SESSION["autentificado"]=="2" ){
header("Location: accesodenegado.php");
exit();
}
include ('query/bsc.php');
?>


<title>Documento sin título</title>
<style type="text/css">


</style>
</head>

<body>
<br>
<div align="center">
<H1>PROYECCION DE VENTAS:</H1>

<form action="bsc-sql.php" method="POST" >
<input type="txt" name="finicio" placeholder="Fecha de Inicio"> <br>
    <input name="ffin" type="date" 'aaaa/mm/dd'  value="<?php echo date("Y-m-d");?>"><br>     
    <input type="submit" value="Enviar">
</form>
<br>
<input type="button" name="prebttn" id="prebttn" value="Actualizar Montos Previstos">	|	<input type="button" name="cambttn" id="cambttn" value="Actualizar Tipo de Cambio">
<br>
<br>
<?php
    $usuario=$_SESSION["name"];
 include ('conexion.php');
    $sql=mysql_query("select id, max_mes, max_semana, max_dia, fecha, usuario from limites order by fecha ");
    while($sq1=mysql_fetch_array($sql))
    {
    $id= $sq1[0];	
    $mm= $sq1[1];
    $ms= $sq1[2];
    $md= $sq1[3];
    $fechav = $sq1[4];
    }

    $sql=mysql_query("select id, fecha, valor, usuario from tipo_de_cambio order by fecha ");
    while($sq1=mysql_fetch_array($sql))
    {
    $idtc= $sq1[0];	
    $ftc= $sq1[1];
    $vtc= $sq1[2];
    $ustc= $sq1[3];
    }
?>

	<div align="center" id="previsto" name="previsto" style="display:none;">
	<hr>
		<H1>Actualizar Monto previsto:</H1>
		<form action="bsc-update.php" method="POST" >
			<table>
				<tr>
					<td class="lab">
					</td>
					<td class="tex">
						<input type='hidden' name="id" id="id" value="<?php echo $id ?>">
					</td>
				</tr>
				<tr>	
					<td>
						<label>Previsto por Mes:</label>
					</td>
					<td>
						<input type="text" name="vmes" id="vmes" value="<?php echo money_format('%.2n', $mm); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Previsto por Semana:</label>
					</td>
					<td>
						<input type="text" name="vsem" id="vsem" value="<?php echo money_format('%.2n', $ms); ?>">
					</td>	
				</tr>
				<tr>
					<td>
						<label>Previsto por Dia:</label>
					</td>
					<td>
						<input type="text" name="vdia" id="vdia" value="<?php echo money_format('%.2n', $md); ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Usuario:</label>
					</td>
					<td>
						<input type="text" name="usu"  id="usu" value="<?php echo $usuario ?>">
					</td>
				</tr>
				<tr>
					<td>
		    			<label>Fecha:</label> 
					</td>
					<td>
						<input name="fechav" id="fechav" type="date" 'aaaa/mm/dd'  value="<?php echo $fechav;?>">
					</td>
				</tr>
			</table>
		    <input type="submit" value="Enviar">
		</form>
	</div>
	<div align="center" id="cambio" name="cambio" style="display:none;">
	<hr>
		<H1>Actualizar Tipo de cambio:</H1>
		<form action="bsc-updatetc.php" method="POST" >
			<table>
				<tr>
					<td class="lab">
					</td>
					<td class="tex">
						<input type='hidden' name="idtc" id="idtc" value="<?php echo $idtc ?>"><br>
					</td>
				</tr>
				<tr>
					<td>
						<label>Fecha:</label>
					</td>
					<td>
						<input type="date" 'aaaa/mm/dd' name="ftc" id="ftc" value="<?php echo $ftc;?>"><br> 
					</td>
				</tr>
				<tr>
					<td>
						<label>MXN:</label>
					</td>
					<td>
						<input type="text" name="vtc" id="vtc" value="<?php echo $vtc ?>"><br>
					</td>
				</tr>
				<tr>
					<td>
						<label>Usuario:</label>
					</td>
					<td>
						<input type="text" name="ustc" id="ustc" value="<?php echo $usuario ?>"><br>
					</td>
				</tr>
			</table>
			    <input type="submit" value="Enviar">
		</form>
	</div>	
</div>
</body>
</html>