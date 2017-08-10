<?php 

?>
<div class="row">
	<div class="col m12 s12">
		<h4 class="grey-text text-darken-1">Panel de reporte de corte</h4>
	</div>
	<div class="col m12 s12">
		<div class="card-panel grey lighten-5">
			<form action="" method="GET">
				<div class="row">
					<div class="col m6 s12">
						<div class="input-field col s12">
								<select multiple name="concepto">
								<option value="" disabled selected>Choose your option</option>
								<option value="abono_inscripcion">INSCRIPCIONES</option>
								<option value="abono_colegiatura">COLEGIATURAS</option>
								<option value="abono_servicios">SERVICIOS</option>
								<option value="abono_ventas">VENTAS</option>
							</select>
							<label>Materialize Multiple Select</label>
						</div>
					</div>
					<div class="col m12 s12">
						<div class="col m12 s12 right-align">
							<input type="submit" value="Registrar Gasto" class="waves-effect waves-light btn">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>