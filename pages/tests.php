<?php
    class db {

        public function __construct() {
            $this->pdo = new PDO("mysql:dbname=bb;host=localhost;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public function cadastrouser($nome, $senha, $email, $telefone){
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, senha, email, telefone) VALUES (:nome, :senha, :email, :telefone)");
            $result = $stmt->execute([
            ':nome' => $nome,
            ':senha' => $senha,
            ':email' => $email,
            ':telefone' => $telefone
        ]);
            return "cu";
        }

        public function checkuser($nome, $senha) {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE nome = :nome AND senha = :senha"); 
            $stmt->execute([':nome' => $nome, ':senha' => $senha]);
            $ver = $stmt->fetchColumn();
            if ($ver == 0) {
                echo "false";
            }else {
                echo "true";
            }
            
        }
    }

    $db = new db();
?>