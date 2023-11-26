    <?php

    session_start();

    // incluir a conexão com o banco de dados aqui
    include_once('../config.php');
    include_once('../models/Client.php');


    class RegistroController {

        //só pode ser acessada dentro da classe
        private $conexao;

        public function __construct($conexao)
        {
        $this->conexao = $conexao;   
        }

        public function registrar() {
            if (isset($_POST['submit'])) {
                
                //dados do formulário de registro
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

                // // Gerar um sal único
                // $sal = bin2hex(random_bytes(16)); // Sal de 128 bits (16 bytes)

                // // Concatenar o sal à senha
                // $senhaComSal = $senha . $sal;

                // // Aplicar a função hash (use um algoritmo seguro como bcrypt ou Argon2 se possível)
                // $senhaHash = password_hash($senhaComSal, PASSWORD_BCRYPT);


                // Crie uma instância da classe Client
                $cliente = new Client();

                // Chame o método inserirCliente da instância do objeto
                if ($cliente->inserirCliente($this->conexao, $nome, $sexo, $dataNascimento, $nomeMaterno, $login, $email, $cpf, $celular, $telefone, $cep, $logradouro, $bairro, $uf, $senha)) {
                    // Redirecione para uma página de sucesso ou exiba uma mensagem
                    //echo "Registro bem-sucedido!";
                    print "<script> location.href='../login';</script>";
                    exit(); 
                } else {
                    // Exiba uma mensagem de erro ou redirecione para uma página de erro
                    //echo "Erro no registro.";
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


