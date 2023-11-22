<?php 
    require_once 'conect.php';
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
    <form action="inserir.php" method="POST">
        Nome
        <input type="text" id="nome" name="nome" value="">
        Cargo(usuario ou administrador)
        <input type="text" id="cargo" name="cargo" value="">
        Senha
        <input type="text" id="senha" name="senha" value="">
        Email
        <input type="text" id="email" name="email">
        Telefone
        <input type="number" id="telefone" name="telefone" value="">
        
        <input type="button" value="Cadastrar" id="butao" value="">
    </form>
    <div id="users">
        <?php 
            $comando = $pdo->prepare("SELECT * FROM usuarios WHERE nome <> :nome");
            $comando->bindParam(":nome", $_SESSION['user']);
            $comando->execute(); 
        
            $resultado = $comando->execute();

            while( $linhas = $comando->fetch()) 
                {
                    $id = $linhas['id_user'];
                    $email = $linhas['nome'];
                    $nome = $linhas['cargo'];
                    $foto = $linhas['email'];
                    $adm = $linhas['telefone'];
                }
        ?>
        
    </div>
</body>
<script src="../js/jquery.js"></script>
<script>
</script>
</html>