<?php 
	class AbonoServicio{
		public function test(){
			echo 'Ok';
		}

		public function registrar($key, $id ,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO abono_servicios(fecha_abono_servicios,deposito_abono_servicios,detalle_abono_servicios,cve_cuenta_servicios,cve_estado_pago,cve_metodo_pago,nombre_usuario) VALUES (upper("'.$atr['fecha_abono_servicios'].'"),upper("'.$atr['deposito_abono_servicios'].'"),upper("'.$atr['detalle_abono_servicios'].'"),upper("'.$id.'"),upper("PAGADO"),upper("'.$atr['cve_metodo_pago'].'"),upper("'.$atr['nombre_usuario'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		//verificar consulta
		public function listarDetalle($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_servicios.cve_abono_servicios,abono_servicios.fecha_abono_servicios,abono_servicios.deposito_abono_servicios,abono_servicios.detalle_abono_servicios,abono_servicios.cve_cuenta_servicios,abono_servicios.cve_estado_pago,abono_servicios.cve_metodo_pago,abono_servicios.nombre_usuario from abono_servicios where abono_servicios.status_abono_servicios = "active" and abono_servicios.cve_cuenta_servicios = "'.$id.'"';
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

		//teste a esta consulta
		public function generarRecibo($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_servicios.cve_abono_servicios,
					abono_servicios.fecha_abono_servicios,
					abono_servicios.deposito_abono_servicios,
					abono_servicios.detalle_abono_servicios,
					abono_servicios.cve_cuenta_servicios,
					abono_servicios.cve_estado_pago,
					abono_servicios.cve_metodo_pago,
					abono_servicios.nombre_usuario,
					usuario.descripcion_usuario,
					cuenta_servicios.folio_cuenta_servicios,
					cuenta_servicios.fecha_cuenta_servicios,
					cuenta_servicios.monto_cuenta_servicios,
					cuenta_servicios.cve_precio_servicios,
					cuenta_servicios.cve_constructor_grupo,
					cuenta_servicios.cat_estado_pago_cve_estado_pago,
					precio_servicios.titulo_precio_servicios,
					precio_servicios.monto_precio_servicios,
					precio_servicios.detalle_precio_servicios,
					constructor_grupo.cve_grupo,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,
					grupo.nombre_grupo,
					grupo.cve_ciclo,
					ciclo.nombre_ciclo,
					ciclo.cve_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.direccion_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					campus.cve_colegio,
					colegio.nombre_colegio
					from abono_servicios 
					inner join usuario on (abono_servicios.nombre_usuario = usuario.nombre_usuario)
					inner join cuenta_servicios on (abono_servicios.cve_cuenta_servicios = cuenta_servicios.cve_cuenta_servicios)
					inner join precio_servicios on (cuenta_servicios.cve_precio_servicios = precio_servicios.cve_precio_servicios)
					inner join constructor_grupo on (cuenta_servicios.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo)
					inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where abono_servicios.status_abono_servicios = "active" and abono_servicios.cve_abono_servicios = "'.$id.'" Limit 1';
			$res = $dataBase->triggerSimple($key,$sql);
			$i=0;
			$line = null;
			while ($row = mysqli_fetch_assoc($res)) {
				$line[$i] = array_map('utf8_encode', $row) ;
				$i++;
			}
			$data = json_encode($line);
			$data = json_decode($data);
			#echo $sql;
			return ($data);
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE abono_servicios SET fecha_abono_servicios = upper("'.$atr['fecha_abono_servicios'].'"),deposito_abono_servicios = upper("'.$atr['deposito_abono_servicios'].'"),detalle_abono_servicios = upper("'.$atr['detalle_abono_servicios'].'"),cve_metodo_pago = upper("'.$atr['cve_metodo_pago'].'"),nombre_usuario = upper("'.$atr['nombre_usuario'].'") where cve_abono_servicios = "'.$atr['cve_abono_servicios'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		//--------------------------------------------
		public function reporte($key, $campus ,$inicio, $final){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_servicios.cve_abono_servicios,
					abono_servicios.fecha_abono_servicios,
					abono_servicios.deposito_abono_servicios,
					abono_servicios.detalle_abono_servicios,
					abono_servicios.cve_cuenta_servicios,
					abono_servicios.cve_estado_pago,
					abono_servicios.cve_metodo_pago,
					abono_servicios.nombre_usuario,
					cuenta_servicios.cve_cuenta_servicios,
					cuenta_servicios.folio_cuenta_servicios,
					cuenta_servicios.fecha_cuenta_servicios,
					cuenta_servicios.monto_cuenta_servicios,
					cuenta_servicios.descripcion_cuenta_servicios,
					cuenta_servicios.cve_precio_servicios,
					cuenta_servicios.cve_constructor_grupo,
					cuenta_servicios.cat_estado_pago_cve_estado_pago,
					precio_servicios.titulo_precio_servicios,
					precio_servicios.monto_precio_servicios,
					precio_servicios.detalle_precio_servicios,
					precio_servicios.cve_ciclo,
					ciclo.nombre_ciclo,
					ciclo.cve_campus,
					campus.nombre_campus,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo
					from abono_servicios
					inner join cuenta_servicios on (abono_servicios.cve_cuenta_servicios = cuenta_servicios.cve_cuenta_servicios)
					inner join precio_servicios on (cuenta_servicios.cve_precio_servicios = precio_servicios.cve_precio_servicios)
					inner join ciclo on (precio_servicios.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join constructor_grupo on (cuenta_servicios.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					where abono_servicios.status_abono_servicios = "active" and campus.cve_campus = "'.$campus.'" and abono_servicios.fecha_abono_servicios between "'.$inicio.'" and "'.$final.'"';
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