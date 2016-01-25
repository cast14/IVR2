<?php
final class Perfil extends Conexion
{
  
    function new_perfil($array_datos)
    {
        $sentencia_insert   =	$this->obj_con->prepare("INSERT INTO tbl_perfil (nombre_perfil, activo)
        values (?,?)");
        $sentencia_insert->bindParam(1,$array_datos[0]);		
        $sentencia_insert->bindParam(2,$array_datos[1]);
        $sentencia_insert->execute();
        $conteo_registros   =	$sentencia_insert->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }
    
    function update_perfil($id_perfil,$array_datos)
    {
        $sentencia_update   =	$this->obj_con->prepare("UPDATE tbl_perfil SET nombre_perfil=?, activo=? where id_perfil = ?");
        $sentencia_update->bindParam(1,$array_datos[0]);		
        $sentencia_update->bindParam(2,$array_datos[1]); 
        $sentencia_update->bindParam(3,  $id_perfil);
        $sentencia_update->execute();
        $conteo_registros   =	$sentencia_update->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }
    
    function delete_perfil($id_perfil)
    {
        $sentencia_delete   =	$this->obj_con->prepare("DELETE FROM tbl_perfil where id_perfil = ?");
        $sentencia_delete->bindParam(1,$id_perfil);
        $sentencia_delete->execute();
        $conteo_registros	=	$sentencia_delete->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }
	
    function select_perfil($id_perfil)
    {
        $array_datos        =   array();
        $sentencia_select   =	$this->obj_con->prepare("SELECT * from tbl_perfil where id_perfil = ?");
        $sentencia_select->bindParam(1,$id_perfil);		
        $sentencia_select->execute();
        
        
        foreach ($sentencia_select as $row):
            array_push($array_datos, $row["id_perfil"]);
            array_push($array_datos, $row["nombre_perfil"]);
            array_push($array_datos, $row["activo"]);
            array_push($array_datos, $row["fecha_creacion"]);
        endforeach;
        
        return $array_datos;
    }
    
    function listar_perfiles()
    {
        $salida_inicial     =   (string)  '';
        $salida_final       =   (string)  '';
        $contador           =   (integer) 0;
		$sentencia_select   =	$this->obj_con->prepare("SELECT id_perfil, nombre_perfil, fecha_creacion, 
            case when activo=1 THEN 'SI' ELSE 'NO' END activo  from tbl_perfil order by id_perfil desc, fecha_creacion desc");	
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
                                                        <li><a href="?vista=upd_perfil&id='.$row["id_perfil"].'" >Modificar</a></li>
                                                        <li><a data-toggle="modal" href="#myModal" onClick="saveIdModalPerfil('.$row["id_perfil"].')" >Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </td>';
                $salida_inicial     =   $link_opciones  . '<td>'.$row["id_perfil"].'</td>'                                   
                                        . '<td>'.$row["nombre_perfil"].'</td>'
                                        . '<td>'.$row["fecha_creacion"].'</td>'
										. '<td>'.$row["activo"].'</td></tr>';
                $salida_final       =   $salida_final.$salida_inicial;
            endforeach;
        else:
            $salida_final           =   '<tr><td colspan="9" style="text-align:center"><b>NO HAY REGISTROS</b></td></tr>';
        endif;
        
        return $salida_final;
    }
}
?>

