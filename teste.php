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

    <title>Base</title>
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
					
<form action="select.php" method="post">
<B>Qual seu processador?</B><br>
<select name=processador>
<option value=Pentium>Pentium</option>
<option value=AMD>AMD</option>
<option value=Celeron>Celeron</option>
</select><BR><BR>
<B>Livros que deseja comprar?</B><br>
Obs: segure "CTRL" para selecionar mais de um.<BR>
<select name="livros[]" multiple>
<option value="Biblia do PHP 4">Biblia do PHP 4</option>
<option value="PHP Professional">PHP Professional</option>
<option value="Iniciando em PHP">Iniciando em PHP</option>
<option value="Novidades do PHP 5">Novidades do PHP 5</option>
<option value="Biblia do MySQL">Biblia do MySQL</option>
</select><BR><BR>
<input type=submit>
</form>

<?php echo $_SESSION['todosprodutos'] ?>

</div> <!-- Fim do corpo -->


<script src="JS/jquery.min.js"></script>
<script src="JS/script.js"></script>

</body>
</html>


