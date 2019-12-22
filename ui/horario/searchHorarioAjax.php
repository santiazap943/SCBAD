<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Dia</th>
			<th nowrap>Hora</th>
			<th>Inscripcion</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$horario = new Horario();
		$horarios = $horario -> search($_GET['search']);
		$counter = 1;
		foreach ($horarios as $currentHorario) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentHorario -> getDia()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentHorario -> getHora()) . "</td>";
			echo "<td>" . $currentHorario -> getInscripcion() -> getPeriodo() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/horario/updateHorario.php") . "&idHorario=" . $currentHorario -> getIdHorario() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Horario' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
