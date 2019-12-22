<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Descripcion</th>
			<th>Profesor</th>
			<th>Tipo</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$excepcionPersonal = new ExcepcionPersonal();
		$excepcionPersonals = $excepcionPersonal -> search($_GET['search']);
		$counter = 1;
		foreach ($excepcionPersonals as $currentExcepcionPersonal) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentExcepcionPersonal -> getDescripcion()) . "</td>";
			echo "<td>" . $currentExcepcionPersonal -> getProfesor() -> getNombre() . " " . $currentExcepcionPersonal -> getProfesor() -> getApellido() . "</td>";
			echo "<td>" . $currentExcepcionPersonal -> getTipo() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcionPersonal/updateExcepcionPersonal.php") . "&idExcepcionPersonal=" . $currentExcepcionPersonal -> getIdExcepcionPersonal() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Excepcion Personal' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
