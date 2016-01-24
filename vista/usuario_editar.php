<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/usuarios.class.php");
    require ("modelo/combo_catalogos.class.php");

    
    $obj_combos      =   new Combos();
    $obj_combos->conectar(); 

    
    $obj_usuario      =   new Usuarios();
    $obj_usuario->conectar(); 
    $array_datos        =   [];  
    $array_datos        =   $obj_usuario->select_usuario($_REQUEST["id"]);
    
    if(count($array_datos) > 0):
        $id_usuario         =   $array_datos[0];
        $usuario            =   $array_datos[1];
        $nombres            =   $array_datos[2];
        $apellidos          =   $array_datos[3];
        $id_perfil          =   $array_datos[4];
        $id_empresa         =   $array_datos[5];
        $id_sucursal        =   $array_datos[6];
        $activo             =   $array_datos[7];     
    else:
    
      header('Location: ./?vista=list_usuario');
    endif;  
?>

<script type="text/javascript">

function ddl_combo_sucursal(id)
{


}

function ValidarPassword(p1,p2)
{
    var pass1= p1.value;
    var pass2= p2.value;
    if (pass1!=pass2) {
        alert("Contraseñas no coinciden");
        p1.value='';
        p2.value='';
        p1.focus();
        return;
    };
}

</script>

            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Usuario
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar</h3>
                                </div>
                                <form role="form" method="post" action="controlador/usuarios.ctrl.php" name="frm_usuarios_upd" id="frm_usuarios_upd" autocomplete="off">
                                    <div class="box-body">
                                    <input type="hidden" name="tipo_operacion" value="2">
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario;?>">
                                        <div class="form-group col-sm-6">
                                            <label>Nombre</label>
                                            <input type="text" name="txtNombre" value="<?php echo $nombres;?>" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Apellido</label>
                                            <input type="text" name="txtApellido" value="<?php echo $apellidos;?>" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Usuario</label>
                                            <input type="text" name="txtUsuario" value="<?php echo $usuario;?>" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Contraseña</label>
                                            <input type="password" name="txtClave" class="form-control" placeholder="Escribir ...">
                                        </div>
                                         <div class="form-group col-sm-6">
                                            <label>Confirmar Contraseña</label>
                                            <input type="password" name="txtClave2" class="form-control" placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Perfil</label>
                                            <select class="form-control" name="cbPerfil" required>
                                               <option value="">-Seleccione-</option>
                                                <?php echo $obj_combos->combo_perfil($id_perfil);?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Empresa</label>
                                            <select class="form-control" name="cbEmpresa" required>
                                                 <option value="">-Seleccione-</option>
                                                <?php echo $obj_combos->combo_empresa($id_empresa);?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Sucursal</label>
                                            <select class="form-control" name="cbSucursal" required>
                                                 <option value="">-Seleccione-</option>
                                                <?php echo $obj_combos->combo_sucursal($id_sucursal); ?>
                                            </select>
                                        </div>
                                         <div class="form-group col-sm-12">
                                    <?php 
                                      if ($activo):                                     
                                         echo "<input type='checkbox' name='chk_activo' style='width: 2%;' checked  id='chk_activo' /> ";
                                      else:
                                         echo "<input type='checkbox' name='chk_activo' style='width: 2%;' id='chk_activo' />  ";
                                      endif;
                                    ?>      
                                        </div>
                                    </div>
                                    <div class="box-footer alinr">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                        <a href="./?vista=list_usuario" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
    