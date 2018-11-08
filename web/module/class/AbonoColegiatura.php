<?php 
	class AbonoColegiatura{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_colegiatura.cve_abono_colegiatura,
					abono_colegiatura.fecha_abono_colegiatura,
					abono_colegiatura.deposito_abono_colegiatura,
					abono_colegiatura.interes_abono_colegiatura,
					abono_colegiatura.detalle_abono_colegiatura,
					abono_colegiatura.cve_cuenta_colegiatura,
					abono_colegiatura.cve_estado_pago,
					abono_colegiatura.cve_metodo_pago,
					abono_colegiatura.nombre_usuario,
					cuenta_colegiatura.folio_cuenta_colegiatura,
					cuenta_colegiatura.fecha_cuenta_colegiatura,
					cuenta_colegiatura.monto_cuenta_colegiatura,
					cuenta_colegiatura.beca_cuenta_colegiatura,
					cuenta_colegiatura.descripcion_cuenta_colegiatura,
					cuenta_colegiatura.cve_precio_colegiatura,
					cuenta_colegiatura.cve_constructor_grupo,
					cuenta_colegiatura.cve_estado_pago,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					constructor_grupo.cve_grupo,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,
					usuario.descripcion_usuario,
					ciclo.nombre_ciclo,
					ciclo.cve_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from abono_colegiatura
					inner join cuenta_colegiatura on (abono_colegiatura.cve_cuenta_colegiatura = cuenta_colegiatura.cve_cuenta_colegiatura)
					inner join precio_colegiatura on (cuenta_colegiatura.cve_precio_colegiatura = precio_colegiatura.cve_precio_colegiatura)
					inner join ciclo on (precio_colegiatura.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					inner join constructor_grupo on (cuenta_colegiatura.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					inner join usuario on (abono_colegiatura.nombre_usuario = usuario.nombre_usuario)
					where abono_colegiatura.status_abono_colegiatura = "active"';
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

		public function listarDetalle($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_colegiatura.cve_abono_colegiatura,
					abono_colegiatura.fecha_abono_colegiatura,
					abono_colegiatura.deposito_abono_colegiatura,
					abono_colegiatura.interes_abono_colegiatura,
					abono_colegiatura.detalle_abono_colegiatura,
					abono_colegiatura.cve_cuenta_colegiatura,
					abono_colegiatura.cve_estado_pago as estado_pago_abono,
					abono_colegiatura.cve_metodo_pago,
					abono_colegiatura.nombre_usuario,
					cuenta_colegiatura.folio_cuenta_colegiatura,
					cuenta_colegiatura.fecha_cuenta_colegiatura,
					cuenta_colegiatura.monto_cuenta_colegiatura,
					cuenta_colegiatura.beca_cuenta_colegiatura,
					cuenta_colegiatura.descripcion_cuenta_colegiatura,
					cuenta_colegiatura.cve_precio_colegiatura,
					cuenta_colegiatura.cve_constructor_grupo,
					cuenta_colegiatura.cve_estado_pago as estado_pago_cuenta,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					constructor_grupo.cve_grupo,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,
					usuario.descripcion_usuario,
					ciclo.nombre_ciclo,
					ciclo.cve_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from abono_colegiatura
					inner join cuenta_colegiatura on (abono_colegiatura.cve_cuenta_colegiatura = cuenta_colegiatura.cve_cuenta_colegiatura)
					inner join precio_colegiatura on (cuenta_colegiatura.cve_precio_colegiatura = precio_colegiatura.cve_precio_colegiatura)
					inner join ciclo on (precio_colegiatura.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					inner join constructor_grupo on (cuenta_colegiatura.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					inner join usuario on (abono_colegiatura.nombre_usuario = usuario.nombre_usuario)
					where abono_colegiatura.status_abono_colegiatura = "active" and abono_colegiatura.cve_cuenta_colegiatura = "'.$id.'"';
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
			$sql = 'SELECT abono_colegiatura.cve_abono_colegiatura,
					abono_colegiatura.fecha_abono_colegiatura,
					abono_colegiatura.deposito_abono_colegiatura,
					abono_colegiatura.interes_abono_colegiatura,
					abono_colegiatura.detalle_abono_colegiatura,
					abono_colegiatura.cve_cuenta_colegiatura,
					abono_colegiatura.cve_estado_pago as estado_pago_abono,
					abono_colegiatura.cve_metodo_pago,
					abono_colegiatura.nombre_usuario,
					cuenta_colegiatura.folio_cuenta_colegiatura,
					cuenta_colegiatura.fecha_cuenta_colegiatura,
					cuenta_colegiatura.monto_cuenta_colegiatura,
					cuenta_colegiatura.beca_cuenta_colegiatura,
					cuenta_colegiatura.descripcion_cuenta_colegiatura,
					cuenta_colegiatura.cve_precio_colegiatura,
					cuenta_colegiatura.cve_constructor_grupo,
					cuenta_colegiatura.cve_estado_pago as estado_pago_cuenta,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					constructor_grupo.cve_grupo,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,
					usuario.descripcion_usuario,
					ciclo.nombre_ciclo,
					ciclo.cve_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.descripcion_campus,
					campus.direccion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from abono_colegiatura
					inner join cuenta_colegiatura on (abono_colegiatura.cve_cuenta_colegiatura = cuenta_colegiatura.cve_cuenta_colegiatura)
					inner join precio_colegiatura on (cuenta_colegiatura.cve_precio_colegiatura = precio_colegiatura.cve_precio_colegiatura)
					inner join ciclo on (precio_colegiatura.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					inner join constructor_grupo on (cuenta_colegiatura.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					inner join usuario on (abono_colegiatura.nombre_usuario = usuario.nombre_usuario)
					where abono_colegiatura.status_abono_colegiatura = "active" and abono_colegiatura.cve_abono_colegiatura = "'.$id.'" Limit 1';
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

		public function registrar($key,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO abono_colegiatura(fecha_abono_colegiatura,deposito_abono_colegiatura,interes_abono_colegiatura,detalle_abono_colegiatura,cve_cuenta_colegiatura,cve_estado_pago,cve_metodo_pago,nombre_usuario) VALUES (upper("'.$atr['fecha_abono_colegiatura'].'"),upper("'.$atr['deposito_abono_colegiatura'].'"),upper("'.$atr['interes_abono_colegiatura'].'"),upper("'.$atr['detalle_abono_colegiatura'].'"),upper("'.$atr['cve_cuenta_colegiatura'].'"),upper("'.$atr['cve_estado_pago'].'"),upper("'.$atr['cve_metodo_pago'].'"),upper("'.$atr['nombre_usuario'].'"))';
			$id_insert = $dataBase->triggerReturn($key,$sql);
			return($id_insert);
			//print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE abono_colegiatura SET fecha_abono_colegiatura = upper("'.$atr['fecha_abono_colegiatura'].'"),deposito_abono_colegiatura = upper("'.$atr['deposito_abono_colegiatura'].'"),interes_abono_colegiatura = upper("'.$atr['interes_abono_colegiatura'].'"),detalle_abono_colegiatura = upper("'.$atr['detalle_abono_colegiatura'].'"),cve_metodo_pago = upper("'.$atr['cve_metodo_pago'].'"),nombre_usuario = upper("'.$atr['nombre_usuario'].'") where cve_abono_colegiatura = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		//---------------------------------------------
		public function reporte($key, $campus ,$inicio, $final){
			//CAMPUS
			if ($campus == 'SEC' || $campus == 'BAC') {
				$ca1 = 'SEC';
				$ca2 = 'BAC';
			}else{
				$ca1 = 'PRE';
				$ca2 = 'PRI';
			}
			//
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_colegiatura.cve_abono_colegiatura,
					abono_colegiatura.fecha_abono_colegiatura,
					abono_colegiatura.deposito_abono_colegiatura,
					abono_colegiatura.interes_abono_colegiatura,
					abono_colegiatura.detalle_abono_colegiatura,
					abono_colegiatura.cve_cuenta_colegiatura,
					abono_colegiatura.cve_estado_pago,
					abono_colegiatura.cve_metodo_pago,
					abono_colegiatura.nombre_usuario,
					cuenta_colegiatura.folio_cuenta_colegiatura,
					cuenta_colegiatura.fecha_cuenta_colegiatura,
					cuenta_colegiatura.monto_cuenta_colegiatura,
					cuenta_colegiatura.beca_cuenta_colegiatura,
					cuenta_colegiatura.descripcion_cuenta_colegiatura,
					cuenta_colegiatura.cve_precio_colegiatura,
					cuenta_colegiatura.cve_constructor_grupo,
					cuenta_colegiatura.cve_estado_pago,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					constructor_grupo.cve_grupo,
					constructor_grupo.curp_alumno,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,
					usuario.descripcion_usuario,
					ciclo.nombre_ciclo,
					ciclo.cve_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from abono_colegiatura
					inner join cuenta_colegiatura on (abono_colegiatura.cve_cuenta_colegiatura = cuenta_colegiatura.cve_cuenta_colegiatura)
					inner join precio_colegiatura on (cuenta_colegiatura.cve_precio_colegiatura = precio_colegiatura.cve_precio_colegiatura)
					inner join ciclo on (precio_colegiatura.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					inner join constructor_grupo on (cuenta_colegiatura.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					inner join usuario on (abono_colegiatura.nombre_usuario = usuario.nombre_usuario)
					where abono_colegiatura.status_abono_colegiatura = "active" and (campus.cve_campus = "'.$ca1.'" or campus.cve_campus = "'.$ca2.'") and abono_colegiatura.fecha_abono_colegiatura  between "'.$inicio.'" and "'.$final.'"';
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

		public function eliminar($key, $folio){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE abono_colegiatura SET status_abono_colegiatura = "inactive" where cve_abono_colegiatura = "'.$folio.'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}
	}
?>