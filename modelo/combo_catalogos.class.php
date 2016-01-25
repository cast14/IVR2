<?php
final class Combos extends Conexion
{

    function combo_perfil($id_perfil)
    {
            $salida_inicial     =   (string)  '';
            $salida_final       =   (string)  '';
            $contador           =   (integer) 0;    
            $sentencia_select   =   $this->obj_con->prepare("SELECT id_perfil,nombre_perfil FROM tbl_perfil where activo=1 order by nombre_perfil asc");
            $sentencia_select->execute();
            $conteo_registros   =   $sentencia_select->rowCount();
            
            if($conteo_registros> 0):
                foreach ($sentencia_select as $row):       
                        if($row["id_perfil"] == $id_perfil):
                            $option_select     .=   "<option value='".$row["id_perfil"]."' selected>".$row["nombre_perfil"]."</option>";
                        else:
                            $option_select     .=   "<option value='".$row["id_perfil"]."'>".$row["nombre_perfil"]."</option>";
                        endif;
                endforeach;
            else:
                $option_select           =    "<option value='-1' selected>'NO HAY REGISTROS'</option>";
            endif;
            
            return $option_select;
    }


    function combo_empresa($id_empresa)
    {
            $salida_inicial     =   (string)  '';
            $salida_final       =   (string)  '';
            $contador           =   (integer) 0;    
            $sentencia_select   =   $this->obj_con->prepare("SELECT id_empresa,nombre_empresa FROM tbl_empresa where activo=1 order by nombre_empresa asc");
            $sentencia_select->execute();
            $conteo_registros   =   $sentencia_select->rowCount();
            
            if($conteo_registros> 0):
                foreach ($sentencia_select as $row):       
                        if($row["id_empresa"] == $id_empresa):
                            $option_select     .=   "<option value='".$row["id_empresa"]."' selected>".$row["nombre_empresa"]."</option>";
                        else:
                            $option_select     .=   "<option value='".$row["id_empresa"]."'>".$row["nombre_empresa"]."</option>";
                        endif;
                endforeach;
            else:
                $option_select           =    "<option value='-1' selected>'NO HAY REGISTROS'</option>";
            endif;
            
            return $option_select;
    }


    function combo_sucursal($id_sucursal,$id_empresa)
    {
            $salida_inicial     =   (string)  '';
            $salida_final       =   (string)  '';
            $contador           =   (integer) 0; 
            $option_select   ='';
            if($id_sucursal==-1):
                $sentencia_select   =   $this->obj_con->prepare("SELECT   id_sucursal, nombre_sucursal FROM tbl_sucursal 
                    where activo=1 and id_empresa=? order by nombre_sucursal asc");
            else:
                $sentencia_select   =   $this->obj_con->prepare("SELECT  id_sucursal, nombre_sucursal FROM tbl_sucursal 
                    where activo=1 and id_empresa=?  order by nombre_sucursal asc");            
            endif;
            $sentencia_select->bindParam(1,  $id_empresa);
            $sentencia_select->execute();
            $conteo_registros   =   $sentencia_select->rowCount();
            
            if($conteo_registros> 0):
                foreach ($sentencia_select as $row):       
                        if($row["id_sucursal"] == $id_sucursal):
                            $option_select     .=   "<option value='".$row["id_sucursal"]."' selected>".$row["nombre_sucursal"]."</option>";
                        else:
                            $option_select     .=   "<option value='".$row["id_sucursal"]."'>".$row["nombre_sucursal"]."</option>";
                        endif;
                endforeach;
            else:
                $option_select           =    "<option value='-1' selected>'NO HAY REGISTROS'</option>";
            endif;
            
            return $option_select;
    }


	function combo_cargo($id_cargo)
    {
            $salida_inicial     =   (string)  '';
			$salida_final       =   (string)  '';
			$contador           =   (integer) 0;    
			$sentencia_select   =	$this->obj_con->prepare("SELECT id_cargo,descripcion FROM tbl_cargos order by descripcion asc");
			$sentencia_select->execute();
			$conteo_registros	=	$sentencia_select->rowCount();
			
			if($conteo_registros> 0):
				foreach ($sentencia_select as $row):       
			            if($row["id_cargo"] == $id_cargo):
			                $option_select     .=   "<option value='".$row["id_cargo"]."' selected>".$row["descripcion"]."</option>";
			            else:
			                $option_select     .=   "<option value='".$row["id_cargo"]."'>".$row["descripcion"]."</option>";
			            endif;
				endforeach;
			else:
				$option_select           =    "<option value='-1' selected>'NO HAY REGISTROS'</option>";
			endif;
			
			return $option_select;
    }
	
	function combo_nivel($id_nivel)
    {
            $salida_inicial     =   (string)  '';
			$salida_final       =   (string)  '';
			$contador           =   (integer) 0;    
			$sentencia_select   =	$this->obj_con->prepare("SELECT id_nivel,descripcion FROM tbl_niveles order by descripcion asc");
			$sentencia_select->execute();
			$conteo_registros	=	$sentencia_select->rowCount();
			
			if($conteo_registros> 0):
				foreach ($sentencia_select as $row):       
			            if($row["id_nivel"] == $id_nivel):
			                $option_select     .=   "<option value='".$row["id_nivel"]."' selected>".$row["descripcion"]."</option>";
			            else:
			                $option_select     .=   "<option value='".$row["id_nivel"]."'>".$row["descripcion"]."</option>";
			            endif;
				endforeach;
			else:
				$option_select           =    "<option value='-1' selected>'NO HAY REGISTROS'</option>";
			endif;
			
			return $option_select;
    }

    function crear_combo_sexo($sexo)
    {
        $array_sexo         =   array('MASCULINO','FEMENIMO', 'OTROS');
        $contador           =   (integer) 0;    
        $option_select      =   (string) '';
        foreach ($array_sexo as $valor):
            $contador++;
       	    $genero= substr($valor,0,1);
            if($genero == $sexo):
                $option_select     .=   "<option value='".$genero."' selected>".$valor."</option>";
            else:
                $option_select     .=   "<option value='".$genero."'>".$valor."</option>";
            endif;

        endforeach;
        
        return $option_select;
    }
	
		function combo_empleados($id_empleado)
    {
            $salida_inicial     =   (string)  '';
			$salida_final       =   (string)  '';
			$contador           =   (integer) 0;    
			$sentencia_select   =	$this->obj_con->prepare("SELECT id_empleado as ID,
															CONCAT(upper(nombres),' ',upper(apellidos)) as 	NOMBRE FROM tbl_empleados");
			$sentencia_select->execute();
			$conteo_registros	=	$sentencia_select->rowCount();
			
			if($conteo_registros> 0):
				foreach ($sentencia_select as $row):       
			            if($row["ID"] == $id_empleado):
			                $option_select     .=   "<option value='".$row["ID"]."' selected>".$row["NOMBRE"]."</option>";
			            else:
			                $option_select     .=   "<option value='".$row["ID"]."'>".$row["NOMBRE"]."</option>";
			            endif;
				endforeach;
			else:
				$option_select           =    "<option value='-1' selected>'NO HAY REGISTROS'</option>";
			endif;
			
			return $option_select;
    }
}
?>

