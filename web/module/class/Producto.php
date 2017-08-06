<?php

	class Producto{

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT productos.cve_producto,
					productos.titulo_producto,
					productos.detalle_producto,
					productos.descripcion_producto,
					productos.precio_producto,
					productos.existencia_producto,
					productos.cve_categoria,
					categoria_producto.nombre_categoria,
					categoria_producto.detalle_categoria,
					categoria_producto.cve_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.direccion_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from productos
					inner join categoria_producto on (productos.cve_categoria = categoria_producto.cve_categoria)
					inner join campus on (categoria_producto.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where productos.status_producto = "active"';
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
			$sql = 'SELECT productos.cve_producto,
					productos.titulo_producto,
					productos.detalle_producto,
					productos.descripcion_producto,
					productos.precio_producto,
					productos.existencia_producto,
					productos.cve_categoria,
					categoria_producto.nombre_categoria,
					categoria_producto.detalle_categoria,
					categoria_producto.cve_campus,
					campus.nombre_campus,
					campus.logo_campus,
					campus.telefono_campus,
					campus.correo_campus,
					campus.direccion_campus,
					campus.descripcion_campus,
					campus.cve_colegio,
					colegio.nombre_colegio
					from productos
					inner join categoria_producto on (productos.cve_categoria = categoria_producto.cve_categoria)
					inner join campus on (categoria_producto.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where productos.status_producto = "active" and productos.cve_producto = "'.$id.'"';
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
			$sql = 'INSERT INTO productos(titulo_producto,detalle_producto,descripcion_producto,precio_producto,existencia_producto,cve_categoria) VALUES (upper("'.$atr['titulo_producto'].'"),upper("'.$atr['detalle_producto'].'"),upper("'.$atr['descripcion_producto'].'"),upper("'.$atr['precio_producto'].'"),upper("'.$atr['existencia_producto'].'"),upper("'.$atr['cve_categoria'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE productos SET titulo_producto = upper("'.$atr['titulo_producto'].'"),detalle_producto = upper("'.$atr['detalle_producto'].'"),descripcion_producto = upper("'.$atr['descripcion_producto'].'"),precio_producto = upper("'.$atr['precio_producto'].'"),existencia_producto = upper("'.$atr['existencia_producto'].'"),cve_categoria = upper("'.$atr['cve_categoria'].'") where cve_producto = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		//falta la operacion de actualizar stock cuando se vende un producto

	}

?>