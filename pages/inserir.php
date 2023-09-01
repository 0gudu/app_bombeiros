<?php 
    include("tests.php");

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    $db->cadastrouser($nome, $senha, $email, $telefone);
   
    
?>
