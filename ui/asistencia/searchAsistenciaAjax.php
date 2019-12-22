<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Fecha</th>
			<th>Profesor</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$asistencia = new Asistencia();
		$asistencias = $asistencia -> search($_GET['search']);
		$counter = 1;
		foreach ($asistencias as $currentAsistencia) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAsistencia -> getFecha()) . "</td>";
			echo "<td>" . $currentAsistencia -> getProfesor() -> getNombre() . " " . $currentAsistencia -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asistencia/updateAsistencia.php") . "&idAsistencia=" . $currentAsistencia -> getIdAsistencia() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Asistencia' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
