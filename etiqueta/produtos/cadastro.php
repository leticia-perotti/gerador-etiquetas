<?php

try {
    include "../conexao.php";

    $query = $conexao->prepare("SELECT * FROM produto WHERE codigo=:codigo");
    $query->bindValue(':codigo', $_POST['codigo']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('Código de produto já existente');
    }

    $query = $conexao->prepare("INSERT INTO produto (nome, codigo)VALUES(:nome,:codigo) ");
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':codigo', $_POST['codigo']);
    $query->execute();

    if ($query->rowCount() == 1) {
        retornaOK('Inserido com sucesso ');
    } else {
        retornaErro('Erro ao inserir');
    }

} catch (Exception $exception) {
    retornaErro($exception->getMessage());
}
