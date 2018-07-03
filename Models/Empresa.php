<?php

class Empresa {

	private $id;
	private $nome;
	private $idPais;

	public function __construct($empresa) {
		$this->id = $empresa['id'];
		$this->nome = $empresa['nome'];
		$this->idPais = $empresa['idPais'];
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

	public function getIdPais() {
		return $this->idPais;
	}

	public function setIdPais($idPais) {
		return $this->idPais = $idPais;
	}

	public function getAttributes() {
		return get_object_vars($this);
	}

	public function getClassName() {
		return get_class($this);
	}
}