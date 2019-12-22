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
			<th>Tipo</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$excepcion = new Excepcion();
		$excepcions = $excepcion -> search($_GET['search']);
		$counter = 1;
		foreach ($excepcions as $currentExcepcion) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentExcepcion -> getDescripcion()) . "</td>";
			echo "<td>" . $currentExcepcion -> getTipo() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcion/updateExcepcion.php") . "&idExcepcion=" . $currentExcepcion -> getIdExcepcion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Excepcion' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
