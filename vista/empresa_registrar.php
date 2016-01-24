
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
                                    <h3 class="box-title">Registrar</h3>
                                </div>
                                <form role="form" method="post" action="controlador/empresa.ctrl.php" name="frm_empresa_upd" id="frm_empresa_upd" autocomplete="off">
                                    <input type="hidden" name="tipo_operacion" value="1">
                                    <div class="box-body">
                                        <div class="form-group col-sm-12">
                                            <label>Nombre de la Empresa</label>
                                            <input type="text" name="txtEmpresa" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Direccion</label>
                                            <textarea name="txtDireccion" class="form-control" rows="3" required placeholder="Escribir ..."></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Telefono 1</label>
                                            <input type="text" name="txtTelefono_1" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Telefono 2</label>
                                            <input type="text" name="txtTelefono_2" class="form-control" placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Correo</label>
                                            <input type="email" name="txtEmail" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Website</label>
                                            <input type="text" name="txtWebsite" class="form-control" placeholder="Escribir ...">
                                        </div>
                                    </div>
                                    <div class="box-footer alinr">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="./?vista=list_empresa" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
       