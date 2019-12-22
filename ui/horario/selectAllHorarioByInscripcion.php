<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$inscripcion = new Inscripcion($_GET['idInscripcion']); 
$inscripcion -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Horario of Inscripcion: <em><?php echo $inscripcion -> getPeriodo() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Dia 
						<?php if($order=="dia" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByInscripcion.php") ?>&idInscripcion=<?php echo $_GET['idInscripcion'] ?>&order=dia&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="dia" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByInscripcion.php") ?>&idInscripcion=<?php echo $_GET['idInscripcion'] ?>&order=dia&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Hora 
						<?php if($order=="hora" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByInscripcion.php") ?>&idInscripcion=<?php echo $_GET['idInscripcion'] ?>&order=hora&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="hora" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByInscripcion.php") ?>&idInscripcion=<?php echo $_GET['idInscripcion'] ?>&order=hora&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Inscripcion</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$horario = new Horario("", "", "", $_GET['idInscripcion']);
					if($order!="" && $dir!="") {
						$horarios = $horario -> selectAllByInscripcionOrder($order, $dir);
					} else {
						$horarios = $horario -> selectAllByInscripcion();
					}
					$counter = 1;
					foreach ($horarios as $currentHorario) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentHorario -> getDia() . "</td>";
						echo "<td>" . $currentHorario -> getHora() . "</td>";
						echo "<td>" . $currentHorario -> getInscripcion() -> getPeriodo() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/horario/updateHorario.php") . "&idHorario=" . $currentHorario -> getIdHorario() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Horario' ></span></a> ";
						}
						echo "</td>";
						echo "</tr>";
						$counter++;
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
