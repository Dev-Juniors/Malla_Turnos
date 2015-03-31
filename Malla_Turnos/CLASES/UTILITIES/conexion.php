<?php
class Conexion {
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "malla_turnos";
	private $conn;
	public function Conexion() {
		if (! isset ( $this->conn )) {
			// Create connection
			$this->conn = new mysqli ( $this->servername, $this->username, $this->password, $this->dbname );
			// Check connection
			if ($this->conn->connect_error) {
				die ( "Fall� al conectar: " + $this->conn->connect_error );
			} else {
				$this->conn->set_charset('utf-8');
			}
		}
// 		echo "Conexion abierta";
	}
	public function ejecutarQuery() {
		$fecth = null;
		$result = $this->conn->query ( 'SELECT * FROM linea_servicio' );
		if ($this->conn->error) {
// 			echo "Fall� al conectar: " , $this->conn->error;
			return null;
		} else {
			$fecth = $result->fetch_all(MYSQLI_ASSOC);
			return $fecth;
		}
	}
	public function close() {
		$this->conn->close ();
// 		echo "Conexion cerrada";
	}
}

// $conn = new Conexion ();
// $fetch = $conn->ejecutarQuery ();
// if ($fetch == null){
// 	echo "\nError consultando";
// } else if (sizeof($fetch) == 0){
// 	echo "\nSin resultados";
// } else {
// 	foreach ($fetch as $row){
// 		echo $row['sigla'];
// 	}
// }
// $conn->close ();
?>