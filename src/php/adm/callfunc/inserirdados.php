<?php 
    require_once("../../../includes/api.php");
    $id = $_POST['id'];
    $data = $_POST['data'];
    $tipo = $_POST['tipo'];

    $db->modifyacc($id,$data,$tipo);
?>