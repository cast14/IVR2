
//DELETES
function eliminar_empresa(id)
{
     location.href = './controlador/empresa.ctrl.php?tipo_operacion=3&id_empresa='+id;
}

function eliminar_sucursal(id)
{
     location.href = './controlador/sucursal.ctrl.php?tipo_operacion=3&id_sucursal='+id;
}

function eliminar_perfil(id)
{
     location.href = './controlador/perfil.ctrl.php?tipo_operacion=3&id_perfil='+id;
}

//REDIRECTS
function select_sucursal(id)
{
     location.href = './controlador/combos.ctrl.php?id='+id;
}

