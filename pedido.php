<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="query/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
    $("#importe, #importedls").on({
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
<style type="text/css">
  
table {
   width: 25%;
   border: 2px solid #000;
   margin-left: 0%;
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
.bg0
{
  background-color:#009;
  color:#FFF; font-size:12px;
}
a
{
   background-color: white;
color: black;
border: 2px solid #4CAF50;
padding: 3px 20px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin-left: 20px;
line-height: 1.5;
font-family: Verdana,sans-serif;

}

a:hover, a:active {
    background-color: #069A12;
    color:white;
}

</style>
<?php
session_start();

?>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>

<script>
$(document).ready(function(){
 $("#cliente").autocomplete("autocomplete.php", {
    selectFirst: true
  });
});
</script>
<script language="JavaScript" type="text/javascript">

function valida(document)
{
  
  if (document.pedido.value =="" )
    {
       
        alert("Ingrese folio de pedido o cotización .");
        document.pedido.focus();
    return false;
  }
  
  else if (document.cliente.value == "" )
    {
       
        alert("Ingrese el nombre del cliente.");
        document.cliente.focus();
    return false;
  }
  
  else if (document.solicito.value == "#" )
    {
       
        alert("Ingrese solicitud");
        document.solicito.focus();
    return false;
  }

  else if (document.prioridad.value == "#" )
    {
       
        alert("Indique la prioridad de la cotización o pedido.");
        document.prioridad.focus();
    return false;
  } 
   
 
}
  </script>

<script type="text/javascript">
$('input[type=checkbox]:checked').length
function valida(){    
 if ($('input[type=checkbox]:checked').length==0){       
    alert("Indique el material de la cotización o pedido.");
    return false;
 }
}
</script>


  <script type="text/javascript">
var patron = new Array(4,3,4)
var patron2 = new Array(1,3,3,3,3)
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
    val = d.value
    largo = val.length
    val = val.split(sep)
    val2 = ''
    for(r=0;r<val.length;r++){
        val2 += val[r]  
    }
    if(nums){
        for(z=0;z<val2.length;z++){
            if(isNaN(val2.charAt(z))){
                letra = new RegExp(val2.charAt(z),"g")
                val2 = val2.replace(letra,"")
            }
        }
    }
    val = ''
    val3 = new Array()
    for(s=0; s<pat.length; s++){
        val3[s] = val2.substring(0,pat[s])
        val2 = val2.substr(pat[s])
    }
    for(q=0;q<val3.length; q++){
        if(q ==0){
            val = val3[q]
        }
        else{
            if(val3[q] != ""){
                val += sep + val3[q]
                }
        }
    }
    d.value = val
    d.valant = val
    }
}
</script>

<script src="jquery-1.4.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript" src="jquery.autocomplete.js"></script>

<style type="text/css">
.mat{
    position: absolute;
    top: 50px;
    left: 650px;
    font-size: 11px;
}
.1
{
  background-color: #E6E6E6;  
}
.2
{
  background-color: #6E6E6E;
}
.listo
{
    position: absolute;
    top: 15px;
    left: 680px;
    font-size: 11px;
}
.comen
{
    font-size: 11px;
}
</style>
</head>
<body>
  <?php
   error_reporting(0);
  include ('conexion.php');
  date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    $hoy=date('Y-m-d');
    $hora=date('G:i');
    $usuario=$_SESSION["name"];
    $tipou=$_SESSION['autentificado'];
    
    $u=mysql_query("select nombre, apellido from usuarios where usuario='$usuario'");
    //echo "select nombre, apellido from usuarios where usuario='$usuario ";
    $f=mysql_fetch_array($u)
    /*********************************************/
   
/*if (isset($_GET['id']))
    {
       
    }*/
    /*************************************************/

    

?>
<form name='pedido' id='pedido' action='propedido.php' method="post" onsubmit="return valida(this);">
    <?php
 $tpc=$_POST['tipo'];
    //echo "tipo ".$tpc;

    if(isset($_GET['id'])){
        $id=$_GET['id'];
   // echo $id;
        $q=mysql_query("SELECT fecha, hora, cliente, material, solicito, vendedor, comventas, estado, tipo, importemn, importedls, prioridad, contacto, telefono from pedido where idpedido='$id'");
       // echo "SELECT fecha, hora, cliente, material, solicito, vendedor, comventas, estado from pedido where idpedido='$id' AND estado='PENDIENTE'";
        $a=mysql_fetch_array($q);
        //$ac='upedido.php';
    }
    ?>


<div align=''>
    <?php
    if (!isset($_GET['id'])) {
        # code...
    ?>


<table border='2'>
        <td><input type="button" style='width:70px; height:25px'
onMouseOver="this.style.backgroundColor='#808080'; this.style.cursor='hand';" 
onMouseOut="this.style.backgroundColor='#FFFFFF';" 
value="PEDIDO" 
onclick="window.location='pedido.php?$v=1';" this.style.visibility = "hidden" />
<td><br/></td>
<td></td>
</td><td><input type="button" style='width:97px; height:25px'
onMouseOver="this.style.backgroundColor='#808080'; this.style.cursor='hand';" 
onMouseOut="this.style.backgroundColor='#FFFFFF';" 
value="COTIZACION"  onclick="window.location='pedido.php?$v=2'"></td>
<!-- <td><input type="button" style='width:167px; height:25px'
onMouseOver="thisya.style.backgroundColor='#808080'; this.style.cursor='hand';" 
onMouseOut="this.style.backgroundColor='#FFFFFF';" 
value="VENTA DE MOSTRADOR"  onclick="window.location='venta_mostrador.php'"></td> !-->
</table>


<?php
}
if (isset($_GET['$v']) or isset($_GET['id'])) {
    # code...
$v1=$_GET['$v'];
if ($v1==1 or $a[8]==1)
{
  $s=mysql_query("select count(idpedido) from pedido where tipo='1'" );

    while($r=mysql_fetch_array($s))
    {

$tipo='PEDIDO';
$p="P";
}
}
if ($v1==2 or $a[8]==2)
{
    $s=mysql_query("select count(idpedido) from pedido where tipo='2'" );

    while($r=mysql_fetch_array($s))
    {

$tipo='COTIZACION';
$p='A';
}
}
?>
<div align='center'><strong><FONT SIZE='4'> REGISTRO DE <?php echo $tipo;?></FONT></strong></div>
<table border="1">
<tr><td>FECHA <?php echo $tipo;?>:</td><td><input type="date" name='fecha' readonly='readonly' value='<?php if ($q) {
    echo $a[0];
} else  {
    echo $hoy;
     }?>'><input type='text' size="35" name='vendedor' readonly='readonly' value='<?php if ($q) { echo $a[5];} else { echo $f[0]." ".$f[1];}?> '></td></tr>
<tr><td>HORA:</td><td><input type='text' name='hora' readonly='readonly' value='<?php echo $hora;?>'></td></tr>
<tr><td><?php echo $tipo;?>:</td><td><input type='text' value="<?php echo $p, $id;?>" name='pedido' id='pedido'onKeyUp="this.value=this.value.toUpperCase();" <?php if(isset($_GET['id'])) {?> readonly='readonly'<?php } ?> value='<?php if ($q) {
    echo $_GET['id'];
} else  {
    echo "";
}?>'></td></tr>
<tr><td>CLIENTE:</td><td><input name="cliente" type="text" id="cliente" size="60" <?php if(isset($_GET['id'])) {?> readonly='readonly'<?php } ?> value='<?php if ($q) {
    echo $a[2];
} else  {
    echo "";
     }?>' required/></tr>

<tr><td>SOLICITO:</td><td><select name='solicito'>
<?php
if($q)
{
  echo "<option>$a[4]</option>";  
}
else {
?>
<option value='#'>SELECCIONE..</option>
<option>COMPRA</option>
<option>FLETE</option>
<option>INFORMACION</option>
<option>PRECIO</option>
<option>PRECIO Y T.E</option>
<option>T.E</option>
<option>SEGUIMIENTO</option>
<option>MUESTRA</option>
<option>MEJORA DE PRECIO</option>
<?php
}

?>
</select></td></tr>
<TR><td>PRIORIDAD</td><td>
<select name='prioridad'>
    <?php
if($q)
{
  echo "<option>$a[11]</option>";  
}
else {
?>
<option value='#'>SELECCIONE</option>
<option value='NORMAL'>NORMAL</option>
<option value='IMPORTANTE'>IMPORTANTE</option>
<?php
}
?>
</select></td></TR>
<tr><td>COMENTARIOS:</td><td><textarea name='comventas' rows="2" cols="57" <?php if(isset($_GET['id'])) {?> readonly='readonly'<?php } ?> onKeyUp="this.value=this.value.toUpperCase();"><?php if ($q) {
    echo $a[6];
} else  {
    echo " ";
     }?></textarea></td></tr>
     
<tr><td>CONTACTO:</td><td><input type='text' size="35" name='contacto' value='<?php if ($q) {echo $a[12];} else  {echo " "; }?>'></td></tr>
<tr><td>TELEFONO:</td><td><input type='tel' size="35" name='tel' value='<?php if ($q) {echo $a[13];} else  {echo " "; }?>' onkeyup="mascara(this,'-',patron,true)" maxlength="15"></td></tr>
<tr><td>IMPORTE MN:</td><td><input type='text' size="35" name='importe' id='importe' value='<?php if ($q) {echo number_format($a[9],2);} else  {echo " "; }?>'></td></tr>
<tr><td>IMPORTE DLS:</td><td><input type='text' size="35" name='importedls' id='importedls' value='<?php if ($q) {echo number_format($a[10],2);} else  {echo " "; }?>'></td></tr>
<input type='hidden' name='v' value='<?php echo $v1?>'>
</table>

<?php
$m_result=mysql_query("select id, material from material");
?>
<?php
if (!isset($_GET['id'])) {
?>
<table class='mat' border='1'>
<tr><td>MATERIAL</td><td>Seleccione</td></tr>
<?php
while ($mat=mysql_fetch_object($m_result)) {
    ?>
<tr><td><?=$mat->material?></td><td><input type='checkbox' name='mat<?=$mat->id?>'/></td></tr>
<?php 
}
?>
</table>

<tr><td></td><td><input type='image' src="images/accept.png" align="middle" <?php if(isset($_GET['id'])) {?> display='none'<?php } ?>></td></tr>
<?php
}//get[id]
}//get[v]
?>
</form>
</div>
<p></p>
    
<?php
if(isset($_GET['id']))
{
    //******************Formato anterior****////
    ?>
    <DIV align='center'><font size='+2'><strong>COMENTARIOS</strong></font></DIV>
<p></p>
<?php
if($a[7]=='SEGUIMIENTO')
{
    ?>
    <a href="segcot.php?id=<?php echo $id;?>" target="frame1">Seguimiento</a><p ALIGN="left"><a href="/csn/junta.php">"Ir a Revisión de Pedidos y Cotizaciónes"</a></p>
    <?php
}
else{
?>
<a href="prueba/index.php?id=<?php echo $id;?>" target="frame1">"Agregar Comentarios"</a><p ALIGN="left"><a href="/csn/junta.php">"Ir a Revisión de Pedidos y Cotizaciónes"</a></p>
<?php 
}?>
 <div class="object">

    <iframe name="frame1" width="850" height="400" class="fondo">
    </iframe>
  </div> 

  <!--  <div align=''>
    <form name='comentarios' method='post' action='procomen.php'>
       <table border='1' class='comen'>
        <tr><td>FECHA</td><td>COMENTARIOS</td><td>F.ACORDADA</td><td>USUARIO</td></tr>
        <?php
   /* $s=mysql_query("SELECT fechac, comentarios, fechapc, usuario, hora from comentarios where idpedido='$id'");
    while($c=mysql_fetch_array($s))
    {
    ?>
        <tr><td><?php echo $c[0]."   ".$c[4]; ?></td><td><?php echo utf8_decode($c[1]);?></td><td><?php echo $c[2]; ?></td><td><?php echo $c[3]; ?></td></tr>
<?php
    }//while*/
   // date_default_timezone_set('America/Mexico_City');
    //preguntamos la zona horaria
    //$zonahoraria = date_default_timezone_get();
    //$hoy=date('Y-m-d');
    ?>
    <input type='hidden' name='idpedido' value='<?php echo $id;?>'>
    <tr><td><input type='date' name='fechac' value='<?php echo $hoy; ?>' readonly='readonly'><p><input type='text' name='usuario' value='<?php echo $f[0]."".$f[1];?>' readonly='readonly'></p></td>
    <td><textarea name='comentarios' onKeyUp="this.value=this.value.toUpperCase();"></textarea></td>
    <td><input type='date' name='fechapc'></td>
    </tr>
    <tr><td></td><td></td><td><input type='image' src="images/accept.png"></td></tr>
</table>-->
<?php
$sm=mysql_query("select id");
?>

</div>
<?php
//$cont = "<script> document.write(elem.data(indice)) </script>";
/*if ($tipou=='6') {?>
    <tr><td>CONTESTADO <input type='checkbox' name='contestada' ></td></tr>
<?php
}
if ($tipou=='5') {?>
    <tr><td>REBOTAR <input type='checkbox' name='rebotar' ></td></tr>
<?php
}
if ($tipou=='5' and $a[8]==1) {?>
    <tr><td>LIBERAR <input type='checkbox' name='liberar' ></td></tr>
<?php
}
if ($tipou=='5' and $a[8]==2) {?>
    <tr><td>SEGUIMIENTO <input type='checkbox' name='seguimiento' ></td></tr>*/


?>


<input type='hidden' name='cont' value='<?php echo $cont;?>'>
<!***********************************************************
tabla de material para pedido
*********************************************************>
<table border='1' class='listo'>
    <tr><td>ID</td><td>Material</td><td>Listo</td></tr>
<?php
$q=mysql_query("SELECT idmaterial, flisto, material from pedmat where idpedido='$id' and flisto='0000-00-00' and material='on'"); 
while ($q1=mysql_fetch_array($q))
{
    $p=mysql_query("select material from material where id='$q1[0]'");
    while ($p1=mysql_fetch_array($p))
     {
        ?>
        <tr><td><?php echo $q1[0];?></td>
        <td><?php echo $p1[0];?></td>
        <td><input type='checkbox' name='<?php echo "idmat".$q1[0];?>' value='<?php echo $q1[0];?>'></td>
        <?php
     }
}
}//if

?>
</table>
</form>
</body>
</html>