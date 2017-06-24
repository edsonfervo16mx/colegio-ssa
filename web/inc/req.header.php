	<header>
		<nav>
			<div class="nav-wrapper">
				<a href="#!" class="brand-logo">SSA</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="top-nav right hide-on-med-and-down">
					<li>
						<a href="#">
							<?php echo $_SESSION['usuario']; ?>
						</a>
					</li>
				</ul>
				<ul class="side-nav fixed collapsible collapsible-accordion" id="mobile-demo" style="transform: translateX(0%);">
					<li>
						<a href="home.php" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">dashboard</i>Inicio
						</a>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">perm_identity</i>Alumnos
						</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="alumno-lista.php"><i class="material-icons">view_list</i>Lista</a></li>
								<li><a href="alumno-registro.php"><i class="material-icons">add</i>Agregar</a></li>
								<li><a href="alumno-lista.php"><i class="material-icons">mode_edit</i>Modificar</a></li>
								<li><a href="alumno-baja.php"><i class="material-icons">delete</i>Baja</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="#" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">perm_contact_calendar</i>Tutores
						</a>
					</li>
					<li>
						<a href="ciclo-lista.php" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">view_agenda</i>Ciclos
						</a>
					</li>
					<li>
						<a href="grupos.php" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">view_quilt</i>Grupos
						</a>
					</li>
					<li>
						<a href="#" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">assignment</i>Listas de Grupo
						</a>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">input</i>Inscripción
						</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">Precios</a></li>
								<li><a href="#">Cuentas</a></li>
								<li><a href="#">Abonos</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">recent_actors</i>Colegiaturas
						</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">Precios</a></li>
								<li><a href="#">Cuentas</a></li>
								<li><a href="#">Abonos</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">view_carousel</i>Servicios
						</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">Precios</a></li>
								<li><a href="#">Cuentas</a></li>
								<li><a href="#">Abonos</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">shopping_cart</i>Tienda
						</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">Inventario</a></li>
								<li><a href="#">Ventas</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="#" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">call_received</i>Gastos
						</a>
					</li>
					<li>
						<a href="estado-general.php" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">assessment</i>Estados
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>