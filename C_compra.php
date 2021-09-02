<?php
session_start();
ob_start();

$usuario = $_SESSION['id_usuario'];

if(1){
	include_once 'conexao.php';
	$result = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($result);
	
	$result_compra = "INSERT INTO compra (cliente, produtos, data_pagamento, forma_pagamento) VALUES (
					'" .$usuario. "',
					'" .$result['produtos']. "',
					'" .$result['data_pagamento']. "',
					'" .$result['forma_pagamento']. "';
					)";
	$resultado_compra = mysqli_query($conexao, $result_compra);
	if(mysqli_insert_id($conexao)){

		header("Location: boleto_itau.php");
	}else{
		header("Location: erro.php");
	}
}
?>
