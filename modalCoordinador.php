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
$idCoordinador = $_GET ['idCoordinador'];
$coordinador = new Coordinador($idCoordinador);
$coordinador -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Coordinador</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<td><?php echo $coordinador -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $coordinador -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $coordinador -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Clave</th>
			<td><?php echo $coordinador -> getClave() ?></td>
		</tr>
		<tr>
			<th>State</th>
			<td><?php echo $coordinador -> getState() ?></td>
		</tr>
	</table>
</div>
