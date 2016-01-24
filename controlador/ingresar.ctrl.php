<?php
 session_start();
 require ("../config/db_ivr.conf.php");
 require('../servicio/Conexion.class.php');
 require('../modelo/Session.class.php');
 require('../modelo/TblUsuarios.class.php');

 $obj_usuario = new TblUsuarios();
 $obj_sesion = new Sesion();
 $datos_login = array();

 if(isset($_REQUEST['txtUsuario']) && isset($_REQUEST['txtClave'])):
 $user = $_REQUEST['txtUsuario'];
 $miPass = $_REQUEST['txtClave'];
 $datos_login = $obj_usuario->buscar_usuario($user,$miPass);
 $bandera = $datos_login['bandera']; 
 $miUsuario = $datos_login['id_usuario'];
 $miNick =$datos_login['nick'];
 $miEmpleado = $datos_login['nombres'];
 $miNivel = $datos_login['nombre_perfil'];
 $miSucursal =$datos_login['id_sucursal'];
 print_r($datos_login);
 
 if($bandera == 1):
 	$obj_sesion->registrar_sesion(true, $miUsuario, $miEmpleado, $miNivel,$miNick,$miSucursal);
 	$nivel=$datos_login['nombre_perfil'];
	if ($nivel	=='ADMINISTRADOR'):
		header('Location: ../?vista=home&layout=1');
	else:
		header('Location: ../?vista=home&layout=2');
	endif;
 else:
 header('Location: ../login.php?error=1');
 endif;
 
 endif;
?>
