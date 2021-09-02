<?php
session_start();
include_once("conexao.php");
$id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
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

    <title>Atualizar Usuario</title>
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

		<h1>Editar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>

<div class="corpo-formulario">
        <div class="formulario" id="formulario">

		<form method="POST" action="P_U_usuario.php">
			<input type="hidden" name="id_usuario" value="<?php echo $row_usuario['id_usuario']; ?>">
			
			<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="nome" minlength="2" maxlength="40" class="text" value="<?php echo $row_usuario['nome']; ?>" placeholder="<Nome Completo?>">
					</div>
					<div class="coluna-2">
						
						<input style="text-transform: lowercase;" type="email" name="email" minlength="2" maxlength="40" class="text" value="<?php echo $row_usuario['email']; ?>" placeholder="Email">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="number" name="telefone" class="text" value="<?php echo $row_usuario['telefone']; ?>" placeholder="Telefone">
					</div>
					<div class="coluna-2">
						
						<input type="number" name="cep" class="text" value="<?php echo $row_usuario['cep']; ?>" placeholder="CEP">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="endereco" minlength="2" maxlength="50" class="text" value="<?php echo $row_usuario['endereco']; ?>" placeholder="Endereço">
					</div>
					<div class="coluna-2">
						
						<input type="text" name="bairro" minlength="2" maxlength="40" class="text" value="<?php echo $row_usuario['bairro']; ?>" placeholder="Bairro">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-2">
						
						<input type="text" name="cidade" minlength="2" maxlength="40" class="text" value="<?php echo $row_usuario['cidade']; ?>" placeholder="Cidade">
					</div>
					<div class="coluna-2">
						
						<input type="text" name="estado" minlength="2" maxlength="40" class="text" value="<?php echo $row_usuario['estado']; ?>" placeholder="Estado">
					</div>
				</div>
				<div class="linha">
					<div class="coluna-1">
						<input type="submit" name="Editar" value="Editar">
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