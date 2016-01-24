<?php
final class Sesion
{
 public $autenticado;
 public $idusuario;
 public $nombreusuario;
 public $nivel_usuario;
 public $nick_usuario;
 public $sucursal_usuario;
 public function __construct()
 {
 $this->autenticado = isset($_SESSION['var_autenticado']) ? $_SESSION["var_autenticado"] : '';
 $this->idusuario = isset($_SESSION['var_idusuario']) ? $_SESSION["var_idusuario"] : '';
 $this->nombreusuario = isset($_SESSION['var_nombreusuario']) ? $_SESSION['var_nombreusuario'] : '';
 $this->nivel_usuario = isset($_SESSION['var_perfil']) ? $_SESSION['var_perfil'] : '';
 $this->nick_usuario = isset($_SESSION['var_nick']) ? $_SESSION['var_nick'] : '';
 $this->sucursal_usuario = isset($_SESSION['var_sucursal']) ? $_SESSION['var_sucursal'] : '';
 }

 public function registrar_sesion($bandera,$idusuario,$nombreusuario,$nivel,$nick,$sucursal)
 {
	 $_SESSION['var_autenticado'] = (bool) $bandera;
	 $_SESSION['var_idusuario'] = (integer) $idusuario;
	 $_SESSION['var_nick'] = (string) $nick;
	 $_SESSION['var_nombreusuario'] = (string) $nombreusuario;
	 $_SESSION['var_perfil'] = (string) $nivel;
	 $_SESSION['var_sucursal'] = (string) $sucursal;	
	// return true;
 }
 public function validar_sesion()
 {
	 if (!empty($_SESSION['var_autenticado']) && !empty($_SESSION['var_idusuario'])&& !empty($_SESSION['var_nombreusuario']) && !empty($_SESSION['var_perfil']) && !empty($_SESSION['var_nick']) && !empty($_SESSION['var_sucursal'])):
	 return true;
	 else:
	 return false;
	 endif;
 }
 public function destroy_sesion()
 {
	 unset($_SESSION['var_autenticado']);
	 unset($_SESSION['var_idusuario']);
	 unset($_SESSION['var_nick']);
	 unset($_SESSION['var_nombreusuario']);
	 unset($_SESSION['var_perfil']);
	 unset($_SESSION['var_sucursal']);
 }
}
?>