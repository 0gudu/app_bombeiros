<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark z-index-1">
        <div class="container-fluid">
          <a class="navbar-brand" href="../php/menu.php"><?php echo $db->idtoname($_SESSION['user']);?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-secondary" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="../php/menu.php">Menu Principal</a>
              <a class="nav-link" href="../php/ocorrencia.php">Continuar/Novo Questionario</a>
              <a class="nav-link" href="../php/ocorrencia.php">Editar Perfil</a>
              <a class="nav-link" href="../php/callfunc/sair.php">Sair</a>
            </div>
          </div>
        </div>
      </nav>
</body>
</html>