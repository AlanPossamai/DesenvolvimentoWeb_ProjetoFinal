<?php

require_once '../config.php';

class EmpresaRepository implements IRepository {
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
		return $this->conn::insertQuery($empresa);
	}

	public function update($empresa) {
		return $this->conn::updateQuery($empresa);
	}

	public function delete($id) {
		$query = 'DELETE FROM empresa WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function getById($id) {
		$query = 'SELECT e.*, p.nome AS pais ' .
			'FROM empresa e ' .
			'JOIN pais p ON p.id = e.idPais ' .
			'WHERE e.id = ?';

		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getAll() {
		$query = 'SELECT e.*, p.nome AS pais ' .
			'FROM empresa e ' .
			'JOIN pais p ON p.id = e.idPais ' .
			'ORDER BY e.nome, p.nome';

		$stmt = $this->conn::$connection->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}