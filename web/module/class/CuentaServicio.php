<?php 

	class CuentaServicio{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT cuenta_servicios.cve_cuenta_servicios,
					cuenta_servicios.folio_cuenta_servicios,
					cuenta_servicios.fecha_cuenta_servicios,
					cuenta_servicios.monto_cuenta_servicios,
					cuenta_servicios.descripcion_cuenta_servicios,
					cuenta_servicios.cve_precio_servicios,
					precio_servicios.titulo_precio_servicios,
					precio_servicios.monto_precio_servicios,
					precio_servicios.detalle_precio_servicios,
					cuenta_servicios.cve_constructor_grupo,
					constructor_grupo.cve_grupo,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,
					cuenta_servicios.cat_estado_pago_cve_estado_pago
					from cuenta_servicios 
					inner join precio_servicios on (cuenta_servicios.cve_precio_servicios = precio_servicios.cve_precio_servicios)
					inner join constructor_grupo on (cuenta_servicios.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					where cuenta_servicios.status_cuenta_servicios = "active"';
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
			$sql = 'INSERT INTO cuenta_servicios(folio_cuenta_servicios,fecha_cuenta_servicios,monto_cuenta_servicios,cve_precio_servicios,cve_constructor_grupo,cat_estado_pago_cve_estado_pago) VALUES (upper("'.$atr['folio_cuenta_servicios'].'"),upper("'.$atr['fecha_cuenta_servicios'].'"),upper("'.$atr['monto_cuenta_servicios'].'"), upper("'.$atr['cve_precio_servicios'].'"),upper("'.$atr['cve_constructor_grupo'].'"),upper("'.$atr['cat_estado_pago_cve_estado_pago'].'"))';
			$id_insert = $dataBase->triggerReturn($key,$sql);
			return($id_insert);
			//print $sql;
		}

		public function ver($key,$id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT cuenta_servicios.cve_cuenta_servicios,
					cuenta_servicios.folio_cuenta_servicios,
					cuenta_servicios.fecha_cuenta_servicios,
					cuenta_servicios.monto_cuenta_servicios,
					cuenta_servicios.descripcion_cuenta_servicios,
					cuenta_servicios.cve_precio_servicios,
					precio_servicios.titulo_precio_servicios,
					precio_servicios.monto_precio_servicios,
					precio_servicios.detalle_precio_servicios,
					cuenta_servicios.cve_constructor_grupo,
					constructor_grupo.cve_grupo,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,
					cuenta_servicios.cat_estado_pago_cve_estado_pago
					from cuenta_servicios 
					inner join precio_servicios on (cuenta_servicios.cve_precio_servicios = precio_servicios.cve_precio_servicios)
					inner join constructor_grupo on (cuenta_servicios.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					where cuenta_servicios.status_cuenta_servicios = "active" and cuenta_servicios.cve_cuenta_servicios = "'.$id.'"';
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

		public function liquidar($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_servicios SET cat_estado_pago_cve_estado_pago = "PAGADO" where cve_cuenta_servicios = "'.$id.'"';
			$dataBase->triggerSimple($key,$sql);
			#print $sql;
		}

		//falta el modificar
	}

?>