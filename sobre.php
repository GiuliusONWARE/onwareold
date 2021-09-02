<?php
session_start();
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

    <title>Sobre</title>
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
			
			<form>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="" class="text" placeholder="Nome">
					</div>
					<div class="coluna-2">
						
						<input type="text" name="" class="text" placeholder="Sobrenome">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="" class="text" placeholder="E-Mail">
					</div>
					<div class="coluna-2">
						
						<input type="text" name="" class="text" placeholder=Telefone>
					</div>
				</div>
				<div class="linha">
					<div class="coluna-1">
						
						<textarea placeholder="Escreva sua mensagem aqui..."></textarea>
					</div>
				</div>
				<div class="linha">
					<div class="coluna-1">
						<input type="submit" name="" value="Enviar">
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