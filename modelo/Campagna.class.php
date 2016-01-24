<?php
final class Campagnas extends Conexion
{
    function new_campagna($array_datos)
    {
        $sentencia_insert   =	$this->obj_con->prepare("INSERT INTO tbl_campagnas
														(descripcion,
														id_sucursal,
														documento_ubicacion,
														audio_ubicacion)
														VALUES
														(?,?,?,?);");
        $sentencia_insert->bindParam(1,$array_datos[0]);
		$sentencia_insert->bindParam(2,$array_datos[1]);		
        $sentencia_insert->bindParam(3,$array_datos[2]);
        $sentencia_insert->bindParam(4,$array_datos[3]);
        $sentencia_insert->execute();
        $conteo_registros   =	$sentencia_insert->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }

    function update_campagna($id_user,$array_datos)
    {
        $sentencia_update   =   $this->obj_con->prepare("UPDATE tbl_usuarios SET id_empleado=?, nick=?, pass=?, id_nivel=?, estado=?, usuario_modifica=?, fecha_modificacion=now() where id_usuario = ?");
        $sentencia_update->bindParam(1,$array_datos[0]);        
        $sentencia_update->bindParam(2,$array_datos[1]);
        $sentencia_update->bindParam(3,md5($array_datos[2]));
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
    
    function listar_campagna()
    {
        $salida_inicial     =   (string)  '';
        $salida_final       =   (string)  '';
        $contador           =   (integer) 0;
        $sentencia_select   =	$this->obj_con->prepare("SELECT 
														id_campagna as ID,
														upper(descripcion) as DES
														FROM db_ivr.tbl_campagnas
														ORDER BY fecha_creacion DESC;");
        $sentencia_select->execute();
        $conteo_registros	=	$sentencia_select->rowCount();
        
        if($conteo_registros> 0):
            foreach ($sentencia_select as $row):
                $contador++;
                $salida_inicial     =   '<tr>'
                                        //. '<td>'.$contador.'</td>'                                      
                                        . '<td><div class="btn-group">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-cog"></i></button>
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="./?vista=dashboard&id='.$row["ID"].'">Dashboard</a></li>
                                                        <li><a href="#">Eliminar</a></li>
                                                    </ul>
                                                </div>
											</td>'
                                        . '<td>'.$row["ID"].'</td>'
                                        . '<td >'.$row["DES"].'</td>'
                                        .'</tr>';
                $salida_final       =   $salida_final.$salida_inicial;
            endforeach;
        else:
            $salida_final           =   '<tr><td colspan="6" style="text-align:center"><b>NO HAY REGISTROS</b></td></tr>';
        endif;
        
        return $salida_final;
    }
	
    function select_campagna($id_usuario)
    {
        $array_datos        =   array();
        $sentencia_select   =   $this->obj_con->prepare("select * from tbl_usuarios where id_usuario = ?");
        $sentencia_select->bindParam(1,$id_usuario);       
        $sentencia_select->execute();
        
        
        foreach ($sentencia_select as $row):
            array_push($array_datos, $row["id_empleado"]);
            array_push($array_datos, $row["id_usuario"]);
            array_push($array_datos, $row["nick"]);
            array_push($array_datos, $row["id_nivel"]);
            array_push($array_datos, $row["estado"]);
        endforeach;
        
        return $array_datos;
    }
}
?>

