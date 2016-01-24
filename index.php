<?php

  // Primero incluimos el archivo de configuración
  require('config/app.conf.php');
  session_start();

  /** 
   * Verificamos que se haya escogido una vista, sino
   * tomamos el valor por defecto de la configuración.
   * También debemos verificar que el valor que nos
   * pasaron, corresponde a una vista que existe.
   */
 /* if(!isset($_SESSION['var_nivel'])):
          header('Location: ./login.php?entro='.$_SESSION['var_nivel'].'fff');
  endif;*/

 if(empty($_SESSION['var_autenticado'])):
          header('Location: ./login.php');
  endif;

  if (!empty($_GET['vista'])):
      $vista = $_GET['vista'];
  else:
      header('Location: ./login.php');
  endif;

  /** 
   * También debemos verificar que el valor que nos
   * pasaron, corresponde a una vista que existe, caso
   * contrario, cargamos la vista error404
   */
  if (empty($conf[$vista])):
      $vista  = 'error404';
  endif;

  /** 
   * Ahora determinamos que archivo de Layout tendrá
   * este módulo, si no tiene ninguno asignado, utilizamos
   * el que viene por defecto
   */
  if(!empty($_GET['layout']) ):
    $conf[$vista]['layout'] = LAYOUT_DEFECTO;
    else:
    $conf[$vista]['layout'] = LAYOUT_DEFECTO;
  endif;


  /** 
   * Finalmente, cargamos el archivo de Layout que a su vez, se
   * encargará de incluir al módulo propiamente dicho. si el archivo
   * no existiera, cargamos directamente el módulo. También es un
   * buen lugar para incluir Headers y Footers comunes.
   */
  $path_layout = LAYOUT_PATH.'/'.$conf[$vista]['layout'];
  $path_vista = VISTA_PATH.'/'.$conf[$vista]['archivo'];

  require($path_layout);
?>