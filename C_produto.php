<?php
session_start();
include_once("conexao.php");

$_SESSION['nivel'];


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

    <title>Cadastro de Produtos</title>
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
            
			<form method="POST" action="P_C_produto.php" enctype="multipart/form-data">
				<div class="linha">
					<div class="coluna-2">

						<select name="marca">
							<option value="Cooler Master">Cooler Master</option>
							<option value="Corsair">Corsair</option>
							<option value="NZXT">NZXT</option>
							<option value="ONWARE">ONWARE</option>
							
           				</select>				
					</div>
					<div class="coluna-2">
						
						<input type="text" name="modelo" minlength="2" maxlength="40" class="text" placeholder="Modelo">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
					<select name="tipo">
							<option value="Computador">Computador</option>
							<option value="Cooler">Cooler</option>
							<option value="CPU Cooler">CPU Cooler</option>
							<option value="Fonte">Fonte</option>
							<option value="Gabinete">Gabinete</option>
							<option value="Pasta Termica">Pasta Termica</option>
							<option value="WaterCooler">WaterCooler</option>
							
           				</select>
					</div>
					<div class="coluna-2">
						
						<input type="text" name="preco" minlength="2" maxlength="10" class="text" placeholder="Preco">
					</div>
                </div>

				<div class="linha">
					<div class="coluna-2">
						
						<input type="file" name="imagem">
					</div>
					<div class="coluna-2">
						
						<input type="number" name="estoque" maxlength="4" class="text" placeholder="Estoque">
					</div>
                </div>

				<div class="linha">
					<div class="coluna-1">
						
						<textarea name="descricao" minlength="2" maxlength="1000" placeholder="Detalhes do produto..."></textarea>
					</div>
				</div>
				
				<div class="linha">
					<div class="coluna-1">
						<input type="submit" name="CadProduto" value="Registrar">
					</div>
				</div>
				
			</form>


		</div>
		</div>

		<div class="sair">
			<a href="P_sair.php"><img src="IMG/erro.png" width="50px"/></a>
		</div>

		</div> <!-- Fim do corpo -->

	
	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>

</body>
</html>