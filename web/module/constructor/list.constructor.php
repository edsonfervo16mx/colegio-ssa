<?php 
	$grupo = new Grupo;
	$datosGrupo = $grupo->listar($key);

	$constructor = new ConstructorGrupo;

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Grupos</h4>
	</div>
</div>
<div class="row">
	<div class="collection">
		<?php 
			foreach ($datosGrupo as $colGrupo) {
				$datosConstructor = $constructor->contarGrupo($key,$colGrupo->cve_grupo);
				foreach ($datosConstructor as $colConstructor) {}
				echo '
					<a href="constructor-ver.php?id='.$colGrupo->cve_grupo.'" class="collection-item">'.$colGrupo->cve_grupo.' ('.$colGrupo->nombre_campus.')<span class="badge">'.$colConstructor->cantidad.'</span></a>
				';
				$colConstructor->cantidad = 0;
			}
		?>
	</div>
</div>