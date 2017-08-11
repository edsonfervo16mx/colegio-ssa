<?php 
	
	class AbonoVenta{

		public function test(){
			echo 'Ok';
		}

		public function listarDetalles($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_ventas.cve_abono_venta,
					abono_ventas.fecha_abono_venta,
					abono_ventas.deposito_abono_venta,
					abono_ventas.detalle_abono_venta,
					abono_ventas.cve_cuenta_venta,
					abono_ventas.cve_estado_pago,
					abono_ventas.cve_metodo_pago,
					abono_ventas.nombre_usuario,
					usuario.descripcion_usuario
					from abono_ventas
					inner join cuenta_ventas on (abono_ventas.cve_cuenta_venta = cuenta_ventas.cve_cuenta_venta)
					inner join usuario on (abono_ventas.nombre_usuario = usuario.nombre_usuario)
					where abono_ventas.status_abono_venta = "active" and abono_ventas.cve_cuenta_venta = "'.$id.'"';
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

		public function generarRecibo($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_ventas.cve_abono_venta,
					abono_ventas.fecha_abono_venta,
					abono_ventas.deposito_abono_venta,
					abono_ventas.detalle_abono_venta,
					abono_ventas.cve_cuenta_venta,
					abono_ventas.cve_estado_pago,
					abono_ventas.cve_metodo_pago,
					cuenta_ventas.cve_cuenta_venta,
					cuenta_ventas.folio_cuenta_venta,
					cuenta_ventas.nombre_cuenta_venta,
					cuenta_ventas.monto_cuenta_venta,
					abono_ventas.nombre_usuario,
					usuario.descripcion_usuario
					from abono_ventas
					inner join cuenta_ventas on (abono_ventas.cve_cuenta_venta = cuenta_ventas.cve_cuenta_venta)
					inner join usuario on (abono_ventas.nombre_usuario = usuario.nombre_usuario)
					where abono_ventas.status_abono_venta = "active" and abono_ventas.cve_abono_venta = "'.$id.'"';
			//echo $sql;
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

		public function registrar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO abono_ventas(fecha_abono_venta,deposito_abono_venta,detalle_abono_venta,cve_cuenta_venta,cve_estado_pago,cve_metodo_pago,nombre_usuario) VALUES (upper("'.$atr['fecha_abono_venta'].'"),upper("'.$atr['deposito_abono_venta'].'"),upper("'.$atr['detalle_abono_venta'].'"),upper("'.$atr['cve_cuenta_venta'].'"),upper("'.$atr['cve_estado_pago'].'"),upper("'.$atr['cve_metodo_pago'].'"),upper("'.$atr['nombre_usuario'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE abono_ventas SET fecha_abono_venta = upper("'.$atr['fecha_abono_venta'].'"),deposito_abono_venta = upper("'.$atr['deposito_abono_venta'].'"),detalle_abono_venta = upper("'.$atr['detalle_abono_venta'].'"),cve_estado_pago = upper("'.$atr['cve_estado_pago'].'"),cve_metodo_pago = upper("'.$atr['cve_metodo_pago'].'"),nombre_usuario = upper("'.$atr['nombre_usuario'].'") where cve_abono_venta = "'.$id.'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		//-------------------------------------------------
		public function reporte($key, $campus ,$inicio, $final){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_ventas.cve_abono_venta,
					abono_ventas.fecha_abono_venta,
					abono_ventas.deposito_abono_venta,
					abono_ventas.detalle_abono_venta,
					abono_ventas.cve_cuenta_venta,
					abono_ventas.cve_estado_pago,
					abono_ventas.cve_metodo_pago,
					abono_ventas.nombre_usuario,
					usuario.descripcion_usuario,
					cuenta_ventas.cve_cuenta_venta,
					cuenta_ventas.folio_cuenta_venta,
					cuenta_ventas.nombre_cuenta_venta,
					cuenta_ventas.fecha_cuenta_venta,
					cuenta_ventas.monto_cuenta_venta,
					cuenta_ventas.descripcion_cuenta_venta,
					cuenta_ventas.cve_estado_pago,
					cuenta_ventas.caja_campus
					from abono_ventas
					inner join cuenta_ventas on (abono_ventas.cve_cuenta_venta = cuenta_ventas.cve_cuenta_venta)
					inner join usuario on (abono_ventas.nombre_usuario = usuario.nombre_usuario)
					where abono_ventas.status_abono_venta = "active" and cuenta_ventas.caja_campus = "'.$campus.'" and abono_ventas.fecha_abono_venta between "'.$inicio.'" and "'.$final.'"';
					#echo $sql;
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