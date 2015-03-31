<?php
class ModeloMalla {
	private $id;
	private $idCliente;
	private $cantAnalistas;
	private $cantBackups;
	private $horasSemanales;
	private $horasDiarias;
	private $horaInicioAlmuerzo;
	private $horaFinAlmuerzo;
	private $activo;
	
	public function ModeloMalla() {
		$this->id = null;
		$this->idCliente = null;
		$this->cantAnalistas = null;
		$this->cantBackups = null;
		$this->horasSemanales = null;
		$this->horasDiarias = null;
		$this->horaInicioAlmuerzo = null;
		$this->horaFinAlmuerzo = null;
		$this->activo = 0;
	}
	
	public function ModeloMalla($id,$idCliente,$cantAnalistas,$cantBackups,$horasSemanales,$horasDiarias,
								$horaInicioAlmuerzo,$horaFinAlmuerzo,$activo) {
		$this->id = $id;
		$this->idCliente = $idCliente;
		$this->cantAnalistas = $cantAnalistas;
		$this->cantBackups = $cantBackups;
		$this->horasSemanales = $horasSemanales;
		$this->horasDiarias = $horasDiarias;
		$this->horaInicioAlmuerzo = $horaInicioAlmuerzo;
		$this->horaFinAlmuerzo = $horaFinAlmuerzo;
		$this->activo = $activo;
	}
	
	public function setId ($id) {
		$this->id = $id;
	}
	
	public function getId () {
		return $this->id;
	}
	
	public function setIdCliente ($id) {
		$this->id = $id;
	}
	
	public function getIdCliente () {
		return $this->idCliente;
	}
	
	public function setCantAnalistas ($cantAnalistas) {
		$this->cantAnalistas = $cantAnalistas;
	}
	
	public function getCantAnalistas () {
		return $this->cantAnalistas;
	}
	
	public function setCantBackups ($cantBackups) {
		$this->cantBackups = $cantBackups;
	}
	
	public function getCantBackups () {
		return $this->cantBackups;
	}
	
	public function setHorasSemanales ($horasSemanales) {
		$this->horasSemanales= $horasSemanales;
	}
	
	public function getHorasSemanales () {
		return $this->horasSemanales;
	}
	public function setHorasDiarias ($horasDiarias) {
		$this->horasDiarias = $horasDiarias;
	}
	
	public function getHorasDiarias () {
		return $this->horasDiarias;
	}
	
	public function setHoraInicioAlmuerzo ($horaInicioAlmuerzo) {
		$this->horaInicioAlmuerzo = $horaInicioAlmuerzo;
	}
	
	public function getHoraInicioAlmuerzo () {
		return $this->horaInicioAlmuerzo;
	}
	
	public function setHoraFinAlmuerzo ($horaFinAlmuerzo) {
		$this->horaFinAlmuerzo = $horaFinAlmuerzo;
	}
	
	public function getHoraFinAlmuerzo () {
		return $this->horaFinAlmuerzo;
	}
	
	public function setActivo ($activo) {
		$this->activo = $activo;
	}
	
	public function isActivo () {
		return $this->activo;
	}
}
?>