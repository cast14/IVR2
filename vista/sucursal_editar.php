
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
                                <form role="form" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nombre de la Sucursal</label>
                                            <input type="text" name="txtNombre" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Empresa</label>
                                            <select class="form-control" name="cbEmpresa" required>
                                                <option>Empresa 1</option>
                                                <option>Empresa 2</option>
                                                <option>Empresa 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <textarea name="txtDireccion" class="form-control" rows="3" required placeholder="Escribir ..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono 1</label>
                                            <input type="text" name="txtTelefono_1" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono 2</label>
                                            <input type="text" name="txtTelefono_2" class="form-control" placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input type="email" name="txtEmail" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" name="txtWebsite" class="form-control" placeholder="Escribir ...">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                        <a href="./?vista=list_sucursal" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>