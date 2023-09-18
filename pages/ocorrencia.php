<?php
    require("tests.php");
    $db->checklogin();
    if (!isset($_POST['penis'])){
        $penis = 1;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ocorrencia.css">
    <title>Fases</title>
</head>
<body>
   <button id="pesquisa">categoria</button>

   <button id="voltar">Voltar</button>

<script src="../jquery.js"></script>
<script>
    cat = <?php echo $db->sttquest($_SESSION['user'], "status_cat")?>;
    quest = <?php echo $db->sttquest($_SESSION['user'], "status_quest")?>;

    $("#pesquisa").text("categoria n"+cat);
    $("#pesquisa").on("click", function () {
        next();
    });
    
    function next(){
        url = "quests.php?per="+quest+"&cat="+cat;
        window.open(url,"_self");
        
        
    }

    $("#voltar").on("click", function () {
        window.open("menu.php","_self")
    });


</script>
</html>