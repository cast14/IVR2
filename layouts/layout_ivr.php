
<?php 

 if(!empty($_SESSION['var_nombreusuario'])):
    $nombre=  $_SESSION['var_nombreusuario'];
    $perfil=  $_SESSION['var_perfil'];
  endif;

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>IVR Application - Perfil Editar</title>
        <!-- css -->
        <link href="web/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="web/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="web/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="web/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="web/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="web/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="web/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="web/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link href="web/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="web/css/jQueryUI/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="web/js/plugins/footable/css/footable.core.min.css">
        <script type="text/javascript" language="javascript" src="web/js/input-mask.js" ></script>
        <script type="text/javascript" src="web/js/js_formulario.js"></script>           <!-- Prefetched Secondary Style -->
        <script type="text/javascript" src="web/js/eliminar.js"></script>
        <link href="web/css/mystyle.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black fixed">
        <header class="header">
            <a href="#" class="logo" style="font-family: 'Source Sans Pro', sans-serif;">
               IVR Application
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $nombre ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header bg-light-blue">
                                    <img src="web/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                      <?php echo $nombre ?> - <?php echo $perfil ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="controlador/logout.ctrl.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="web/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?php echo $nombre ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-home"></i> <span>Inicio</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span>Mantenimientos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./?vista=list_empresa"><i class="fa fa-chevron-circle-right"></i> Empresa</a></li>
                                <li><a href="./?vista=list_sucursal"><i class="fa fa-chevron-circle-right"></i> Sucursal</a></li>
                                <li><a href="./?vista=list_perfil"><i class="fa fa-chevron-circle-right"></i> Perfil</a></li>
                                <li><a href="./?vista=list_usuario"><i class="fa fa-chevron-circle-right"></i> Usuario</a></li>
                                <li><a href="./?vista=list_campana"><i class="fa fa-chevron-circle-right"></i> Campaña</a></li>
                                <li><a href="#"><i class="fa fa-chevron-circle-right"></i> Dial</a></li>
                                <li><a href="#"><i class="fa fa-chevron-circle-right"></i> Dial Hist</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>Configuraciones</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-chevron-circle-right"></i> Dial Config</a></li>
                                <li><a href="#"><i class="fa fa-chevron-circle-right"></i> Dia Do No Call</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>

             <!-- FORMULARIOS-->
             <?php
                if (file_exists( $path_vista )):
                    require( $path_vista );
                else:
                        echo '<center><br><img src="../web/img/construccion.png" border="0"><h1><font style="color:red; font-weight: bold;">AUN NO SE HA CREADO EL MODULO</font></h1></center>';
                endif;
            ?>
            <!-- FORMULARIOS-->


            </div>
        <!-- js -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <script src="web/vendor/jquery/jquery-1.11.1.min.js"></script>
        <script src="web/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
         <!-- FooTable Plugin -->
      <script src="web/js/plugins/footable/js/footable.all.min.js"></script>
      <!-- FooTable Addon -->
      <script src="web/js/plugins/footable/js/footable.filter.min.js"></script>
       <script type="text/javascript">
      jQuery(document).ready(function() {

        // Init FooTable Examples
        $('.footable').footable();
        });
      </script>
        <script src="web/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="web/js/bootstrap.min.js" type="text/javascript"></script>
        
        <!--<script src="web/js/plugins/morris/morris.min.js" type="text/javascript"></script>-->
        <script src="web/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="web/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="web/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <script src="web/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="web/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <script src="web/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="web/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script src="web/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="web/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="web/js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <script src="web/js/AdminLTE/demo.js" type="text/javascript"></script>   
    </body>
</html>
