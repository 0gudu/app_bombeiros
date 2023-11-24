<?php 
    require_once("../../includes/api.php");
    $db->checklogin();
    $iid = $_SESSION['user'];
    $db->checkloginadm($iid);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm</title>
    <link rel="stylesheet" href="../../../assets/static/css/bootstrap.min.css">
    <script src="../../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        require_once("../../includes/headeradm.php");
    ?>
    bem vindo a pagina de adm
</body>
</html>