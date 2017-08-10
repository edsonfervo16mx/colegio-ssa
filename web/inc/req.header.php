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
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">perm_contact_calendar</i>Tutores
						</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="tutor-lista.php"><i class="material-icons">view_list</i>Lista</a></li>
								<li><a href="tutor-registro.php"><i class="material-icons">add</i>Agregar</a></li>
								<li><a href="relacion-lista.php"><i class="material-icons">person_pin</i>Asignación</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="ciclo-lista.php" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">view_agenda</i>Ciclos
						</a>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">assignment</i>Listas
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="constructor-lista.php">
										<i class="material-icons">list</i>Listas de Grupo
									</a>
								</li>
								<li>
									<a href="constructor-registro.php">
										<i class="material-icons">library_add</i>Gestión Lista
									</a>
								</li>
								<li>
									<a href="grupos.php" class="collapsible-header waves-effect waves-teal">
										<i class="material-icons">view_quilt</i>Gestor de Grupos
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">input</i>Inscripción
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="inscripcioncuenta-panel.php">
										<i class="material-icons">open_in_new</i>Caja
									</a>
								</li>
								<li>
									<a href="inscripcionprecio-lista.php">
										<i class="material-icons">loyalty</i>Catalogo
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">view_carousel</i>Servicios
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="serviciocuenta-panel.php">
										<i class="material-icons">open_in_new</i>Caja
									</a>
								</li>
								<li>
									<a href="servicioprecio-lista.php">
										<i class="material-icons">loyalty</i>Catalogo
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">recent_actors</i>Colegiaturas
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="colegiaturacuenta-panel.php">
										<i class="material-icons">open_in_new</i>Caja
									</a>
								</li>
								<li>
									<a href="colegiaturaprecio-lista.php">
										<i class="material-icons">loyalty</i>Catalogo
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">shopping_cart</i>Tienda
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="ventacuenta-registro.php">
										<i class="material-icons">open_in_new</i>Caja
									</a>
								</li>
								<li>
									<a href="ventacuenta-lista.php">
										<i class="material-icons">payment</i>Cuenta Ventas
									</a>
								</li>
								<li>
									<a href="producto-lista.php">
										<i class="material-icons">view_quilt</i>Productos
									</a>
								</li>
								<li>
									<a href="categoriaproductos-lista.php">
										<i class="material-icons">view_list</i>Categoria Productos
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">call_received</i>Gastos
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="gastos-registrar.php">
										<i class="material-icons">add</i>Agregar Gasto
									</a>
								</li>
								<li>
									<a href="gastos-lista.php">
										<i class="material-icons">view_list</i>Lista de Gastos
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a href="reportes-panel.php" class="collapsible-header waves-effect waves-teal">
							<i class="material-icons">assignment</i>Reporte Corte
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>