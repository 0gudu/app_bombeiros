<?php 
    require_once "../includes/api.php";
    $db->checklogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/static/css/bootstrap.min.css">
    <script src="../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        include("../includes/header.php")
    ?>
    <div class="container">
        <form action="callfunc/mudarnome.php" method="POST">
            <h2>Insira seu novo nome:</h2>
            <input type="text" name="nome" id="nome">
            <input type="submit" value="mudar">
        </form>
    </div>
    
    
</body>
</html>