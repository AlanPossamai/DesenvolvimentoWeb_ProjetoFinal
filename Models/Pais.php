<?php

class Pais {

	private $id;
	private $nome;
	private $moeda;
	private $codigo_moeda;

	public function __construct($pais) {
		$this->id = $pais['id'];
		$this->nome = $pais['nome'];
		$this->moeda = $pais['moeda'];
		$this->codigo_moeda = $pais['codigo_moeda'];
	}

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

	public function getCodigo_moeda() {
		return $this->codigo_moeda;
	}

	public function setCodigo_moeda($codigo_moeda) {
		return $this->codigo_moeda = $codigo_moeda;
	}

	public function getAttributes() {
		return get_object_vars($this);
	}

	public function getClassName() {
		return get_class($this);
	}
}