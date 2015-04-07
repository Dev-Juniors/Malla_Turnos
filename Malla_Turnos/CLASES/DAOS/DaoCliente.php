<?php
include_once '../ENTITIES/Cliente.php';
include_once '../UTILITIES/Conexion.php';
include_once '../UTILITIES/ConversionJson.php';
class DaoCliente {
	private $cliente;
	public function DaoCliente($cliente) {
		$this->cliente = $cliente;
	}
	public function guardar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "INSERT INTO cliente (activo, nombre, nit, id_linea_servicio) VALUES (?,?,?,?)" )) {
				$stmt->bind_param ( "issi", $this->cliente->getActivo (), $this->cliente->getNombre (), $this->cliente->getNit (), $this->cliente->getIdLineaServicio () );
				$stmt->execute ();
				if ($stmt->affected_rows > 0) {
					return $stmt->insert_id;
				} else {
					return - 1;
				}
			}
		}
		$conn->close ();
	}
	public function modificar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "UPDATE cliente SET activo=?, nombre=?, nit=?, id_linea_servicio=? WHERE id=?" )) {
				$stmt->bind_param ( "issii", $this->cliente->getActivo (), $this->cliente->getNombre (), $this->cliente->getNit (), $this->cliente->getIdLineaServicio (), $this->cliente->getId () );
				$stmt->execute ();
				return $stmt->affected_rows;
			}
		}
		$conn->close ();
	}
	public function consultar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			$sql = "SELECT * FROM cliente ";
			if ($this->cliente->getNombre () != null || $this->cliente->getNit () != null) {
				$sql .= "WHERE ";
				if ($this->cliente->getNombre () != null) {
					$sql .= "nombre LIKE ? AND ";
				}
				if ($this->cliente->getNit () != null) {
					$sql .= "nit LIKE ? AND ";
				}
			} else {
				$sql .= "$$$$$"; // Se agregar caracteres para el substring -5 del prepare
			}
			if ($stmt = $conn->prepare ( substr ( $sql, 0, strlen ( $sql ) - 5 ) )) {
				if ($this->cliente->getNombre () != null && $this->cliente->getNit () != null) {
					$nombre = "%" . $this->cliente->getNombre () . "%";
					$nit = "%" . $this->cliente->getNit () . "%";
					$stmt->bind_param ( "ss", $nombre, $nit );
				} else if ($this->cliente->getNombre () != null) {
					$nombre = "%" . $this->cliente->getNombre () . "%";
					$stmt->bind_param ( "s", $nombre );
				} else if ($this->cliente->getNit () != null) {
					$nit = "%" . $this->cliente->getNit () . "%";
					$stmt->bind_param ( "s", $nit );
				}
				$stmt->execute ();
				
				$result = $stmt->get_result ();
				$campos = array (
						0 => 'id',
						1 => 'activo',
						2 => 'nombre',
						3 => 'nit',
						4 => 'id_linea_servicio' 
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
		$conn->close ();
	}
	public function consultarForSelect( $idLinea ) {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "SELECT `id`, `nombre` FROM `cliente` WHERE `id_linea_servicio` ? AND `activo` = 1" )) {
				$stmt->bind_param ( "i", $idLinea);
				$stmt->execute ();
				$result = $stmt->get_result ();
				
				$campos = array (
						0 => 'id',
						1 => 'nombre' 
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
	}
}
?>