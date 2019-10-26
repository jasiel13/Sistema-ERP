<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<META HTTP-EQUIV="Refresh" CONTENT="100"; URL="">-->
<title>Documento sin título</title>


<script type="text/javascript">
    function marcar(source) 
    {
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
    }
</script>

<style type="text/css">
body
{
  font-family:Arial;
}
.bg0 {
	background-color:#009;
	color:#FFF; font-size:12px;
  font-family:Arial;
}
table {
   width: 97%;
   border: 0px solid #ADD;
   font-family:Arial;
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
tr:hover
{
    background: #069A12;
    color: white;

}
tr:out
{
    background: #FFFFFF;
    color: #000000;
}
</style>

</head>
<body>

<?php
error_reporting(0);
include ("conexion.php");
//setTimeout(Location.reload(),9000);
$qn = mysql_query("SELECT count(id) as num FROM reg_claves where estado='PENDIENTE' "); 
      
      while ($sq=mysql_fetch_array($qn))
      { 
          $tot=0;
          $tot=$tot+$sq['num'];
      }

if (isset($_GET['$id1'])) 
{
  $id=$_GET['$id1'];
  if ($_GET['$v']==1) 
  {
    $estadoc='CERRADA';
    $up=mysql_query("update reg_claves set estado='$estadoc' where id='".addslashes(strip_tags($_GET['$id1']))."'");
    if($up)
    {
      ?>
        <script language="javascript">
        alert("Registro almacenado con éxito");
        </script>
      <?php
        header( "refresh:1;url=ver_claves.php" ); 
    }
    else
    {
      ?>
        <script language="javascript">
        alert("Falló de insert!!!");
        </script>
      <?php
    }
  }
}

?>
<br>
<strong><font size="+2" color="#FFFFFF"><center>"PETICIONES DE CLAVE"</center></font></strong>
<font size="+1" color="#800040"><center></center></font>
<br>
<p></p>

<table border="5" align="center">
<tr class="bg0">
  <td>FECHA</td>
  <td>HORA</td>
  <td>USUARIO</td>
  <td width="77%">RAZON</td>
  <td>AUTORIZA</td>
  <td>ESTADO</td>
  <td><center><input type='image' src='images/aceptar.jpg'></center></td></td>
  </tr>

<?php
    $query = mysql_query("SELECT id, fecha, hora, usuario, razon, autoriza, estado FROM reg_claves where estado='PENDIENTE' order by fecha, hora DESC"); 
    date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $contador =mysql_num_rows($query);
    if ($contador!=0)
      {	

        while ($array=mysql_fetch_array($query))
        {
        	?>
          <tr>
          <td><?php echo $array[1];?></td><td><?php echo $array[2];?></td><td><?php echo $array[3];?></td><td><?php echo $array[4];?></td><td><?php echo $array[5];?></td><td><?php echo $array[6];?></td><td style="cursor: pointer" onmouseover="this.style.backgroundColor = '#06FD1D'" onmouseout="this.style.backgroundColor = '#eee'; ; this.style.color = '#000'" onclick="window.location='ver_claves.php?$v=1&$id1=<?php echo $array[0];?>'">CERRAR</td></tr>
       <?php   
        }
        ?>
        <tr><td>TOTAL DE CLAVES PENDIENTES: </td><td><center><font size='14'><strong><?php echo $tot;?></font></strong></center></td></tr> 
      <?php
      }    

    else
      {
        ?>
        <tr><td>No hay registros</td></tr></table>
        <?php
      }
        ?>    
      </table>

  <br>
  </center>
</body>
</html>
