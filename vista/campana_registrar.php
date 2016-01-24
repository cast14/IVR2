	
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Campaña
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Registrar</h3>
                                </div>
                                <form role="form" method="post" enctype="multipart/form-data" action="?vista=log">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nombre de la Campaña</label>
                                            <input type="text" name="txtNombre" id="txtNombre" class="form-control" required placeholder="Escribir ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Adjuntar Base</label>
                                            <input type="file" name="fileBase" id="fileBase">
                                            <p class="help-block">Adjuntar Archivo Excel .xls o .xlsx(base de datos)</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Adjuntar Audio</label>
                                            <input type="file" name="fileAudio" id="fileAudio">
                                            <p class="help-block">Adjuntar Archivo Tipo WAV o MP3</p>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="./?vista=list_campana" class="btn btn-danger">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>

