<?php

include_once ("../conexao.php");

include('../documentacao.php');
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
    <h1> Cadastro de Produto </h1>
    <hr>

    <form action="cadastro.php" method="post" class="jsonForm">
    <div class="form-group">
        <label for="nome">Nome do produto</label>
        <input type="text" class="form-control" name="nome" id="nome"   maxlength="20" placeholder="Nome produto" required>
    </div>

    <div class="form-group">
        <label for="codigo">Código</label>
        <input type="number" class="form-control" name="codigo" id="codigo" step="1">
        <small>Segundo a tabela da outra balança</small>
    </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
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

<script>
    $(document).ready(function () {
        $('.jsonForm').ajaxForm ({
            dataType: 'json',
            success: function (data) {
                if (data.status==true) {
                    iziToast.success({
                        message: data.mensagem,
                        onClosing: function () {
                            window.location = "listagem.php";
                        }

                    });


                }else {
                    iziToast.error({
                        message: data.mensagem
                    });
                }

            },
            error: function(data){
                iziToast.error({
                    message: 'Servidor retornou erro'
                });
            }
        });
    });
</script>