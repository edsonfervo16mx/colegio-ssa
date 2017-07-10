<?php
	require_once 'config/string.connection.php';
	require_once 'module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<title>Jean Piaget - SSA</title>
			<?php
				require_once 'inc/req.local.files.styles.php';
			?>
			<!---->
		</head>
		<body>
			<!-- container -->
			<?php 
				require_once 'inc/req.header.php';
			?>
			<main>
			<div class="container area">
				<?php
					require_once 'module/inscripcioncuenta/form.add.inscripcioncuenta.php';
				?>
			</div>
			</main>
			<!-- /container -->
			<?php 
				require_once 'inc/req.local.files.script.php';
			?>
		</body>
		</html>
<?php 
	}else{
		session_destroy();
		print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
	}
?>