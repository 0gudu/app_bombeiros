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
		<title>Editar Ocorrencias</title>
        <link rel="stylesheet" href="../../../assets/static/css/bootstrap.min.css">
        <script src="../../../assets/static/js/bootstrap.min.js"></script>
	</head>
	<body style="height:96vh;">

        <?php require_once("../../includes/headeradm.php");?>
        <div class="container d-flex align-items-center justify-content-center" style="height:100%;">
                <div class="card p-4">
                <h4 class="mb-4">Editar Questão</h4>

                <form action="questseditar.php" method="POST">
                    <div class="form-group">
                        <label for="id">Insira o ID do Questionário</label>
                        <input type="number" class="form-control" name="id" required>
                    </div>

                    <div class="form-group">
                        <label for="cat">Insira a Categoria do Questionário</label>
                        <input type="number" class="form-control" name="cat" required>
                    </div>

                    <div class="form-group">
                        <label for="per">Insira a Questão do Questionário</label>
                        <input type="number" class="form-control" name="per" required>
                    </div>

                    <input type="submit" class="btn btn-primary" value="EDITAR QUESTÃO">
                </form>
            </div>
        </div>
		
	</body>
</html>