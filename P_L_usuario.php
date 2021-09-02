<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_usuario, nome, email, usuario, senha, nivel FROM usuario WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id_usuario'] = $row_usuario['id_usuario'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['usuario'] = $row_usuario['usuario'];
				$_SESSION['nivel'] = $row_usuario['nivel'];
				header("Location: administrativo.php");

			}else{

				header("Location: erro.php");
			}
		}
	}else{

		header("Location: erro.php");
	}
}else{

	header("Location: erro.php");
}
?>