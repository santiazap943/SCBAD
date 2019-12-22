<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nombre</th>
			<th>Area</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$asignatura = new Asignatura();
		$asignaturas = $asignatura -> search($_GET['search']);
		$counter = 1;
		foreach ($asignaturas as $currentAsignatura) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAsignatura -> getNombre()) . "</td>";
			echo "<td>" . $currentAsignatura -> getArea() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asignatura/updateAsignatura.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Asignatura' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/grupo/selectAllGrupoByAsignatura.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Grupo' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/grupo/insertGrupo.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Grupo' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
