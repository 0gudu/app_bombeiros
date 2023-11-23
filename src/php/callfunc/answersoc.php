<?php 
    require_once "../../includes/api.php";
    $idquest = $_POST['idquest'];
    //$idquest = 7;
    header('Content-Type: application/json');
    
    echo $draw->listanswer($idquest);

?>