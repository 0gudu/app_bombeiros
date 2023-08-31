<?php include("tests.php");
include("conect.php"); ?>
<?php 
        $cu = $db->checkuser("manoel","123");
        if ($cu == true){
            echo("piroca");
        }else {
            echo("buceta");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adm</title>
    <link rel="stylesheet" href="../css/admusers.css">
</head>
<body>
    <form action="" method="POST" id="cu">
        Nome
        <input type="text" class="campo" id="nome">
        Senha
        <input type="text" class="campo" id="senha">
        Telefone
        <input type="text" class="campo" id="telefone">
        Email
        <input type="text" class="campo" id="email">
        <input type="submit" value="Cadastrar" id="butao">
    </form>
</body>
<script src="../jquery.js"></script>
<script>
    $("#butao").click(function() {
        var nome = $("#nome").val();
        var senha = $("#senha").val();
        var telefone = $("#telefone").val();
        var email = $("#email").val();
       
        var data = {
            nome: nome,
            senha: senha,
            telefone: telefone,
            email: email
        };

        $.ajax({
            type: "POST",
            url: "inserir.php", 
            data: data,
            success: function(response) {
                
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
    });
</script>
</html>