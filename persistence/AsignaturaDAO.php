<?php
class AsignaturaDAO{
	private $idAsignatura;
	private $nombre;
	private $area;

	function AsignaturaDAO($pIdAsignatura = "", $pNombre = "", $pArea = ""){
		$this -> idAsignatura = $pIdAsignatura;
		$this -> nombre = $pNombre;
		$this -> area = $pArea;
	}

	function insert(){
		return "insert into Asignatura(nombre, area_idArea)
				values('" . $this -> nombre . "', '" . $this -> area . "')";
	}

	function update(){
		return "update Asignatura set 
				nombre = '" . $this -> nombre . "',
				area_idArea = '" . $this -> area . "'	
				where idAsignatura = '" . $this -> idAsignatura . "'";
	}

	function select() {
		return "select idAsignatura, nombre, area_idArea
				from Asignatura
				where idAsignatura = '" . $this -> idAsignatura . "'";
	}

	function selectAll() {
		return "select idAsignatura, nombre, area_idArea
				from Asignatura";
	}

	function selectAllByArea() {
		return "select idAsignatura, nombre, area_idArea
				from Asignatura
				where area_idArea = '" . $this -> area . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idAsignatura, nombre, area_idArea
				from Asignatura
				order by " . $orden . " " . $dir;
	}

	function selectAllByAreaOrder($orden, $dir) {
		return "select idAsignatura, nombre, area_idArea
				from Asignatura
				where area_idArea = '" . $this -> area . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idAsignatura, nombre, area_idArea
				from Asignatura
				where nombre like '%" . $search . "%'";
	}
}
?>
