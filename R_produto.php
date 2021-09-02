<?php
session_start();
include_once("conexao.php");
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

    <title>Lista de Produtos</title>
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
		<div class="container">


			<h1>Lista de Produtos</h1>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}

			$result_produtos = "SELECT * FROM produto";
			$resultado_produtos = mysqli_query($conexao, $result_produtos);
			while($row_produto = mysqli_fetch_assoc($resultado_produtos)){
				echo "ID " . $row_produto['id_produto'] . "<br>";
				echo "Marca " . $row_produto['marca'] . "<br>";
				echo "Modelo " . $row_produto['modelo'] . "<br>";
				echo "Tipo " . $row_produto['tipo'] . "<br>";
				echo "Preço " . $row_produto['preco'] . "<br>";
				echo "Estoque " . $row_produto['estoque'] . "<br>";
				echo "Imagem <img src='UPLOAD/" . $row_produto['id_produto'] . "/" . $row_produto['imagem'] . "'width='200px'/><br>";
				echo "Descricao " . $row_produto['descricao'] . "<br>";
				echo "<a href='U_produto.php?id_produto=" . $row_produto['id_produto'] . "'>Editar Produto</a><br>";
				echo "<a href='D_produto.php?id_produto=" . $row_produto['id_produto'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar Produto</a><br><hr>";
			}

		?>
		</div>
		</div> <!-- Fim do corpo -->

	
	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>

</body>
</html>