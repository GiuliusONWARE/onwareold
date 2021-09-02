<?php
session_start();
include_once("conexao.php");

$_SESSION['nivel'];
$_SESSION['usuario'];

$adm = 2;
$func = 1;

if($_SESSION['nivel'] == $adm){
		
}
else{
	header("Location: tarefas.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Informações gerais do site -->
	<meta name="author" content="Giulius Cotelo">
	<meta name="description" content="site de vendas online de hardware e informatica">
	<meta name="keywords" content="informatica, computador, hardware">
	<meta name="robots" content="index, follow">

	<!-- CSS Externo -->
	<link rel="stylesheet" type="text/css" href="CSS/style.css">

	
	<!-- Icone na aba -->
	<link rel="icon" href="IMG/icon.png" type="image/x-icon">

    <title>Administrativo</title>
</head>
<body>
	
	<div class="menu">
		<a href="#"><img src="IMG/menu.png" width="45px"></a>
	</div>
	
	<div class="menu-direito">
		<a href="index.php"><img class="logo" src="IMG/logo.png"/></a>
		<a href="carrinho.php"><img class="carrinho-botao" src="IMG/carrinho.png"/></a>


<?php

if(!empty($_SESSION['usuario'])){
	echo "<a href='login.php' class='usuario-logado'>" . $_SESSION['usuario'] . "</a>";
}
else{
	echo "<a href='login.php'><img class='login-botao' src='IMG/logo-login.png'/></a>";		
}
?>
		
    </div>

	<nav>
		<ul>
			<li><a href="crie.php">Crie</a></li>
			<li><a href="produtos.php">Produtos</a></li>
			<li><a href="sobre.php">Sobre</a></li>
		</ul>
	</nav>

	<div class="corpo" id="barra">        
		<!-- Code -->
			<div class="promocoes">

				<div class="retangulo-vertical">
				<img src="IMG/usuarios.png"/>
					<a href="C_usuario.php" class="botao-adm">Cadastrar Usuarios</a>
				</div>

				<div class="retangulo-vertical">
				<img src="IMG/produtos.png"/>
					<a href="C_produto.php" class="botao-adm">Cadastrar Produtos</a>
				</div>

				<div class="retangulo-vertical">
				<img src="IMG/funcionario.png"/>
					<a href="C_funcionario.php" class="botao-adm">Cadastro Funcionario</a>
				</div>

				<div class="retangulo-vertical">
				<img src="IMG/cadastro-fornecedor.png"/>
					<a href="C_fornecedor.php" class="botao-adm">Cadastrar Fornecedores</a>
				</div>

				<div class="retangulo-vertical">
				<img src="IMG/usuario.png"/>
					<a href="R_usuario.php" class="botao-adm">Lista Usuarios</a>
				</div>

				<div class="retangulo-vertical">
				<img src="IMG/estoque.png"/>
					<a href="R_produto.php" class="botao-adm">Estoque Produtos</a>
				</div>

				<div class="retangulo-vertical">
				<img src="IMG/tarefas.png"/>
					<a href="tarefas.php" class="botao-adm">Tarefas do Funcionario</a>
				</div>

				<div class="retangulo-vertical">
				<img src="IMG/fornecedores.jpg"/>
					<a href="R_fornecedor.php" class="botao-adm">Fornecedores</a>
				</div>

			</div>
		</div>

		<div class="sair">
			<a href="P_sair.php"><img src="IMG/erro.png" width="50px"/></a>
		</div>

		</div> <!-- Fim do corpo -->

	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>
	<script defer src="JS/detalhes.js"></script>

</body>
</html>