<!DOCTYPE html>
<html lang="en" class="bg-black">
    <head>
        <meta charset="utf-8" />
        <title>IVR Application - Login</title>
        <!-- css -->
        <link href="web/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="web/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="web/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">IVR Application - Login</div>
            <form  action="controlador/ingresar.ctrl.php" method="post" autocomplete="on">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="txtUsuario" class="form-control" placeholder="Usuario" required />
                    </div>
                    <div class="form-group">
                        <input type="password" name="txtClave" class="form-control" placeholder="Contraseña" required />
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block">Entrar</button>
                </div>
            </form>
            <div class="margin text-center">
                <span>&copy; 2015 - 2016 | Josue Brenes</span>
            </div>
        </div>
        <!-- js 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <script src="web/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="web/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
