<?php
class LineaServicio {
	private $id;
	private $sigla;
	private $descripcion;
	private $activo;
	
	public function LineaServicio() {
		$this->id = null;
		$this->sigla = null;
		$this->descripcion = null;
		$this->activo = 0;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setSigla($sigla){
		$this->sigla = $sigla;
	}
	
	public function getSigla(){
		return $this->sigla;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function setActivo($activo){
		$this->activo = $activo;
	}
	
	public function isActivo(){
		return $this->activo;
	}
}
?>