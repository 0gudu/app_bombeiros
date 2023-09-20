<?php 
    require("../includes/api.php");
    $db->checklogin();
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
            $draw->exibirPerguntas($per,"../json/perguntas$cat.json");
        ?>
    </div>
    
    <button id="voltar">Voltar</button>
    
</body>
<script src="../js/jquery.js"></script>
<script>
    per_prox = <?php echo $per + 1; ?>;
    per_ant = <?php echo $per - 1; ?>;
    cat = <?php echo $cat;?>;
    user = <?php echo $_SESSION['user']; ?>;
    cat_prox = cat + 1;

    $("#voltar").on("click", function () {
        window.open("ocorrencia.php","_self");
    });
    $("#proxima").on("click", function () {
        prox();
    });
    $("#anterior").on("click", function () {
        ant();
    });
    $("#end").on("click", function () {
        proxcat();
    });

    function prox() {
        url = "quests.php?per="+per_prox+"&cat="+cat;
        window.open(url,"_self");
    }

    function ant() {
        url = "quests.php?per="+per_ant+"&cat="+cat;
        window.open(url,"_self");
    }
    function proxcat() {
        url = "proxcat.php?user="+user+"&cat="+cat_prox;
        window.open(url,"_self");
    }

</script>
</html>