<?php 
    require "../../includes/api.php";

    $user = $_SESSION['user'];
    $cat = $_POST['cat'];
    $quest = $_POST['quest'];
    $answers = $_POST['answers'];
    $prox = $quest + 1;
    $db->svquests("$user", "$cat", "$quest", "$answers");
    $db->updateongquest($user, $prox);
    //header("Location: ../quests.php?per=" . $prox . "&cat=" . $cat);
?>
