<?php 
    require_once "../../../includes/api.php";
    $id = $_POST['id'];
    echo $id;
    $db->deleteocc($id);
    header("location: ../user_reg.php")
?>