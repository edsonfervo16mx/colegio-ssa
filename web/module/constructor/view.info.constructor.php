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
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1"><?php echo $_GET['id']; ?></h4>
	</div>
</div>
<?php 
	}
?>