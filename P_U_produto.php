<?php
session_start();
include_once("conexao.php");

$id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_INT);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

//echo "marca: $marca <br>";
//echo "E-mail: $modelo <br>";

$result_produto = "UPDATE produto SET marca='$marca', modelo='$modelo', tipo='$tipo', preco='$preco', estoque='$estoque', descricao='$descricao' WHERE id_produto='$id_produto'";
$resultado_produto = mysqli_query($conexao, $result_produto);

if(mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
	header("Location: R_produto.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto não foi editado com sucesso</p>";
	header("Location: U_produto.php?id_produto=$id_produto");
}
