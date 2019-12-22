<?php
require_once ("persistence/LogCoordinadorDAO.php");
require_once ("persistence/Connection.php");

class LogCoordinador {
	private $idLogCoordinador;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $coordinador;
	private $logCoordinadorDAO;
	private $connection;

	function getIdLogCoordinador() {
		return $this -> idLogCoordinador;
	}

	function setIdLogCoordinador($pIdLogCoordinador) {
		$this -> idLogCoordinador = $pIdLogCoordinador;
	}

	function getAction() {
		return $this -> action;
	}

	function setAction($pAction) {
		$this -> action = $pAction;
	}

	function getInformation() {
		return $this -> information;
	}

	function setInformation($pInformation) {
		$this -> information = $pInformation;
	}

	function getDate() {
		return $this -> date;
	}

	function setDate($pDate) {
		$this -> date = $pDate;
	}

	function getTime() {
		return $this -> time;
	}

	function setTime($pTime) {
		$this -> time = $pTime;
	}

	function getIp() {
		return $this -> ip;
	}

	function setIp($pIp) {
		$this -> ip = $pIp;
	}

	function getOs() {
		return $this -> os;
	}

	function setOs($pOs) {
		$this -> os = $pOs;
	}

	function getBrowser() {
		return $this -> browser;
	}

	function setBrowser($pBrowser) {
		$this -> browser = $pBrowser;
	}

	function getCoordinador() {
		return $this -> coordinador;
	}

	function setCoordinador($pCoordinador) {
		$this -> coordinador = $pCoordinador;
	}

	function LogCoordinador($pIdLogCoordinador = "", $pAction = "", $pInformation = "", $pDate = "", $pTime = "", $pIp = "", $pOs = "", $pBrowser = "", $pCoordinador = ""){
		$this -> idLogCoordinador = $pIdLogCoordinador;
		$this -> action = $pAction;
		$this -> information = $pInformation;
		$this -> date = $pDate;
		$this -> time = $pTime;
		$this -> ip = $pIp;
		$this -> os = $pOs;
		$this -> browser = $pBrowser;
		$this -> coordinador = $pCoordinador;
		$this -> logCoordinadorDAO = new LogCoordinadorDAO($this -> idLogCoordinador, $this -> action, $this -> information, $this -> date, $this -> time, $this -> ip, $this -> os, $this -> browser, $this -> coordinador);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idLogCoordinador = $result[0];
		$this -> action = $result[1];
		$this -> information = $result[2];
		$this -> date = $result[3];
		$this -> time = $result[4];
		$this -> ip = $result[5];
		$this -> os = $result[6];
		$this -> browser = $result[7];
		$coordinador = new Coordinador($result[8]);
		$coordinador -> select();
		$this -> coordinador = $coordinador;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> selectAll());
		$logCoordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[8]);
			$coordinador -> select();
			array_push($logCoordinadors, new LogCoordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $coordinador));
		}
		$this -> connection -> close();
		return $logCoordinadors;
	}

	function selectAllByCoordinador(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> selectAllByCoordinador());
		$logCoordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[8]);
			$coordinador -> select();
			array_push($logCoordinadors, new LogCoordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $coordinador));
		}
		$this -> connection -> close();
		return $logCoordinadors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> selectAllOrder($order, $dir));
		$logCoordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[8]);
			$coordinador -> select();
			array_push($logCoordinadors, new LogCoordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $coordinador));
		}
		$this -> connection -> close();
		return $logCoordinadors;
	}

	function selectAllByCoordinadorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> selectAllByCoordinadorOrder($order, $dir));
		$logCoordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[8]);
			$coordinador -> select();
			array_push($logCoordinadors, new LogCoordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $coordinador));
		}
		$this -> connection -> close();
		return $logCoordinadors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> logCoordinadorDAO -> search($search));
		$logCoordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[8]);
			$coordinador -> select();
			array_push($logCoordinadors, new LogCoordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $coordinador));
		}
		$this -> connection -> close();
		return $logCoordinadors;
	}
}
?>
