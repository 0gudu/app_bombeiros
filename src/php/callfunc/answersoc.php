<?php 
    require_once "../../includes/api.php";
    $idquest = 9;

    header('Content-Type: application/json');
    
    echo $draw->listanswer($idquest);

?>