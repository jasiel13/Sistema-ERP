<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <script type="text/javascript" src="js/cambiarPestanna.js"></script>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <title>Consorcio Tecnoambiental</title>
    </head>
    <body>
        <div class="contenedor">
            <div class="titulo"></div>
            <div id="pestanas">
                <ul id=lista>
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Archivo CXC</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>CSS</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>JavaScript</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>PHP</a></li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>Java EE</a></li>
                    <li id="pestana6"><a href='javascript:cambiarPestanna(pestanas,pestana6);'>Android</a></li>
                </ul>
            </div>
            
            <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">
                <?php include('adcxc.php'); ?>
                </div>
                <div id="cpestana2">
                    <?php include('adcxc.php'); ?>
                </div>
                <div id="cpestana3">
                </div>
                <div id="cpestana4">
                </div>
                <div id="cpestana5">
                </div>
                <div id="cpestana6">
                </div>
            </div>
        </div>
    </body>
</html>
