<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/perfil.class.php");

    
   $obj_perfil      =   new Perfil();
   $obj_perfil->conectar();
?>

            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Perfil
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="btn btn-primary btn-block" href="./?vista=new_perfil">Nuevo</a>
                            <hr>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Registros</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" id="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar ..." />
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
                                            <th style="width: 10%;">OPCIONES</th>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 30%;">PERFIL</th>
                                            <th style="width: 15%;">FECHA CREACION</th>
                                            <th style="width:5%">ACTIVO</th>
                                        </tr>
                                         </thead>
                                          <tbody style="font-size:12px">
                                         <?php echo $obj_perfil->listar_perfiles(); ?> 
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
            </aside> <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="    margin-top: 10%;    width: 40%;">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="    font-size: 18px;font-weight: 700;color: #3498DB;">
          <button type="button" class="close" data-dismiss="modal" style="    font-size: 20pt;">&times;</button>
            <span class="panel-icon"> 
          <i class="fa fa-star-o"></i> 
       </span> 
       <span class="panel-title"> Mensaje de Confirmación</span> 
        </div>
        <div class="modal-body">
          <form role="form">
              <input type="hidden" id="id_per_hide" value="">
            <h4 class="mt5"> ¿Seguro que desea eliminar este registro?</h3>
          </form>
        </div>
        <div class="modal-footer">
        <button class="btn btn-primary" type="button" style="    width: 75px;" onClick="eliminar_perfil(id_per_hide.value)">Aceptar</button>
    <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
    </div>
        </div>
      </div>
    </div>
  </div> 
</div>