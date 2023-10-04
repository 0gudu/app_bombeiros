<?php
    session_start();
    
    //class referente as funções que alteram algo no banco de dados
    class db {

        //no momento em que a class é criada, o codigo de conexão com o banco de dados é rodado
        public function __construct() {
            try {
                $this->pdo = new PDO("mysql:dbname=bb;host=localhost;charset=utf8", "root", "");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }

        //função responsavel por cadastrar o usuario
        public function cadastrouser($nome, $senha, $email, $telefone){
            try {
                $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, senha, email, telefone) VALUES (:nome, :senha, :email, :telefone)");
                $result = $stmt->execute([
                    ':nome' => $nome,
                    ':senha' => $senha,
                    ':email' => $email,
                    ':telefone' => $telefone
                ]);
            } catch (Exception $e) {
                echo 'Caught custom exception: ',  $e->getMessage(), "\n";
            }
            
        }

        //função para checar se o usuario existe, dando as informações como nome e senha para verificação
        public function checkuser($nome, $senha) {
            try {
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
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            
        
        }

        //função responsavel por logar na conta
        public function login($nome, $senha ) {
            try {
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
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            
        }

        //função responsavel por converter a id do usuario para o nome do usuario
        public function idtoname($id){
            try {
                $stmt = $this->pdo->prepare("SELECT nome FROM usuarios WHERE id_user = :id"); 
                $stmt->execute([':id' => $id]);
                $ver = $stmt->fetchColumn();

                $nome = htmlspecialchars($ver);

                return $nome;
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            
        }

        //função responsavel por validar o login
        public function checklogin() {
            if (!isset($_SESSION['user'])) {
                header("Location: ../../index.html");
                exit();
            }
        }
        
        //função velha com um erro que n tenho cerebro pra resolver, ams na teoria era para n ter que ficar logando se o cara já logou
        public function autologin() {
            if(isset($_SESSION['user'])) {
                header("Location: src/php/menu.php");
                exit();
            }
        }

        //função para conseguir requisitar diversos status das respostas dos questionarios
        //como a questão atual que o cara esta respondendo e a categoria
        //tambem serve para criar a tabela do questinario que o cara esta repondendo caso o cara ainda n tenha criado
        public function sttquest($userid, $stt) {
            try {
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
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }

        //função responsavel por salvar a resposta das questões no momento em que o cara ir pra prox quest
        public function svquests($userid, $cat, $quest, $anw) {   
            try {
                $stmt = $this->pdo->prepare("SELECT id_quest FROM quests WHERE user_quests = :user AND ong_cat != 5");
                $stmt->execute([':user' => $userid]);
                $idquest = $stmt->fetchColumn();
            
                
            
                $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM answers WHERE id_user = :userid AND id_quests = :idquests AND cat = :cat AND quest = :quest"); 
                $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest]);
                $cc = $stmt->fetchColumn();
            
                if ($cc > 0) {
                    $stmt = $this->pdo->prepare("DELETE FROM answers WHERE id_user = :userid AND id_quests = :idquests AND cat = :cat AND quest = :quest"); 
                    $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest]);
                    $stmt = $this->pdo->prepare("INSERT INTO answers (id_user, id_quests, cat, quest, answer) VALUES (:userid, :idquests, :cat, :quest, :answer) ON DUPLICATE KEY UPDATE answer = :answer");
                    $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest, ':answer' => $anw]); 
                } else {
                    $stmt = $this->pdo->prepare("INSERT INTO answers (id_user, id_quests, cat, quest, answer) VALUES (:userid, :idquests, :cat, :quest, :answer) ON DUPLICATE KEY UPDATE answer = :answer");
                    $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest, ':answer' => $anw]); 
                }
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }      
            
        }
        
        //atravez da entrada da id do usuario, te retorna a id do questionario que atualmente esta sendo repondido
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

    //class resposavel por escrever as coisas na tela em sua maioria
    class Desenhar {
        private $dados;
        private $perguntas;
        //conecta no banco de dados
        public function __construct() {
            try {
                $this->pdo = new PDO("mysql:dbname=bb;host=localhost;charset=utf8", "root", "");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            
            
        }

        //exibe as perguntas de acordo com o arquivo json e o numero da pergunta
        public function exibirPerguntas($num, $pers) {
            try {
                $this->dados = file_get_contents($pers);
                $this->perguntas = json_decode($this->dados, true);
                $per = $num + 1;
        
                echo "Pergunta número $per <br><br>";
                echo $this->perguntas[0][$num][0];
        
                if ($this->perguntas[0][$num][1] == "escreve") {
                    $extra = 0;
                    $input = 0;
                    for ($desc = 0; $desc < ($this->perguntas[0][$num][2] + $extra); $desc++) {
                        $caracs = $this->perguntas[0][$num][$desc + 3];
                        $firstcarc = $caracs[0];
                        $caracs = substr($caracs, 1);
                        if ($firstcarc == "&") {
                            echo "<p> $caracs </p>";
                            $extra++;
                            $input--;
                        }elseif ($firstcarc == "%") {
                            echo "<br>";
                            $extra++;
                            $input--;
                        }else
                            echo "<input type='text' id='perg".$input."' placeholder='" . $this->perguntas[0][$num][$desc + 3] . "' name='perg".$input."' placeholder='" . $this->perguntas[0][$num][$desc + 3] . "' value=''>";
                            $input++;
                            
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
                    
                        echo "<span> <input type='checkbox' name='perg".$desc."' id='penis$desc' value=''>
                        <label for='penis$desc'>" . $this->perguntas[0][$num][$desc + 3] . "</label></span>";
                        };
                    }
                } else {
                    echo "<select name='perg0' id='sim' value='a'>";
                    
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
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            
            
        }
    
        //pega as respostas de acordo com a categoria e a questao enviada e a envia ao usuario em um formato de objeto json
        public function loadquests($userid, $cat, $quest) {
            try {
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
                
                    $respostas = json_decode($ver);

                    return $respostas;
                }else {
                    return 0;
                }
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }
    
    $draw = new Desenhar();
    $db = new db();
?>