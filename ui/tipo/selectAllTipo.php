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
			<h4 class="card-title">Get All Tipo</h4>
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
							<a href='index.php?pid=<?php echo base64_encode("ui/tipo/selectAllTipo.php") ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/tipo/selectAllTipo.php") ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$tipo = new Tipo();
					if($order != "" && $dir != "") {
						$tipos = $tipo -> selectAllOrder($order, $dir);
					} else {
						$tipos = $tipo -> selectAll();
					}
					$counter = 1;
					foreach ($tipos as $currentTipo) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentTipo -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/tipo/updateTipo.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Tipo' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/excepcion/selectAllExcepcionByTipo.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Excepcion' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcion/insertExcepcion.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Excepcion' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/excepcionPersonal/selectAllExcepcionPersonalByTipo.php") . "&idTipo=" . $currentTipo -> getIdTipo() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Excepcion Personal' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
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
		</div>
	</div>
</div>
