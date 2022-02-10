<?php

include("../conexao.php");
include("../documentacao.php");

$data = date('Y/m/d');
$qtdDias = $_POST['validade'];


$resultado = date('d/m/Y', strtotime("+{$qtdDias} days", strtotime($data)));

$preco = $_POST['preco'] / 1000;
$preco = $preco * $_POST['peso'];


 $produto = $conexao->prepare("Select * from produto where id=:id");
 $produto->bindParam(':id', $_POST['id']);
 $produto->execute();

 $linha = $produto->fetchObject()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressão</title>
    <style>
        .etiqueta{
            width: 48mm;
            height: 28mm;
            margin: 2mm;
            justify-content: space-around;

        }
        .nome-produto{
            font-style: oblique;
            align-items: center;
            border-bottom: 0.3mm solid black;
        }
        .validade{
            font-size: 3.5mm;
        }
        .embalagem{
            font-size: 3mm;
        }
        .pesagem{
            display: flex;
            flex-direction: row;
            justify-content: space-around;

        }
        .kg{
            font-size: 3mm;
        }
        .gramas{
            font-size: 3mm;
        }
        .preco{
            border: 0,2mm solid black;
        }
        .preco-text{
            font-size: 3mm;
        }
        .valor{
            font-size: 3.5mm;
        }

    </style>
</head>
<body class="container">
    <br><br>
    <div id="div">
    <br>
    <?php
    for ($i = 0; $i < $_POST['qnt']; $i++) :
    ?>
    <div class="etiqueta" id="print">

    <div class="nome-produto"><strong><?php echo $linha->nome; ?></strong></div>
    <div class="embalagem">Data embalagem: <?php echo date('d/m/Y'); ?></div>
    <div class="validade">Validade: <?php echo $resultado; ?></div>
    <div class="pesagem">
    <div class="kg"> R$/kg: <?php echo formatar_valor($_POST['preco']); ?></div>
    <div class="gramas">  Peso : <?php echo $_POST['peso']; ?>g</div>
    </div>
    <div class="preco-total">
    <div class="preco"><span class="preco-text">Total R$ :</span> <strong class="valor"><?php echo formatar_valor($preco); ?></strong></div>
    </div>
    <br>
    </div>
        <?php
    endfor;
    ?>
    </div>
    
</body>
<script>

    setTimeout(function() {
        window.print();
        window.location="../index.php";
    }, 50);
    
</script>

</html>