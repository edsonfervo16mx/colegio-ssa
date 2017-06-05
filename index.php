<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Jean Piaget - SSA</title>
	<?php 
		require_once 'inc.global/local.files.styles.php';
	?>
	<!---->
</head>
<body>
	<div class="container area">
		<!--<h3 class="grey-text lighten-2 center-align">Colegio Jean Piaget</h1>-->
		<div class="row">
			<div class="col s12 m6 offset-m3">
				<div class="card">
					<div class="card-image">
						<img src="assets/images/img-card-primary.jpg">
						<span class="card-title">Colegio Jean Piaget</span>
					</div>
					<div class="card-content">
						<form action="" method="POST">
							<div class="row">
								<div class="input-field col s10 offset-s1">
									<input type="text" name="usuario" id="usuario" placeholder="Usuario">
									<label for="usuario">Nombre de Usuario</label>
								</div>
								<div class="input-field col s10 offset-s1">
									<input type="password" name="pass" id="pass" placeholder="Contraseña">
									<label for="pass">Contraseña de Usuario</label>
								</div>
								<div class="input-field col s10 offset-s1 right-align">
									<!--<input type="submit" value="Entrar" class="waves-effect waves-light btn">-->
									<a href="web/index.php" class="waves-effect waves-light btn">Entrar</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		require_once 'inc.global/local.files.script.php';
	?>
</body>
</html>