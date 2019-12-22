<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Asistencia</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Fecha 
						<?php if($order=="fecha" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/asistencia/selectAllAsistencia.php") ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/asistencia/selectAllAsistencia.php") ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th>Profesor</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$asistencia = new Asistencia();
					if($order != "" && $dir != "") {
						$asistencias = $asistencia -> selectAllOrder($order, $dir);
					} else {
						$asistencias = $asistencia -> selectAll();
					}
					$counter = 1;
					foreach ($asistencias as $currentAsistencia) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentAsistencia -> getFecha() . "</td>";
						echo "<td>" . $currentAsistencia -> getProfesor() -> getNombre() . " " . $currentAsistencia -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
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
		</div>
	</div>
</div>
