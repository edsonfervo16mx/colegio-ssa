<?php 

	class RelVentasProducto{

		public function test(){
			echo 'Ok';
		}

		public function listarDetalles($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT rel_ventas_producto.cve_rel_ventas_producto,
					rel_ventas_producto.cve_cuenta_venta,
					rel_ventas_producto.cve_producto,
					productos.titulo_producto,
					productos.detalle_producto,
					productos.descripcion_producto,
					productos.precio_producto,
					productos.existencia_producto,
					productos.cve_categoria,
					categoria_producto.nombre_categoria,
					categoria_producto.detalle_categoria,
					categoria_producto.cve_campus,
					campus.nombre_campus
					from rel_ventas_producto
					inner join productos on (rel_ventas_producto.cve_producto = productos.cve_producto)
					inner join categoria_producto on (productos.cve_categoria = categoria_producto.cve_categoria)
					inner join campus on (categoria_producto.cve_campus = campus.cve_campus)
					where rel_ventas_producto.status_rel_ventas_producto = "active" and rel_ventas_producto.cve_cuenta_venta = "'.$id.'"';
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
			$sql = 'INSERT INTO rel_ventas_producto(cve_producto,cve_cuenta_venta) VALUES (upper("'.$atr['cve_producto'].'"),upper("'.$atr['cve_cuenta_venta'].'"))';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		public function darBaja($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE rel_ventas_producto SET status_rel_ventas_producto = "inactive" where cve_rel_ventas_producto = "'.$id.'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		public function darAlta($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE rel_ventas_producto SET status_rel_ventas_producto = "active" where cve_rel_ventas_producto = "'.$id.'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

	}

?>