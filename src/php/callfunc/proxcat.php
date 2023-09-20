<?php
require("../../includes/api.php");
$user = $_GET['user'];
$cat = $_GET['cat'];

$db->proxcat($user, $cat);
header("Location: ../ocorrencia.php");
?>