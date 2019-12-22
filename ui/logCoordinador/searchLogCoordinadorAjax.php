<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Action</th>
			<th nowrap>Date</th>
			<th nowrap>Time</th>
			<th nowrap>Ip</th>
			<th nowrap>Os</th>
			<th nowrap>Browser</th>
			<th>Coordinador</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$logCoordinador = new LogCoordinador();
		$logCoordinadors = $logCoordinador -> search($_GET['search']);
		$counter = 1;
		foreach ($logCoordinadors as $currentLogCoordinador) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogCoordinador -> getAction()) . "</td>";
			echo "<td nowrap>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogCoordinador -> getDate()) . "</td>";
			echo "<td nowrap>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogCoordinador -> getTime()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogCoordinador -> getIp()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogCoordinador -> getOs()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogCoordinador -> getBrowser()) . "</td>";
			echo "<td>" . $currentLogCoordinador -> getCoordinador() -> getNombre() . " " . $currentLogCoordinador -> getCoordinador() -> getApellido() . "</td>";
			echo "<td class='text-right' nowrap>
				<a href='modalLogCoordinador.php?idLogCoordinador=" . $currentLogCoordinador -> getIdLogCoordinador() . "'  data-toggle='modal' data-target='#modalLogCoordinador' >
					<span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span>
				</a>
				</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalLogCoordinador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
