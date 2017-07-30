<?php 
	class CuentaColegiatura{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT cuenta_colegiatura.cve_cuenta_colegiatura,
					cuenta_colegiatura.folio_cuenta_colegiatura,
					cuenta_colegiatura.fecha_cuenta_colegiatura,
					cuenta_colegiatura.monto_cuenta_colegiatura,
					cuenta_colegiatura.beca_cuenta_colegiatura,
					cuenta_colegiatura.descripcion_cuenta_colegiatura,
					cuenta_colegiatura.cve_precio_colegiatura,
					cuenta_colegiatura.cve_constructor_grupo,
					cuenta_colegiatura.cve_estado_pago,
					cuenta_colegiatura.cve_estado_pago,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					constructor_grupo.cve_grupo,
					grupo.nombre_grupo,
					grupo.cve_ciclo,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo
					from cuenta_colegiatura
					inner join precio_colegiatura on (cuenta_colegiatura.cve_precio_colegiatura = precio_colegiatura.cve_precio_colegiatura)
					inner join constructor_grupo on (cuenta_colegiatura.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					where cuenta_colegiatura.status_cuenta_colegiatura = "active"
					';
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
			$sql = 'SELECT cuenta_colegiatura.cve_cuenta_colegiatura,
					cuenta_colegiatura.folio_cuenta_colegiatura,
					cuenta_colegiatura.fecha_cuenta_colegiatura,
					cuenta_colegiatura.monto_cuenta_colegiatura,
					cuenta_colegiatura.beca_cuenta_colegiatura,
					cuenta_colegiatura.descripcion_cuenta_colegiatura,
					cuenta_colegiatura.cve_precio_colegiatura,
					cuenta_colegiatura.cve_constructor_grupo,
					cuenta_colegiatura.cve_estado_pago,
					cuenta_colegiatura.cve_estado_pago,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					constructor_grupo.cve_grupo,
					grupo.nombre_grupo,
					grupo.cve_ciclo,
					concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo
					from cuenta_colegiatura
					inner join precio_colegiatura on (cuenta_colegiatura.cve_precio_colegiatura = precio_colegiatura.cve_precio_colegiatura)
					inner join constructor_grupo on (cuenta_colegiatura.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo)
					inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo)
					inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno)
					where cuenta_colegiatura.status_cuenta_colegiatura = "active" and cuenta_colegiatura.cve_cuenta_colegiatura = "'.$id.'"
					';
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
			$sql = 'INSERT INTO cuenta_colegiatura(folio_cuenta_colegiatura,fecha_cuenta_colegiatura,monto_cuenta_colegiatura,beca_cuenta_colegiatura,descripcion_cuenta_colegiatura,cve_precio_colegiatura,cve_constructor_grupo,cve_estado_pago) VALUES (upper("'.$atr['folio_cuenta_colegiatura'].'"),upper("'.$atr['fecha_cuenta_colegiatura'].'"),upper("'.$atr['monto_cuenta_colegiatura'].'"),upper("'.$atr['beca_cuenta_colegiatura'].'"),upper("'.$atr['descripcion_cuenta_colegiatura'].'"),upper("'.$atr['cve_precio_colegiatura'].'"),upper("'.$atr['cve_constructor_grupo'].'"),upper("'.$atr['cve_estado_pago'].'"))';
			$id_insert = $dataBase->triggerReturn($key,$sql);
			return($id_insert);
			//print $sql;
		}

		public function modificar($key,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_colegiatura SET folio_cuenta_colegiatura = upper("'.$atr['folio_cuenta_colegiatura'].'"),fecha_cuenta_colegiatura = upper("'.$atr['fecha_cuenta_colegiatura'].'"),monto_cuenta_colegiatura = upper("'.$atr['monto_cuenta_colegiatura'].'"),beca_cuenta_colegiatura = upper("'.$atr['beca_cuenta_colegiatura'].'"),descripcion_cuenta_colegiatura = upper("'.$atr['descripcion_cuenta_colegiatura'].'"),cve_precio_colegiatura = upper("'.$atr['cve_precio_colegiatura'].'"),cve_constructor_grupo = upper("'.$atr['cve_constructor_grupo'].'") where cve_cuenta_colegiatura = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function liquidar($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_colegiatura SET cve_estado_pago = "PAGADO" where cve_cuenta_colegiatura = "'.$id.'"';
			$dataBase->triggerSimple($key,$sql);
			#print $sql;
		}

	}

?>