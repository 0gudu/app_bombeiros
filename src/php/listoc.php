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
    <title>Listar Ocorrencias</title>
    <link rel="stylesheet" href="../../assets/static/css/bootstrap.min.css">
    <script src="../../assets/static/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        include("../includes/header.php");
    ?>
    <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php 
                $draw->listocc($_SESSION['user']);
            ?>
        </div>
    </div>
</div>

    
    <div class="modal" id="overlayModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
</body>
<script src="../js/jquery.js"></script>
<script>
    
    function openanwsers(idquest) {
        console.log(idquest);
        $("#overlayModal").modal("show");
        data = {
            idquest: idquest
        };

        $.ajax({
            type: "POST",
            url: "callfunc/answersoc.php",
            dataType: 'json',

            data: data,
            success: function(response) {
                $('.modal-body').text(response, '<br>');
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
        //$('.modal-body').text('ESSA AQUI SÃO AS RESPOSTAS DO QUESTIONARIO COM A ID='+idquest);
    }
</script>
</html>