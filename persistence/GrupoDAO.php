<?php
class GrupoDAO{
	private $idGrupo;
	private $asignatura;
	private $inscripcion;

	function GrupoDAO($pIdGrupo = "", $pAsignatura = "", $pInscripcion = ""){
		$this -> idGrupo = $pIdGrupo;
		$this -> asignatura = $pAsignatura;
		$this -> inscripcion = $pInscripcion;
	}

	function insert(){
		return "insert into Grupo(asignatura_idAsignatura, inscripcion_idInscripcion)
				values('" . $this -> asignatura . "', '" . $this -> inscripcion . "')";
	}

	function update(){
		return "update Grupo set 
				asignatura_idAsignatura = '" . $this -> asignatura . "',
				inscripcion_idInscripcion = '" . $this -> inscripcion . "'	
				where idGrupo = '" . $this -> idGrupo . "'";
	}

	function select() {
		return "select idGrupo, asignatura_idAsignatura, inscripcion_idInscripcion
				from Grupo
				where idGrupo = '" . $this -> idGrupo . "'";
	}

	function selectAll() {
		return "select idGrupo, asignatura_idAsignatura, inscripcion_idInscripcion
				from Grupo";
	}

	function selectAllByAsignatura() {
		return "select idGrupo, asignatura_idAsignatura, inscripcion_idInscripcion
				from Grupo
				where asignatura_idAsignatura = '" . $this -> asignatura . "'";
	}

	function selectAllByInscripcion() {
		return "select idGrupo, asignatura_idAsignatura, inscripcion_idInscripcion
				from Grupo
				where inscripcion_idInscripcion = '" . $this -> inscripcion . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idGrupo, asignatura_idAsignatura, inscripcion_idInscripcion
				from Grupo
				order by " . $orden . " " . $dir;
	}

	function selectAllByAsignaturaOrder($orden, $dir) {
		return "select idGrupo, asignatura_idAsignatura, inscripcion_idInscripcion
				from Grupo
				where asignatura_idAsignatura = '" . $this -> asignatura . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByInscripcionOrder($orden, $dir) {
		return "select idGrupo, asignatura_idAsignatura, inscripcion_idInscripcion
				from Grupo
				where inscripcion_idInscripcion = '" . $this -> inscripcion . "'
				order by " . $orden . " " . $dir;
	}
}
?>
