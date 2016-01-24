<?php
final class Usuarios extends Conexion
{
    function new_user($array_datos)
    {
        $sentencia_insert   =	$this->obj_con->prepare("INSERT INTO  tbl_usuarios (nick,clave,nombre_usuario,apellido_usuario,id_perfil,id_sucursal,activo) values (?,?,?,?,?,?,?)");
        $sentencia_insert->bindParam(1,$array_datos[0]);
		$sentencia_insert->bindParam(2,md5($array_datos[1]));		
        $sentencia_insert->bindParam(3,$array_datos[2]);
        $sentencia_insert->bindParam(4,$array_datos[3]);
        $sentencia_insert->bindParam(5,$array_datos[4]);
        $sentencia_insert->bindParam(6,$array_datos[5]);
        $sentencia_insert->bindParam(7,$array_datos[6]);
        $sentencia_insert->execute();
        $conteo_registros   =	$sentencia_insert->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }

    function update_user($id_user,$array_datos)
    {
        $sentencia_update   =   $this->obj_con->prepare("UPDATE tbl_usuarios SET  nick=?, clave=?, nombre_usuario=?, apellido_usuario=?, id_perfil=?, id_sucursal=?, activo=? where id_usuario = ?");
        $sentencia_update->bindParam(1,$array_datos[0]);        
        $sentencia_update->bindParam(2,md5($array_datos[1]));
        $sentencia_update->bindParam(3,$array_datos[2]);
        $sentencia_update->bindParam(4,$array_datos[3]);  
        $sentencia_update->bindParam(5,$array_datos[4]); 
        $sentencia_update->bindParam(6,$array_datos[5]);
        $sentencia_update->bindParam(7,$array_datos[6]);   
        $sentencia_update->bindParam(8,  $id_user);
        $sentencia_update->execute();
        $conteo_registros   =   $sentencia_update->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }

    function update_user_sin_pass($id_user,$array_datos)
    {
        $sentencia_update   =   $this->obj_con->prepare("UPDATE tbl_usuarios SET  nick=?, nombre_usuario=?, apellido_usuario=?, id_perfil=?, id_sucursal=?, activo=? where id_usuario = ?");
        $sentencia_update->bindParam(1,$array_datos[0]);        
        $sentencia_update->bindParam(2,$array_datos[1]);
        $sentencia_update->bindParam(3,$array_datos[2]);  
        $sentencia_update->bindParam(4,$array_datos[3]); 
        $sentencia_update->bindParam(5,$array_datos[4]);
        $sentencia_update->bindParam(6,$array_datos[5]);   
        $sentencia_update->bindParam(7,  $id_user);
        $sentencia_update->execute();
        $conteo_registros   =   $sentencia_update->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }
    

    function listar_users()
    {

        $salida_inicial     =   (string)  '';
        $salida_final       =   (string)  '';
        $contador           =   (integer) 0;
        $sentencia_select   =	$this->obj_con->prepare("SELECT id_usuario, nick, p.nombre_perfil as perfil,
            CONCAT(upper(u.nombre_usuario),' ',upper(u.apellido_usuario)) as nombres, 
            e.nombre_empresa, s.nombre_sucursal,CASE WHEN u.activo=1 THEN 'SI' ELSE 'NO' END AS activo FROM tbl_usuarios u
            inner join tbl_perfil p on p.id_perfil = u.id_perfil
            inner join tbl_sucursal s on s.id_sucursal= u.id_sucursal
            inner join tbl_empresa e on e.id_empresa= s.id_empresa order by u.fecha_creacion desc");
        $sentencia_select->bindParam(1,$idvendedores);		
        $sentencia_select->execute();
        $conteo_registros	=	$sentencia_select->rowCount();
        
        if($conteo_registros> 0):
            foreach ($sentencia_select as $row):
                $contador++;
				 $link_opciones      =   '<tr><td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-cog"></i></button>
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="?vista=upd_usuario&id='.$row["id_usuario"].'" >Modificar</a></li>
                                                        <li><a data-toggle="modal" href="#myModal" onClick="saveIdModal('.$row["id_usuario"].')" >Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </td>';
                $salida_inicial     =   $link_opciones  . '<td>'.$row["id_usuario"].'</td>'                                   
                                        . '<td>'.$row["nombres"].'</td>'
                                        . '<td>'.$row["nick"].'</td>'
                                        . '<td>'.$row["perfil"].'</td>'
                                        . '<td>'.$row["nombre_empresa"].'</td>'
                                        . '<td>'.$row["nombre_sucursal"].'</td>'
                                        . '<td>'.$row["activo"].'</td></tr>';
                $salida_final       =   $salida_final.$salida_inicial;
            endforeach;
        else:
            $salida_final           =   '<tr><td colspan="6" style="text-align:center"><b>NO HAY REGISTROS</b></td></tr>';
        endif;
        
        return $salida_final;
    }

    
    function select_usuario($id_usuario)
    {
        $array_datos        =   array();
        $sentencia_select   =   $this->obj_con->prepare("select id_usuario, nick, nombre_usuario, apellido_usuario, id_perfil, id_empresa, CONCAT(s.id_empresa,'-', u.id_sucursal) as id_sucursal, u.activo 
        from tbl_usuarios u inner join tbl_sucursal s on s.id_sucursal= u.id_sucursal where id_usuario = ?");
        $sentencia_select->bindParam(1,$id_usuario);       
        $sentencia_select->execute();
        
        
        foreach ($sentencia_select as $row):
            array_push($array_datos, $row["id_usuario"]);
            array_push($array_datos, $row["nick"]);
            array_push($array_datos, $row["nombre_usuario"]);
            array_push($array_datos, $row["apellido_usuario"]);
            array_push($array_datos, $row["id_perfil"]);
            array_push($array_datos, $row["id_empresa"]);
            array_push($array_datos, $row["id_sucursal"]);
            array_push($array_datos, $row["activo"]);
        endforeach;
        
        return $array_datos;
    }
    
    
}
?>

