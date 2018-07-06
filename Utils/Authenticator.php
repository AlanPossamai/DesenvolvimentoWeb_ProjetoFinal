<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

class Authenticator {

	public function authenticate($login, $senha) {
		$usuarioRepository = new UsuarioRepository();
		$usuario = $usuarioRepository->getByLogin($login);

		if (! $usuario) {
			return new ErrorObj('401', 'Usuário não encontrado.', 'login');
		} else {
			$usuarioObj = new Usuario($usuario);

			if ($usuarioObj->checarSenha($senha)) {
				if (self::isLogged()) {
					session_destroy();
				}

				return self::updateAuth($usuarioObj);
			} else {
				return new ErrorObj('401', 'Senha incorreta.', 'senha');
			}
		}
	}

	public static function updateAuth($usuario = null) {
		$session = Session::getInstance();

		if ($usuario instanceof Usuario) {
			$auth = new Authentication($usuario->getId(), $usuario->getLogin(), $usuario->getIdEmpresa(), date('d-m-Y H:i:s'));
			$session->save('isLogged', true);
			$session->save('idEmpresa', $auth->getIdEmpresa());
			$session->save('AUTHENTICATION', $auth);
			return $auth;
		} else {
			$session->save('isLogged', false);
			return null;
		}
	}

	public static function requireLogin() {
		if (!self::isLogged()) {
			self::logout();
		}
	}

	public static function isLogged() {
		$session = Session::getInstance();
		return ($session->getByKey('isLogged') === true);
	}

	public static function logout() {
		$session = Session::getInstance();
		$session->destroy();
		echo '<script> window.location.replace("index.php"); </script>';
		exit;
	}

	public static function verifyPermission($modulo) {
		$session = Session::getInstance();
		$auth = $session->getByKey('AUTHENTICATION');

		if ($auth->getIdEmpresa() != null) {
			$permissionError = new ErrorObj(401, 'Você não possui permissão para ' . $modulo);
			echo json_encode($permissionError);
			exit;
		}
	}

}