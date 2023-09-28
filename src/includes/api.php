<?php
    session_start();
    
    //class referente as funções que alteram algo no banco de dados
    class db {

        //no momento em que a class é criada, o codigo de conexão com o banco de dados é rodado
        public function __construct() {
            $this->pdo = new PDO("mysql:dbname=bb;host=localhost;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        //função responsavel por cadastrar o usuario
        public function cadastrouser($nome, $senha, $email, $telefone){
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, senha, email, telefone) VALUES (:nome, :senha, :email, :telefone)");
            $result = $stmt->execute([
            ':nome' => $nome,
            ':senha' => $senha,
            ':email' => $email,
            ':telefone' => $telefone
        ]);
        }

        //função para checar se o usuario existe, dando as informações como nome e senha para verificação
        public function checkuser($nome, $senha) {
            //verifica se existe na tabela com as mesmo nome e senha 
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE nome = :nome AND senha = :senha"); 
            $stmt->execute([':nome' => $nome, ':senha' => $senha]);
            $ver = $stmt->fetchColumn();
            //retorna se existe ou não
            if ($ver == 0) {
                echo "false";
            }else {
                echo "true";
            }
        
        }

        //função responsavel por logar na conta
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

        //função responsavel por converter a id do usuario para o nome do usuario
        public function idtoname($id){
            $stmt = $this->pdo->prepare("SELECT nome FROM usuarios WHERE id_user = :id"); 
            $stmt->execute([':id' => $id]);
            $ver = $stmt->fetchColumn();

            $nome = htmlspecialchars($ver);

            return $nome;
        }

        //função responsavel por validar o login
        public function checklogin() {
            if (!isset($_SESSION['user'])) {
                header("Location: ../../index.html");
                exit();
            }
        }
        

        public function autologin() {
            if(isset($_SESSION['user'])) {
                header("Location: src/php/menu.php");
                exit();
            }
        }

        public function sttquest($userid, $stt) {
            if ($stt == "status_cat"){
                $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM quests WHERE user_quests = :user AND ong_cat != 5");
                $stmt->execute([':user' => $userid]);
                $ver = $stmt->fetchColumn();
                if ($ver == 0){
                    $stmt = $this->pdo->prepare("INSERT INTO quests (user_quests, ong_cat, ong_quests) VALUES ($userid,1,0)");
                    $stmt->execute();
                    return 1;
                } else {
                    $stmt = $this->pdo->prepare("SELECT ong_cat FROM quests WHERE user_quests = :user AND ong_cat != 5");
                    $stmt->execute([':user' => $userid]);
                    $ver = $stmt->fetchColumn();
                    return $ver;
                }
            }else if($stt == "status_quest") {
                $stmt = $this->pdo->prepare("SELECT ong_quests FROM quests WHERE user_quests = :user AND ong_cat != 5");
                $stmt->execute([':user' => $userid]);
                $ver = $stmt->fetchColumn();
                return $ver;
            }else if($stt == "update_cat"){
                $stmt = $this->pdo->prepare("SELECT ong_cat FROM quests WHERE user_quests = :user AND ong_cat != 5");
                $stmt->execute([':user' => $userid]);
                $ver = $stmt->fetchColumn();
                $update = $ver + 1;
                $stmt = $this->pdo->prepare("UPDATE quests SET ong_cat = $update WHERE user_quests = :user AND status_cat != 5");
                $stmt->execute([':user' => $userid]);
            }
            
        }

        public function svquests($userid, $cat, $quest, $answers) {

            $userid = filter_var($userid, FILTER_VALIDATE_INT);
            $cat = filter_var($cat, FILTER_VALIDATE_INT);
            $quest = filter_var($quest, FILTER_VALIDATE_INT);

            if (!$userid || !$cat || !$quest) {
                return;
            }
            $stmt = $this->pdo->prepare("SELECT id_quest FROM quests WHERE user_quests = :user AND ong_cat != 5");
            $stmt->execute([':user' => $userid]);
            $idquest = $stmt->fetchColumn();

            $anw = serialize($answers);
            $stmt = $this->pdo->prepare("SELECT COUNT(*)FROM answers WHERE id_user = :userid AND id_quests = :idquests AND cat = :cat AND quest = :quest"); 
            $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest, ':answer' => $anw]);
            $cc = $stmt->fetchColumn();
            if ($cc > 0){
                $stmt = $this->pdo->prepare("SELECT COUNT(*)FROM answers WHERE id_user = :userid AND id_quests = :idquests AND cat = :cat AND quest = :quest"); 
                $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest, ':answer' => $anw]);
            }else {
                $stmt = $this->pdo->prepare("INSERT INTO answers(id_user, id_quests, cat, quest, answer) VALUES (:userid, :idquests, :cat, :quest, :answer)"); 
                $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest, ':answer' => $anw]);
            }
       
        }

        public function searchcurrentidquests($userid) {
            $stmt = $this->pdo->prepare("SELECT id_quest FROM quests WHERE user_quests = :user AND ong_cat != 5");
            $stmt->execute([':user' => $userid]);
            $ver = $stmt->fetchColumn();
            return $ver;
        }

        public function proxcat($userid, $cat) {
            $stmt = $this->pdo->prepare("UPDATE quests SET ong_cat = :cat WHERE user_quests = :user AND ong_cat != 5");
            $stmt->execute([':user' => $userid, ':cat' => $cat]);
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
                $extra = 0;
                for ($desc = 0; $desc < ($this->perguntas[0][$num][2] + $extra); $desc++) {
                    $caracs = $this->perguntas[0][$num][$desc + 3];
                    $firstcarc = $caracs[0];
                    $caracs = substr($caracs, 1);
                    if ($firstcarc == "&") {
                        echo "<p> $caracs </p>";
                        $extra++;
                    }elseif ($firstcarc == "%") {
                        echo "<br>";
                        $extra++;
                    }else
                        echo "<input type='text' name='perg".$desc."' placeholder='" . $this->perguntas[0][$num][$desc + 3] . "'>";
                    };
                    
                
            } elseif ($this->perguntas[0][$num][1] == "check") {
                $extra = 0;
                for ($desc = 0; $desc < ($this->perguntas[0][$num][2] + $extra); $desc++) {
                    $caracs = $this->perguntas[0][$num][$desc + 3];
                    $firstcarc = $caracs[0];
                    $caracs = substr($caracs, 1);
                    if ($firstcarc == "&") {
                        
                        echo "<p> $caracs <p>";
                        $extra++;
                    }else if ($firstcarc == "%") {
                        echo "<br>";
                        $extra++;
                    }else {
                
                    echo "<span> <input type='checkbox' name='perg".$desc."' id='penis$desc'>
                    <label for='penis$desc'>" . $this->perguntas[0][$num][$desc + 3] . "</label></span>";
                    };
                }
            } else {
                echo "<select name='sim' name='perg1' id='sim'>";
                
                for ($desc = 0; $desc < $this->perguntas[0][$num][2]; $desc++) {
                    $optionValue = $this->perguntas[0][$num][$desc + 3];
                    echo "<option value='$optionValue'>$optionValue</option>";
                };
    
                echo "</select>";
            };
    
    
            if ($num != 0) {
                echo '<button type="button" id="anterior">ant</button>';
            };  
    
            $coisas = count($this->perguntas[0]) - 1;
            
            if ($coisas != $num) {
                echo '<button type="button" id="proxima">prox</button>';
            } else {
                echo '<button type="button" id="end">acabar</button>';
            };
        }
    
    
        public function loadquests($file, $userid, $cat, $quest) {
            $stmt = $this->pdo->prepare("SELECT id_quest FROM quests WHERE user_quests = :user AND ong_cat != 5");
            $stmt->execute([':user' => $userid]);
            $idquest = $stmt->fetchColumn();
            

            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM answers WHERE id_user = :user AND id_quests = :idquest AND cat = :cat AND quest = :quest");
            $stmt->execute([':user' => $userid, ':idquest' => $idquest, ':cat' => $cat, ':quest' => $quest]);
            $temresposta = $stmt->fetchColumn();
            
            if ($temresposta > 0) {
                $stmt = $this->pdo->prepare("SELECT answer FROM answers WHERE id_user = :user AND id_quests = :idquest AND cat = :cat AND quest = :quest");
                $stmt->execute([':user' => $userid, ':idquest' => $idquest, ':cat' => $cat, ':quest' => $quest]);
                $ver = $stmt->fetchColumn();
            
                $respostas = unserialize($ver);

                return $respostas;
            }else {
                return 0;
            }
            
        }
    }
    
    $draw = new Desenhar();
    $db = new db();
?>