<?php 
	class AbonoInscripcion{
		public function test(){
			echo 'Ok';
		}

		public function registrarNew($key, $id ,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO abono_inscripcion(fecha_abono_inscripcion,deposito_abono_inscripcion,detalle_abono_inscripcion,cve_cuenta_inscripcion,cve_estado_pago,cve_metodo_pago,nombre_usuario) VALUES (upper("'.$atr['fecha_abono_inscripcion'].'"),upper("'.$atr['deposito_abono_inscripcion'].'"),upper("'.$atr['detalle_abono_inscripcion'].'"),upper("'.$id.'"),upper("PAGADO"),upper("'.$atr['cve_metodo_pago'].'"),upper("'.$atr['nombre_usuario'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function listarDetalle($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_inscripcion.cve_abono_inscripcion,abono_inscripcion.fecha_abono_inscripcion,abono_inscripcion.deposito_abono_inscripcion,abono_inscripcion.detalle_abono_inscripcion,abono_inscripcion.cve_cuenta_inscripcion,abono_inscripcion.cve_estado_pago,abono_inscripcion.cve_metodo_pago,abono_inscripcion.nombre_usuario from abono_inscripcion where abono_inscripcion.status_abono_inscripcion = "active" and abono_inscripcion.cve_cuenta_inscripcion = "'.$id.'"';
			$res = $dataBase->triggerSimple($key,$sql);
			$i=0;
			$line = null;
			while ($row = mysqli_fetch_assoc($res)) {
				$line[$i] = array_map('utf8_encode', $row) ;
				$i++;
			}
			$data = json_encode($line);
			$data = json_decode($data);
			return ($data);
		}
	}

?>