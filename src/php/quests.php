<?php 
    require("../includes/api.php");
    $db->checklogin();
    $per = $_GET["per"];
    $cat = $_GET["cat"];
    $answers = $draw->loadquests($_SESSION['user'], $cat, $per);
    $ans = json_encode($answers);
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

    <form id="pergunta">
        <?php
            $draw->exibirPerguntas($per,"../json/perguntas$cat.json");
        ?>
    </form>
    
    <button id="voltar">Voltar</button>
    
</body>
<script src="../js/jquery.js"></script>
<script>
    per_prox = <?php echo $per + 1; ?>;
    per_ant = <?php echo $per - 1; ?>;
    cat = <?php echo $cat;?>;
    user = <?php echo $_SESSION['user']; ?>;
    cat_prox = cat + 1;
    quest = <?php echo $per; ?>;
    var respostas_json = '<?php echo $ans;?>';
    if (respostas_json != 0){
        respostas = JSON.parse(respostas_json);
        console.log("a");

        num = Object.keys(respostas).length;
        console.log(num);
        for(var perg = 0;perg > num; perg ++){
            $("#perg" + animal).val(repostas[perg].value);
        }
    }
    
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
    var answ = $('#pergunta').serializeArray();
    var answers = JSON.stringify(answ);
    var url = "callfunc/svvquest.php?cat=" + cat + "&quest=" + quest + "&answers=" + answers;
    console.log(answ);
    window.open(url, "_self");
    
    /*var data = {
        cat: cat,
        quest: quest,
        answers: answers
    };
    
    $.ajax({
        type: "POST",
        url: "svvquest.php",

        data: data,
        success: function(response) {
            var url = "quests.php?per=" + per_prox + "&cat=" + cat;
            console.log(answers);
            console.log(response);

            
            window.open(url, "_self");
        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + error);
        }
    });
    */

}


    function ant() {
        url = "quests.php?per="+per_ant+"&cat="+cat;
        window.open(url,"_self");
    }
    function proxcat() {
        url = "callfunc/proxcat.php?user="+user+"&cat="+cat_prox;
        window.open(url,"_self");
    }

</script>
</html>