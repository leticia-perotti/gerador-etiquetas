<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecione</title>
</head>
<body>
    <?php
    include('../documentacao.php');
    include("../conexao.php");

    $query = $conexao->query("Select * from produto");
    

    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produto</title>

</head>
<body>

<div class="container">
<br>
    <h1> Imprimir produto </h1>
    <hr>

    <form action="impressao.php" method="post">

    <label for="id">Produtos</label>
        <select class="form-control" id="id" name="id" required >
            <option value="">- Selecione o produto -</option>
                <?php
                while ($linha = $query->fetchObject()) {
                        echo "<option value='{$linha->id}'>{$linha->nome}</option>";
                }  
                ?>
        </select>
        <br>
    <div class="form-group">
        <label for="preco">Preço do kg</label>
        <input type="number" class="form-control" name="preco" id="preco" min="0" step="0,01">
    </div>
    <br>

    <div class="form-group">
        <label for="peso">Peso em gramas</label>
        <input type="number" class="form-control" name="peso" id="peso" min="0">
    </div>
    <br>

    <div class="form-group">
        <label for="validade">Dias de validade</label>
        <input type="number" class="form-control" name="validade" id="validade" min="0">
    </div>

    <div class="form-group">
        <label for="qnt">Quantidade de repetição</label>
        <input type="number" class="form-control" name="qnt" id="qnt" min="0">
    </div>


        <button type="submit" class="btn btn-success">Imprimir</button>
    </form>


</div>
</body>

<!--<script>
    $(document).ready(function() {
        $('.jsonForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        //onClosing: function () {
                         //   history.back();
                        }
                      });
                    //$('.jsonForm').trigger('reset');
                }else {
                    iziToast.error({
                        message: data.mensagem
                    });
                }

            },
            error: function (data) {
                iziToast.error({
                    message: 'Servidor retornou erro'
                });
            }
        });

    });
</script>-->

    
</body>
</html>