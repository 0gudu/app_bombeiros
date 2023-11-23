<?php 
    require("../../includes/api.php");
    $db->checklogin();
    $per = $_POST["per"];
    $cat = $_POST["cat"];
    $idquest = $_POST['id'];
    $answers = $draw->loadquestss($idquest, $cat, $per);
	$ans = json_encode($answers);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Todas"</title>
    <link rel="stylesheet" href="../../css/quests.css">
    <link rel="stylesheet" href="../../../assets/static/css/bootstrap.min.css">
    <script src="../../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>

    <form id="pergunta">
            <?php
                $draw->exibirPerguntass($per,"../../json/perguntas$cat.json");
            ?>    
    </form>
    
    
</body>
<script src="../../js/jquery.js"></script>
<script>
    var per_prox = <?php echo $per + 1; ?>;
    var per_ant = <?php echo $per - 1; ?>;
    var cat = <?php echo $cat;?>;
    var user = <?php echo $_SESSION['user']; ?>;
    var cat_prox = cat + 1;
    var quest = <?php echo $per; ?>;
    var respostas_json = '<?php echo $ans;?>';
    var inputCount = $('#pergunta input').length;

    //carregar respostas já digitadas anteriormente
    if (respostas_json !== '0') {
        respostas = JSON.parse(respostas_json);
        console.log("a");
        num = Object.keys(respostas).length;
        console.log(num);
        for(var perg = 0; perg < num; perg++) {
			console.log(respostas[perg]);
			if (respostas[perg].value == '') {
				console.log("deveria ter marcado");
				$("#perg" + perg).prop("checked", true);
			}else {
				$("#perg" + perg).val(respostas[perg].value);
			}
           
        }
    }

    $("#proxima").on("click", function () {
        prox();
    });


    function prox() {
		//verifica se digitou nos campos de texto
        var campos = document.querySelectorAll("input[type='text']");
        var aviso = document.getElementById("aviso");

        var camposVazios = false;

        for (var i = 0; i < campos.length; i++) {
            if (campos[i].value === "") {
                camposVazios = true;
                break; // Sai do loop assim que um campo vazio for encontrado
            }
        }

        if (camposVazios) {
            aviso.innerHTML = "Preencha todos os campos.";
        } else {
			//se digitou salva as informações certinho, serializa elas e manda pra db
            var answ = $('#pergunta').serializeArray();
            var answers = JSON.stringify(answ);
            console.log(answ);

            var data = {
                cat: cat,
                quest: quest,
                idquest: <?=$idquest?>,
                answers: answers,
                inputnum: inputCount
            };
                
            $.ajax({
                type: "POST",
                url: "../callfunc/svvquessst.php",

                data: data,
                success: function(response) {
                    var url = "user_reg.php";
                    console.log(response);

                    window.open(url, "_self");
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred: " + error);
                }
            });
 
            }

        
    }


    function ant() {
        url = "questseditar.php?per="+per_ant+"&cat="+cat;
        window.open(url,"_self");
    }
    function proxcat() {
        var answ = $('#pergunta').serializeArray();
        var answers = JSON.stringify(answ);
        url = "callfunc/proxcat.php?cat="+cat+"&quest="+quest+"&answers="+answers+"&inputnum="+inputCount;
        window.open(url,"_self");
    }

</script>
</html>