<?php 
	class Gasto{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT gastos.cve_gasto,
				gastos.titulo_gasto,
				gastos.fecha_gasto,
				gastos.descripcion_gasto,
				gastos.monto_gasto,
				gastos.cve_metodo_pago,
				gastos.cve_ciclo,
				ciclo.nombre_ciclo,
				ciclo.cve_campus,
				campus.nombre_campus,
				campus.logo_campus,
				colegio.nombre_colegio
				from gastos
				inner join ciclo on (gastos.cve_ciclo = ciclo.cve_ciclo)
				inner join campus on (ciclo.cve_campus = campus.cve_campus)
				inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
				where gastos.status_gasto = "active"';
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
			$sql = 'SELECT gastos.cve_gasto,
				gastos.titulo_gasto,
				gastos.fecha_gasto,
				gastos.descripcion_gasto,
				gastos.monto_gasto,
				gastos.cve_metodo_pago,
				gastos.cve_ciclo,
				ciclo.nombre_ciclo,
				ciclo.cve_campus,
				campus.nombre_campus,
				campus.logo_campus,
				colegio.nombre_colegio
				from gastos
				inner join ciclo on (gastos.cve_ciclo = ciclo.cve_ciclo)
				inner join campus on (ciclo.cve_campus = campus.cve_campus)
				inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
				where gastos.status_gasto = "active" and gastos.cve_gasto = "'.$id.'"';
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
			$sql = 'INSERT INTO gastos(titulo_gasto,fecha_gasto,descripcion_gasto,monto_gasto,cve_metodo_pago,cve_ciclo) VALUES (upper("'.$atr['titulo_gasto'].'"),upper("'.$atr['fecha_gasto'].'"),upper("'.$atr['descripcion_gasto'].'"),upper("'.$atr['monto_gasto'].'"),upper("'.$atr['cve_metodo_pago'].'"),upper("'.$atr['cve_ciclo'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE gastos SET titulo_gasto = upper("'.$atr['titulo_gasto'].'"), fecha_gasto = upper("'.$atr['fecha_gasto'].'"), descripcion_gasto = upper("'.$atr['descripcion_gasto'].'"), monto_gasto = upper("'.$atr['monto_gasto'].'"), cve_metodo_pago = upper("'.$atr['cve_metodo_pago'].'"), cve_ciclo = upper("'.$atr['cve_ciclo'].'") where cve_gasto = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

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
			$sql = 'SELECT gastos.cve_gasto,
				gastos.titulo_gasto,
				gastos.fecha_gasto,
				gastos.descripcion_gasto,
				gastos.monto_gasto,
				gastos.cve_metodo_pago,
				gastos.cve_ciclo,
				ciclo.nombre_ciclo,
				ciclo.cve_campus,
				campus.nombre_campus,
				campus.logo_campus,
				colegio.nombre_colegio
				from gastos
				inner join ciclo on (gastos.cve_ciclo = ciclo.cve_ciclo)
				inner join campus on (ciclo.cve_campus = campus.cve_campus)
				inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
				where gastos.status_gasto = "active" and (ciclo.cve_campus ="'.$ca1.'" or ciclo.cve_campus ="'.$ca2.'") and gastos.fecha_gasto between "'.$inicio.'" and "'.$final.'"';
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