
//DELETES
function eliminar_empresa(id)
{
     location.href = './controlador/empresa.ctrl.php?tipo_operacion=3&id_empresa='+id;
}

//REDIRECTS
function select_sucursal(id)
{
     location.href = './controlador/combos.ctrl.php?id='+id;
}

