<?php 
	session_start();
	require_once "FUNCTIONS/product.php";
	require_once "FUNCTIONS/cart.php";

	$pdoConnection = require_once "connection.php";

	if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {


		if($_GET['acao'] == 'add' && isset($_GET['id_produto']) && preg_match("/^[0-9]+$/", $_GET['id_produto'])){ 
			addCart($_GET['id_produto'], 1);			
		}

		if($_GET['acao'] == 'del' && isset($_GET['id_produto']) && preg_match("/^[0-9]+$/", $_GET['id_produto'])){ 
			deleteCart($_GET['id_produto']);
		}

		if($_GET['acao'] == 'up'){ 
			if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
				foreach($_POST['prod'] as $id_produto => $qtd){
						updateCart($id_produto, $qtd);
				}
			}
		} 
		header('location: carrinho.php');
	}

	$resultsCarts = getContentCart($pdoConnection);
	$totalCarts  = getTotalCart($pdoConnection);


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
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">

	<!-- Icone na aba -->
	<link rel="icon" href="IMG/icon.png" type="image/x-icon">

    <title>OnWare</title>
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
	<div class="container">
		<div class="card mt-5">
			 <div class="card-body">
	    		<h4 class="card-title">Carrinho</h4>
	    	</div>
		</div>

		<?php if($resultsCarts) : ?>
			<form action="carrinho.php?acao=up"method="post" class="lista-carrinho">
			<table class="table table-strip">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Subtotal</th>
						<th>Ação</th>

					</tr>				
				</thead>
				<tbody>
				  <?php foreach($resultsCarts as $result) : ?>

					<tr>
						
						<td><?php echo $result['modelo']?></td>
						<td>
							<input type="text" name="prod[<?php echo $result['id_produto']?>]" value="<?php echo $result['quantidade']?>" size="1" />
														
							</td>
						<td>R$<?php echo number_format($result['preco'], 2, ',', '.')?></td>
						<td>R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></td>
						<td><a href="carrinho.php?acao=del&id_produto=<?php echo $result['id_produto']?>" class="btn btn-danger">Remover</a></td>
						
					</tr>
<?php
					$_SESSION['B_total'] = $totalCarts;
$_SESSION['B_id_produto'] = $result['id_produto'];
$_SESSION['B_modelo'] = $result['modelo'];
$_SESSION['B_quantidade'] = $result['quantidade'];
$_SESSION['B_preco'] = $result['preco'];
$_SESSION['B_subtotal'] = $result['subtotal'];
?>

				<?php endforeach;?>
				 <tr>
				 	<td colspan="3" class="text-right"><b>Total: </b></td>
					<td>R$<?php echo number_format($totalCarts, 2, ',', '.')?></td>
					

					
					<td><a href="boleto_itau.php" class="finalizar">Comprar</a></td>
				 </tr>
				</tbody>
				
			</table>

			</form>
	<?php endif?>

	

	</div>

<?php
include('conexao.php');

$result_usuarios = "SELECT * FROM usuario";
$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
$row_usuario = mysqli_fetch_assoc($resultado_usuarios);

$_SESSION['nome'] = $row_usuario['nome'];
$_SESSION['endereco'] = $row_usuario['endereco'];
$_SESSION['cep'] = $row_usuario['cep'];



?>

	</div> <!-- Fim do corpo -->

	
<script src="JS/jquery.min.js"></script>
<script src="JS/script.js"></script>

</body>
</html>