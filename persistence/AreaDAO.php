<?php
class AreaDAO{
	private $idArea;
	private $nombre;

	function AreaDAO($pIdArea = "", $pNombre = ""){
		$this -> idArea = $pIdArea;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Area(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update Area set 
				nombre = '" . $this -> nombre . "'	
				where idArea = '" . $this -> idArea . "'";
	}

	function select() {
		return "select idArea, nombre
				from Area
				where idArea = '" . $this -> idArea . "'";
	}

	function selectAll() {
		return "select idArea, nombre
				from Area";
	}

	function selectAllOrder($orden, $dir){
		return "select idArea, nombre
				from Area
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idArea, nombre
				from Area
				where nombre like '%" . $search . "%'";
	}
}
?>
