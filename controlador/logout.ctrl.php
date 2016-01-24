<?php
 session_start();
 require('../modelo/Session.class.php');
 $obj_sesion = new Sesion();
 $obj_sesion->destroy_sesion();
 header('Location: ../login.php');
?>
