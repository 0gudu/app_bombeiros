<?php 
    require_once "../../includes/api.php";
    $db->checklogin();
    $iid = $_SESSION['user'];
    $db->checkloginadm($iid);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>adm</title>
    <link rel="stylesheet" href="../../css/admusers.css">
    <link rel="stylesheet" href="../../../assets/static/css/bootstrap.min.css">
    <script src="../../../assets/static/js/bootstrap.min.js"></script>
</head>
<body style="height: 96vh; width:100%;">

    <?php require_once "../../includes/headeradm.php";?>

    <div class="modal" id="confirmar" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <div class="container">
    
                        <div class="vh-150 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                            <div class="container">
                                <div class="card bg-white">
                                <div class="card-body p-5">
                                <p>Você tem certeza que deseja apagar a conta? Caso você fizer isso todas as ocorrencias registradas por essa conta tambem serão apagadas</p>
        
                    <div class="d-grid">
                                <input type="button" class="btn btn-outline-dark m-1 "onclick="verificarapagar(1)" value="SIM">
                                <input type="button" class="btn btn-outline-dark m-1"onclick="verificarapagar(2)" value="NÃO">
                                    </div>
                                    </form>

                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                            
                        </div>
                    </div>
        </div>
    </div>
    </div>

    <div class="modal" id="senhas" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <div class="container">
    
                        <div class="vh-150 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                            <div class="container">
                                <div class="card bg-white">
                                <div class="card-body p-5">
                                    <form action="callfunc/mudarsenha.php" class="mb-3 mt-md-4" id="form" method="POST"onsubmit="return validarForm()">
                                    <h2 class="fw-bold mb-2 text-uppercase ">Insira os dados</h2>
                                    <div class="mb-3">
                                        <input type="hidden" id="id" name="id_user" value="">
                                        <label for="email" class="form-label ">Senha</label>
                                        <input type="text" class="form-control" id="senha" name="senha" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Confirme a senha</label>
                                        <input type="text" class="form-control" id="senha1" value="">
                                    </div>
                                    <div class="d-grid">
                                        <input class="btn btn-outline-dark" type="submit" value="Mudar senha">
                                    </div>
                                    </form>

                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                            
                        </div>
                    </div>
        </div>
    </div>
    </div>

    <div class="modal" id="overlayModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <div class="container">
    
                        <div class="vh-150 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                            <div class="container">
                                <div class="card bg-white">
                                <div class="card-body p-5">
                                    <form action="" class="mb-3 mt-md-4" id="form">
                                    <h2 class="fw-bold mb-2 text-uppercase ">Insira os dados</h2>
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Cargo</label>
                                        <select name="cargo" class="form-select">
                                            <option value="Usuario" selected>Usuario</option>
                                            <option value="Administrador">Administrador</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Senha</label>
                                        <input type="text" class="form-control" id="senha" name="senha" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Telefone</label>
                                        <input type="number" id="telefone" class="form-control" name="telefone" value="">
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-outline-dark" id="butao">Cadastrar</button>
                                    </div>
                                    </form>

                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                            
                        </div>
                    </div>
        </div>
    </div>
    </div>

<div class="container d-flex justify-content-center justify-content-between align-items-center " style="height:100%; width:100%">
    <div class="row">
        <div class="col-1 d-flex justify-content-center  align-items-center">
            <input type="button" class="btn btn-secondary" onclick="mostrarmodal()" value="Cadastrar novo usuário">
        </div>
        
    </div>
    <div class="row">
    <div class="col-xl d-flex justify-content-center align-items-center">
            <div class="table-responsive" style="max-height: 300px;">
                <?php
                    $draw->exibirusers();
                ?>
            </div>
        </div> 
    </div>
    
</div>

    
</body>
<script src="../../js/jquery.js"></script>
<script>
    function mostrarmodal(){
        $("#overlayModal").modal("show");
    }
    $("#butao").click(function() {
    var isFormValid = true;

    $('input').each(function() {
        if ($(this).val().trim() === '') {
            isFormValid = false;
        }
    });

    if (isFormValid) {
        var dados = $('#form').serialize();

        $.ajax({
            type: "POST",
            url: "../callfunc/inserir.php",
            data: dados,
            success: function(success) {
                window.open("user_reg.php", "_self");
                console.log(success);
            },
            error: function(error) {
                console.log(error);
            }
        });
    } else {
        alert('Por favor complete todos os campos.');
        $("#overlayModal").modal("show");
    }
});

    function verificarapagar(num) {
        if (num == 1){  
                window.open("callfunc/excluiracc.php?id=" + idss,"_self");
            }else {
                console.log("vadia");
                $("#confirmar").modal("hide");
        }
    }

    function excluirconta(id){
        ids = {
            id:id
        };
        idss = id;
        console.log(idss);
        $("#confirmar").modal("show");
    }

    function validarForm(){
    if ($("#senha").val() == $("#senha1").val()) {
        if ($("#senha").val() == ""){
            alert("A senha não pode ser vazia");
            return false;
        }else{
            return true;
        }

    } else {
        alert("As senhas precisam coincidir");
        return false; // Adicionado para indicar que a validação falhou
    }
}

function mudarsenha(id) {
    $("#senhas").modal("show");
    $("#id").val(id);
}

</script>
</html>