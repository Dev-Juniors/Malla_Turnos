<?php
include_once '../ENTITIES/LineaServicio.php';
include_once '../UTILITIES/Conexion.php';
include_once '../UTILITIES/ConversionJson.php';
class DaoLineaServicio {
	private $lineaServicio;
	public function DaoLineaServicio($lineaServicio) {
		$this->lineaServicio = $lineaServicio;
	}
	public function guardar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "INSERT INTO linea_servicio ( sigla, descripcion) VALUES (?,?)" )) {
				$stmt->bind_param ( "ss", $this->lineaServicio->getSigla (), $this->lineaServicio->getDescripcion () );
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
			if ($stmt = $conn->prepare ( "UPDATE linea_servicio SET sigla=?, descripcion=? WHERE id=?" )) {
				$stmt->bind_param ( "ssi", $this->lineaServicio->getSigla (), $this->lineaServicio->getDescripcion (), $this->lineaServicio->getId () );
				$stmt->execute ();
				return $stmt->affected_rows;
			}
		}
		$conn->close ();
	}
	public function consultarForSelect() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "SELECT id, sigla FROM linea_servicio" )) {
				$stmt->execute ();
				$result = $stmt->get_result ();
				
				$campos = array (
						0 => 'id',
						1 => 'sigla' 
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
	}
	public function consultar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			$sql = "SELECT * FROM linea_servicio ";
			if ($this->lineaServicio->getSigla() != null || $this->lineaServicio->getDescripcion() != null) {
				$sql .= "WHERE ";
				if ($this->lineaServicio->getSigla() != null) {
					$sql .= "sigla LIKE ? AND ";
				}
				if ($this->lineaServicio->getDescripcion() != null) {
					$sql .= "descripcion LIKE ? AND ";
				}
			} else {
				$sql .= "$$$$$"; // Se agregar caracteres para el substring -5 del prepare
			}
			if ($stmt = $conn->prepare ( substr ( $sql, 0, strlen ( $sql )-5 ) )) {
				if ($this->lineaServicio->getSigla() != null && $this->lineaServicio->getDescripcion() != null) {
					$nombre = "%" . $this->lineaServicio->getSigla() . "%";
					$descripcion = "%" . $this->lineaServicio->getDescripcion() . "%";
					$stmt->bind_param ( "ss", $nombre, $descripcion );
				} else if ($this->lineaServicio->getSigla() != null) {
					$nombre = "%" . $this->lineaServicio->getSigla() . "%";
					$stmt->bind_param ( "s", $nombre );
				} else if ($this->lineaServicio->getDescripcion() != null) {
					$descripcion = "%" . $this->lineaServicio->getDescripcion() . "%";
					$stmt->bind_param ( "s", $descripcion );
				}
				$stmt->execute ();
				
				$result = $stmt->get_result ();
				$campos = array (
						0 => 'id',
						1 => 'sigla',
						2 => 'descripcion' 
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
		$conn->close ();
	}
}

?>