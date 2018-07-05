<?php

require_once '../config.php';

class VendaRepository implements IRepository {
	private $conn;

	public function __construct() {
		$this->conn = MySqlConnection::getConnection(DSN, USER, PASSWORD);
	}

	public function save($venda) {
		if ($venda->getId() > 0) {
			return $this->update($venda);
		} else {
			return $this->add($venda);
		}
	}

	public function add($venda) {
		return MySqlConnection::insertQuery($venda);
	}

	public function update($venda) {
		return MySqlConnection::updateQuery($venda);
	}

	public function delete($id) {
		$query = 'DELETE FROM venda WHERE id = ?';
		$stmt = MySqlConnection::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function getById($id) {
		$query = 'SELECT v.*, e.nome AS empresa, c.nome AS cliente ' .
			'FROM venda v ' .
			'JOIN empresa e ON e.id = v.idEmpresa ' .
			'JOIN cliente c ON c.id = v.idCliente ' .
			'WHERE v.id = ?';

		$stmt = MySqlConnection::$connection->prepare($query);
		$stmt->bindParam(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getAll() {
		$query = 'SELECT v.*, e.nome AS empresa, c.nome AS cliente ' .
			'FROM venda v ' .
			'JOIN empresa e ON e.id = v.idEmpresa ' .
			'JOIN cliente c ON c.id = v.idCliente ' .
			'ORDER BY v.nome, e.nome, c.nome';

		$stmt = MySqlConnection::$connection->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}