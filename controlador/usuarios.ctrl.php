
<?php
    require ("../config/db_ivr.conf.php");
    require ("../servicio/Conexion.class.php");
    require ("../modelo/usuarios.class.php");

    
    $obj_user      =   new Usuarios();
    
    if($obj_user->conectar()):
        $operacion         =   (integer) $_REQUEST['tipo_operacion'];
        $nick	  	       =   (string) $_REQUEST['txtUsuario'];
        $pass1		       =   (string)   $_REQUEST['txtClave'];
        $pass2             =   (string)  $_REQUEST['txtClave2'];
        $nombres           =   (string)  $_REQUEST['txtNombre'];
        $apellidos         =   (string)  $_REQUEST['txtApellido'];
        $perfil            =   (integer)  $_REQUEST['cbPerfil'];
        $sucursal          =   (string)  $_REQUEST['cbSucursal'];
        
        $sucursal= strstr($sucursal, '-');
        $sucursal= str_replace('-', '', $sucursal);

        if($operacion==1):
            $activo            =   (bool) 1; 
        else:
            if(!empty($_REQUEST['chk_activo'])):
                $activo  =   (bool) $_REQUEST['chk_activo'];
            else:
                $activo  = (bool) 0;
            endif;
        endif;   

        if (empty($pass1)):
            $array_info             =      array($nick,$nombres,$apellidos,$perfil,$sucursal,$activo);
            $con_pass= false;
        else:
             $array_info            =      array($nick,$pass1,$nombres,$apellidos,$perfil,$sucursal,$activo);
            $con_pass= true;
        endif;
      
      echo $pass1;
         echo "<pre>";
        print_r($array_info);
        echo "</pre>";
        
        if($operacion == 1)://INSERTAR
            $bandera              = $obj_user->new_user($array_info);
        elseif($operacion == 2 && $con_pass==true)://MODIFICAR
           $bandera =  $obj_user->update_user($_REQUEST["id_usuario"],$array_info);
        else:
            $bandera =  $obj_user->update_user_sin_pass($_REQUEST["id_usuario"],$array_info);         
        endif;
        
       
        if($bandera && $operacion == 1):
            header('Location: ../?vista=list_usuario&opc=1&bandera=1');
        elseif($bandera && $operacion == 2):
             header('Location: ../?vista=list_usuario&opc=2&bandera=1');
        else:
            header('Location: ../?vista=list_usuario&opc=4');
        endif;
       
    else:
        echo "<font color='red'><b>NO CONECTA A LA BASE DE DATOS <a href='../?vista=lista_vendedores'>REGRESAR</a></b></font>";
    endif;

?>