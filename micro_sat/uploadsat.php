<?php
include ("conexion.php");
 ?>
 <div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><img src="images/loading.gif" width="109" height="114" ></p>
</div>
<?php
$mes=$_POST['mes'];
$year=$_POST['year'];
$fecha=$mes." ".$year;
if (is_uploaded_file($_FILES['archivo']['tmp_name']))
	{
		
	 copy($_FILES['archivo']['tmp_name'],$_FILES['archivo']['name']);
		
$row = 0;
$fp =fopen ($_FILES['archivo']['name'],"r");
set_time_limit(0);

while ($data =fgetcsv ($fp, 1000, ","))
{
$num = count ($data);
print "<br>";
$row++;
$insertar="INSERT INTO sat (f_fiscal, rfc_em, nombre_em, total, fecha)
                    VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$fecha')"; 

mysql_query($insertar) or die (mysql_error()); 
} 
fclose ($fp); 
unlink($_FILES['archivo']['name']);
header("refresh:3; url=inicio.php");
	}
	else
	{
		
		header("refresh:3; url=inicio.php");
	}

?>