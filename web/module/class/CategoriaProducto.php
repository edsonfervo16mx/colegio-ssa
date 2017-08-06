<?php 
	class CategoriaProducto{

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT categoria_producto.cve_categoria,
				categoria_producto.nombre_categoria,
				categoria_producto.detalle_categoria,
				categoria_producto.cve_campus,
				campus.nombre_campus
				from categoria_producto
				inner join campus on (categoria_producto.cve_campus = campus.cve_campus)
				where categoria_producto.status_categoria = "active"';
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
			$sql = 'SELECT categoria_producto.cve_categoria,
				categoria_producto.nombre_categoria,
				categoria_producto.detalle_categoria,
				categoria_producto.cve_campus,
				campus.nombre_campus
				from categoria_producto
				inner join campus on (categoria_producto.cve_campus = campus.cve_campus)
				where categoria_producto.status_categoria = "active" and categoria_producto.cve_categoria = "'.$id.'"';
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
			$sql = 'INSERT INTO categoria_producto(cve_categoria,nombre_categoria,detalle_categoria,cve_campus) VALUES (upper("'.$atr['cve_categoria'].'"),upper("'.$atr['nombre_categoria'].'"),upper("'.$atr['detalle_categoria'].'"),upper("'.$atr['cve_campus'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE categoria_producto SET cve_categoria = upper("'.$atr['cve_categoria'].'"),nombre_categoria = upper("'.$atr['nombre_categoria'].'"),detalle_categoria = upper("'.$atr['detalle_categoria'].'"),cve_campus = upper("'.$atr['cve_campus'].'") where cve_categoria = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

	}
?>