<?php 
    require("tests.php");
    $per = $_GET["per"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Todas"</title>
    <link rel="stylesheet" href="../css/quests.css">
</head>
<body>

    <div id="pergunta">
        <?php
            $draw->exibirPerguntas($per,"../perguntas.json");
        ?>
    </div>
    
    <button id="voltar">Voltar</button>
    
</body>
<script src="../jquery.js"></script>
<script>
    per_prox = <?php echo $per + 1; ?>;
    per_ant = <?php echo $per - 1; ?>;
    $("#voltar").on("click", function () {
        window.open("ocorrencia.php","_self");
    });
    $("#proxima").on("click", function () {
        window.open("quests.php?per="+per_prox,"_self");
    });
    $("#anterior").on("click", function () {
        window.open("quests.php?per="+per_ant,"_self");
    }); 

</script>
</html>