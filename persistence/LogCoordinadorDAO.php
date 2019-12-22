<?php
class LogCoordinadorDAO{
	private $idLogCoordinador;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $coordinador;

	function LogCoordinadorDAO($pIdLogCoordinador = "", $pAction = "", $pInformation = "", $pDate = "", $pTime = "", $pIp = "", $pOs = "", $pBrowser = "", $pCoordinador = ""){
		$this -> idLogCoordinador = $pIdLogCoordinador;
		$this -> action = $pAction;
		$this -> information = $pInformation;
		$this -> date = $pDate;
		$this -> time = $pTime;
		$this -> ip = $pIp;
		$this -> os = $pOs;
		$this -> browser = $pBrowser;
		$this -> coordinador = $pCoordinador;
	}

	function insert(){
		return "insert into LogCoordinador(action, information, date, time, ip, os, browser, coordinador_idCoordinador)
				values('" . $this -> action . "', '" . $this -> information . "', '" . $this -> date . "', '" . $this -> time . "', '" . $this -> ip . "', '" . $this -> os . "', '" . $this -> browser . "', '" . $this -> coordinador . "')";
	}

	function update(){
		return "update LogCoordinador set 
				action = '" . $this -> action . "',
				information = '" . $this -> information . "',
				date = '" . $this -> date . "',
				time = '" . $this -> time . "',
				ip = '" . $this -> ip . "',
				os = '" . $this -> os . "',
				browser = '" . $this -> browser . "',
				coordinador_idCoordinador = '" . $this -> coordinador . "'	
				where idLogCoordinador = '" . $this -> idLogCoordinador . "'";
	}

	function select() {
		return "select idLogCoordinador, action, information, date, time, ip, os, browser, coordinador_idCoordinador
				from LogCoordinador
				where idLogCoordinador = '" . $this -> idLogCoordinador . "'";
	}

	function selectAll() {
		return "select idLogCoordinador, action, information, date, time, ip, os, browser, coordinador_idCoordinador
				from LogCoordinador";
	}

	function selectAllByCoordinador() {
		return "select idLogCoordinador, action, information, date, time, ip, os, browser, coordinador_idCoordinador
				from LogCoordinador
				where coordinador_idCoordinador = '" . $this -> coordinador . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idLogCoordinador, action, information, date, time, ip, os, browser, coordinador_idCoordinador
				from LogCoordinador
				order by " . $orden . " " . $dir;
	}

	function selectAllByCoordinadorOrder($orden, $dir) {
		return "select idLogCoordinador, action, information, date, time, ip, os, browser, coordinador_idCoordinador
				from LogCoordinador
				where coordinador_idCoordinador = '" . $this -> coordinador . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idLogCoordinador, action, information, date, time, ip, os, browser, coordinador_idCoordinador
				from LogCoordinador
				where action like '%" . $search . "%' or date like '%" . $search . "%' or time like '%" . $search . "%' or ip like '%" . $search . "%' or os like '%" . $search . "%' or browser like '%" . $search . "%'
				order by date desc, time desc";
	}
}
?>
