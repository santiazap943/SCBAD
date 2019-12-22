<?php
require_once ("persistence/HorarioDAO.php");
require_once ("persistence/Connection.php");

class Horario {
	private $idHorario;
	private $dia;
	private $hora;
	private $inscripcion;
	private $horarioDAO;
	private $connection;

	function getIdHorario() {
		return $this -> idHorario;
	}

	function setIdHorario($pIdHorario) {
		$this -> idHorario = $pIdHorario;
	}

	function getDia() {
		return $this -> dia;
	}

	function setDia($pDia) {
		$this -> dia = $pDia;
	}

	function getHora() {
		return $this -> hora;
	}

	function setHora($pHora) {
		$this -> hora = $pHora;
	}

	function getInscripcion() {
		return $this -> inscripcion;
	}

	function setInscripcion($pInscripcion) {
		$this -> inscripcion = $pInscripcion;
	}

	function Horario($pIdHorario = "", $pDia = "", $pHora = "", $pInscripcion = ""){
		$this -> idHorario = $pIdHorario;
		$this -> dia = $pDia;
		$this -> hora = $pHora;
		$this -> inscripcion = $pInscripcion;
		$this -> horarioDAO = new HorarioDAO($this -> idHorario, $this -> dia, $this -> hora, $this -> inscripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idHorario = $result[0];
		$this -> dia = $result[1];
		$this -> hora = $result[2];
		$inscripcion = new Inscripcion($result[3]);
		$inscripcion -> select();
		$this -> inscripcion = $inscripcion;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAll());
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$inscripcion = new Inscripcion($result[3]);
			$inscripcion -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $inscripcion));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function selectAllByInscripcion(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAllByInscripcion());
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$inscripcion = new Inscripcion($result[3]);
			$inscripcion -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $inscripcion));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAllOrder($order, $dir));
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$inscripcion = new Inscripcion($result[3]);
			$inscripcion -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $inscripcion));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function selectAllByInscripcionOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAllByInscripcionOrder($order, $dir));
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$inscripcion = new Inscripcion($result[3]);
			$inscripcion -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $inscripcion));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> search($search));
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$inscripcion = new Inscripcion($result[3]);
			$inscripcion -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $inscripcion));
		}
		$this -> connection -> close();
		return $horarios;
	}
}
?>
