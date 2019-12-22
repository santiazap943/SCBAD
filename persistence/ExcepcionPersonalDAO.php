<?php
class ExcepcionPersonalDAO{
	private $idExcepcionPersonal;
	private $descripcion;
	private $profesor;
	private $tipo;

	function ExcepcionPersonalDAO($pIdExcepcionPersonal = "", $pDescripcion = "", $pProfesor = "", $pTipo = ""){
		$this -> idExcepcionPersonal = $pIdExcepcionPersonal;
		$this -> descripcion = $pDescripcion;
		$this -> profesor = $pProfesor;
		$this -> tipo = $pTipo;
	}

	function insert(){
		return "insert into ExcepcionPersonal(descripcion, profesor_idProfesor, tipo_idTipo)
				values('" . $this -> descripcion . "', '" . $this -> profesor . "', '" . $this -> tipo . "')";
	}

	function update(){
		return "update ExcepcionPersonal set 
				descripcion = '" . $this -> descripcion . "',
				profesor_idProfesor = '" . $this -> profesor . "',
				tipo_idTipo = '" . $this -> tipo . "'	
				where idExcepcionPersonal = '" . $this -> idExcepcionPersonal . "'";
	}

	function select() {
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal
				where idExcepcionPersonal = '" . $this -> idExcepcionPersonal . "'";
	}

	function selectAll() {
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal";
	}

	function selectAllByProfesor() {
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal
				where profesor_idProfesor = '" . $this -> profesor . "'";
	}

	function selectAllByTipo() {
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal
				where tipo_idTipo = '" . $this -> tipo . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal
				order by " . $orden . " " . $dir;
	}

	function selectAllByProfesorOrder($orden, $dir) {
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal
				where profesor_idProfesor = '" . $this -> profesor . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByTipoOrder($orden, $dir) {
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal
				where tipo_idTipo = '" . $this -> tipo . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idExcepcionPersonal, descripcion, profesor_idProfesor, tipo_idTipo
				from ExcepcionPersonal
				where descripcion like '%" . $search . "%'";
	}
}
?>
