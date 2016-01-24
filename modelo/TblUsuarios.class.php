<?php
final class TblUsuarios extends Conexion
{
 private $idusuario;

 private $nick;

 private $password;

 private $nivel;

 private $estado;

	 function buscar_usuario($nick,$pass)
	 {
		 $conectado = $this->conectar();
		 if($conectado):
		 $array_datos = array();
		 $total_registros = (integer) 0;
		 $sentencia_select = $this->obj_con->prepare("select id_usuario, nick, concat(nombre_usuario, ' ',apellido_usuario) as nombres, 
		 p.nombre_perfil, id_sucursal from tbl_usuarios u INNER JOIN tbl_perfil p ON p.id_perfil= u.id_perfil
		  where nick = ? and clave = md5(?) and  u.activo = true");
		 
		/* $sentencia_select->bindParam(1,'ADMIN_DEFECTO');
		 $sentencia_select->bindParam(2,'4aeeef3c9bc0d965bf3d4991f6bc5c89');*/
		 $sentencia_select->execute(array($nick, $pass));
		 //$array_datos['nick'] = $nick.$pass;
		 //$array_datos['sentencia'] = $sentencia_select;
		 $total_registros = $sentencia_select->rowCount();
		 //$array_datos['pasoRegistro'] = $total_registros;
		 if($total_registros > 0):
			$array_datos['bandera'] = 1;
			 foreach ($sentencia_select as $row):
				 $array_datos['id_usuario'] = $row['id_usuario'];
				 $array_datos['nick'] = $row['nick'];
				 $array_datos['nombre_perfil'] = $row['nombre_perfil'];
				 $array_datos['nombres'] = $row['nombres'];
				 $array_datos['id_sucursal'] = $row['id_sucursal'];
			 endforeach;
		 else:
			$array_datos['bandera'] = 0;
		 endif;
		 $this->desconectar();
		 endif;
		 return $array_datos;
	}
}
?>