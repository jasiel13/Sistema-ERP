<html>
<head>
<style type="text/css">
.dif{background-color: #FE2E2E; color: #FFFFFF; font: 100% sans-serif;}
.i{ background-color: #D8D8D8;}
.t{background-color: #1C1C1C; color: #FFF;}
</style>
</head>
<body>

	<table border='1'>
		<tr style="CURSOR:Hand;" onclick="window.location='menucxp.php?$t=1'"><td>Subir Archivo Microsip</td></tr>
		<tr style="CURSOR:Hand;" onclick="window.location='menucxp.php?$t=2'"><td>Subir Archivo SAT</tr>
		<tr style="CURSOR:Hand;" onclick="window.location='menucxp.php?$t=3'"><td>Comparativa Microsip / SAT</td></tr>
	</table>
<?php
include ('conexion.php');
if (isset ($_GET['$t'])) {
	if ($_GET['$t']==1) {
		
	
	?>
	<style type="text/css">
body{background-color:#C6D9E1;}
}
</style>
<script type="text/javascript">
    function checkFile() {
        var fileElement = document.getElementById("archivo");
        var fileExtension = "";
        if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
        }
        if (fileExtension == "csv") {
            return true;
        }
        else {
            alert("Favor de cargar un archivo con extension *.CSV");
            return false;
        }
    }
</script>
<form name="cargar" action="uploadmicro.php" method="post" enctype="multipart/form-data" onsubmit="return checkFile();">
  <div align="center">
    <p><font size="+2">Cargar Archivo Microsip </font>   </p>
    <p>&nbsp;</p>
    <select name='mes'>
        <option value='#'>Seleccione...</option>
        <option>ENERO</option>
        <OPTION>FEBRERO</OPTION>
        <OPTION>MARZO</OPTION>
        <OPTION>ABRIL</OPTION>
        <OPTION>MAYO</OPTION>
        <OPTION>JUNIO</OPTION>
        <OPTION>JULIO</OPTION>
        <OPTION>AGOSTO</OPTION>
        <OPTION>SEPTIEMBRE</OPTION>
        <OPTION>OCTUBRE</OPTION>
        <OPTION>NOVIEMBRE</OPTION>
        <OPTION>DICIEMBRE</OPTION>
    </select>
     <select name='year'>
        <?php 
        for ($i=2014; $i<=2030; $i++) {
        echo "<option value='$i'>$i</option>";
        }  ?>
    </select>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Cargar archivo *.CSV Microsip </p>
    
      <input type="file" name="archivo" id="archivo" />
      <input type="submit" value="Cargar" />
    </p>
  </div>
</form>
<?php
}//$_GET==1

if($_GET['$t']==2)
{
	?>
<style type="text/css">
body{background-color:#C6D9E1;}
}
</style>
<script type="text/javascript">
    function checkFile() {
        var fileElement = document.getElementById("alumno");
        var fileExtension = "";
        if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
        }
        if (fileExtension == "csv") {
            return true;
        }
        else {
            alert("Favor de cargar un archivo con extension *.CSV");
            return false;
        }
    }
</script>
<form name="cargar" action="uploadsat.php" method="post" enctype="multipart/form-data" onsubmit="return checkFile();">
  <div align="center">
    <p><font size="+2">Cargar archivo SAT </font>   </p>
    <p>&nbsp;</p>
    <select name='mes'>
        <option value='#'>Seleccione...</option>
        <option>ENERO</option>
        <OPTION>FEBRERO</OPTION>
        <OPTION>MARZO</OPTION>
        <OPTION>ABRIL</OPTION>
        <OPTION>MAYO</OPTION>
        <OPTION>JUNIO</OPTION>
        <OPTION>JULIO</OPTION>
        <OPTION>AGOSTO</OPTION>
        <OPTION>SEPTIEMBRE</OPTION>
        <OPTION>OCTUBRE</OPTION>
        <OPTION>NOVIEMBRE</OPTION>
        <OPTION>DICIEMBRE</OPTION>
    </select>

    <select name='year'>
        <?php 
        for ($i=2014; $i<=2030; $i++) {
        echo "<option value='$i'>$i</option>";
        }  ?>
    </select>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Cargar archivo *.CSV SAT</p>
    
      <input type="file" name="archivo" id="archivo" />
      <input type="submit" value="Cargar" />
    </p>
  </div>
</form>
<?php
}//$_GET==2

if ($_GET['$t']==3) {
	?>
	
<form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
<?php
include ('conexion.php');
$estilo='i';
$f=mysql_query("select fecha from microsip group by fecha");
?>
<select name='fecha'>
	<option>Seleccione...</option>
<?php
while ($f1=mysql_fetch_array($f))
{
?>
<option><?php echo $f1[0];?></option>
<?php
}
?>
</select>
<input type='submit' name='submit' value='Ir'>
</form>
 
<?php

}
  }//isset $_GET

 if(isset($_POST['submit']))
    {
$fecha=$_POST['fecha'];
echo $fecha;?>
<table border='1'>
<tr class='t'><td>RFC</td><td>NOMBRE</td><td>SALDO FINAL MICROSIP</td><td>SALDO FINAL SAT</td></tr>
<?php
$i=0;
$co=mysql_query("select count(*) from microsip where fecha='$fecha'");
$t=mysql_fetch_array($co);
//echo $t[0];
$q=mysql_query("select nombre, saldo, rfc from microsip where fecha='$fecha'");
//echo "select cuenta, saldofinal, nombre from conta where fecha='$fecha'";
while ($q1=mysql_fetch_array($q)) 
{
    
    //$i++;
	$w=mysql_query("select nombre_em, total from sat where fecha='$fecha'");
		while ($w1=mysql_fetch_array($w))
		{
			if($q1[0]==$w1[0])
			{
				if($q1[1]!=$w1[1])
				{
					$estilo='dif';
				}
				else
					{$estilo='i';}
				//echo "cuenta conta ".$q1[0]."cuenta cxc  ".$w1[0]. "saldo final conta".$q1[1]."saldo final cxc".$w1[1]."<br>";
				?>
			     <tr class='<?php echo $estilo ?>'><td><?php echo $q1[2]?></td><td><?php echo $q1[0] ?></td><td><?php echo number_format($q1[1],2) ?></td><td><?php echo number_format($w1[1],2) ?></td></tr>
			     <?php
			}
           
           
		}
}
?>
<tr>
<td align='center'>
<input type="image" name="imprimir" src="images/print.png" onclick="window.print(); return false;"/></td></tr>
</table>
<?php
}//$_POST
?>
</body>
</html>