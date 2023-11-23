<?php 
    require_once "../../includes/api.php";
    $iduser = $_POST['userid'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Ocorrencias</title>
    <link rel="stylesheet" href="../../../assets/static/css/bootstrap.min.css">
    <script src="../../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <input type="button" value="voltar" onclick="voltar()">
    <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php 
                $draw->listocc($iduser);
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
<script src="../../js/jquery.js"></script>
<script src="../../js/questsjson.js"></script>
<script>
    $('#overlayModal').on('hidden.bs.modal', function () {
    location.reload();
});

    function voltar(){
        window.open("user_reg.php","_self");
    }
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
            url: "../callfunc/answersoc.php",
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
        //NAO ATUALIZA QUANDO CLICA EM OUTRO
        //ESTA COM A DATA ERRADA
        //TEM QUE IMPLEMENTAR O ROLE DO SUBTITULO E TIRAR O PULAR LINHAR LINHA DO ROLE PA TLGD PARCA
        function exibirModal(data) {

        console.log(mergedArray);
        var $result = $(".modal-body");

        //para cada categoria ele vai exibir a categoria
        $.each(data, function(category, questions) {
            var categoryDiv = $("<div>").addClass("category").text("Categoria: " + category);
            $result.append(categoryDiv);

            //para cada questão ele vai exibir a questao
            $.each(questions, function(index, question) {
                
                categoria = category - 1;
                //console.log(categoria + " " + index + " " + 0);

                var questionDiv = $("<div>").addClass("container m-3"); // Cria uma div para cada conjunto de valores
                var questDiv = $("<div>").text("Pergunta " + index + ":"+ mergedArray[categoria][index][0]);//exibe o titulo da pergunta de acordo com a array mergedArray, que contem as perguntas
                questionDiv.append(questDiv);

            

                //ele traduz de json para obj js e pra cada obj ele faz o loop
                $.each(JSON.parse(question), function(key, value) {

                    //var fieldDiv = $("<div>").text("Campo: " + value.name); //essa função exibia o id do input

                    var perg_num = parseInt(value.name.replace("perg", "")); //ele tira a parte string do id dos input e deixa so o texto
                    num_perg = perg_num + 3;//ele avança para a posição onde fala oq cada campo significa

                    //pequeno filtro porco para o input checkbox, ele substitui pelos simbolos lindo
                    if (value.value == "off"){
                        val = "❌";
                        console.log(value.value + " valor: off");
                    }else if (value.value == "") {
                        val = "✔️";
                        console.log(value.value + " valor: vazio");
                    }else{
                        val = value.value;
                    }

                        
                    var valueDiv = $("<div>").text(mergedArray[categoria][index][num_perg] + ": " + val);
                    
                    questionDiv.append(valueDiv);
                
                    

                    //questionDiv.append(fieldDiv, valueDiv);
                    //console.log(num_perg);
                });

                $result.append(questionDiv); // Adiciona a div com os valores à div com a classe modal-body
            });
        });

    
        }


}
        
        
    
</script>
</html>