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
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$tipo = new Tipo();
		$tipos = $tipo -> search($_GET['search']);
		$counter = 1;
		foreach ($tipos as $currentTipo) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentTipo -> getNombre()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/tipo/updateTipo.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Tipo' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/excepcion/selectAllExcepcionByTipo.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Excepcion' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcion/insertExcepcion.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Excepcion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/excepcionPersonal/selectAllExcepcionPersonalByTipo.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Excepcion Personal' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcionPersonal/insertExcepcionPersonal.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Excepcion Personal' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
