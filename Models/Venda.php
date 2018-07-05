<?php

class Venda {

	private $id;
	private $idCliente;
	private $idEmpresa;
	private $data;
	private $valor;
	private $cotacaoDolar;

	public function __construct($venda) {
		$this->id = $venda['id'];
		$this->idCliente = $venda['idCliente'];
		$this->idEmpresa = $venda['idEmpresa'];
		$this->data = $venda['data'];
	}
        
        public function getId() {
            return $this->id;
        }

        public function getIdCliente() {
            return $this->idCliente;
        }

        public function getIdEmpresa() {
            return $this->idEmpresa;
        }

        public function getData() {
            return $this->data;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getCotacaoDolar() {
            return $this->cotacaoDolar;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setIdCliente($idCliente) {
            $this->idCliente = $idCliente;
        }

        public function setIdEmpresa($idEmpresa) {
            $this->idEmpresa = $idEmpresa;
        }

        public function setData($data) {
            $this->data = $data;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setCotacaoDolar($cotacaoDolar) {
            $this->cotacaoDolar = $cotacaoDolar;
        }

        public function getAttributes() {
		return get_object_vars($this);
	}

	public function getClassName() {
		return get_class($this);
	}
}