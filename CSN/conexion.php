<?php

$db = mysql_connect ('localhost', 'root', 'Csn960821'); mysql_select_db ('comercializadora');
if (isset ($db))
{
?>
<script language="javascript">
//alert ("Conexión Exitosa!");
</script>
<?php
}else{
?>
<script language="javascript">
alert ("Falló conexión!");
</script>
<?php
}
?>