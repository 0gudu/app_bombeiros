<?php 
include("tests.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$db->checkuser($nome, $senha);


?>