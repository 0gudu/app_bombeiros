<?php 
    include("../../includes/api.php");
    
    // Retrieve form data
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Hash the password using MD5 (not recommended for production, consider using password_hash)
    $md5 = md5($senha);

    // Echoing for debugging purposes (remove in production)
    echo "nome: " . $nome . "<br>";
    echo "cargo: " . $cargo . "<br>";
    echo "senha: " . $senha . "<br>";

    // Call the function to insert user into the database
    $db->cadastrouser($nome, $cargo, $md5, $email, $telefone);
?>
