<?php 
include("../../includes/api.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$db->login($nome, $senha);
?>