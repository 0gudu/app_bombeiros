<?php 
    require("tests.php");
    $db->checklogin(2);
    $per = $_GET["per"];
    $cat = $_GET["cat"];
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
            $draw->exibirPerguntas($per,"../perguntas$cat.json");
        ?>
    </div>
    
    <button id="voltar">Voltar</button>
    
</body>
<script src="../jquery.js"></script>
<script>
    per_prox = <?php echo $per + 1; ?>;
    per_ant = <?php echo $per - 1; ?>;
    cat = <?php echo $cat;?>;
    $("#voltar").on("click", function () {
        window.open("ocorrencia.php","_self");
    });
    $("#proxima").on("click", function () {
        prox();
    });
    $("#anterior").on("click", function () {
        ant();
    }); 

    function prox() {
        url = "quests.php?per="+per_prox+"&cat="+cat;
        window.open(url,"_self");
    }

    function ant() {
        url = "quests.php?per="+per_ant+"&cat="+cat;
        window.open(url,"_self");
    }

</script>
</html>