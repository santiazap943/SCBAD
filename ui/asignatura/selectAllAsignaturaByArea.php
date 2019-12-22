<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$area = new Area($_GET['idArea']); 
$area -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Asignatura of Area: <em><?php echo $area -> getNombre() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nombre 
						<?php if($order=="nombre" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/asignatura/selectAllAsignaturaByArea.php") ?>&idArea=<?php echo $_GET['idArea'] ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/asignatura/selectAllAsignaturaByArea.php") ?>&idArea=<?php echo $_GET['idArea'] ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Area</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$asignatura = new Asignatura("", "", $_GET['idArea']);
					if($order!="" && $dir!="") {
						$asignaturas = $asignatura -> selectAllByAreaOrder($order, $dir);
					} else {
						$asignaturas = $asignatura -> selectAllByArea();
					}
					$counter = 1;
					foreach ($asignaturas as $currentAsignatura) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentAsignatura -> getNombre() . "</td>";
						echo "<td>" . $currentAsignatura -> getArea() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asignatura/updateAsignatura.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Asignatura' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/grupo/selectAllGrupoByAsignatura.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Grupo' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/grupo/insertGrupo.php") . "&idAsignatura=" . $currentAsignatura -> getIdAsignatura() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Grupo' ></span></a> ";
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
