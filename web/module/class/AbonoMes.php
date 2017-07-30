<?php 
	class AbonoMes{
		public function test(){
			echo 'Ok';
		}

		public function listarMes($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT rel_abono_mes.cve_rel_abono_mes,
			rel_abono_mes.cve_abono_colegiatura,
			rel_abono_mes.cve_mes
			from rel_abono_mes
			where rel_abono_mes.status_rel_abono_mes = "active" and rel_abono_mes.cve_abono_colegiatura = "'.$id.'"';
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

		public function registrar($key, $id ,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO abono_colegiatura(cve_abono_colegiatura,cve_mes) VALUES (upper("'.$atr['cve_abono_colegiatura'].'"),upper("'.$atr['cve_mes'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}
	}
?>