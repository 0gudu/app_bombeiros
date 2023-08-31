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
        <input type="number" id="telefone" name="telefone" value="">
        Email
        <input type="text" id="email" name="email">
        <input type="button" value="Cadastrar" id="butao" value="">
    </form>
</body>
<script src="jquery.js"></script>
<script>
    $("#butao").click(function() {
        var dados = $('#form').serialize();
       

        $.ajax({
				type: "POST",
                url: "inserir.php",
				data: dados,
				                
                success: function(meu_json)
				{
					
				},
				error: function(xhr, status, error) {
					// Aqui poderíamos preencher uma <div> com o innerHTML por exemplo
            		console.error('Ocorreu um erro ao enviar os dados: ' + error);
          		},
				beforeSend: function(xhr) {
					// Faz algo antes do envio, como exibir uma animação por exemplo.
				},
				complete: function(xhr, status) {
					// Faz algo após a conclusão, como ocultar uma animação por exemplo. 
					// Vai ser executado mesmo se ocorrer um erro.
				},
				timeout: 5000    // Define um tempo limite de 5 segundos (5000 milissegundos)
			});
			
    });
</script>
</html>