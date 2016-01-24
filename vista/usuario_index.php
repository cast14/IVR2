<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/usuarios.class.php");

    
   $obj_usuario      =   new Usuarios();
   $obj_usuario->conectar();
?>
     
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Usuario
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="btn btn-primary btn-block" href="./?vista=new_usuario">Nuevo</a>
                            <hr>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Registros</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" id="table_search" class="form-control input-sm pull-right" style="width: 220px;"  placeholder="Buscar ..." />
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table  class="table table-striped table-hover mbn footable" data-filter="#table_search" data-page-navigation=".pagination" data-page-size="5">
                                        <thead>
                                        <tr style="font-size:12px">
                                            <th style="width: 8%;">OPCIONES</th>
                                            <th style="width: 4%;">ID</th>
                                            <th style="width: 15%;">NOMBRES</th>
                                            <th style="width: 12%;">USUARIO</th>
                                            <th style="width: 12%;">PERFIL</th>
                                            <th style="width: 12%;">EMPRESA</th>
                                            <th style="width: 12%;">SUCURSAL</th>
                                            <th style="width:5%">ACTIVO</th>
                                        </tr>
                                        </thead>
                                          <tbody style="font-size:12px">
                                         <?php echo $obj_usuario->listar_users(); ?> 
                                         </tbody>
                                        <tfoot class="footer-menu">
                                        <tr>
                                          <td colspan="10">
                                           <nav class="text-right">
                                              <ul class="pagination hide-if-no-paging"></ul>
                                            </nav>
                                          </td>
                                        </tr>
                                      </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
    