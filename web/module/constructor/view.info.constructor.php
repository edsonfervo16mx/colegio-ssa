<?php 
	if (!@$_GET['id']) {
		echo '
		<div class="row">
			<div class="col m12">
				<h3 class="grey-text text-darken-1 center-align">No se ha seleccionado un grupo</h3>
			</div>
			<div class="col m12 s12 center-align">
				<a href="constructor-lista.php" class="waves-effect waves-light btn"><i class="material-icons left">view_list</i>Elegir Grupo</a>
			</div>
		</div>
		';
	}else{
		//Iniciar Objetos
		$constructor = new ConstructorGrupo;
		$datosConstructor = $constructor->listarGrupo($key, $_GET['id']);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1"><?php echo $_GET['id']; ?></h4>
	</div>
	<div class="col m4">
		<a href="constructor-lista.php" class="waves-effect waves-light btn">
			<i class="material-icons left">replay</i>
			Regresar
		</a>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>#</td>
					<td>Nombre del Alumno</td>
					<td>Detalle</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					foreach ($datosConstructor as $colConstructor) {
						echo '<tr>';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$colConstructor->nombre_completo.'</td>';
						echo '
							<td>

							</td>';
						echo '</tr>';
						$i++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php 
	}
?>