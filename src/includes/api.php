<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    //class referente as funções que alteram algo no banco de dados
    class db {

        //função para se conectar ao banco de dados de acordo com as variavel setadas no arquivo config.php
        public function includevaluesdb($host,$dbname,$user,$password) {
            try {
            
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host.";charset=utf8","".$user."","".$password."");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Caught exception: ' . $e->getMessage();
            }
            
        }
        //no momento em que a class é criada, o codigo de conexão com o banco de dados é rodado
        /*public function __construct() {
            try {
                $this->pdo = new PDO("mysql:dbname=bb;host=localhost;charset=utf8","root","");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Caught exception: ' . $e->getMessage();
            }
        }*/

        //função responsavel por cadastrar o usuario
        public function cadastrouser($nome, $cargo, $senha, $email, $telefone){
            try {
                $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, cargo, senha, email, telefone) VALUES (:nome, :cargo, :senha, :email, :telefone)");
                $result = $stmt->execute([
                    ':nome' => $nome,
                    ':cargo' => $cargo,
                    ':senha' => $senha,
                    ':email' => $email,
                    ':telefone' => $telefone
                ]);
                echo "informações inseridas";
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
                $stmt->execute([':nome' => $nome, ':senha' => md5($senha)]);
                $ver = $stmt->fetchColumn();

                if ($ver == 0) {
                    echo "false";
                }else {
                    echo "true";

                    $stmt = $this->pdo->prepare("SELECT id_user FROM usuarios WHERE nome = :nome AND senha = :senha"); 
                    $stmt->execute([':nome' => $nome, ':senha' => md5($senha)]);
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
        
        //sai da conta
        public function exitacc() {
            session_destroy();

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
                    $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM quests WHERE user_quests = :user AND ong_cat != 7");
                    $stmt->execute([':user' => $userid]);
                    $ver = $stmt->fetchColumn();
                    if ($ver == 0){
                        $date = date('Y-m-d H:i:s');
                        $stmt = $this->pdo->prepare("INSERT INTO quests (user_quests, ong_cat, ong_quests, date_quest) VALUES ($userid,1,0,'$date')");
                        $stmt->execute();
                        return 1;
                    } else {
                        $stmt = $this->pdo->prepare("SELECT ong_cat FROM quests WHERE user_quests = :user AND ong_cat != 7");
                        $stmt->execute([':user' => $userid]);
                        $ver = $stmt->fetchColumn();
                        return $ver;
                    }
                }else if($stt == "status_quest") {
                    $stmt = $this->pdo->prepare("SELECT ong_quests FROM quests WHERE user_quests = :user AND ong_cat != 7");
                    $stmt->execute([':user' => $userid]);
                    $ver = $stmt->fetchColumn();
                    return $ver;
                }else if($stt == "update_cat"){
                    $ver = $this->searchcurrentidquests($userid);
                    $update = $ver + 1;
                    $stmt = $this->pdo->prepare("UPDATE quests SET ong_cat = $update WHERE user_quests = :user AND status_cat != 7");
                    $stmt->execute([':user' => $userid]);
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        //função responsavel por salvar a resposta das questões no momento em que o cara ir pra prox quest
        public function svquests($userid, $cat, $quest, $anw) {   
            try {
                $idquest = $this->searchcurrentidquests($userid);
            
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
            $stmt = $this->pdo->prepare("SELECT id_quest FROM quests WHERE user_quests = :user AND ong_cat != 7");
            $stmt->execute([':user' => $userid]);
            $ver = $stmt->fetchColumn();
            return $ver;
        }

        //passa a categoria para a categoria seguinte e reseta o numero de ong_quests
        public function proxcat($userid, $cat) {
            $idquest = $this->searchcurrentidquests($userid);
            $stmt = $this->pdo->prepare("UPDATE quests SET ong_cat = :cat WHERE user_quests = :user AND ong_cat != 7");
            $stmt->execute([':user' => $userid, ':cat' => $cat]);

            $stmt = $this->pdo->prepare("UPDATE quests SET ong_quests = 0 WHERE id_quest = :idquest");
            $stmt->execute([':idquest' => $idquest]);
            $idquest = $stmt->fetchColumn();
            //header("Location: ../ocorrencia.php");  
        }

        //atualiza ong_quests para salvar a questão que ja foi respondida e continua da tal
        public function updateongquest($userid, $quest) {
            try {
                $idquest = $this->searchcurrentidquests($userid);

                $stmt = $this->pdo->prepare("UPDATE quests SET ong_quests = $quest WHERE id_quest = :idquest");
                $stmt->execute([':idquest' => $idquest]);
                $idquest = $stmt->fetchColumn();
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }      
            
        }        
    }
    
    //class resposavel por escrever as coisas na tela em sua maioria
    class Desenhar {
        private $dados;
        private $perguntas;

        /*
        //conecta no banco de dados
        public function __construct() {
            try {
                $this->pdo = new PDO("mysql:dbname=bb;host=localhost;charset=utf8","root","");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Caught exception: ' . $e->getMessage();
            }
        }*/

        //função antiga para se conectar ao banco de dados de acordo com as variavel setadas no arquivo config.php
        public function includevaluesdb($host,$dbname,$user,$password) {
            try {
                $this->pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $host . ';charset=utf8', $user, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Caught exception: ' . $e->getMessage();
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
                        }elseif ($firstcarc == "$"){
                            echo "<span> <input type='checkbox' name='perg".$input."' id='input$desc' value=''>
                            <label for='input$desc'>" . $this->perguntas[0][$num][$desc + 3] . "</label></span>";
                            $input++;
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
                            
                            echo "<p> $caracs </p>";
                            $extra++;
                        }else if ($firstcarc == "%") {
                            echo "<br>";
                            $extra++;
                        }else {
                    
                        echo "<span> <input type='checkbox' name='perg".$desc."' id='input$desc' value=''>
                        <label for='input$desc'>" . $this->perguntas[0][$num][$desc + 3] . "</label></span>";
                        };
                    }
                } else {

                    echo "erro na sintaxe, verifique novamente o documento $pers";
                    //SELECT NAO ULTILIZADO
                    /*echo "<select name='perg0' id='sim' value='a'>";
                    
                    for ($desc = 0; $desc < $this->perguntas[0][$num][2]; $desc++) {
                        $optionValue = $this->perguntas[0][$num][$desc + 3];
                        echo "<option value='$optionValue'>$optionValue</option>";
                    };
        
                    echo "</select>";
                    */
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

        //lista as ocorrencias enviadas de acordo com o usuario
        public function listocc($userid){
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM quests WHERE user_quests = :user AND ong_cat = 7");
                $stmt->execute([':user' => $userid]);
                
                $id = 0;
                while ($linhas = $stmt->fetch()) {
                    $data = $linhas["date_quest"]; 
                    $idquestt = $linhas['id_quest'];
                    
                    
                    echo "<div id='cart{$id}' class='cursor-pointer bg-danger p-4 border' onclick='openanwsers({$id}, {$idquestt})' class='container'><h2>{$data}</h2></div>";
 
                    
                    $id++;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }    
        }
        

        //listar as contas de usuario
        public function listaacc($userid) {
            $stmt = $this->pdo->prepare("SELECT * FROM quests WHERE id_user = :user AND ong_cat = 7");
            $stmt->execute([':user' => $userid]);
            while( $linhas = $stmt->fetch()) 
            {
                $m = $linhas["id_coisa"]; //nome da coluna xampp
                $n = $linhas["item"];
            }
        }

        public function listanswer($idquest) {
            $stmt = $this->pdo->prepare("SELECT * FROM answers WHERE id_quest = :idquest ");
            $stmt->execute([':idquest' => $idquest]);
            while( $linhas = $stmt->fetch()) 
            {
                $cat = $linhas["cat"]; //nome da coluna xampp
                $answers = $linhas["answer"];

                switch ($cat) {
                    case 1:
                        
                        break;
                    case 2:
                        break;
                    case 3:
                        break;
                    case 4:
                        break;
                    case 5:
                        break;
                    case 6:
                        break;
                    
                }
            }
        }

    }
    
    $draw = new Desenhar();
    $db = new db();
    include "config.php";
?>