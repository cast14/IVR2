<?php
	require ("controlador/campagna.ctrl.php");  
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Campaña
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="btn btn-primary btn-block" href="./?vista=new_campana">Nuevo</a>
                            <hr>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Registros</h3>
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
                                            <th>OPCIONES</th>
                                            <th>ID</th>
                                            <th>CAMPAÑA</th>
                                        </tr>
                                        <?PHP
											echo listar_campagnas();
										?>
                                    </table>
                                </div>
                                <div class="box-footer clearfix">
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
        