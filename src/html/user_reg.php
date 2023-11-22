<?php 
    require_once "../includes/api.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adm</title>
    <link rel="stylesheet" href="../css/admusers.css">
</head>
<body>

    <form action="" id="form">
        Nome
        <input type="text" id="nome" name="nome" value="">
        Cargo
        <input type="text" id="cargo" name="cargo" value="">
        Senha
        <input type="text" id="senha" name="senha" value="">
        Email
        <input type="text" id="email" name="email">
        Telefone
        <input type="number" id="telefone" name="telefone" value="">
        
        <input type="button" value="Cadastrar" id="butao" value="">
    </form>
    <form action="questseditar.php" method="POST">
        insira o id do questionario
        <input type="number" name="id">
        insira a categoria do questionario
        <input type="number" name="cat">
        insira a questao do questionario
        <input type="number" name="per">
        <input type="submit">
    </form>
    <div id="users">
        USUARIOS:<br>
        <?php
            $draw->exibirusers();
        ?>
    </div>
</body>
<script src="../js/jquery.js"></script>
<script>
    $("#butao").click(function() {
        var dados = $('#form').serialize();
       

        $.ajax({
				type: "POST",
                url: "../php/callfunc/inserir.php",
				data: dados,
				                
                success: function(success)
				{
					$("input").val("");
                    console.log(success);
				},
				
			});
			
    });
</script>
</html>