
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Login CSN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body>

        <div class="page-container">

        <center><img  style="WIDTH: 170px; HEIGHT: 170px" src="images/logocom.png" type="image"/></center>
            <h1>Comercializadora de Suministros del Norte</h1>
                        <h2>Bienvenido!!!</h2>
            <form action="iniciarsesion.php" method="post" enctype="multipart/form-data" onsubmit="return verifica(this);">
                <input type="text" name="usuario" id="usuario" class="username" placeholder="Usuario">
                <input type="password" name="clave" id="clave" class="password" placeholder="Contraseña">
                <button type="submit">Iniciar Sesion</button>
                <div class="error"><span>+</span></div>
            </form>
            <!--
                  <div class="connect">
                      <p>Or connect with:</p>
                      <p>
                          <a class="facebook" href=""></a>
                          <a class="twitter" href=""></a>
                      </p>
                  </div> 
            -->
        </div>
             
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>
