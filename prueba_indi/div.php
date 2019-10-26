<!DOCTYPE html>
<html>

<head>

<title>Contar el número de elementos con jquery</title>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

<script>

$(function(){
$n=$("input").size();
alert($n);

});

</script>

</head>

<body>

<p>Extrayendo el número total de divs con Jquery</p>

<div><input type='text'></div>
<div><input type='text'></div>
<div><input type='text'></div>
<div><input type='text'></div>
<div><input type='text'></div>
<input type='text'>
</body>

</html>
