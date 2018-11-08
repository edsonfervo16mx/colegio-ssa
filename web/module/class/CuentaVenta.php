<?php 
	class CuentaVenta{

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT cuenta_ventas.cve_cuenta_venta,
					cuenta_ventas.folio_cuenta_venta,
					cuenta_ventas.nombre_cuenta_venta,
					cuenta_ventas.fecha_cuenta_venta,
					cuenta_ventas.monto_cuenta_venta,
					cuenta_ventas.descripcion_cuenta_venta,
					cuenta_ventas.cve_estado_pago,
					cuenta_ventas.caja_campus,
					campus.nombre_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.direccion_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from cuenta_ventas
					inner join campus on (cuenta_ventas.caja_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where cuenta_ventas.status_cuenta_venta = "active" order by (cuenta_ventas.fecha_cuenta_venta)';
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

		public function ver($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT cuenta_ventas.cve_cuenta_venta,
					cuenta_ventas.folio_cuenta_venta,
					cuenta_ventas.nombre_cuenta_venta,
					cuenta_ventas.fecha_cuenta_venta,
					cuenta_ventas.monto_cuenta_venta,
					cuenta_ventas.descripcion_cuenta_venta,
					cuenta_ventas.cve_estado_pago,
					cuenta_ventas.caja_campus,
					campus.nombre_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.direccion_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from cuenta_ventas
					inner join campus on (cuenta_ventas.caja_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where cuenta_ventas.status_cuenta_venta = "active" and cuenta_ventas.cve_cuenta_venta = "'.$id.'"';
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
			$sql = 'INSERT INTO cuenta_ventas(folio_cuenta_venta,nombre_cuenta_venta,fecha_cuenta_venta,monto_cuenta_venta,descripcion_cuenta_venta,cve_estado_pago,caja_campus) VALUES (upper("'.$atr['folio_cuenta_venta'].'"),upper("'.$atr['nombre_cuenta_venta'].'"),upper("'.$atr['fecha_cuenta_venta'].'"),upper("'.$atr['monto_cuenta_venta'].'"),upper("'.$atr['descripcion_cuenta_venta'].'"),upper("'.$atr['cve_estado_pago'].'"),upper("'.$atr['caja_campus'].'"))';
			$id_insert = $dataBase->triggerReturn($key,$sql);
			return($id_insert);
			//print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_ventas SET folio_cuenta_venta = upper("'.$atr['folio_cuenta_venta'].'"),nombre_cuenta_venta = upper("'.$atr['nombre_cuenta_venta'].'"),fecha_cuenta_venta = upper("'.$atr['fecha_cuenta_venta'].'"),monto_cuenta_venta = upper("'.$atr['monto_cuenta_venta'].'"),descripcion_cuenta_venta = upper("'.$atr['descripcion_cuenta_venta'].'"),cve_estado_pago = upper("'.$atr['cve_estado_pago'].'") where cve_cuenta_venta = "'.$atr['id'].'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		public function liquidar($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_ventas SET cve_estado_pago = upper("PAGADO") where cve_cuenta_venta = "'.$id.'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

	}
?>