<?php

define('DSN', 'mysql:dbname=aluno_abc_group;host=localhost;charset=utf8');
define('USER', 'teste');
define('PASSWORD', 'teste');

function autoloadModels($nomeClasse) {
	if (file_exists('../Models/' . $nomeClasse . '.php')) {
		require_once '../Models/' . $nomeClasse . '.php';
	}
}

function autoloadRepositorys($nomeClasse) {
	if (file_exists('../Repositorys/' . $nomeClasse . '.php')) {
		require_once '../Repositorys/' . $nomeClasse . '.php';
	}
}

function autoloadUtils($nomeClasse) {
	if (file_exists('../Utils/' . $nomeClasse . '.php')) {
		require_once '../Utils/' . $nomeClasse . '.php';
	}
}

function autoloadServices($nomeClasse) {
	if (file_exists('../Services/' . $nomeClasse . '.php')) {
		require_once '../Services/' . $nomeClasse . '.php';
	}
}

spl_autoload_register('autoloadModels');
spl_autoload_register('autoloadRepositorys');
spl_autoload_register('autoloadUtils');
spl_autoload_register('autoloadServices');

error_reporting(E_ERROR | E_PARSE);
if (class_exists('Session')) {
	Session::getInstance();
}

try {
	if (class_exists('MySqlConnection')) {
		MySqlConnection::getConnection(DSN, USER, PASSWORD);
	}
} catch(Exception $e) {
	http_response_code(403);
	exit('<div class="p-5 text-center text-white bg-danger"><p style="font-size:25px;"><strong>Não foi possível conectar-se à base de dados.</strong></p><p class="mt-5">Verifique se a base de dados foi criada. Para criá-la execute o SQL em "' . DIR . 'Utils/DBDefinitions.sql"</p><p>As configurações de acesso à base de dados podem ser alteradas no arquivo config.php</p></div>');
}