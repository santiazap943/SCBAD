<?php
class HorarioDAO{
	private $idHorario;
	private $dia;
	private $hora;
	private $inscripcion;

	function HorarioDAO($pIdHorario = "", $pDia = "", $pHora = "", $pInscripcion = ""){
		$this -> idHorario = $pIdHorario;
		$this -> dia = $pDia;
		$this -> hora = $pHora;
		$this -> inscripcion = $pInscripcion;
	}

	function insert(){
		return "insert into Horario(dia, hora, inscripcion_idInscripcion)
				values('" . $this -> dia . "', '" . $this -> hora . "', '" . $this -> inscripcion . "')";
	}

	function update(){
		return "update Horario set 
				dia = '" . $this -> dia . "',
				hora = '" . $this -> hora . "',
				inscripcion_idInscripcion = '" . $this -> inscripcion . "'	
				where idHorario = '" . $this -> idHorario . "'";
	}

	function select() {
		return "select idHorario, dia, hora, inscripcion_idInscripcion
				from Horario
				where idHorario = '" . $this -> idHorario . "'";
	}

	function selectAll() {
		return "select idHorario, dia, hora, inscripcion_idInscripcion
				from Horario";
	}

	function selectAllByInscripcion() {
		return "select idHorario, dia, hora, inscripcion_idInscripcion
				from Horario
				where inscripcion_idInscripcion = '" . $this -> inscripcion . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idHorario, dia, hora, inscripcion_idInscripcion
				from Horario
				order by " . $orden . " " . $dir;
	}

	function selectAllByInscripcionOrder($orden, $dir) {
		return "select idHorario, dia, hora, inscripcion_idInscripcion
				from Horario
				where inscripcion_idInscripcion = '" . $this -> inscripcion . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idHorario, dia, hora, inscripcion_idInscripcion
				from Horario
				where dia like '%" . $search . "%' or hora like '%" . $search . "%'";
	}
}
?>
