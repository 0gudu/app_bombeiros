<?php
    session_start();
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
        public function login($nome, $senha ) {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE nome = :nome AND senha = :senha"); 
            $stmt->execute([':nome' => $nome, ':senha' => $senha]);
            $ver = $stmt->fetchColumn();
            if ($ver == 0) {
                echo "false";
            }else {
                echo "true";
                $stmt = $this->pdo->prepare("SELECT id_user FROM usuarios WHERE nome = :nome AND senha = :senha"); 
                $stmt->execute([':nome' => $nome, ':senha' => $senha]);
                $ver = $stmt->fetchColumn();
                $_SESSION['user'] = $ver;
            }
        }

        public function idtoname($id){
            $stmt = $this->pdo->prepare("SELECT nome FROM usuarios WHERE id_user = :id"); 
            $stmt->execute([':id' => $id]);
            $ver = $stmt->fetchColumn();
            return $ver;
        }

    }

    class Desenhar {
        private $dados;
        private $perguntas;
    
        public function __construct() {
            $this->pdo = new PDO("mysql:dbname=bb;host=localhost;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public function exibirPerguntas($num, $pers) {
            $this->dados = file_get_contents($pers);
            $this->perguntas = json_decode($this->dados, true);
            $per = $num + 1;
    
            echo "Pergunta número $per <br><br>";
            echo $this->perguntas[0][$num][0];
    
            if ($this->perguntas[0][$num][1] == "escreve") {
                for ($desc = 0; $desc < $this->perguntas[0][$num][2]; $desc++) {
                    echo "<input type='text' placeholder='" . $this->perguntas[0][$num][$desc + 3] . "'>";
                };
            } elseif ($this->perguntas[0][$num][1] == "check") {
                for ($desc = 0; $desc < $this->perguntas[0][$num][2]; $desc++) {
                    echo "<span> <input type='checkbox' id='penis$desc'>
                    <label for='penis$desc'>" . $this->perguntas[0][$num][$desc + 3] . "</label></span>";
                };
            } else {
                echo "<select name='sim' id='sim'>";
    
                for ($desc = 0; $desc < $this->perguntas[0][$num][2]; $desc++) {
                    $optionValue = $this->perguntas[0][$num][$desc + 3];
                    echo "<option value='$optionValue'>$optionValue</option>";
                };
    
                echo "</select>";
            };
    
    
            if ($num != 0) {
                echo "<button id='anterior'>ant</button>";
            };
    
            $coisas = count($this->perguntas[0]) - 1;
            
            if ($coisas != $num) {
                echo '<button id="proxima">prox</button>';
            } else {
                echo '<button id="end">acabar</button>';
            };
        }
    }
    
    
    $draw = new Desenhar();
    $db = new db();
?>