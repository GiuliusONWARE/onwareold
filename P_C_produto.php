<?php

session_start();
include_once './conexaoPDO.php';
//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$CadProduto = filter_input(INPUT_POST, 'CadProduto', FILTER_SANITIZE_STRING);
if ($CadProduto) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //Receber os dados do formulário
    $nome_imagem = $_FILES['imagem']['name'];
    //var_dump($_FILES['imagem']);
    //Inserir no BD
    $result_img = "INSERT INTO produto (marca, modelo, tipo, preco, estoque, imagem, descricao) VALUES (
    '" .$dados['marca']. "',
    '" .$dados['modelo']. "',
    '" .$dados['tipo']. "',
    '" .$dados['preco']. "',
    '" .$dados['estoque']. "',
    :imagem,
    '" .$dados['descricao']. "'
    )";
    $insert_msg = $conn->prepare($result_img);
    $insert_msg->bindParam(':imagem', $nome_imagem);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        //Recuperar último ID inserido no banco de dados
        $ultimo_id = $conn->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
        $diretorio = 'UPLOAD/' . $ultimo_id.'/';

        //Criar a pasta de foto 
        mkdir($diretorio, 0755);
        
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem)){
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload da imagem realizado com sucesso</p>";
            header("Location: C_produto.php");
        }else{
            $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso. </span><span style='color:red;'>Erro ao realizar o upload da imagem</span></p>";
            header("Location: index.php");
        }        
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: index.php");
}