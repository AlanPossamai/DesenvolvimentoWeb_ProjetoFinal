<?php

class ErrorObj {

	public $errorCode;
	public $errorMessage;
	public $element;

	public function __construct($errorCode, $errorMessage, $element = null) {
		$this->errorCode = $errorCode;
		$this->errorMessage = $errorMessage;
		$this->element = $element;
	}

}