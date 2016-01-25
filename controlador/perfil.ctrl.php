
<?php
    require ("../config/db_ivr.conf.php");
    require ("../servicio/Conexion.class.php");
    require ("../modelo/perfil.class.php");

    
    $obj_perfil      =   new Perfil();
    
    if($obj_perfil->conectar()):
        $operacion          =   (integer) $_REQUEST['tipo_operacion'];
        $nombre_perfil	= 	(string)  $_REQUEST['txtPerfil'];    
   
        if($operacion==1):
            $activo             =   (bool) 1; 
        else:
            $activo            =   (bool) $_REQUEST['chk_activo']; 
        endif;
        
        $array_info             =       array($nombre_perfil,$activo);
        
        print_r($array_info);

        if($operacion == 1)://INSERTAR
            $bandera              = $obj_perfil->new_perfil($array_info);
        elseif($operacion == 2)://MODIFICAR
           $bandera              =       $obj_perfil->update_perfil($_REQUEST["id_perfil"],$array_info);
        elseif($operacion == 3)://ELIMINAR
            $bandera              =       $obj_perfil->delete_perfil($_REQUEST["id_perfil"]);
        endif;
        
        if($bandera && $operacion == 1):
            header('Location: ../?vista=list_perfil&opc=1&bandera=1');
        elseif($bandera && $operacion == 2):
             header('Location: ../?vista=list_perfil&opc=2&bandera=1');
        elseif($bandera && $operacion == 3):
             header('Location: ../?vista=list_perfil&opc=3&bandera=1');
        else:
            header('Location: ../?vista=list_perfil&opc=4');
        endif;
       
    else:
        echo "<font color='red'><b>NO CONECTA A LA BASE DE DATOS <a href='../?vista=list_empresa'>REGRESAR</a></b></font>";
    endif;

?>