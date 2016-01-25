
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
                                    <h3 class="box-title">Registrar</h3>
                                </div>
                                <form role="form" method="post" action="controlador/perfil.ctrl.php" name="frm_perfil" id="frm_perfil" autocomplete="off">
                                <div class="box-body">
                                 <input type="hidden" name="tipo_operacion" value="1">
                                        <div class="form-group">
                                            <label>Nombre del perfil</label>
                                            <input type="text" name="txtPerfil" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="./?vista=list_perfil" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
    