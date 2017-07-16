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
	}

?>