<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/perfil.class.php");

    
    $obj_perfil      =   new Perfil();
    $obj_perfil->conectar();
    $array_datos        =   [];  
    $array_datos        =   $obj_perfil->select_perfil($_REQUEST["id"]);
    
    if(count($array_datos) > 0):
        $id_perfil           =   $array_datos[0];
        $nombre_perfil       =   $array_datos[1];     
        $activo              =   $array_datos[2];
        $fecha_creacion      =   $array_datos[3];        
    else:
    
    
    endif;  
    
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Perfil
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar</h3>
                                </div>
                                <form role="form" method="post" action="controlador/perfil.ctrl.php" name="frm_perfil_upd" id="frm_perfil_upd" autocomplete="off">
                                    <div class="box-body">
                                     <input type="hidden" name="tipo_operacion" value="2">
                                    <input type="hidden" name="id_perfil" id="id_perfil" value="<?php echo $id_perfil;?>">
                                        <div class="form-group">
                                            <label>Nombre del perfil</label>
                                            <input type="text" name="txtPerfil" value="<?php echo $nombre_perfil;?>" class="form-control" required placeholder="Escribir ...">
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
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                        <a href="./?vista=list_perfil" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>