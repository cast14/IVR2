
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
            <script>
                $(function () {
                    $("#desde").datepicker({
                        dateFormat: 'dd-mm-yy',
                        changeMonth: true,
                        changeYear: true,
                        //agregago
                        closeText: 'Cerrar',
                        prevText: '<Ant',
                        nextText: 'Sig>',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                    });
                });
                
                $(function () {
                    $("#hasta").datepicker({
                        dateFormat: 'dd-mm-yy',
                        changeMonth: true,
                        changeYear: true,
                        //agregago
                        closeText: 'Cerrar',
                        prevText: '<Ant',
                        nextText: 'Sig>',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                    });
                });
            </script>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Campaña
                    </h1>
                </section>
                <section class="content">
                    <h2 class="page-header">[NOMBRE DE LA CAMPAÑA]</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Dashboard</h3>
                                </div>
                                <form role="form" method="post">
                                    <div class="box-body">
                                        <button class="btn btn btn-success btn-block"><i class="fa fa-play"></i> Iniciar</button>
                                        <hr>
                                        <button class="btn btn-danger btn-block"><i class="fa fa-stop"></i> Detener</button>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="callout callout-info">
                                                    <h4>Estado</h4>
                                                    <p>Detenido</p>
                                                </div>
                                                <div class="callout callout-info">
                                                    <h4>Archivo WAV</h4>
                                                    <p>Terminalreparado</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="callout callout-info">
                                                    <h4>Numeros Marcados</h4>
                                                    <p>0</p>
                                                </div>
                                                <div class="callout callout-info">
                                                    <h4>Numeros Pendientes</h4>
                                                    <p>0</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="callout callout-info">
                                                    <h4>PID</h4>
                                                    <p>0</p>
                                                </div>
                                                <div class="callout callout-info">
                                                    <h4>Caller ID</h4>
                                                    <p>22020300</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="pad">
                                                    <div class="clearfix">
                                                        <span class="pull-left">Contestadas</span>
                                                        <small class="pull-right">0%</small>
                                                    </div>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="pull-left">AMD</span>
                                                        <small class="pull-right">0%</small>
                                                    </div>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-red" style="width: 70%;"></div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="pull-left">RNA</span>
                                                        <small class="pull-right">0%</small>
                                                    </div>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-light-blue" style="width: 70%;"></div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="pull-left">En Proceso</span>
                                                        <small class="pull-right">0%</small>
                                                    </div>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 70%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                                                <input type="text" class="knob" data-readonly="true" value="80" data-width="60" data-height="60" data-fgcolor="#f56954" />
                                                <div class="knob-label">Contestadas</div>
                                            </div>
                                            <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                                                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#00a65a" />
                                                <div class="knob-label">AMD</div>
                                            </div>
                                            <div class="col-xs-3 text-center">
                                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#3c8dbc" />
                                                <div class="knob-label">RNA</div>
                                            </div>
                                            <div class="col-xs-3 text-center">
                                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#3c8dbc" />
                                                <div class="knob-label">En Proceso</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Descargar Reporte</h3>
                                </div>
                                <form role="form" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Desde</label>
                                            <input type="text" name="txtDesde" class="form-control" id="desde" required placeholder="dd/mm/aaaa">
                                        </div>
                                        <div class="form-group">
                                            <label>Hasta</label>
                                            <input type="text" name="txtHasta" class="form-control" id="hasta" required placeholder="dd/mm/aaaa">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success">Descargar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Modificar o Agregar</h3>
                                </div>
                                <form role="form" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Adjuntar Base</label>
                                            <input type="file" name="fileBase">
                                            <p class="help-block">Adjuntar Archivo Excel .xls (base de datos)</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Adjuntar Audio</label>
                                            <input type="file" name="fileAudio">
                                            <p class="help-block">Adjuntar Archivo Tipo WAV</p>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Realizar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Dial</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar ..." />
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>NUMERO</th>
                                            <th>FILE</th>
                                            <th>ROUTE</th>
                                            <th>ATTEMPT</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>7777-7777</td>
                                            <td>nombre.wav</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-footer clearfix">
                                    <span class="label label-primary">Total: 1</span>
                                    <button type="submit" class="btn btn-success">Descargar</button>
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Dial Hist</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar ..." />
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>DIAL ID</th>
                                            <th>NUMBER</th>
                                            <th>FILE</th>
                                            <th>ATTEMPT</th>
                                            <th>DIAL CAUSE</th>
                                            <th>DIAL CODE</th>
                                            <th>DIAL DURATION</th>
                                            <th>DIAL STAR TIME</th>
                                            <th>DIAL ANSWER TIME</th>
                                            <th>DIAN END TIME</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>7777-7777</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-footer clearfix">
                                    <span class="label label-primary">Total: 1</span>
                                    <button type="submit" class="btn btn-success">Descargar</button>
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        