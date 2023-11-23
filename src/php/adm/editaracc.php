<?php 
    require_once("../../includes/api.php");
    $id = $_POST['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../../../assets/static/css/bootstrap.min.css">
    <script src="../../../assets/static/js/bootstrap.min.js"></script>
</head>
<body class="container mt-5">

    <h3>Editar Perfil</h3>

    <form>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome">
        </div>

        <div class="form-group">
            <label for="cargo">Cargo:</label>
            <select class="form-control" id="cargo">
                <option value="Usuario" selected>Usuario</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="number" class="form-control" id="telefone">
        </div>

        <button type="button" class="btn btn-primary" onclick="mudar(1)">ATUALIZAR NOME</button>
        <button type="button" class="btn btn-primary" onclick="mudar(2)">ATUALIZAR CARGO</button>
        <button type="button" class="btn btn-primary" onclick="mudar(3)">ATUALIZAR EMAIL</button>
        <button type="button" class="btn btn-primary" onclick="mudar(4)">ATUALIZAR TELEFONE</button>
    </form>

    <button type="button" class="btn btn-secondary mt-3" onclick="voltar()">Voltar</button>
<script src="../../js/jquery.js"></script>
<script>
    function voltar(){
        window.open("user_reg.php","_self");
    }

    function mudar(oq) {
        var data;

        switch (oq) {
            case 1:
                if ($("#nome").val() === "") {
                    alert("Preencha para poder atualizar o dado");
                } else {
                    data = {
                        id: <?=$id?>,
                        tipo: oq,
                        data: $("#nome").val()
                    };
                }
                break;

            case 2:
                data = {
                    id: <?=$id?>,
                    tipo: oq,
                    data: $("#cargo").val()
                };
                break;

            case 3:
                if ($("#email").val() === "") {
                    alert("Preencha para poder atualizar o dado");
                } else {
                    data = {
                        id: <?=$id?>,
                        tipo: oq,
                        data: $("#email").val()
                    };
                }
                break;

            case 4:
                if ($("#telefone").val() === "") {
                    alert("Preencha para poder atualizar o dado");
                } else {
                    data = {
                        id: <?=$id?>,
                        tipo: oq,
                        data: $("#telefone").val()
                    };
                }
                break;
        }

        if (data) {
            $.ajax({
                type: "POST",
                url: "callfunc/inserirdados.php",
                data: data,
                success: function(success) {
                    alert(success + " atualizado");
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
    
</script>
</html>
