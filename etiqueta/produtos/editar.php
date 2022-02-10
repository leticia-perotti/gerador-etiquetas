<?php

try {
    include "../conexao.php";


    $query = $conexao->prepare("SELECT * FROM produto WHERE codigo=:codigo AND id<>:id");
    $query->bindValue(':codigo', $_POST['codigo']);
    $query->bindValue(':id', $_POST['id']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaErro('Código já existente');
    }

    $query = $conexao->prepare("UPDATE produto SET nome=:nome, codigo=:codigo WHERE id=:id");
    $query->bindParam(':id', $_POST['id']);
    $query->bindParam(':nome', $_POST['nome']);
    $query->bindParam(':codigo', $_POST['codigo']);
    $query->execute();
    if ($query->rowCount() == 1) {
        retornaOK('Alterado com sucesso. ');
    } else {
        retornaOK('Nenhum dado alterado. ');
    }
} catch (PDOException $exception) {
    retornaErro( $exception->getMessage());
}
