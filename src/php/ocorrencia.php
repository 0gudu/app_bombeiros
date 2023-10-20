<?php
    require("../includes/api.php");
    $db->checklogin();
    if (!isset($_POST['penis'])){
        $penis = 1;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ocorrencia.css">
    <title>Fases</title>
    <link rel="stylesheet" href="../../assets/static/css/bootstrap.min.css">
    <script src="../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    include("../includes/header.php");
    ?>
    <button class="btn btn-secondary" id="cat1">categoria 1 title</button>
    <button class="btn btn-secondary" id="cat2">categoria 2 title</button>
    <button class="btn btn-secondary" id="cat3">categoria 3 title</button>
    <button class="btn btn-secondary" id="cat4">categoria 4 title</button>
    <button class="btn btn-secondary" id="cat5">categoria 5 title</button>
    <button class="btn btn-secondary" id="cat6">categoria 6 title</button>

    <button id="voltar">Voltar</button>

    <!-- ... your HTML code ... -->

<script src="../js/jquery.js"></script>
<script>
        var cat = <?php echo $db->sttquest($_SESSION['user'], "status_cat"); ?>;
        var quest = <?php echo $db->sttquest($_SESSION['user'], "status_quest"); ?>;

        for (var i = 1; i <= 6; i++) {
            var buttonId = "#cat" + i;

            if (cat == i) {
                $(buttonId).removeClass("btn-secondary btn-success btn-danger").addClass("btn-secondary");
            } else if (cat > i) {
                $(buttonId).removeClass("btn-secondary btn-success btn-danger").addClass("btn-success");
            } else {
                $(buttonId).removeClass("btn-secondary btn-success btn-danger").addClass("btn-danger");
            }

            createButtonClickHandler(i);
        };

        function createButtonClickHandler(buttonNumber) {
            var buttonId = "#cat" + buttonNumber;

            $(buttonId).on("click", function() {
                if (cat == buttonNumber) {
                    var url = "quests.php?per=" + quest + "&cat=" + buttonNumber;
                    window.open(url, "_self");
                }
            });
        }

        function next() {
            var url = "quests.php?per=" + quest + "&cat=" + cat;
            window.open(url, "_self");
        }

        $("#voltar").on("click", function() {
            window.open("menu.php", "_self");
        });
</script>

</body>
</html>
