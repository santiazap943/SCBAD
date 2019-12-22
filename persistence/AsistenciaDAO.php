<?php
class AsistenciaDAO{
	private $idAsistencia;
	private $fecha;
	private $profesor;

	function AsistenciaDAO($pIdAsistencia = "", $pFecha = "", $pProfesor = ""){
		$this -> idAsistencia = $pIdAsistencia;
		$this -> fecha = $pFecha;
		$this -> profesor = $pProfesor;
	}

	function insert(){
		return "insert into Asistencia(fecha, profesor_idProfesor)
				values('" . $this -> fecha . "', '" . $this -> profesor . "')";
	}

	function update(){
		return "update Asistencia set 
				fecha = '" . $this -> fecha . "',
				profesor_idProfesor = '" . $this -> profesor . "'	
				where idAsistencia = '" . $this -> idAsistencia . "'";
	}

	function select() {
		return "select idAsistencia, fecha, profesor_idProfesor
				from Asistencia
				where idAsistencia = '" . $this -> idAsistencia . "'";
	}

	function selectAll() {
		return "select idAsistencia, fecha, profesor_idProfesor
				from Asistencia";
	}

	function selectAllByProfesor() {
		return "select idAsistencia, fecha, profesor_idProfesor
				from Asistencia
				where profesor_idProfesor = '" . $this -> profesor . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idAsistencia, fecha, profesor_idProfesor
				from Asistencia
				order by " . $orden . " " . $dir;
	}

	function selectAllByProfesorOrder($orden, $dir) {
		return "select idAsistencia, fecha, profesor_idProfesor
				from Asistencia
				where profesor_idProfesor = '" . $this -> profesor . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idAsistencia, fecha, profesor_idProfesor
				from Asistencia
				where fecha like '%" . $search . "%'";
	}
}
?>
