<?php

define('DSN', 'mysql:dbname=aluno_abc_group;host=127.0.0.1');
define('USER', 'root');
define('PASSWORD', '');

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