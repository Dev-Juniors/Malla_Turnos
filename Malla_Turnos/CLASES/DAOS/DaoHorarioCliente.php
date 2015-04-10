<?php
include_once '../ENTITIES/Cliente.php';
include_once '../UTILITIES/Conexion.php';
include_once '../UTILITIES/ConversionJson.php';
class DaoHorarioCliente {
	private $horariosCliente = array();
	public function DaoHorarioCliente() {
		$this->horariosCliente = array();
	}
	public function addHorarioCliente($horarioCliente){
		$this->horariosCliente[] = $horarioCliente;
	}
	public function guardar() {
// 		$connClass = new Conexion ();
// 		$conn = $connClass->getConection ();
// 		if ($conn != null) {
// 			if ($stmt = $conn->prepare ( "INSERT INTO cliente (activo, nombre, nit, id_linea_servicio) VALUES (?,?,?,?)" )) {
// 				$stmt->bind_param ( "issi", $this->cliente->getActivo (), $this->cliente->getNombre (), $this->cliente->getNit (), $this->cliente->getIdLineaServicio () );
// 				$stmt->execute ();
// 				if ($stmt->affected_rows > 0) {
// 					return $stmt->insert_id;
// 				} else {
// 					return - 1;
// 				}
// 			}
// 		}
// 		$conn->close ();
	}
	public function modificar() {
// 		$connClass = new Conexion ();
// 		$conn = $connClass->getConection ();
// 		if ($conn != null) {
// 			if ($stmt = $conn->prepare ( "UPDATE cliente SET activo=?, nombre=?, nit=?, id_linea_servicio=? WHERE id=?" )) {
// 				$stmt->bind_param ( "issii", $this->cliente->getActivo (), $this->cliente->getNombre (), $this->cliente->getNit (), $this->cliente->getIdLineaServicio (), $this->cliente->getId () );
// 				$stmt->execute ();
// 				return $stmt->affected_rows;
// 			}
// 		}
// 		$conn->close ();
	}
	public static function consultar($idCliente) {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			$sql = "SELECT * FROM horario_cliente WHERE id_cliente=? AND fecha_inicio>=CURDATE();";
			
			if ($stmt = $conn->prepare ( $sql ) ) {
				$stmt->bind_param ( "i", $idCliente );
				$stmt->execute ();
				
				$result = $stmt->get_result ();
				$campos = array (
						0 => 'id',
						1 => 'id_cliente',
						2 => 'fehca_inicio',
						3 => 'fecha_fin',
						4 => 'activo' 
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
		$conn->close ();
	}
}
?>