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
    <form action="" method="POST" id="form">
        Nome
        <input type="text" id="nome" name="nome" value="">
        Senha
        <input type="text" id="senha" name="senha" value="">
        Telefone
        <input type="text" id="telefone" name="telefone" value="">
        Email
        <input type="text" id="email" name="email">
        <input type="submit" value="Cadastrar" id="butao" value="">
    </form>
</body>
<script src="../jquery.js"></script>
<script>
    $("#butao").click(function() {
        var dados = $('#form').serialize();
       

        $.ajax({
				type: "POST",
                url: "inserir.php",
				data: dados,
            success: function(response) {
               window.open("menu.html", "_self");
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
    });
</script>
</html>