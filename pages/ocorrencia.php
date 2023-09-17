<?php
    require("tests.php");
    $db->checklogin(2);
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
   <button id="pesquisa">Começar</button>

   <button id="voltar">Voltar</button>

<script src="../jquery.js"></script>
<script>

    $("#pesquisa").on("click", function () {
        next();
    });
    
    function next(){
        window.open("quests.php?per="+0,"_self");
        
        $("#pesquisa").text("Continuar");
        
    }

    $("#voltar").on("click", function () {
        window.open("menu.php","_self")
    });


</script>
</html>