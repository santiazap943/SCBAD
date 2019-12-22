<?php
require("business/Administrator.php");
require("business/LogAdministrator.php");
require("business/Profesor.php");
require("business/Area.php");
require("business/Tipo.php");
require("business/Inscripcion.php");
require("business/Horario.php");
require("business/Asignatura.php");
require("business/Grupo.php");
require("business/Asistencia.php");
require("business/ExcepcionPersonal.php");
require("business/Excepcion.php");
require("business/LogAdministrador.php");
require("business/Administrador.php");
require("business/LogCoordinador.php");
require("business/Coordinador.php");
require_once("persistence/Connection.php");
$idLogAdministrator = $_GET ['idLogAdministrator'];
$logAdministrator = new LogAdministrator($idLogAdministrator);
$logAdministrator -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Log Administrator</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Action</th>
			<td><?php echo str_replace(";; ", "<br>", $logAdministrator -> getAction()) ?></td>
		</tr>
		<tr>
			<th>Information</th>
			<td><?php echo str_replace(";; ", "<br>", $logAdministrator -> getInformation()) ?></td>
		</tr>
		<tr>
			<th>Date</th>
			<td><?php echo str_replace(";; ", "<br>", $logAdministrator -> getDate()) ?></td>
		</tr>
		<tr>
			<th>Time</th>
			<td><?php echo str_replace(";; ", "<br>", $logAdministrator -> getTime()) ?></td>
		</tr>
		<tr>
			<th>Ip</th>
			<td><?php echo str_replace(";; ", "<br>", $logAdministrator -> getIp()) ?></td>
		</tr>
		<tr>
			<th>Os</th>
			<td><?php echo str_replace(";; ", "<br>", $logAdministrator -> getOs()) ?></td>
		</tr>
		<tr>
			<th>Browser</th>
			<td><?php echo str_replace(";; ", "<br>", $logAdministrator -> getBrowser()) ?></td>
		</tr>
	</table>
</div>
