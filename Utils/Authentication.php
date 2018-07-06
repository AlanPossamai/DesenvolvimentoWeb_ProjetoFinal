<?php

class Authentication {

	private $userId;
	private $login;
	private $idEmpresa;
	private $loginTime;

	public function __construct($userId, $login, $idEmpresa, $loginTime) {
		$this->userId = $userId;
		$this->login = $login;
		$this->idEmpresa = $idEmpresa;
		$this->loginTime = $loginTime;
	}

	public function getUserId() {
		return $this->userId;
	}

	public function getlogin() {
		return $this->login;
	}

	public function getIdEmpresa() {
		return $this->idEmpresa;
	}

	public function getLoginTime() {
		return $this->loginTime;
	}

}