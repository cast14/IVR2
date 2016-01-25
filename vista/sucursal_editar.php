<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/sucursal.class.php");
    require ("modelo/combo_catalogos.class.php");

   $obj_combos      =   new Combos();
   $obj_combos->conectar();

    
    $obj_sucursal      =   new Sucursal();
    $obj_sucursal->conectar();
    $array_datos        =   [];  
    $array_datos        =   $obj_sucursal->select_sucursal($_REQUEST["id"]);
    
    if(count($array_datos) > 0):
        $id_sucursal         =   $array_datos[0];
        $id_empresa          =   $array_datos[1];
        $nombre_sucursal     =   $array_datos[2];     
        $direcion            =   $array_datos[3];
        $telefono_1          =   $array_datos[4];
        $telefono_2          =   $array_datos[5];
        $correo              =   $array_datos[6];
        $website             =   $array_datos[7];
        $activo              =   $array_datos[8];
        $fecha_creacion      =   $array_datos[9];        
    else:
    
      header('Location: ./?vista=new_sucursal');
    endif;  
    
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Sucursal
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar</h3>
                                </div>
                                <form role="form" method="post" action="controlador/sucursal.ctrl.php" name="frm_sucursal_upd" id="frm_sucursal_upd" autocomplete="off">
                                    <div class="box-body">
                                     <input type="hidden" name="tipo_operacion" value="2">
                                    <input type="hidden" name="id_sucursal" id="id_sucursal" value="<?php echo $id_sucursal;?>">
                                        <div class="form-group col-sm-12">
                                            <label>Nombre de la Sucursal</label>
                                            <input type="text" name="txtNombre" value="<?php echo $nombre_sucursal;?>" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Empresa</label>
                                            <select class="form-control" name="cbEmpresa" required>
                                                <option>-Seleccione-</option>
                                              <?php echo $obj_combos->combo_empresa($id_empresa); ?> 
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Direccion</label>
                                            <textarea name="txtDireccion" class="form-control" rows="3" required placeholder="Escribir ..."><?php echo $direcion;?></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Telefono 1</label>
                                            <input type="text" name="txtTelefono_1" value="<?php echo $telefono_1;?>" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Telefono 2</label>
                                            <input type="text" name="txtTelefono_2" value="<?php echo $telefono_2;?>" class="form-control" placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Correo</label>
                                            <input type="email" name="txtEmail" value="<?php echo $correo;?>" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Website</label>
                                            <input type="text" name="txtWebsite" value="<?php echo $website;?>" class="form-control" placeholder="Escribir ...">
                                        </div>
                                         <div class="form-group col-sm-12">
                                            <?php 
                                              if ($activo):                                     
                                                 echo "<input type='checkbox' name='chk_activo' style='width: 2%;' checked class='form-control' id='chk_activo' /> ";
                                              else:
                                                 echo "<input type='checkbox' name='chk_activo' style='width: 2%;' class='form-control' id='chk_activo' />  ";
                                              endif;
                                            ?>      
                                        </div>
                                    </div>
                                    <div class="box-footer alinr">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                        <a href="./?vista=list_sucursal" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>