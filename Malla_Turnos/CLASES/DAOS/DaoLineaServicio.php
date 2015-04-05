<?php
include_once '../ENTITIES/LineaServicio.php';
include_once '../UTILITIES/Conexion.php';
include_once '../UTILITIES/ConversionJson.php';
class DaoLineaServicio {
	private $lineaServicio;
	public function DaoLineaServicio($lineaServicio) {
		$this->lineaServicio = $lineaServicio;
	}
	public function consultar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "SELECT * FROM linea_servicio WHERE id=?" )) {
				$id = $this->lineaServicio->getId ();
				$stmt->bind_param ( "i", $id );
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
}

?>