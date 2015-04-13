<?php
include_once '../ENTITIES/ModeloMalla.php';
include_once '../UTILITIES/Conexion.php';
include_once '../UTILITIES/ConversionJson.php';

class DaoModeloMalla {
	private $modeloMalla;
	public function DaoModeloMalla($modeloMalla){
		$this->$modeloMalla = $modeloMalla;
	}
	public function guardar(){
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "INSERT INTO modelo_malla (id_cliente, id_horario_cliente, cant_analistas, 
					cant_backups, horas_semanales, horas_diarias, hora_inicio_almuerzo, hora_fin_almuerzo, activo) VALUES (?,?,?,?,?,?,?,?,?)" )) {
				$stmt->bind_param ( "iiiiiissi", $this->modeloMalla->getIdCliente(), $this->modeloMalla->getIdHorarioCliente(),
						$this->modeloMalla->getCantAnalistas(),$this->modeloMalla->getCantBackups(),$this->modeloMalla->getHorasSemanales(),
						$this->modeloMalla->getHorasDiarias(),$this->modeloMalla->getHoraInicioAlmuerzo(),$this->modeloMalla->getHoraFinAlmuerzo(),
						$this->modeloMalla->getActivo());
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
	public function modificar(){
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			if ($stmt = $conn->prepare ( "UPDATE modelo_malla SET id_cliente=?, id_horario_cliente=?, cant_analistas=?,
					cant_backups=?, horas_semanales=?, horas_diarias=?, hora_inicio_almuerzo=?, hora_fin_almuerzo=?, activo=?
					WHERE id=?;" )) {
				$stmt->bind_param ( "iiiiiissii", $this->modeloMalla->getIdCliente (), $this->modeloMalla->getIdHorarioCliente (), $this->modeloMalla->getCantAnalistas (), $this->modeloMalla->getCantBackups (), $this->modeloMalla->getHorasSemanales (), $this->modeloMalla->getHorasDiarias (), $this->modeloMalla->getHoraInicioAlmuerzo (), $this->modeloMalla->getHoraFinAlmuerzo (), $this->modeloMalla->getActivo (), $this->modeloMalla->getId() );
				$stmt->execute ();
				return $stmt->affected_rows;
			}
		}
		$conn->close ();
	}
	public function consultar($id) {
		$connClass = new Conexion ();
		$conn = $connClass->getConection ();
		if ($conn != null) {
			$sql = "SELECT * FROM modelo_malla WHERE id=? ORDER BY id DESC;";
				
			if ($stmt = $conn->prepare ( $sql ) ) {
				$stmt->bind_param ( "i", $id );
				$stmt->execute ();
	
				$result = $stmt->get_result ();

				$campos = array (
						0 => 'id',
						1 => 'id_cliente',
						2 => 'id_horario_cliente',
						3 => 'cant_analistas',
						4 => 'cant_backups',
						5 => 'horas_semanales',
						6 => 'horas_diarias',
						7 => 'hora_inicio_almuerzo',
						8 => 'hora_fin_almuerzo',
						9 => 'activo'
				);
				return ConvertirJson::toJSON ( $campos, $result->fetch_all ( MYSQLI_ASSOC ) );
			}
		}
		$conn->close ();
	}
}
?>