<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/combo_catalogos.class.php");
    require ("modelo/comboempresa.php");

    
    $obj_combos      =   new Combos();
    $obj_combos->conectar(); 
          
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
    <script>
        $(document).ready(function(){
            $("#cbEmpresa").change(function() {
                var pais = $(this).val();
                
                if(pais > 0)
                {
                    var datos = {
                        id_empresa : $(this).val()
                    };
                    
                    $.post("modelo/combosucursal.php", datos, function(ciudades) {
                        var $comboCiudades = $("#cbSucursal");
                        
                        $comboCiudades.empty();
                         $comboCiudades.append("<option value=''>" + "-Seleccione-" + "</option>");
                        $.each(ciudades, function(index, cuidad) {
                            //console.log(ciudades[index]["id_sucursal"]);

                            $comboCiudades.append("<option value='"+ ciudades[index]["id_sucursal"] +"'>" + cuidad.nombre + "</option>");
                        });
                    }, 'json');
                }
                else
                {
                    var $comboCiudades = $("#cbSucursal");
                    $comboCiudades.empty();
                    $comboCiudades.append("<option>Seleccione una sucursal</option>");
                }
            });
        }); 
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
                                    <h3 class="box-title">Registrar</h3>
                                </div>
                                <form role="form" method="post" action="controlador/usuarios.ctrl.php" name="frm_usuarios" id="frm_usuarios" autocomplete="off">
                                    <div class="box-body">
                                    <input type="hidden" name="tipo_operacion" value="1">
                                        <div class="form-group col-sm-6">
                                            <label>Nombre</label>
                                            <input type="text" name="txtNombre" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Apellido</label>
                                            <input type="text" name="txtApellido" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Usuario</label>
                                            <input type="text" name="txtUsuario" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Contraseña</label>
                                            <input type="password" name="txtClave" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                         <div class="form-group col-sm-6">
                                            <label>Confirmar Contraseña</label>
                                            <input type="password" name="txtClave2" onblur="ValidarPassword(txtClave,txtClave2)" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Perfil</label>
                                            <select class="form-control" name="cbPerfil" required>
                                                <option value="">-Seleccione-</option>
                                                <?php echo $obj_combos->combo_perfil(-1);?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Empresa</label>
                                            <select class="form-control" name="cbEmpresa" id="cbEmpresa" required>
                                                <option value="">-Seleccione-</option>
                                              <?php
                                                    $paises = obtenerTodosLosPaises();
                                                    foreach ($paises as $pais) { 
                                                        echo '<option value="'.$pais->id.'">'.utf8_encode($pais->nombre).'</option>';       
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Sucursal</label>
                                            <div class="divSelects">
                                            <select class="form-control" name="cbSucursal" id="cbSucursal" required>
                                                 <option value="">-Seleccione-</option>
                                              
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer alinr">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="./?vista=list_usuario" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
     