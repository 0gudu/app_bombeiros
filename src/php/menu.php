<?php
    require("../includes/api.php");
    $db->checklogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../../assets/static/css/bootstrap.min.css">
    <script src="../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        include "../includes/header.php";
    ?>
    <div class="body">
    <h5> Bem Vindo <?php echo $db->idtoname($_SESSION['user']);?>!</h5>
    
    <button id="ocorrencia">Nova Ocorrencia</button>
    <button id="listar">Listar Ocorrencias</button>
    <button id="ed_perfil">Editar Perfil</button>
    </div>
    
</body>
<script src="../js/jquery.js"></script>
<script>
    $("#ocorrencia").on("click", function () {
        window.open("ocorrencia.php", "_self");
    });

    $("#listar").on("click", function () {
        window.open("listoc.php", "_self");
    });

</script>
</html>