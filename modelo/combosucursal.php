<?php
	include("../servicio/ConexionCombos.class.php");
	
	if(!empty($_POST['id_empresa'])) {
		$ciudades = array();
		$sql = "SELECT  id_sucursal, nombre_sucursal FROM db_ivr.tbl_sucursal where activo=1 and id_empresa = ".$_POST['id_empresa']; 

		$db = obtenerConexion();
		$result = ejecutarQuery($db, $sql);

		while($row = $result->fetch_assoc()){
			$ciudad = new ciudad($row['id_sucursal'], $row['nombre_sucursal']);
		    array_push($ciudades, $ciudad);
		}

		cerrarConexion($db, $result);
		//print_r($ciudades);
		
		echo json_encode($ciudades);
	}
	
	class ciudad {
		public $id_sucursal;
		public $nombre;

		function __construct($id_sucursal, $nombre) {
			$this->id_sucursal = $id_sucursal;
			$this->nombre = $nombre;
		}
	}
?>