<?php
    require("api.php");
    $db->autologin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form action="" method="POST" id="form">
        Nome
        <input type="text" class="campo" id="nome" name="nome">
        Senha
        <input type="text" class="campo" id="senha" name="senha">
        <input type="button" value="entrar" id="butao">
    </form>
    
</body>
<script src="../jquery.js"></script>
<script>
    $("#butao").click(function() {
    var dados = $('#form').serialize();

    $.ajax({
        type: "POST",
        url: "logar.php", 
        data: dados,
        success: function(response) {
            if (response === "true") {
                window.open("menu.php","_self");
            } else {
                $("#nome").val(""); 
                $("#senha").val(""); 
            }
        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + error);
        }
    });
});

</script>
</html>