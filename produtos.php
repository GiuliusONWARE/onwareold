<?php
session_start();
	
	require_once "FUNCTIONS/product.php";
	$pdoConnection = require_once "connection.php";
	$products = getProducts($pdoConnection);
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

    <title>Produtos</title>
</head>
<body>
	<div class="menu">
		<a href="#"><img src="IMG/menu.png"></a>
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
		<div class="promocoes">

		<div class="titulo">Produtos</div>
		<?php foreach($products as $product) : ?>



			<div class="pc">
				<div class="retangulo-vertical">
				<!-- Informacoes Produto -->
				<img class="produto-retangulo" src="UPLOAD/<?php echo $product['id_produto'] ?>/<?php echo $product['imagem'] ?>"/>

				<div class="nome"><?php echo $product['tipo'] ?> <?php echo $product['modelo']?></div>
				<div class="preco">R$ <?php echo $product['preco'] ?></div>
					<button data-modal-target="#modal<?php echo $product['id_produto'] ?>" class="detalhes">Detalhes</button>
						<div class="modal" id="modal<?php echo $product['id_produto'] ?>">
							<div class="detalhes-titulo">
							<div class="produto-titulo">
							<?php echo $product['modelo']?></div>
								<button data-close-button class="close-button">&times;</button>
							</div>
							<div class="detalhes-corpo">
								<div class="produto"><img src="UPLOAD/<?php echo $product['id_produto'] ?>/<?php echo $product['imagem'] ?>"/></div>
							<div class="produto-detalhes"><?php echo $product['descricao'] ?></div>
							<div class="estoque">Disponivel <?php echo $product['estoque'] ?></div>
							<div class="preco">R$<?php echo number_format($product['preco'], 2, ',', '.')?></div>
							<div class="botao-add"><a href="carrinho.php?acao=add&id_produto=<?php echo $product['id_produto']?>">Comprar</a></div>
							</div>
						</div>
						<div id="overlay"></div>
				
				</div>

			</div>
			<?php endforeach;?>
		</div> <!-- Fim dos Produtos -->

		</div> <!-- Fim do corpo -->


	
	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>
	<script defer src="JS/detalhes.js"></script>


</body>
</html>