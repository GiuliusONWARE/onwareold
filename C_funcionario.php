<?php
session_start();
ob_start();
$func = 1;
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	$result_usuario = "INSERT INTO usuario (nome, email, usuario, senha, cpf, nasc, telefone, cep, endereco, bairro, cidade, estado, nivel, criado) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['email']. "',
					'" .$dados['usuario']. "',
					'" .$dados['senha']. "',
					'" .$dados['cpf']. "',
					'" .$dados['nasc']. "',
					'" .$dados['telefone']. "',
					'" .$dados['cep']. "',
					'" .$dados['endereco']. "',
					'" .$dados['bairro']. "',
					'" .$dados['cidade']. "',
					'" .$dados['estado']. "',
					'" .$func. "',
					NOW()
					)";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	if(mysqli_insert_id($conexao)){

		header("Location: login.php");
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

    <title>Cadastro de Funcionario</title>
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
						
						<input type="text" name="nome" minlength="2" maxlength="40" class="text" placeholder="Nome Completo">
					</div>
					<div class="coluna-2">
						
						<input type="email" name="email" minlength="2" maxlength="40" class="text" placeholder="Email">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="usuario" minlength="2" maxlength="40" class="text" placeholder="Usuario">
					</div>
					<div class="coluna-2">
						
						<input type="password" name="senha" minlength="2" maxlength="40" class="text" placeholder="Senha">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="number" name="cpf" class="text" placeholder="CPF">
					</div>
					<div class="coluna-2">
						
						<input type="date" name="nasc" minlength="8" maxlength="8" class="text" placeholder="Data de Nascimento">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="number" name="telefone" class="text" placeholder="Telefone">
					</div>
					<div class="coluna-2">
						
						<input type="number" name="cep" class="text" placeholder="CEP">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="endereco" minlength="2" maxlength="100" class="text" placeholder="Endereco">
					</div>
					<div class="coluna-2">
						
						<input type="text" name="bairro" minlength="2" maxlength="40" class="text" placeholder="Bairro">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="cidade" minlength="2" maxlength="40" class="text" placeholder="Cidade">
					</div>
					<div class="coluna-2">
						
						<input type="text" name="estado" minlength="2" maxlength="40" class="text" placeholder="Estado">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-1">
						<input type="submit" name="btnCadUsuario" value="Cadastrar">
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