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
			<th nowrap>Clave</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$coordinador = new Coordinador();
		$coordinadors = $coordinador -> search($_GET['search']);
		$counter = 1;
		foreach ($coordinadors as $currentCoordinador) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getClave()) . "</td>";
						echo "<td class='text-right' nowrap>";
						echo "<a href='modalCoordinador.php?idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'  data-toggle='modal' data-target='#modalCoordinador' ><span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/coordinador/updateCoordinador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Coordinador' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalCoordinador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>
