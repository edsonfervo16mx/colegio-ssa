<?php 
	class Utilidad{
		public function test(){
			echo 'Ok';
		}

		public function listaMes(){
			$arrayMes = array(
				'01' => 'Enero',
				'02' => 'Febrero',
				'03' => 'Marzo',
				'04' => 'Abril',
				'05' => 'Mayo',
				'06' => 'Junio',
				'07' => 'Julio',
				'08' => 'Agosto',
				'09' => 'Septiembre',
				'10' => 'Octubre',
				'11' => 'Noviembre',
				'12' => 'Diciembre',
				);
			return($arrayMes);
		}

		public function formNacimiento(){
			echo '<div class="row input-field col m12 s12"><label>Fecha de Nacimiento</label></div>';
			echo '<div class="input-field col m4 s12">';
				echo '<select name="dia" class="browser-default">';
					for ($i=1; $i <= 31; $i++) { 
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				echo '</select>';
			echo '</div>';
			echo '<div class="input-field col m4 s12">';
				echo '<select name="mes" class="browser-default">';
					$datosMes = $this->listaMes();
						foreach ($datosMes as $key => $value) {
							echo '<option value="'.$key.'">'.$value.'</option>';
						}
				echo '</select>';
			echo '</div>';
			echo '<div class="input-field col m4 s12">';
				echo '<select name="anio" class="browser-default">';
					for ($i=date('Y')-18; $i <= date('Y'); $i++) { 
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				echo '</select>';
			echo '</div>';
		}

		public function formNacimientoValidate($fecha){
			$anio = substr($fecha,0,4);
			$mes = substr($fecha,5,2);
			$dia = substr($fecha,8,2);
			echo '<div class="row input-field col m12 s12"><label>Fecha de Nacimiento</label></div>';
			echo '<div class="input-field col m4 s12">';
				echo '<select name="dia" class="browser-default">';
					for ($i=1; $i <= 31; $i++) { 
						if ($dia == $i) {
							echo '<option value="'.$i.'" selected>'.$i.'</option>';
						}else{
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
				echo '</select>';
			echo '</div>';
			echo '<div class="input-field col m4 s12">';
				echo '<select name="mes" class="browser-default">';
					$datosMes = $this->listaMes();
						foreach ($datosMes as $key => $value) {
							if ($mes == $key) {
								echo '<option value="'.$key.'" selected>'.$value.'</option>';
							}else{
								echo '<option value="'.$key.'">'.$value.'</option>';
							}
						}
				echo '</select>';
			echo '</div>';
			echo '<div class="input-field col m4 s12">';
				echo '<select name="anio" class="browser-default">';
					for ($i=date('Y')-18; $i <= date('Y'); $i++) { 
						if($anio == $i){
							echo '<option value="'.$i.'" selected>'.$i.'</option>';
						}else{
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
				echo '</select>';
			echo '</div>';
		}

		public function listarMesesA(){
			$listmeses = array(
							1 => 'AGOSTO', 
							2 => 'SEPTIEMBRE', 
							3 => 'OCTUBRE', 
							4 => 'NOVIEMBRE', 
							5 => 'DICIEMBRE', 
							6 => 'ENERO'
						);
			return($listmeses);
		}

		public function listarMesesB(){
			$listmeses = array(
							7 => 'FEBRERO', 
							8 => 'MARZO', 
							9 => 'ABRIL', 
							10 => 'MAYO', 
							11 => 'JUNIO', 
							12 => 'JULIO'
						);
			return($listmeses);
		}
	}
?>