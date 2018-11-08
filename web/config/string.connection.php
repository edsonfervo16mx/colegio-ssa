<?php 
	include_once 'key.connection.php';
	
	class dbMysql{

		public function connectDB($key){
			$host = $key['host'];
			$user = $key['user'];
			$pass = $key['pass'];
			$db = $key['db'];
			$connection = mysqli_connect($host,$user,$pass,$db) or die ('Error');
			return($connection);
		}

		public function triggerSimple($key,$sql){
			$conn = $this->connectDB($key);
			$result = $conn->query($sql);
			mysqli_close($conn);
			return($result);
		}
		
		public function triggerReturn($key,$sql){
			$conn = $this->connectDB($key);
			$result = $conn->query($sql);
			$id = $conn->insert_id;
			mysqli_close($conn);
			return($id);
		}
	}

?>