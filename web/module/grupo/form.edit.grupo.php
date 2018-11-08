<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);
	$grupo = new Grupo;
	$datosGrupo = $grupo->ver($key,$_GET['id']);
	foreach ($datosGrupo as $colGrupo) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Grupo</h4>
	</div>
	<form action="procs/grupo.edit.php" method="POST">
		<div class="col m6 s12 offset-m3">
			<div class="row">
				<div class="input-field col m12 s12">
					<input type="text" name="id" id="id" placeholder="" class="validate" value="<?php echo $colGrupo->cve_grupo; ?>" hidden >
					<input type="text" name="nombre_grupo" id="nombre_grupo" placeholder="Ingrese el Nombre del grupo" class="validate" value="<?php echo $colGrupo->nombre_grupo; ?>" autofocus required>
					<label for="nombre_grupo">GRUPO</label>
				</div>
				<div class="col m12 s12">
					<select name="cve_ciclo" id="cve_ciclo">
						<option value="" disabled selected>Elige un ciclo</option>
						<?php 
							foreach ($datosCiclo as $colCiclo) {
								if ($colCiclo->cve_ciclo == $colGrupo->cve_ciclo) {
									echo '<option value="'.$colCiclo->cve_ciclo.'" selected>'.$colCiclo->nombre_ciclo.'</option>';
								}else{
									echo '<option value="'.$colCiclo->cve_ciclo.'">'.$colCiclo->nombre_ciclo.'</option>';
								}
							}
						?>
					</select>
				</div>
				<div class="col m12 s12 right-align">
					<input type="submit" value="Modificar" class="waves-effect waves-light btn">
				</div>
			</div>
		</div>
	</form>
</div>