<?php
include_once '../ENTITIES/LineaServicio.php';
include_once '../UTILITIES/Conexion.php';
include_once '../UTILITIES/ConversionJson.php';
class DaoLineaServicio {
	private $lineaServicio;
	public function DaoLineaServicio($lineaServicio) {
		$this->lineaServicio = $lineaServicio;
	}
	public function consultarForSelect() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "SELECT id, sigla FROM linea_servicio" )) {
				$stmt->execute ();
				$result = $stmt->get_result();

				$campos = array(0 => 'id',1 => 'sigla');
				return ConvertirJson::toJSON($campos,$result->fetch_all(MYSQLI_ASSOC));
			}
		}
	}
}
?>