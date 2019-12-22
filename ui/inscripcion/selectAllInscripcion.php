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
			<h4 class="card-title">Get All Inscripcion</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Periodo 
						<?php if($order=="periodo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/inscripcion/selectAllInscripcion.php") ?>&order=periodo&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="periodo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/inscripcion/selectAllInscripcion.php") ?>&order=periodo&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th>Profesor</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$inscripcion = new Inscripcion();
					if($order != "" && $dir != "") {
						$inscripcions = $inscripcion -> selectAllOrder($order, $dir);
					} else {
						$inscripcions = $inscripcion -> selectAll();
					}
					$counter = 1;
					foreach ($inscripcions as $currentInscripcion) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentInscripcion -> getPeriodo() . "</td>";
						echo "<td>" . $currentInscripcion -> getProfesor() -> getNombre() . " " . $currentInscripcion -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/inscripcion/updateInscripcion.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Inscripcion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/horario/selectAllHorarioByInscripcion.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Horario' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/horario/insertHorario.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Horario' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/grupo/selectAllGrupoByInscripcion.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Grupo' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/grupo/insertGrupo.php") . "&idInscripcion=" . $currentInscripcion -> getIdInscripcion() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Grupo' ></span></a> ";
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
