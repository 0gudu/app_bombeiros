<?php include("tests.php"); ?>
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
    <form action="">
        Nome
        <input type="text" class="campo" id="telefone">
        Senha
        <input type="text" class="campo" id="telefone">
        Telefone
        <input type="text" class="campo" id="telefone">
        Email
        <input type="text" class="campo" id="email">
        <input type="submit" value="Cadastrar" id="butao">
    </form>
</body>
<script src="../jquery.js"></script>
<script>
    $("#butao").on("click", function () {
        
    });
</script>
</html>