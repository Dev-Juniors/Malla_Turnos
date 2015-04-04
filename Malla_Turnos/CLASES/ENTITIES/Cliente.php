<?php
class Cliente {
	private $id;
	private $nombre;
	private $nit;
	private $idLineaServicio;
	private $activo;
	
	public function Cliente() {
		$this->id = null;
		$this->nombre = null;
		$this->idLineaServicio = null;
		$this->nit = null;
		$this->activo = 0;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setNit($nit){
		$this->nit = $nit;
	}
	
	public function getNit(){
		return $this->nit;
	}
	
	public function setIdLineaServicio($idLineaServicio){
		$this->idLineaServicio = $idLineaServicio;
	}
	
	public function getIdLineaServicio(){
		return $this->idLineaServicio;
	}
	
	public function setActivo($activo){
		$this->activo = $activo;
	}
	
	public function getActivo(){
		return $this->activo;
	}
}
?>