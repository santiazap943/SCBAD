<?php
class InscripcionDAO{
	private $idInscripcion;
	private $periodo;
	private $profesor;

	function InscripcionDAO($pIdInscripcion = "", $pPeriodo = "", $pProfesor = ""){
		$this -> idInscripcion = $pIdInscripcion;
		$this -> periodo = $pPeriodo;
		$this -> profesor = $pProfesor;
	}

	function insert(){
		return "insert into Inscripcion(periodo, profesor_idProfesor)
				values('" . $this -> periodo . "', '" . $this -> profesor . "')";
	}

	function update(){
		return "update Inscripcion set 
				periodo = '" . $this -> periodo . "',
				profesor_idProfesor = '" . $this -> profesor . "'	
				where idInscripcion = '" . $this -> idInscripcion . "'";
	}

	function select() {
		return "select idInscripcion, periodo, profesor_idProfesor
				from Inscripcion
				where idInscripcion = '" . $this -> idInscripcion . "'";
	}

	function selectAll() {
		return "select idInscripcion, periodo, profesor_idProfesor
				from Inscripcion";
	}

	function selectAllByProfesor() {
		return "select idInscripcion, periodo, profesor_idProfesor
				from Inscripcion
				where profesor_idProfesor = '" . $this -> profesor . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idInscripcion, periodo, profesor_idProfesor
				from Inscripcion
				order by " . $orden . " " . $dir;
	}

	function selectAllByProfesorOrder($orden, $dir) {
		return "select idInscripcion, periodo, profesor_idProfesor
				from Inscripcion
				where profesor_idProfesor = '" . $this -> profesor . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idInscripcion, periodo, profesor_idProfesor
				from Inscripcion
				where periodo like '%" . $search . "%'";
	}
}
?>
