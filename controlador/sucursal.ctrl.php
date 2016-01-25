
<?php
    require ("../config/db_ivr.conf.php");
    require ("../servicio/Conexion.class.php");
    require ("../modelo/sucursal.class.php");

    
    $obj_sucursal      =   new Sucursal();
    
    if($obj_sucursal->conectar()):
        $operacion          =   (integer) $_REQUEST['tipo_operacion'];
        $nombre_sucursal	= 	(string)  $_REQUEST['txtNombre'];
        $id_empresa         =   (string)  $_REQUEST['cbEmpresa'];
        $direccion		    =  	(string)  $_REQUEST['txtDireccion'];
        $telefono_1         =   (string)  $_REQUEST['txtTelefono_1'];
        $telefono_2         =   (string)  $_REQUEST['txtTelefono_2'];
		$email              =   (string)  $_REQUEST['txtEmail'];
		$website	     	=	(string)  $_REQUEST['txtWebsite'];     
   
        if($operacion==1):
            $activo             =   (bool) 1; 
        else:
            $activo            =   (bool) $_REQUEST['chk_activo']; 
        endif;
       
        $telefono_1 = str_replace("-","",$telefono_1);
		$telefono_2 = str_replace("-","",$telefono_2);
        
        $array_info             =       array($nombre_sucursal,$id_empresa,$direccion,$telefono_1,$telefono_2,$email,$website,$activo);
        
        print_r($array_info);

        if($operacion == 1)://INSERTAR
            $bandera              = $obj_sucursal->new_sucursal($array_info);
        elseif($operacion == 2)://MODIFICAR
           $bandera              =       $obj_sucursal->update_sucursal($_REQUEST["id_sucursal"],$array_info);
        elseif($operacion == 3)://ELIMINAR
            $bandera              =       $obj_sucursal->delete_sucursal($_REQUEST["id_sucursal"]);
        endif;
        
        if($bandera && $operacion == 1):
            header('Location: ../?vista=list_sucursal&opc=1&bandera=1');
        elseif($bandera && $operacion == 2):
             header('Location: ../?vista=list_sucursal&opc=2&bandera=1');
        elseif($bandera && $operacion == 3):
             header('Location: ../?vista=list_sucursal&opc=3&bandera=1');
        else:
            header('Location: ../?vista=list_sucursal&opc=4');
        endif;
       
    else:
        echo "<font color='red'><b>NO CONECTA A LA BASE DE DATOS <a href='../?vista=list_empresa'>REGRESAR</a></b></font>";
    endif;

?>