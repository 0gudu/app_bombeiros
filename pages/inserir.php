<?php 
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    $md5 = md5($senha);

    try {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, cargo, senha, email, telefone) VALUES (:nome, :cargo, :senha, :email, :telefone)");
        $result = $stmt->execute([
            ':nome' => $nome,
            ':cargo' => $cargo,
            ':senha' => $senha,
            ':email' => $email,
            ':telefone' => $telefone
        ]);
        echo "informações inseridas";
    } catch (Exception $e) {
        echo 'Caught custom exception: ',  $e->getMessage(), "\n";
    }
    header("location: adm_users.php");
?>