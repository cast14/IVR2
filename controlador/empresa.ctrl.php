
<?php
    require ("../config/db_ivr.conf.php");
    require ("../servicio/Conexion.class.php");
    require ("../modelo/empresa.class.php");

    
    $obj_empresa      =   new Empresa();
    
    if($obj_empresa->conectar()):
        $operacion          =   (integer) $_REQUEST['tipo_operacion'];
        $nombre_empresa	  	= 	(string) $_REQUEST['txtEmpresa'];
        $direccion		    =  	(string)   $_REQUEST['txtDireccion'];
        $telefono_1         =   (string)  $_REQUEST['txtTelefono_1'];
        $telefono_2         =   (string)  $_REQUEST['txtTelefono_2'];
		$email              =   (string)  $_REQUEST['txtEmail'];
		$website	     	=	(string) $_REQUEST['txtWebsite'];     
   
        if($operacion==1):
            $activo             =   (bool) 1; 
        else:
            $activo            =   (bool) $_REQUEST['chk_activo']; 
        endif;
       
        $telefono_1 = str_replace("-","",$telefono_1);
		$telefono_2 = str_replace("-","",$telefono_2);
        
        $array_info             =       array($nombre_empresa,$direccion,$telefono_1,$telefono_2,$email,$website,$activo);
        
        if($operacion == 1)://INSERTAR
            $bandera              = $obj_empresa->new_empresa($array_info);
        elseif($operacion == 2)://MODIFICAR
           $bandera              =       $obj_empresa->update_empresa($_REQUEST["id_empresa"],$array_info);
        elseif($operacion == 3)://ELIMINAR
            $bandera              =       $obj_empresa->delete_empresa($_REQUEST["id_empresa"]);
        endif;
        
        if($bandera && $operacion == 1):
            header('Location: ../?vista=list_empresa&opc=1&bandera=1');
        elseif($bandera && $operacion == 2):
             header('Location: ../?vista=list_empresa&opc=2&bandera=1');
        elseif($bandera && $operacion == 3):
             header('Location: ../?vista=list_empresa&opc=3&bandera=1');
        else:
            header('Location: ../?vista=list_empresa&opc=4');
        endif;
       
    else:
        echo "<font color='red'><b>NO CONECTA A LA BASE DE DATOS <a href='../?vista=list_empresa'>REGRESAR</a></b></font>";
    endif;

?>