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
        public function excluiracc($id) {
            try {
                $stmt = $this->pdo->prepare("DELETE FROM answers WHERE id_user = :id"); 
                $stmt->execute([':id' => $id]);
                $ver = $stmt->fetchColumn();
                $stmt = $this->pdo->prepare("DELETE FROM quests WHERE user_quests = :id"); 
                $stmt->execute([':id' => $id]);
                $ver = $stmt->fetchColumn();
                $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id_user = :id"); 
                $stmt->execute([':id' => $id]);
                $ver = $stmt->fetchColumn();
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        public function mudarsenha($id, $senha) {
            try {
            $stmt = $this->pdo->prepare("UPDATE usuarios SET senha = :senha WHERE id_user = :id"); 
            $stmt->execute([':senha' => $senha,':id' => $id]);
            $ver = $stmt->fetchColumn();
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        }
        public function search($searchTerm) {
            $searchTerm = '%' . $_GET['term'] . '%';

            $sql = "SELECT id_quests FROM answers WHERE answer LIKE :searchTerm";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                echo '<table border="1">
                        <tr>
                            <th>ID Quest</th>
                        </tr>';
                
                        foreach ($results as $result) {
                            echo '<tr><td>' . $result['id_quests'] . '<input type="button" value="Visualizar Ocorrência" onclick="openanswers(' . $result['id_quests'] . ')"></td></tr>';
                        }
                        

                echo '</table>';
            } else {
                echo '<p>Nenhum resultado encontrado.</p>';
            }
        }
        public function modifyacc($id, $data, $tipo){
            switch ($tipo) {
                case 1:
                    $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = :datas WHERE id_user = :id"); 
                    $stmt->execute([':datas' => $data, ':id' => $id]);
                    $ver = $stmt->fetchColumn();
                    break;
                case 2:
                    $stmt = $this->pdo->prepare("UPDATE usuarios SET cargo = :datas WHERE id_user = :id"); 
                    $stmt->execute([':datas' => $data, ':id' => $id]);
                    $ver = $stmt->fetchColumn();
                    break;
                case 3:
                    $stmt = $this->pdo->prepare("UPDATE usuarios SET email = :datas WHERE id_user = :id"); 
                    $stmt->execute([':datas' => $data, ':id' => $id]);
                    $ver = $stmt->fetchColumn();
                    break;
                case 4:
                    $stmt = $this->pdo->prepare("UPDATE usuarios SET telefone = :datas WHERE id_user = :id"); 
                    $stmt->execute([':datas' => $data, ':id' => $id]);
                    $ver = $stmt->fetchColumn();
                    break;
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
                $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE id_user = :nome AND senha = :senha"); 
                $stmt->execute([':nome' => $nome, ':senha' => md5($senha)]);
                $ver = $stmt->fetchColumn();

                if ($ver == 0) {
                    echo "false";
                }else {
                    $stmt = $this->pdo->prepare("SELECT cargo FROM usuarios WHERE id_user = :nome AND senha = :senha"); 
                    $stmt->execute([':nome' => $nome, ':senha' => md5($senha)]);
                    $ver = $stmt->fetchColumn();
                    if ($ver == "Administrador"){
                        $_SESSION['user'] = $nome;
                        echo("adm");
                    }else{
                        $_SESSION['user'] = $nome;
                        echo("user");
                    }

                
                    
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
        public function checkloginadm($id) {
            if (!isset($_SESSION['user'])) {
                header("Location: ../../index.html");
                exit();
            }else {
                $stmt = $this->pdo->prepare("SELECT cargo FROM usuarios WHERE id_user = :nome "); 
                    $stmt->execute([':nome' => $id]);
                    $ver = $stmt->fetchColumn();
                    if ($ver == "Administrador"){
                    }else{
                        header('location: ../php/menu.php');
                    }
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
        public function svquestss($idquest, $cat, $quest, $anw) {   
            try {
                $userid = $_SESSION['user'];
            
                    $stmt = $this->pdo->prepare("DELETE FROM answers WHERE id_quests = :idquests AND cat = :cat AND quest = :quest"); 
                    $stmt->execute([':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest]);
                    $stmt = $this->pdo->prepare("INSERT INTO answers (id_user, id_quests, cat, quest, answer) VALUES (:userid, :idquests, :cat, :quest, :answer) ON DUPLICATE KEY UPDATE answer = :answer");
                    $stmt->execute([':userid' => $userid, ':idquests' => $idquest, ':cat' => $cat, ':quest' => $quest, ':answer' => $anw]); 
                
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

        function mudarnome($nome) {
            $id = $_SESSION['user'];
            $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = :nome WHERE id_user = :idquest");
            $stmt->execute([':nome' => $nome, ':idquest' => $id]);
        }

        function deleteocc($id) {
            try {
                $this->pdo->beginTransaction();
        
                // Delete records from 'answers' table
                $stmt = $this->pdo->prepare("DELETE FROM answers WHERE id_quests = :nome");
                $stmt->execute([':nome' => $id]);
        
                // Delete record from 'quests' table
                $stmt = $this->pdo->prepare("DELETE FROM quests WHERE id_quest = :nome");
                $stmt->execute([':nome' => $id]);
        
                $this->pdo->commit();
            } catch (Exception $e) {
                // An error occurred, rollback the transaction
                $this->pdo->rollBack();
        
                // Throw the exception for centralized error handling
                throw new Exception('Error deleting records: ' . $e->getMessage());
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
                            <label for='input$desc'>" . $caracs . "</label></span>";
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
        public function exibirPerguntass($num, $pers) {
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
                            <label for='input$desc'>" . $caracs . "</label></span>";
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
        
        
        
                $coisas = count($this->perguntas[0]) - 1;
                
                
                    echo '<button type="button" id="proxima">SALVAR</button>';
                
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            
            
        }
    
        //pega as respostas de acordo com a categoria e a questao enviada e a envia ao usuario em um formato de objeto json
        public function loadquests($userid, $cat, $quest) {
            try {
                $stmt = $this->pdo->prepare("SELECT id_quest FROM quests WHERE user_quests = :user AND ong_cat != 7");
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
                return $e->getMessage();
            }
        }
        //pega as respostas de acordo com a categoria e a questao enviada e a envia ao usuario em um formato de objeto json
        public function loadquestss($idquest, $cat, $quest) {
            try {
                
                
                
                    $stmt = $this->pdo->prepare("SELECT answer FROM answers WHERE id_quests = :idquest AND cat = :cat AND quest = :quest");
                    $stmt->execute([':idquest' => $idquest, ':cat' => $cat, ':quest' => $quest]);
                    $ver = $stmt->fetchColumn();
                
                    $respostas = json_decode($ver);

                    return $respostas;
                
            } catch (Exception $e) {
                return $e->getMessage();
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
                    
                    
                    echo "<div id='cart{$id}' class='cursor-pointer bg-danger p-4 border' onclick='openanwsers({$idquestt})' class='container'><h2>{$idquestt}</h2></div>";
 
                    
                    $id++;
                }
                if ($id == 0) {
                    echo("Este usuario nao tem ocorrencias");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }    
        }
        public function listoccadm($userid){
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM quests WHERE user_quests = :user AND ong_cat = 7");
                $stmt->execute([':user' => $userid]);
                
                $id = 0;
                while ($linhas = $stmt->fetch()) {
                    $data = $linhas["date_quest"]; 
                    $idquestt = $linhas['id_quest'];
                    
                    
                    echo "<div id='cart{$id}' class='cursor-pointer bg-danger p-4 border' onclick='openanwsers({$idquestt})' class='container'><h2>{$idquestt}</h2><form action='callfunc/exc.php' method='POST'><input type='hidden' name='id' value='$idquestt'><input type='submit' value='EXCLUIR OCORRENCIA'></form></div>";
 
                    
                    $id++;
                }
                if ($id == 0) {
                    echo("Este usuario nao tem ocorrencias");
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
            $stmt = $this->pdo->prepare("SELECT * FROM answers WHERE id_quests = :idquest ORDER BY quest ASC");
            $stmt->execute([':idquest' => $idquest]);
        
            // Arrays para armazenar respostas em categorias
            $cat1 = array();
            $cat2 = array();
            $cat3 = array();
            $cat4 = array();
            $cat5 = array();
            $cat6 = array();
        
            while ($linhas = $stmt->fetch()) {
                $cat = $linhas["cat"]; // nome da coluna
                $answers = $linhas["answer"];
        
                // Adiciona a resposta à categoria correspondente
                switch ($cat) {
                    case 1:
                        array_push($cat1, $answers);
                        break;
                    case 2:
                        array_push($cat2, $answers);
                        break;
                    case 3:
                        array_push($cat3, $answers);
                        break;
                    case 4:
                        array_push($cat4, $answers);
                        break;
                    case 5:
                        array_push($cat5, $answers);
                        break;
                    case 6:
                        array_push($cat6, $answers);
                        break;
                }
            }
        
            // Agrupa as categorias em um array associativo
            $ans = array(
                '1' => $cat1,
                '2' => $cat2,
                '3' => $cat3,
                '4' => $cat4,
                '5' => $cat5,
                '6' => $cat6
            );
        
            // Codifica o array associativo em JSON
            $jsonans = json_encode($ans);
        
            return $jsonans;
        }
        
        

        //funções nao ultilizadas no processo de exibição das perguntas pq sao feitas de maneira burra
        /*
        public function juntarpergs() {
            $dados1 = file_get_contents("../src/json/perguntas1.json");
            $dados2 = file_get_contents("../src/json/perguntas2.json");
            $dados3 = file_get_contents("../src/json/perguntas3.json");
            $dados4 = file_get_contents("../src/json/perguntas4.json");
            $dados5 = file_get_contents("../src/json/perguntas5.json");
            $dados6 = file_get_contents("../src/json/perguntas6.json");

            $cat1 = [];
            $cat1[1] = json_decode($dados1);
            $cc = json_encode($cat1);
            return $cat1;
        }
        
        public function juntarpergs() {
            $dados1 = file_get_contents("../src/json/perguntas1.json");
            $dados2 = file_get_contents("../src/json/perguntas2.json");
            $dados3 = file_get_contents("../src/json/perguntas3.json");
            $dados4 = file_get_contents("../src/json/perguntas4.json");
            $dados5 = file_get_contents("../src/json/perguntas5.json");
            $dados6 = file_get_contents("../src/json/perguntas6.json");
        
            $cat1 = [];
            $cat1[1] = json_decode($dados1);
            $cc = json_encode($cat1);
        
            $jsCode = "var mergedArray = " . $cc . ";"; // Cria uma variável 'mergedArray' no JavaScript
        
            file_put_contents("merged.js", $jsCode); // Salva o código JavaScript em um arquivo .js
            return $cat1;
        }
        */
        public function exibirusers(){
            try {
                $comando = $this->pdo->prepare("SELECT * FROM usuarios WHERE nome <> :nome");
                $comando->bindParam(":nome", $_SESSION['user']);
                $comando->execute(); 
                $linhas = $comando->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <table class="table  table-striped table-bordered">
                
                <tr>
                    <td><b>ID</b></td>
                    <td><b>NOME</b></td>
                    <td><b>CARGO</b></td>
                    <td><b>EMAIL</b></td>
                    <td><b>TELEFONE</b></td>
                    <td><b>SENHA</b></td>
                    <td><b>VER OCORRENCIAS</b></td>
                    <td><b>EDITAR CONTA</b></td>
                    <td><b>EXCLUIR CONTA</b></td>
                </tr>
                <?php
            foreach ($linhas as $l) {?>
                <tr>
                    <td><?=$l['id_user']?></td>
                    <td><?=$l['nome']?></td>
                    <td><?=$l['cargo']?></td>
                    <td><?=$l['email']?></td>
                    <td><?=$l['telefone']?></td>
                    <td>
                        
                        <input type='submit' value='MUDAR SENHA' onclick="mudarsenha(<?=$l['id_user']?>)">

                    </td>
                    <td>
                        <form action='verocc.php' method='post'>
                            <input type='hidden' name='userid' value='<?=$l['id_user']?>'>
                            <input type='submit' value='Ver Ocorrências'>
                        </form>
                    </td>
                    <td>
                        <form action='editaracc.php' method='post'>
                                <input type='hidden' name='userid' value='<?=$l['id_user']?>'>
                                <input type='submit' value='Editar Conta' >
                        </form>
                            
                        </form>
                    </td>
                    <td>
                        <input type='submit' value='EXCLUIR CONTA' onclick="excluirconta(<?=$l['id_user']?>)">
                    </td>
                </tr>
                <?php

        
                //echo "ID: $id, Nome: $nome, Email: $email, Cargo: $cargo, Telefone: $telefone <form action='verocc.php' method='post'><input type='hidden' name='userid' value='$id'><input type='submit' value='Ver Ocorrências'></form><br>";
            }?>
            
            </table>
            <?php
            } catch (Exception $e) {
                echo $e->getMessage();
            }    
            
        }
        
    }
    
    $draw = new Desenhar();
    $db = new db();
    include "config.php";
?>