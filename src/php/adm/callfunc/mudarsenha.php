<?php 
    require_once("../../../includes/api.php");
    $id = $_POST['id_user'];
    $s = $_POST['senha'];
    $senha = md5($s);
    $db->mudarsenha($id,$senha);
    header('location: ../user_reg.php');
?>