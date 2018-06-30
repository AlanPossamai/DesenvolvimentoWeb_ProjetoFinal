<?php

require_once '../config.php';

class PaisRepository implements IRepository {
	private $conn;

	public function __construct() {
		$this->conn = MySqlConnection::getConnection(DSN, USER, PASSWORD);
	}

	public function save($pais) {
		if ($pais->getId() > 0) {
			return $this->update($pais);
		} else {
			return $this->add($pais);
		}
	}

	public function add($pais) {
		return $this->conn::insertQuery($pais);
	}

	public function update($pais) {
		return $this->conn::updateQuery($pais);
	}

	public function delete($id) {
		$query = 'DELETE FROM pais WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function getById($id) {
		$query = 'SELECT * FROM pais WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getAll() {
		$query = 'SELECT * FROM pais';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}