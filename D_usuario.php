<?php
session_start();
include_once("conexao.php");
$id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id_usuario)){
	$result_usuario = "DELETE FROM usuario WHERE id_usuario='$id_usuario'";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	if(mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: R_usuario.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: R_usuario.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: R_usuario.php");
}
