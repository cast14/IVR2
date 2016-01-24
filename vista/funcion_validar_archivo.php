<?php
function validar_archivo_doc($nombre_archivo)
{
	$array_ext_permitidos_img = [];
	$array_ext_permitidos_img = ['xls','xlsx'];
	$trozos = explode(".", $nombre_archivo);
	$extension = end($trozos);
	if(in_array($extension, $array_ext_permitidos_img)):
		return true;
	else:
		return false;
	endif;
}

function validar_archivo_audio($nombre_archivo)
{
	$array_ext_permitidos_video = [];
	$array_ext_permitidos_video = ['wav','mp3'];
	$trozos = explode(".", $nombre_archivo);
	$extension = end($trozos);
	if(in_array($extension, $array_ext_permitidos_video)):
		return true;
	else:
		return false;
	endif;
}
?>