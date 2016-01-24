<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/empresa.class.php");

    
    $obj_empresa      =   new Empresa();
    $obj_empresa->conectar();
    $array_datos        =   [];  
    $array_datos        =   $obj_empresa->select_empresa($_REQUEST["id"]);
    
    if(count($array_datos) > 0):
        $id_empresa          =   $array_datos[0];
        $nombre_empresa      =   $array_datos[1];
        $direcion            =   $array_datos[2];
        $telefono_1          =   $array_datos[3];
        $telefono_2          =   $array_datos[4];
        $correo              =   $array_datos[5];
        $website             =   $array_datos[6];
        $activo              =   $array_datos[7];
        $fecha_creacion      =   $array_datos[8];        
    else:
    
      header('Location: ./?vista=new_empresa');
    endif;  
    
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Empresa
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar</h3>
                                </div>
                                <form  role="form" method="post" action="controlador/empresa.ctrl.php" name="frm_empresa" id="frm_empresa" autocomplete="off">
                                 <input type="hidden" name="tipo_operacion" value="2">
                                 <input type="hidden" name="id_empresa" id="id_empresa" value="<?php echo $id_empresa;?>">
                                    <div class="box-body">
                                        <div class="form-group col-sm-12">
                                            <label>Nombre de la Empresa</label>
                                            <input type="text" name="txtEmpresa" value="<?php echo $nombre_empresa;?>" class="form-control" required placeholder="Escribir ...">
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
                                        <a href="./?vista=list_empresa" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>