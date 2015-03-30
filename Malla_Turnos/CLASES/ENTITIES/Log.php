<?php
class Log {
	private $id;
	private $idMallaHorario;
	private $fechaInicio;
	private $fechaFin;
	private $tipo; /*M = Malla, H = Horario*/
	
	public function Log() {
		$this->id = null;
		$this->idMallaHorario = null;
		$this->fechaInicio = null;
		$this->fechaFin = null;
		$this->tipo = null;
	}
	
	public function Log($id,$idMallaHorario,$fechaInicio,$fechaFin,$tipo) {
		$this->id = $id;
		$this->idMallaHorario = $idMallaHorario;
		$this->fechaInicio = $fechaInicio;
		$this->fechaFin = $fechaFin;
		$this->tipo = $tipo;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setIdMallaHorario($idMallaHorario) {
		$this->idMallaHorario = $idMallaHorario;
	}
	
	public function getIdMallaHorario() {
		return $this->idMallaHorario;
	}
	
	public function setFechaInicio($fechaInicio) {
		$this->fechaInicio = $fechaInicio;
	}
	
	public function getFechaInicio() {
		return $this->fechaInicio;
	}
	
	public function setFechaFin($fechaFin) {
		$this->fechaFin = $fechaFin;
	}
	
	public function getFechaFin() {
		return $this->fechaFin;
	}
	
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	public function getFechaFin() {
		return $this->fechaFin;
	}
}
?>