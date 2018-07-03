<?php

require_once '../config.php';

class ClienteRepository implements IRepository {
	private $conn;

	public function __construct() {
		$this->conn = MySqlConnection::getConnection(DSN, USER, PASSWORD);
	}

	public function save($empresa) {
		if ($empresa->getId() > 0) {
			return $this->update($empresa);
		} else {
			return $this->add($empresa);
		}
	}

	public function add($empresa) {
		return MySqlConnection::insertQuery($empresa);
	}

	public function update($empresa) {
		return MySqlConnection::updateQuery($empresa);
	}

	public function delete($id) {
		$query = 'DELETE FROM cliente WHERE id = ?';
		$stmt = MySqlConnection::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function getById($id) {
		$query = 'SELECT c.*, e.nome AS pais ' .
			'FROM cliente c ' .
			'JOIN empresa e ON e.id = c.idEmpresa ' .
			'WHERE c.id = ?';

		$stmt = MySqlConnection::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getAll() {
		$query = 'SELECT c.*, e.nome AS pais ' .
			'FROM cliente c ' .
			'JOIN empresa e ON e.id = c.idEmpresa ' .
			'ORDER BY c.nome, e.nome';

		$stmt = MySqlConnection::$connection->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}