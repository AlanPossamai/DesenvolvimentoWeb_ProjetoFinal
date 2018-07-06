<?php
	require_once './config.php';
	require_once './Utils/Session.php';
	require_once './Utils/Authenticator.php';
	Authenticator::requireLogin();
	$idEmpresa = Session::getInstance()->getByKey('idEmpresa');
?>

<div class="container">
	<div class="row text-center">
		<div class="col">
			<div class="form-label-group">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link disabled" href="#">ABC Group</a>
					</li>

				<?php if ($idEmpresa) { ?>

					<li class="nav-item">
						<a class="nav-link" href="./InicialEmpresa.php">Home</a>
					</li>

				<?php } else { ?>

					<li class="nav-item">
						<a class="nav-link" href="./InicialConselho.php">Home</a>
					</li>

				<?php } if ($idEmpresa) { ?>

					<li class="nav-item">
						<a class="nav-link" href="./ListaVendas.php">Vendas</a>
					</li>

				<?php } else { ?>

					<li class="nav-item">
						<a class="nav-link" href="./ListaVendasConselho.php">Vendas das empresas</a>
					</li>

				<?php } if ($idEmpresa) { ?>

					<li class="nav-item">
						<a class="nav-link" href="./ListaClientes.php">Clientes</a>
					</li>

				<?php } ?>

					<li class="nav-item">
						<a class="nav-link" href="./ListaUsuarios.php">Usuários</a>
					</li>

				<?php if (! $idEmpresa) { ?>

					<li class="nav-item">
						<a class="nav-link" href="./ListaEmpresas.php">Empresas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./ListaPaises.php">Países</a>
					</li>

				<?php } ?>

					<li class="nav-item">
						<a class="nav-link" href="./logout.php">Sair</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>