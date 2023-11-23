<?php 
    require_once "../../../includes/api.php";
    $id = $_GET['id'];

    $db->excluiracc($id);
    header("location: ../user_reg.php");
?>