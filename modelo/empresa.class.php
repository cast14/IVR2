<?php
final class Empresa extends Conexion
{
  
    function new_empresa($array_datos)
    {
        $sentencia_insert   =	$this->obj_con->prepare("INSERT INTO tbl_empresa (nombre_empresa, direccion, telefono_1, telefono_2, correo, website, activo)
        values (?,?,?,?,?,?,?)");
        $sentencia_insert->bindParam(1,$array_datos[0]);		
        $sentencia_insert->bindParam(2,$array_datos[1]);
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
    
    function update_empresa($id_empresa,$array_datos)
    {
        $sentencia_update   =	$this->obj_con->prepare("UPDATE tbl_empresa SET nombre_empresa=?, direccion=?, telefono_1=?, telefono_2=?, correo=?, website=?, activo=? where id_empresa = ?");
        $sentencia_update->bindParam(1,$array_datos[0]);		
        $sentencia_update->bindParam(2,$array_datos[1]);
        $sentencia_update->bindParam(3,$array_datos[2]);
        $sentencia_update->bindParam(4,$array_datos[3]);
        $sentencia_update->bindParam(5,$array_datos[4]);
        $sentencia_update->bindParam(6,$array_datos[5]);
        $sentencia_update->bindParam(7,$array_datos[6]);	
        $sentencia_update->bindParam(8,  $id_empresa);
        $sentencia_update->execute();
        $conteo_registros   =	$sentencia_update->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }
    
    function delete_empresa($id_empresa)
    {
        $sentencia_delete   =	$this->obj_con->prepare("DELETE FROM tbl_empresa where id_empresa = ?");
        $sentencia_delete->bindParam(1,$id_empresa);
        $sentencia_delete->execute();
        $conteo_registros	=	$sentencia_delete->rowCount();
        
        if($conteo_registros > 0):
            return true;
        else:
            return false;
        endif;
    }
	
    function select_empresa($id_empresa)
    {
        $array_datos        =   array();
        $sentencia_select   =	$this->obj_con->prepare("select * from tbl_empresa where id_empresa = ?");
        $sentencia_select->bindParam(1,$id_empresa);		
        $sentencia_select->execute();
        
        
        foreach ($sentencia_select as $row):
            array_push($array_datos, $row["id_empresa"]);
            array_push($array_datos, $row["nombre_empresa"]);
            array_push($array_datos, $row["direccion"]);
            array_push($array_datos, $row["telefono_1"]);
            array_push($array_datos, $row["telefono_2"]);;
            array_push($array_datos, $row["correo"]);
			array_push($array_datos, $row["website"]);
            array_push($array_datos, $row["activo"]);
            array_push($array_datos, $row["fecha_creacion"]);
        endforeach;
        
        return $array_datos;
    }
    
    function listar_empresas()
    {
        $salida_inicial     =   (string)  '';
        $salida_final       =   (string)  '';
        $contador           =   (integer) 0;
		$sentencia_select   =	$this->obj_con->prepare("SELECT id_empresa,upper(nombre_empresa) as nombre_empresa, direccion, CONCAT(SUBSTRING(telefono_1, 1, 4),'-',SUBSTRING(telefono_1, 5, 4)) AS telefono_1,
    CONCAT(SUBSTRING(telefono_2, 1, 4),'-',SUBSTRING(telefono_2, 5, 4)) AS telefono_2, correo, website,fecha_creacion,case when activo=1 THEN 'SI' ELSE 'NO' END activo 
    FROM tbl_empresa order by fecha_creacion desc");	
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
                                                        <li><a href="?vista=upd_empresa&id='.$row["id_empresa"].'" >Modificar</a></li>
                                                        <li><a data-toggle="modal" href="#myModal" onClick="saveIdModal('.$row["id_empresa"].')" >Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </td>';
                $salida_inicial     =   $link_opciones  . '<td>'.$row["id_empresa"].'</td>'                                   
                                        . '<td>'.$row["nombre_empresa"].'</td>'
                                        . '<td>'.$row["direccion"].'</td>'
                                        . '<td>'.$row["telefono_1"].'</td>'
										. '<td>'.$row["telefono_2"].'</td>'
										. '<td>'.$row["correo"].'</td>'
                                        . '<td>'.$row["website"].'</td>'
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

