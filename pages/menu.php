<?php
    require("api.php");
    $db->checklogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Menu</title>
</head>
<body>
    <?php

        echo $db->idtoname($_SESSION['user']);
    ?>
    <button id="ocorrencia">Nova Ocorrencia</button>
    <button id="listar">Listar Ocorrencias</button>
</body>
<script src="../jquery.js"></script>
<script>
    $("#ocorrencia").on("click", function () {
        window.open("ocorrencia.php", "_self");
    });

    $("#listar").on("click", function () {
        window.open("index.html", "_self");
    });
</script>
</html>