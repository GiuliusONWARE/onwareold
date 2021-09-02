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

    <title>Lista de Fornecedores</title>
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
					
		<div class="identificacao">
		Lista de Fornecedores
		</div>

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
		$lista_fornecedor = "SELECT * FROM fornecedor";
		$listando_fornecedor = mysqli_query($conexao, $lista_fornecedor);
		while($row_fornecedor = mysqli_fetch_assoc($listando_fornecedor)){
			echo "ID " . $row_fornecedor['id_fornecedor'] . "<br>";
			echo "Marca " . $row_fornecedor['marca'] . "<br>";
			echo "Nome " . $row_fornecedor['nome'] . "<br>";
            echo "Tipo " . $row_fornecedor['tipo'] . "<br>";
            echo "Contratação " . $row_fornecedor['contratacao'] . "<br>";
            echo "Telefone RMA " . $row_fornecedor['telefone'] . "<br>";
			echo "E-Mail de Suporte " . $row_fornecedor['email'] . "<br>";
			//echo "<a href='U_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
			//echo "<a href='D_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
		}
		?>
		
		<div class="sair">
			<a href="P_sair.php"><img src="IMG/erro.png" width="50px"/></a>
		</div>

		</div> <!-- Fim do corpo -->

	
	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>

</body>
</html>