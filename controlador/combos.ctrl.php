
<?php
    require ("../config/db_ivr.conf.php");
    require ("../servicio/Conexion.class.php");
    require ("../modelo/combo_catalogos.class.php");

    
    $obj_combos      =   new Combos();
    
    if($obj_combos->conectar()):

        $combo= $obj_combos->combo_sucursal(-1,$_REQUEST["id"]);
        $_SESSION['var_obj_combo']= $combo;
        $_SESSION['var_id_empresa']= $_REQUEST["id"];
        header('Location: ../?vista=new_usuario');
        print_r($combo);
       
    else:
        echo "<font color='red'><b>NO CONECTA A LA BASE DE DATOS <a href='../?vista=list_empresa'>REGRESAR</a></b></font>";
    endif;

?>