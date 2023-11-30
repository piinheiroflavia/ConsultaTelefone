    <?php

    session_start();
    include_once('../config.php');
    include_once('../models/Client.php');


    class RegistroController {

        private $conexao;

        public function __construct($conexao)
        {
        $this->conexao = $conexao;   
        }

        public function registrar() {
            if (isset($_POST['submit'])) {
                

                $nome = $_POST['nome'];
                $sexo = $_POST['sexo'];
                $dataNascimento = $_POST['dataNascimento'];
                $nomeMaterno = $_POST['nomeMaterno'];
                $login = $_POST['login']; 
                $email = $_POST['email'];   
                $cpf = $_POST['cpf'];
                $celular = $_POST['celular'];
                $telefone = $_POST['telefone'];
                $cep = $_POST['cep'];
                $logradouro = $_POST['logradouro'];
                $bairro = $_POST['bairro'];
                $uf = $_POST['uf'];
                $senha = $_POST['senha']; 

           
                $cliente = new Client();

                // Chame o método inserirCliente da instância do objeto
                if ($cliente->inserirCliente($this->conexao, $nome, $sexo, $dataNascimento, $nomeMaterno, $login, $email, $cpf, $celular, $telefone, $cep, $logradouro, $bairro, $uf, $senha)) {
                   
                     // Obtenha o ID do usuário recém-criado
                $id_usuario = $this->conexao->insert_id;

                // Crie uma descrição para o log
                $descricao_log = "Novo usuário registrado: $nome (ID: $id_usuario)";

                // Código para registrar na tabela de log
                $data_log = date('Y-m-d H:i:s');
                $status_log = 'ativo';
                $queryLog = "INSERT INTO log (usuario_id, data_log, status, descricao) VALUES (?, ?, ?, ?)";

                // Use prepared statement para a consulta de inserção
                $stmtLog = $this->conexao->prepare($queryLog);
                
                if ($stmtLog) {
                    $stmtLog->bind_param("ssss", $id_usuario, $data_log, $status_log, $descricao_log);
                    $stmtLog->execute();
                    $stmtLog->close();
                } else {
                    // Lidar com erro na preparação da declaração para a tabela de log
                    die($this->conexao->error);
                }


                    print "<script> location.href='../login';</script>";
                    exit(); 
                } else {

                    error_log("Erro no registro: " . mysqli_error($this->conexao));
                    print "<script> location.href='ErroController.php';</script>";
                }
            }
            
        }
    }

    //cria uma instância da classe RegistroController, passando a conexão como argumento
    $registroController = new RegistroController($conexao);

    //chama o método de registro
    $registroController->registrar();


    ?>


