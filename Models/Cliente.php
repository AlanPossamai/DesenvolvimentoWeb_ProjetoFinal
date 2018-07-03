<?php

class Cliente {

	private $id;
	private $nome;
	private $idEmpresa;

	public function __construct($cliente) {
		$this->id = $cliente['id'];
		$this->nome = $cliente['nome'];
		$this->idEmpresa = $cliente['idEmpresa'];
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

	public function getIdEmpresa() {
		return $this->idEmpresa;
	}

	public function setIdEmpresa($idEmpresa) {
		return $this->idEmpresa = $idEmpresa;
	}

	public function getAttributes() {
		return get_object_vars($this);
	}

	public function getClassName() {
		return get_class($this);
	}
}