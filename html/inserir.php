<?php 
    include("conect.php");

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Use prepared statements for security
    $comando = $pdo->prepare("INSERT INTO usuarios (nome, senha, email, telefone) VALUES (:nome, :senha, :telefone, :email)");
    $comando->bindParam(':nome', $nome);
    $comando->bindParam(':senha', $senha);
    $comando->bindParam(':telefone', $telefone);
    $comando->bindParam(':email', $email);

    try {
        $resultado = $comando->execute();

        if ($resultado) {
            echo "User inserted successfully";
        } else {
            echo "Failed to insert user";
        }
    } catch (PDOException $e) {
        echo "An error occurred: " . $e->getMessage();
    }
?>
