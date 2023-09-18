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
    <form action="" method="POST" id="form">
        Nome
        <input type="text" id="nome" name="nome" value="">
        Senha
        <input type="text" id="senha" name="senha" value="">
        Email
        <input type="text" id="email" name="email">
        Telefone
        <input type="number" id="telefone" name="telefone" value="">
        
        <input type="button" value="Cadastrar" id="butao" value="">
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
				                
                success: function(success)
				{
					
				},
				
			});
			
    });
</script>
</html>