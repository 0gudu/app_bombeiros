<?php 
    require "../../includes/api.php";

    $user = $_SESSION['user'];
    $cat = $_GET['cat'];
    $quest = $_GET['quest'];
    $answers = $_GET['answers'];
    $prox = $quest + 1;
    $an = $db->svquests("$user", "$cat", "$quest", "$answers");
    echo $answers;
    header("Location: ../quests.php?per=" . $prox . "&cat=" . $cat);
?>
