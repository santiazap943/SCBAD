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
			<th nowrap>Apellido</th>
			<th nowrap>Correo</th>
			<th nowrap>Huella</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$profesor = new Profesor();
		$profesors = $profesor -> search($_GET['search']);
		$counter = 1;
		foreach ($profesors as $currentProfesor) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getHuella()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/profesor/updateProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Profesor' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/inscripcion/selectAllInscripcionByProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Inscripcion' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/inscripcion/insertInscripcion.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Inscripcion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/excepcionPersonal/selectAllExcepcionPersonalByProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Excepcion Personal' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcionPersonal/insertExcepcionPersonal.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Excepcion Personal' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
