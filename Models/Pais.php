<?php

class Pais {

	private $id;
	private $nome;
	private $moeda;
	private $codigoMoeda;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		return $this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		return $this->nome = $nome;
	}

	public function getMoeda() {
		return $this->moeda;
	}

	public function setMoeda($moeda) {
		return $this->moeda = $moeda;
	}

	public function getCodigoMoeda() {
		return $this->codigoMoeda;
	}

	public function setCodigoMoeda($codigoMoeda) {
		return $this->codigoMoeda = $codigoMoeda;
	}

	public function getAttributes() {
		return get_object_vars($this);
	}

	public function getClassName() {
		return get_class($this);
	}
}