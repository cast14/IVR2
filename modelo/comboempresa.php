<?php
	include("servicio/ConexionCombos.class.php");

	function obtenerTodosLosPaises() {
		$paises = array();
		$sql = "SELECT id_empresa,nombre_empresa FROM tbl_empresa where activo=1 order by nombre_empresa asc"; 

		$db = obtenerConexion();
		$result = ejecutarQuery($db, $sql);

		while($row = $result->fetch_assoc()){
			$pais = new pais($row['id_empresa'], $row['nombre_empresa']);
		    array_push($paises, $pais);
		}

		cerrarConexion($db, $result);

		return $paises;
	}

	class pais {
		public $id;
		public $nombre;

		function __construct($id, $nombre) {
			$this->id = $id;
			$this->nombre = $nombre;
		}
	}
?>