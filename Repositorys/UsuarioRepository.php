<?php

class UsuarioRepository implements IRepository {
	private $conn;

	public function __construct() {
		$this->conn = MySqlConnection::getConnection(DSN, USER, PASSWORD);
	}

	public function save($usuario) {
		if ($usuario->getId() > 0) {
			return $this->update($usuario);
		} else {
			return $this->add($usuario);
		}
	}

	public function add($user) {
		return $this->conn::insertQuery($user);
	}

	public function update($user) {
		return $this->conn::updateQuery($user);
	}

	public function delete($id) {
		$query = 'DELETE FROM usuario WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function getById($id) {
		$query = 'SELECT * FROM usuario WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getByLogin($login) {
		$query = 'SELECT * FROM usuario WHERE login = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $login, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getAll() {
		$query = 'SELECT * FROM usuario';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function isAdministrator($id) {
		$query = 'SELECT idEmpresa FROM usuario WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_ASSOC);
		return $rs['idEmpresa'] != null;
	}

}