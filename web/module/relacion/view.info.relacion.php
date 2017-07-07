<?php 
	$relacion = new Relacion;
	$datosRelacion = $relacion->ver($key,$_GET['id']);
	foreach ($datosRelacion as $colRelacion) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Datos Asignación</h4>
	</div>
	<div class="col m6 s12">
		<div class="card-panel grey lighten-4">
			<h5 class="grey-text text-darken-1">Alumno</h5>
			<span class="black-text">
				<label>CURP: </label><?php echo $colRelacion->curp_alumno; ?><br>
				<label>NOMBRE COMPLETO: </label><?php echo $colRelacion->nombre_completo_alumno; ?><br>
				<label>SEXO: </label><?php echo $colRelacion->sexo_alumno; ?><br>
				<label>CAMPUS: </label><?php echo $colRelacion->cve_campus; ?><br>
				<label>DIRECCIÓN: </label><?php echo $colRelacion->direccion_alumno; ?><br>
				<label>EMAIL: </label><?php echo $colRelacion->correo_alumno; ?><br>
				<label>TELEFONO: </label><?php echo $colRelacion->telefono_alumno; ?><br>
				<label>OBSERVACIONES: </label><?php echo $colRelacion->observaciones_alumno; ?><br>
			</span>
		</div>
	</div>
	<div class="col m6 s12">
		<div class="card-panel grey lighten-4">
			<h5 class="grey-text text-darken-1">Tutor</h5>
			<span class="black-text">
				<label>CLAVE: </label><?php echo $colRelacion->cve_tutor; ?><br>
				<label>NOMBRE COMPLETO: </label><?php echo $colRelacion->nombre_completo_tutor; ?><br>
				<label>SEXO: </label><?php echo $colRelacion->sexo_tutor; ?><br>
				<label>EMAIL: </label><?php echo $colRelacion->correo_tutor; ?><br>
				<label>TELÉFONO: </label><?php echo $colRelacion->telefono_tutor; ?><br>
				<label>OBSERVACIONES: </label><?php echo $colRelacion->observaciones_tutor; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12">
		<a href="relacion-lista.php" class="waves-effect waves-light btn"><i class="material-icons left">replay</i>Regresar</a>
		<a href="procs/relacion.drop.php?id=<?php echo $colRelacion->cve_relacion; ?>" class="waves-effect waves-light btn"><i class="material-icons left">delete</i>Eliminar Asignación</a>
	</div>
</div>