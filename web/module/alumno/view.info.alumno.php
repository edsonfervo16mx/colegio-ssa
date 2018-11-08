<?php 
	$alumno = new Alumno;
	$datosAlumno = $alumno->ver($key,$_GET['curp']);
	foreach ($datosAlumno as $colAlumno) {
	}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Datos Alumno</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<label>CURP: </label><?php echo $colAlumno->curp_alumno; ?><br>
				<label>NOMBRE COMPLETO: </label><?php echo $colAlumno->nombre_completo; ?><br>
				<label>DIRECCIÓN: </label><?php echo $colAlumno->direccion_alumno; ?><br>
				<label>SEXO: </label><?php echo $colAlumno->cve_sexo; ?><br>
				<label>CAMPUS: </label><?php echo $colAlumno->nombre_campus; ?><br>
				<label>FECHA DE NACIMIENTO: </label><?php echo $colAlumno->nacimiento_alumno; ?><br>
				<label>EMAIL: </label><?php echo $colAlumno->correo_alumno; ?><br>
				<label>TELEFONO: </label><?php echo $colAlumno->telefono_alumno; ?><br>
				<label>OBSERVACIONES: </label><?php echo $colAlumno->observaciones_alumno; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12">
		<a href="alumno-lista.php" class="waves-effect waves-light btn"><i class="material-icons left">replay</i>Regresar</a>
		<a href="alumno-modificar.php?curp=<?php echo $colAlumno->curp_alumno; ?>" class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Editar</a>
	</div>
</div>