<?php 
    require_once '../../includes/api.php';
    
    $novonome = $_POST['nome'];

    $db->mudarnome($novonome);
    header("location: ../menu.php");

?>