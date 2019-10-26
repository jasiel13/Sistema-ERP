<head>
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
<title>Marcar todos los Checkbox</title>
</head>
<body>
<input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos
<hr/>
<input type="checkbox" name="check1" value="valor1">Valor 1<br/>
<input type="checkbox" name="check2" value="valor2">Valor 2<br/>
<input type="checkbox" name="check3" value="valor3">Valor 3<br/>
<input type="checkbox" name="check4" value="valor4">Valor 4<br/>
</body>
</html>