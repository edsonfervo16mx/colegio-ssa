<?php 
	$tutor = new Tutor;
	$datosTutor = $tutor->ver($key, $_GET['id']);
	foreach ($datosTutor as $colTutor) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Datos Tutor</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<label>NOMBRE COMPLETO: </label><?php echo $colTutor->nombre_completo; ?><br>
				<label>SEXO: </label><?php echo $colTutor->cve_sexo; ?><br>
				<label>CORREO: </label><?php echo $colTutor->correo_tutor; ?><br>
				<label>TELEFONO: </label><?php echo $colTutor->telefono_tutor; ?><br>
				<label>OBSERVACIONES: </label><?php echo $colTutor->observaciones_tutor; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12">
		<a href="tutor-lista.php" class="waves-effect waves-light btn"><i class="material-icons left">replay</i>Regresar</a>
		<a href="tutor-modificar.php?id=<?php echo $colTutor->cve_tutor; ?>" class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Editar</a>
	</div>
</div>