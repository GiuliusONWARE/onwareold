<?php
session_start();
ob_start();
include_once("conexao.php");

$_SESSION['nivel'];


$adm = 2;
$func = 1;

if($_SESSION['nivel'] == $adm){
		
}
else{
	header("Location: tarefas.php");
}


$btnCadFornecedor = filter_input(INPUT_POST, 'btnCadFornecedor', FILTER_SANITIZE_STRING);
if($btnCadFornecedor){
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	
	$result_usuario = "INSERT INTO fornecedor (marca, nome, tipo, Contratacao, telefone, email, descricao) VALUES (
					'" .$dados['marca']. "',
					'" .$dados['nome']. "',
					'" .$dados['tipo']. "',
					'" .$dados['contratacao']. "',
					'" .$dados['telefone']. "',
					'" .$dados['email']. "',
					'" .$dados['descricao']. "'
					)";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	if(mysqli_insert_id($conexao)){

		header("Location: R_fornecedor.php");
	}else{
		header("Location: erro.php");
	}
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

    <title>Cadastro de Fornecedor</title>
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

	<div class="corpo">        
		<!-- Code -->	

		<div class="corpo-formulario">
        <div class="formulario" id="formulario">
			

			<form method="POST" action="">
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="marca" class="text" minlength="2" maxlength="40" placeholder="Marca">
					</div>
					<div class="coluna-2">
						
						<input type="text" name="nome" class="text" minlength="2" maxlength="40" placeholder="Nome do Fornecedor">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="tipo" class="text" minlength="2" maxlength="90" placeholder="Tipo">
					</div>
					<div class="coluna-2">
						
					<input type="date" name="contratacao" minlength="8" maxlength="8" class="text">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
					<input type="number" name="telefone" class="text" placeholder="Telefone">
					</div>
					<div class="coluna-2">
						
						<input type="email" name="email" class="text" minlength="10" maxlength="40" placeholder="Email">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-1">
						
						<textarea name="descricao" data-ls-module="charCounter" maxlength="1000"placeholder="Detalhes do Fornecedor..."></textarea>
					</div>
				</div>
				
				<div class="linha">
					<div class="coluna-1">
						<input type="submit" name="btnCadFornecedor" value="Cadastrar">
					</div>
				</div>
				</form>
			</div>
		</div>

			
		</div> <!-- Fim do corpo -->

	
	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>

</body>
</html>