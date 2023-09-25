<?php 
    require "../../includes/api.php";
    session_start();
    $user = $_SESSION['user'];
    $cat = $_GET['cat'];
    $quest = $_GET['quest'];
    $answers = $_GET['answers'];
    $prox = $quest + 1;
    $db->svquests("$user", "$cat", "$quest", "$answers");
    //header("Location: ../quests.php?per="+$prox"&cat="+$cat);   

?>