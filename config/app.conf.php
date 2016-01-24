<?php
/**
 * Archivo de configuración para nuestra aplicación modularizada.
 * Definimos valores por defecto y datos para cada uno de nuestros módulos.
 */
    define('VISTA_DEFECTO', 'home');
    define('LAYOUT_DEFECTO', 'layout_ivr.php');
    define('VISTA_PATH', realpath('./vista/'));
    define('LAYOUT_PATH', realpath('./layouts/'));
	
  /*------------- DEFINIENDO NOMBRE DE LAS VISTAS----------------*/
  

    /*----------------HOME-----------------*/

     $conf['home']      =  array(
           'archivo'  => 'home.php'
    );

     /*-------------EMPRESA----------------*/

     $conf['new_empresa']      =  array(
           'archivo'  => 'empresa_registrar.php'
    );

        $conf['upd_empresa']      =  array(
           'archivo'  => 'empresa_editar.php'
    );

          $conf['list_empresa']      =  array(
           'archivo'  => 'empresa_index.php'
    );

    /*-------------SUCURSAL----------------*/

     $conf['new_sucursal']      =  array(
           'archivo'  => 'sucursal_registrar.php'
    );

        $conf['upd_sucursal']      =  array(
           'archivo'  => 'sucursal_editar.php'
    );

          $conf['list_sucursal']      =  array(
           'archivo'  => 'sucursal_index.php'
    );

   /*-------------PERFIL----------------*/

     $conf['new_perfil']      =  array(
           'archivo'  => 'perfil_registrar.php'
    );

        $conf['upd_perfil']      =  array(
           'archivo'  => 'perfil_editar.php'
    );

          $conf['list_perfil']      =  array(
           'archivo'  => 'perfil_index.php'
    );

    /*-------------USUARIO----------------*/

     $conf['new_usuario']      =  array(
           'archivo'  => 'usuario_registrar.php'
    );

        $conf['upd_usuario']      =  array(
           'archivo'  => 'usuario_editar.php'
    );

          $conf['list_usuario']      =  array(
           'archivo'  => 'usuario_index.php'
    );


     /*-------------CAMPANA----------------*/

     $conf['new_campana']      =  array(
           'archivo'  => 'campana_registrar.php'
    );

        $conf['list_campana']      =  array(
           'archivo'  => 'campana_index.php'
    );

          $conf['dashboard']      =  array(
           'archivo'  => 'campana_dashboard.php'
    );

    
      $conf['log']      =  array(
           'archivo'  => 'recibe.php'
    );
	
?>
