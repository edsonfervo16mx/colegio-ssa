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

		public function generarRecibo($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT abono_inscripcion.cve_abono_inscripcion,
					abono_inscripcion.fecha_abono_inscripcion,
					abono_inscripcion.deposito_abono_inscripcion,
					abono_inscripcion.detalle_abono_inscripcion,
					abono_inscripcion.cve_cuenta_inscripcion,
					abono_inscripcion.cve_estado_pago,
					abono_inscripcion.cve_metodo_pago,
					abono_inscripcion.nombre_usuario,
					usuario.descripcion_usuario,
					cuenta_inscripcion.folio_cuenta_inscripcion,
					cuenta_inscripcion.fecha_cuenta_inscripcion,
					cuenta_inscripcion.monto_cuenta_inscripcion,
					cuenta_inscripcion.cve_precio_inscripcion,
					cuenta_inscripcion.cve_constructor_grupo,
					cuenta_inscripcion.cve_estado_pago,
					precio_inscripcion.titulo_precio_inscripcion,
					precio_inscripcion.monto_precio_inscripcion,
					precio_inscripcion.detalle_precio_inscripcion,
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
					from abono_inscripcion 
					inner join usuario on (abono_inscripcion.nombre_usuario = usuario.nombre_usuario)
					inner join cuenta_inscripcion on (abono_inscripcion.cve_cuenta_inscripcion = cuenta_inscripcion.cve_cuenta_inscripcion)
					inner join precio_inscripcion on (cuenta_inscripcion.cve_precio_inscripcion = precio_inscripcion.cve_precio_inscripcion)
					inner join constructor_grupo on (cuenta_inscripcion.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo)
					inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where abono_inscripcion.status_abono_inscripcion = "active" and abono_inscripcion.cve_abono_inscripcion = "'.$id.'" Limit 1';
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

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE abono_inscripcion SET fecha_abono_inscripcion = upper("'.$atr['fecha_abono_inscripcion'].'"),deposito_abono_inscripcion = upper("'.$atr['deposito_abono_inscripcion'].'"),detalle_abono_inscripcion = upper("'.$atr['detalle_abono_inscripcion'].'"),cve_metodo_pago = upper("'.$atr['cve_metodo_pago'].'"),nombre_usuario = upper("'.$atr['nombre_usuario'].'") where cve_abono_inscripcion = "'.$atr['cve_abono_inscripcion'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}
	}

?>