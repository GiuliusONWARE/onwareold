<?php
session_start();
include_once("conexao.php");
$id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id_produto)){
	$result_produto = "DELETE FROM produto WHERE id_produto='$id_produto'";
	$resultado_produto = mysqli_query($conexao, $result_produto);
	if(mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto apagado com sucesso</p>";
		header("Location: R_produto.php");
	}else{

		$_SESSION['msg'] = "<p style='color:red;'>Erro o produto não foi apagado com sucesso</p>";
		header("Location: R_produto.php");
	}
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um produto</p>";
	header("Location: R_produto.php");
}
