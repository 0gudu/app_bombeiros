<?php 
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

    var bt = 200;
    var add = 100;
    var ste = 0;
    $("#pesquisa").on("click", function () {
        
        if (bt <= 400) {
            next();
        }else {
            $("#pesquisa").text("Finalizado");
            $("#pesquisa").css('top', bt);
            ste = 4;
            console.log(ste);
        }
        
    });
    
    function next(){
        window.open("quests.php?per="+0,"_self");
        $("#pesquisa").css('top', bt);
        $("#pesquisa").text("Continuar");
        bt += add;
        ste++;
        
    }

    $("#voltar").on("click", function () {
        window.open("menu.html","_self")
    });


</script>
</html>