<?php
    require ("config/db_ivr.conf.php");
    require ("servicio/Conexion.class.php");
    require ("modelo/Campagna.class.php");    
    function insert_campagna($campagna,$suc,$doc, $audio)
	{
		$obj_campagna      =   new Campagnas();
		if($obj_campagna->conectar()):
			$array_info  =   array($campagna,$suc,$doc, $audio);
			//print_r($array_info);
			$bandera = $obj_campagna->new_campagna($array_info);
			return $bandera;
		else:
			return false;
    	endif;
	}
     
	function listar_campagnas()
	{
		$obj_campagna = new Campagnas();
		if($obj_campagna->conectar()):
			return $obj_campagna->listar_campagna();
		else:
			return '<tr><td  colspan="3" style="text-align:center;">HA OCURRIDO UN ERROR</td></tr>';
		endif;	
	}
?>