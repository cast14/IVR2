<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/sucursal.class.php");

    
   $obj_sucursal      =   new Sucursal();
   $obj_sucursal->conectar();
?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                       Sucursal
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="btn btn-primary btn-block" href="./?vista=new_sucursal">Nuevo</a>
                            <hr>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Registros</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" id="table_search" class="form-control input-sm pull-right" style="width: 220px;" placeholder="Buscar ..." />
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
                                            <th style="width: 9%;">OPCIONES</th>
                                            <th style="width: 4%;">ID</th>
                                            <th style="width: 10%;">SUCURSAL</th>
                                            <th style="width: 10%;">EMPRESA</th>
                                            <th style="width: 18%;">DIRECCION</th>
                                            <th style="width: 9%;">TELEFONO 1</th>
                                            <th style="width: 9%;">TELEFONO 2</th>
                                            <th style="width: 12%;">CORREO</th>
                                            <th style="width: 12%;">WEBSITE</th>
                                            <th style="width:3%">ACTIVO</th>
                                        </tr>
                                         </thead>
                                          <tbody style="font-size:12px">
                                         <?php echo $obj_sucursal->listar_sucursales(); ?> 
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
 <div class="container">
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
              <input type="hidden" id="id_suc_hide" value="">
            <h4 class="mt5"> ¿Seguro que desea eliminar este registro?</h3>
          </form>
        </div>
        <div class="modal-footer">
        <button class="btn btn-primary" type="button" style="    width: 75px;" onClick="eliminar_sucursal(id_suc_hide.value)">Aceptar</button>
    <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
    </div>
        </div>
      </div>
    </div>
  </div> 
</div>