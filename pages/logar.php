<?php 
include("conect.php");
$stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE nome = :nome AND senha = :senha"); 
$stmt->execute([':nome' => $nome, ':senha' => $senha]);
$ver = $stmt->fetchColumn();
if ($ver == 0) {
    echo "deu ruim";
}else {
    echo "deu bom";
}
?>