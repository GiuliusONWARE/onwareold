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

    <title>Lista de Usuarios</title>
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
			<h1>Listar Usuário</h1>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			

			
			$result_usuarios = "SELECT * FROM usuario";
			$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
				echo "ID " . $row_usuario['id_usuario'] . "<br>";
				echo "Nome " . $row_usuario['nome'] . "<br>";
				echo "E-mail " . $row_usuario['email'] . "<br>";
				echo "Usuario " . $row_usuario['usuario'] . "<br>";
				echo "CPF " . $row_usuario['cpf'] . "<br>";
				echo "Data de Nascimento " . $row_usuario['nasc'] . "<br>";
				echo "Telefone " . $row_usuario['telefone'] . "<br>";
				echo "CEP " . $row_usuario['cep'] . "<br>";
				echo "Endereço " . $row_usuario['endereco'] . "<br>";
				echo "Bairro " . $row_usuario['bairro'] . "<br>";
				echo "Cidade " . $row_usuario['cidade'] . "<br>";
				echo "Estado " . $row_usuario['estado'] . "<br>";
				echo "Data de Cadastro " . $row_usuario['criado'] . "<br>";
				echo "Ultima Modificação " . $row_usuario['modified'] . "<br>";
				echo "<a href='U_usuario.php?id_usuario=" . $row_usuario['id_usuario'] . "'>Editar</a><br>";
				echo "<a href='D_usuario.php?id_usuario=" . $row_usuario['id_usuario'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";
			}
			
		
		?>	
		</div>
		</div> <!-- Fim do corpo -->

	
	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>

</body>
</html>