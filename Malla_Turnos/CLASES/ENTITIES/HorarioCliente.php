<?php
class HorarioCliente {
	private $id;
	private $idCliente;
	private $fechaInicio;
	private $fechaFin;
	private $activo;
	
	public function HorarioCliente() {
		$this->id = null;
		$this->idCliente = null;
		$this->fechaInicio = null;
		$this->fechaFin = null;
		$this->activo = 0;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setIdCliente($idCliente){
		$this->idCliente = $idCliente;
	}
	
	public function getIdCliente(){
		return $this->idCliente;
	}
	
	public function setFechaInicio($fechaInicio){
		$this->fechaInicio = $fechaInicio;
	}
	
	public function getFechaInicio(){
		return $this->fechaInicio;
	}
	
	public function setFechaFin($fechaFin){
		$this->fechaFin = $fechaFin;
	}
	
	public function getFechaFin(){
		return $this->fechaFin;
	}
	
	public function setActivo($activo){
		$this->activo = $activo;
	}
	
	public function getActivo(){
		return $this->activo;
	}
}
?>