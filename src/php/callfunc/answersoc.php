<?php 
    require_once "../../includes/api.php";
    $idquest = $_POST['idquest'];

    header('Content-Type: application/json');
    
    echo $draw->listanswer($idquest);

?>