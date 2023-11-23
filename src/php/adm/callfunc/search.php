<?php 
    require_once("../../../includes/api.php");
    $term = $_GET['term'];
    $db->search($term);
?>