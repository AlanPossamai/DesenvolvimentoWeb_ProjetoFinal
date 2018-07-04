<?php

class Usuario {

	private $id;
	private $nome;
	private $login;
	private $senha;
	private $idEmpresa;

	public function __construct($usuario) {
		$this->id = $usuario['id'];
		$this->nome = $usuario['nome'];
		$this->login = $usuario['login'];
		$this->senha = $usuario['senha'];
		$this->idEmpresa = ($usuario['idEmpresa'] > 0 ? $usuario['idEmpresa'] : null);
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getLogin() {
		return $this->login;
	}

	public function checklogin($login) {
		return $this->login == $login;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function getIdEmpresa() {
		return $this->idEmpresa;
	}

	public function setIdEmpresa($idEmpresa) {
		$this->idEmpresa = $idEmpresa;
	}

	public function getAttributes() {
		return get_object_vars($this);
	}

	public function getClassName() {
		return get_class($this);
	}
}