<?php
include_once '../ENTITIES/Cliente.php';
include_once '../ENTITIES/HorarioCliente.php';
include_once '../UTILITIES/Conexion.php';
include_once '../UTILITIES/ConversionJson.php';
class DaoHorarioCliente {
	private $hrCliente;
	public function DaoHorarioCliente($hrCliente) {
		$this->hrCliente = $hrCliente;
	}
// 	public function addHorarioCliente($horarioCliente){
// 		$this->horariosCliente[] = $horarioCliente;
// 	}
	public function guardar() {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "INSERT INTO `horario_cliente` (`id_cliente`, `fecha_inicio`, `fecha_fin`, `activo`) VALUES (?,?,?,?)" )) {
				$stmt->bind_param ( "issi", $this->hrCliente->getIdCLiente (), $this->hrCliente->getFechaInicio (), $this->hrCliente->getFechaFin (), $this->hrCliente->getActivo () );
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
			$sql = "SELECT * FROM horario_cliente WHERE id_cliente=? AND fecha_inicio>=CURDATE() AND activo=1 ORDER BY id DESC;";
			
			if ($stmt = $conn->prepare ( $sql ) ) {
				$stmt->bind_param ( "i", $idCliente );
				$stmt->execute ();
				
				$result = $stmt->get_result ();
				$campos = array (
						0 => 'id',
						1 => 'id_cliente',
						2 => 'fecha_inicio',
						3 => 'fecha_fin'
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
		$conn->close ();
	}
	
	public static function consultarTodo($idCliente) {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			$sql = "SELECT * FROM horario_cliente WHERE id_cliente=? AND activo=1 ORDER BY id DESC;";
				
			if ($stmt = $conn->prepare ( $sql ) ) {
				$stmt->bind_param ( "i", $idCliente );
				$stmt->execute ();
	
				$result = $stmt->get_result ();
				$campos = array (
						0 => 'id',
						1 => 'id_cliente',
						2 => 'fecha_inicio',
						3 => 'fecha_fin'
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
		$conn->close ();
	}
	
	public function guardarDetalleHorario($inicio, $fin, $dias) {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "INSERT INTO `detalle_horario`(`id_horario_cliente`, `dia`, `hora_inicio`, `hora_fin`) VALUES (?,?,?,?)" )) {
				$stmt->bind_param ( "isss", $this->hrCliente->getId (), $dias, $inicio, $fin);
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
}
?>