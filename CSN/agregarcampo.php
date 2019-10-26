
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="jquery-1.4.1.min.js" type="text/javascript"></script>
<script>
jQuery.fn.generaNuevosCampos = function(etiqueta, nombreCampo, indice){
   $(this).each(function(){
      elem = $(this);
      elem.data("etiqueta",etiqueta);
      elem.data("nombreCampo",nombreCampo);
      elem.data("indice",indice);
      
      elem.click(function(e){
         e.preventDefault();
         elem = $(this);
         etiqueta = elem.data("etiqueta");
         nombreCampo = elem.data("nombreCampo");
         indice = elem.data("indice");
         texto_insertar = '<p><br><input type="text" name="' + nombreCampo + indice + '" /></p>';
         indice ++;
         elem.data("indice",indice);
         nuevo_campo = $(texto_insertar);
         elem.before(nuevo_campo);
      });
   });
   return this;
}
$(document).ready(function(){
   $("#mascampos").generaNuevosCampos("Compra", "compra", 2);
});
</script>
</head>
<body>
<form>
<p>
Nombre:<br>
<input type="Text" name="nombre">
</p><p>
Edad:<br>
<input type="Text" name="Edad">
</p><p>
Compra:<br>
<input type="Text" name="material">
<p>
<a href="#" id="mascampos">Más campos</a>
</p><p>
<input type=submit value="enviar">
</p>
</form>
</body>
</html>