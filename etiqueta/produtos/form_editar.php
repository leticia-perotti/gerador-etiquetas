<?php

try {

    include "../conexao.php";

    if (!isset($_GET['id'])) {
        die('Acesse pela listagem');
    }

    $query = $conexao->PREPARE("SELECT * FROM produto WHERE id=:id");
    $query->bindValue(":id", $_GET['id']);

    $resultado = $query->execute();

    if ($query->rowCount() == 0) {
        exit("Objeto não encontrado");
    }

    $linha = $query->fetchObject();
} catch (PDOException $exception) {
    echo $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Editar produto</title>
</head>
<body>

<?php
include("../documentacao.php");

?>
<div class="container">
    <h1> Editar </h1>
    <form action="editar.php" method="post" class="jsonForm">

        <div class="form-group">
            <label for="id">Codigo</label>
            <input class="form-control" id="id" type="text" name="id" readonly value="<?php echo $linha->id;?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" id="nome" type="text" name="nome" value="<?php echo $linha->nome;?>">
        </div>
        <div class="form-group">
            <label for="codigo">Codigo</label>
            <input class="form-control" id="codigo" type="number" name="codigo" value="<?php echo $linha->codigo;?>">
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

<script>
    $(document).ready(function (){
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if(data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function(){
                            history.back();
                        }
                    });
                }else{
                    iziToast.error({
                        message: data.mensagem
                    });
                }
            },
            error:function (data){
                 iziToast.error({
                       mensage:'Servidor retornou erro. '
                  });
             }
        });
    });
</script>

</body>
</html>
