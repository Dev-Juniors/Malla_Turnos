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
					return -1;
				}
			}
		}
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
	}
	public function consultar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "SELECT * FROM linea_servicio WHERE id=?" )) {
				$id = 1;
				$stmt->bind_param ( "i", $id );
				$stmt->execute ();
				$result = $stmt->get_result();

				$campos = array(0 => 'id',1 => 'sigla');
				return ConvertirJson::toJSON($campos,$result->fetch_all(MYSQLI_ASSOC));
			}
		}
	}
}
?>