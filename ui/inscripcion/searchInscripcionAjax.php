<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Periodo</th>
			<th>Profesor</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$inscripcion = new Inscripcion();
		$inscripcions = $inscripcion -> search($_GET['search']);
		$counter = 1;
		foreach ($inscripcions as $currentInscripcion) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentInscripcion -> getPeriodo()) . "</td>";
			echo "<td>" . $currentInscripcion -> getProfesor() -> getNombre() . " " . $currentInscripcion -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/inscripcion/updateInscripcion.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Inscripcion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/horario/selectAllHorarioByInscripcion.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Horario' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/horario/insertHorario.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Horario' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/grupo/selectAllGrupoByInscripcion.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Grupo' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/grupo/insertGrupo.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Grupo' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
