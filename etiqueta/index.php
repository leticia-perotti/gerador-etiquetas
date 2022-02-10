<?php
include("documentacao.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicial</title>
    <style>
        .corpo{
           
            padding: 150px;
        }
        .botao{
            width: 100%;
            margin: 5px;
            
        }
        .imagem{
            width: 150px;
            border-radius: 100px;
            display: block;
            margin: 0 auto;
        }
        .botoes{
            margin-top: 50px;
            
                }
        </style>
</head>
<body class="container corpo">
    <img src="logo_mini.png" class="imagem">
    <div class="botoes">
    <a href="produtos/form_cadastro.php" class="btn btn-primary botao">Cadastrar produto</a><br>
    <a href="produtos/listagem.php" class="btn btn-success botao">Listagem</a><br>
    <a href="imprimir/imprimir.php" class="btn btn-danger botao">Imprimir</a><br>
    </div>

</body>
</html>