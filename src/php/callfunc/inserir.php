<?php 
    include("../../includes/api.php");

    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    $md5 = md5($senha);

    $db->cadastrouser($nome, $cargo, $md5, $email, $telefone);
?>
