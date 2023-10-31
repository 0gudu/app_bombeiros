<?php 
    require_once "../includes/api.php";
    $db->checklogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Ocorrencias</title>
    <link rel="stylesheet" href="../../assets/static/css/bootstrap.min.css">
    <script src="../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        include("../includes/header.php");
    ?>
    <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php 
                $draw->listocc($_SESSION['user']);
            ?>
        </div>
    </div>
</div>

    
    <div class="modal" id="overlayModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
</body>
<script src="../js/jquery.js"></script>
<script>
    
    //pega os json das perguntas
    var jsonData;




    //visualizar as questoes ja respondidas
    function openanwsers(idquest) {
        console.log(idquest);

        $("#overlayModal").modal("show");
        data = {
            idquest: idquest
        };
        //ajax pra pegar as respostas do formulario clicado
        $.ajax({
            type: "POST",
            url: "callfunc/answersoc.php",
            dataType: 'json',

            data: data,
            success: function(response) {
                console.log(response);
                exibirModal(response); //aciona função para exibir as respostas certinho
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });

        

        //exibe as respostas certinho
       function exibirModal(data) {
            var $result = $(".modal-body"); // Seleciona a div com a classe modal-body

                $.each(data, function(category, questions) {
                    var categoryDiv = $("<div>").addClass("category").text("Categoria: " + category);
                    $result.append(categoryDiv);

                    $.each(questions, function(index, question) {
                        var questionDiv = $("<div>").addClass("question"); // Cria uma div para cada conjunto de valores

                        $.each(JSON.parse(question), function(key, value) {
                            var fieldDiv = $("<div>").text("Campo: " + value.name);
                            var valueDiv = $("<div>").text("Valor: " + value.value);
                            questionDiv.append(fieldDiv, valueDiv);
                        });

                        $result.append(questionDiv); // Adiciona a div com os valores à div com a classe modal-body
                    });
                });
       }
        
        
    }
</script>
</html>