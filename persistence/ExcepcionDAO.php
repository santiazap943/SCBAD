<?php
class ExcepcionDAO{
	private $idExcepcion;
	private $descripcion;
	private $tipo;

	function ExcepcionDAO($pIdExcepcion = "", $pDescripcion = "", $pTipo = ""){
		$this -> idExcepcion = $pIdExcepcion;
		$this -> descripcion = $pDescripcion;
		$this -> tipo = $pTipo;
	}

	function insert(){
		return "insert into Excepcion(descripcion, tipo_idTipo)
				values('" . $this -> descripcion . "', '" . $this -> tipo . "')";
	}

	function update(){
		return "update Excepcion set 
				descripcion = '" . $this -> descripcion . "',
				tipo_idTipo = '" . $this -> tipo . "'	
				where idExcepcion = '" . $this -> idExcepcion . "'";
	}

	function select() {
		return "select idExcepcion, descripcion, tipo_idTipo
				from Excepcion
				where idExcepcion = '" . $this -> idExcepcion . "'";
	}

	function selectAll() {
		return "select idExcepcion, descripcion, tipo_idTipo
				from Excepcion";
	}

	function selectAllByTipo() {
		return "select idExcepcion, descripcion, tipo_idTipo
				from Excepcion
				where tipo_idTipo = '" . $this -> tipo . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idExcepcion, descripcion, tipo_idTipo
				from Excepcion
				order by " . $orden . " " . $dir;
	}

	function selectAllByTipoOrder($orden, $dir) {
		return "select idExcepcion, descripcion, tipo_idTipo
				from Excepcion
				where tipo_idTipo = '" . $this -> tipo . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idExcepcion, descripcion, tipo_idTipo
				from Excepcion
				where descripcion like '%" . $search . "%'";
	}
}
?>
