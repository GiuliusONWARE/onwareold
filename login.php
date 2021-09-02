<?php

error_reporting(0);\ //Isso nao mostra os Erros, para mostrar substituir 0 por E_ALL
ini_set(“display_errors”, 0 ); //Isso nao mostra os Erros, para mostrar substituir 0 por 1

session_start();
include_once("conexao.php");

$_SESSION['nivel'];


$adm = 2;
$func = 1;

if(($_SESSION['nivel'] == $func) OR ($_SESSION['nivel'] == $adm)){
	header("Location: administrativo.php");
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

    <title>Login</title>
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
        <div class="corpo-login">
        <div class="login-form" id="login-form">
        
            <form method="POST" action="P_L_usuario.php">
				
			<input style="text-transform: lowercase;" type="text" minlength="2" maxlength="40" name="usuario" class="text" placeholder="Usuario"><br>

			<input type="password" minlength="2" maxlength="40" name="senha" class="text" placeholder="****"><br>

            <input type="submit" name="btnLogin" value="Login">
            
            <a class="botao-padrao" href="C_usuario.php">Cadastrar</a>

            </form>

        </div>
        </div>

		</div> <!-- Fim do corpo -->

	
	<script src="JS/jquery.min.js"></script>
	<script src="JS/script.js"></script>

</body>
</html>