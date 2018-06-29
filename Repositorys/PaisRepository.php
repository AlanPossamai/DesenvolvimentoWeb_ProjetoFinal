<?php

require_once '../config.php';

class PaisRepository implements IRepository {
	private $conn;

	public function __construct() {
		$this->conn = MySqlConnection::getConnection(DSN, USER, PASSWORD);
	}

	public function add($person) {
		return $this->conn::insertQuery($person);
	}

	public function update($person) {
		return $this->conn::updateQuery($person);
	}

	public function delete($id) {
		$query = 'DELETE FROM paises WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function getById(int $id) {
		$query = 'SELECT * FROM paises WHERE id = ?';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getAll() {
		$query = 'SELECT * FROM paises';
		$stmt = $this->conn::$connection->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}