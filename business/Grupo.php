<?php
require_once ("persistence/GrupoDAO.php");
require_once ("persistence/Connection.php");

class Grupo {
	private $idGrupo;
	private $asignatura;
	private $inscripcion;
	private $grupoDAO;
	private $connection;

	function getIdGrupo() {
		return $this -> idGrupo;
	}

	function setIdGrupo($pIdGrupo) {
		$this -> idGrupo = $pIdGrupo;
	}

	function getAsignatura() {
		return $this -> asignatura;
	}

	function setAsignatura($pAsignatura) {
		$this -> asignatura = $pAsignatura;
	}

	function getInscripcion() {
		return $this -> inscripcion;
	}

	function setInscripcion($pInscripcion) {
		$this -> inscripcion = $pInscripcion;
	}

	function Grupo($pIdGrupo = "", $pAsignatura = "", $pInscripcion = ""){
		$this -> idGrupo = $pIdGrupo;
		$this -> asignatura = $pAsignatura;
		$this -> inscripcion = $pInscripcion;
		$this -> grupoDAO = new GrupoDAO($this -> idGrupo, $this -> asignatura, $this -> inscripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idGrupo = $result[0];
		$asignatura = new Asignatura($result[1]);
		$asignatura -> select();
		$this -> asignatura = $asignatura;
		$inscripcion = new Inscripcion($result[2]);
		$inscripcion -> select();
		$this -> inscripcion = $inscripcion;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> selectAll());
		$grupos = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[1]);
			$asignatura -> select();
			$inscripcion = new Inscripcion($result[2]);
			$inscripcion -> select();
			array_push($grupos, new Grupo($result[0], $asignatura, $inscripcion));
		}
		$this -> connection -> close();
		return $grupos;
	}

	function selectAllByAsignatura(){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> selectAllByAsignatura());
		$grupos = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[1]);
			$asignatura -> select();
			$inscripcion = new Inscripcion($result[2]);
			$inscripcion -> select();
			array_push($grupos, new Grupo($result[0], $asignatura, $inscripcion));
		}
		$this -> connection -> close();
		return $grupos;
	}

	function selectAllByInscripcion(){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> selectAllByInscripcion());
		$grupos = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[1]);
			$asignatura -> select();
			$inscripcion = new Inscripcion($result[2]);
			$inscripcion -> select();
			array_push($grupos, new Grupo($result[0], $asignatura, $inscripcion));
		}
		$this -> connection -> close();
		return $grupos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> selectAllOrder($order, $dir));
		$grupos = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[1]);
			$asignatura -> select();
			$inscripcion = new Inscripcion($result[2]);
			$inscripcion -> select();
			array_push($grupos, new Grupo($result[0], $asignatura, $inscripcion));
		}
		$this -> connection -> close();
		return $grupos;
	}

	function selectAllByAsignaturaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> selectAllByAsignaturaOrder($order, $dir));
		$grupos = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[1]);
			$asignatura -> select();
			$inscripcion = new Inscripcion($result[2]);
			$inscripcion -> select();
			array_push($grupos, new Grupo($result[0], $asignatura, $inscripcion));
		}
		$this -> connection -> close();
		return $grupos;
	}

	function selectAllByInscripcionOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> selectAllByInscripcionOrder($order, $dir));
		$grupos = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[1]);
			$asignatura -> select();
			$inscripcion = new Inscripcion($result[2]);
			$inscripcion -> select();
			array_push($grupos, new Grupo($result[0], $asignatura, $inscripcion));
		}
		$this -> connection -> close();
		return $grupos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> grupoDAO -> search($search));
		$grupos = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[1]);
			$asignatura -> select();
			$inscripcion = new Inscripcion($result[2]);
			$inscripcion -> select();
			array_push($grupos, new Grupo($result[0], $asignatura, $inscripcion));
		}
		$this -> connection -> close();
		return $grupos;
	}
}
?>
