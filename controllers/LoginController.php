<?php

session_start();
// Estabeleça a conexão com o banco de dados aqui
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/../models/Client.php');

class LoginController {

    //Passar $conexao como um parâmetro para a função login
    private $conexao; // Adicione uma propriedade para armazenar a conexão, 
    //privada, ela só pode ser acessada dentro da própria classe

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function login() {
        if (isset($_POST['submit'])) {
            
            //inicio do codigo para logar o usuario
            if (empty($_POST) or (empty($_POST['login']) or (empty($_POST['senha'])))) {
                print "<script> console.log('logado');</script>";
            }

            //dados do formulário de login
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $nome = "";
            $nomemae = "";
            $tipoUser = "";
            $data_nasc = "";
            $email = "";
            $cpf = "";
            $celular = "";
            $telefone = "";
            $cep = "";
            $logradouro = "";
            $status = "";
            // Consulta SQL para o login
            $sql = "SELECT * FROM usuario 
                    WHERE login = '$login' 
                    AND senha = '$senha'";

            //this faz a referência a propriedade conexao
            $resultado = $this->conexao->query($sql) or die($this->conexao->error);

            //transforma o var resultado em uma rede de objeto
            $row = $resultado->fetch_Object();
            $qtd = $resultado->num_rows;

            // Verificar se a consulta retornou alguma linha
            if ($qtd > 0) {

                $usuario_id = $row->id_usuario;
                $data_log = date('Y-m-d H:i:s');
                $status_log = 'ativo';
                $descricao_log = "Usuário foi logado.";

                $queryLog = "INSERT INTO log (usuario_id, data_log, status, descricao) VALUES (?, ?, ?, ?)";
                
                // Use prepared statement para a consulta de inserção
                $stmtLog = $this->conexao->prepare($queryLog);
                $stmtLog->bind_param("ssss", $usuario_id, $data_log, $status_log, $descricao_log);
                $stmtLog->execute();

                // Atualize o status na tabela de usuários
                $queryUpdateStatus = "UPDATE usuario SET status = 'ativo' WHERE id_usuario = ?";
                $stmtUpdateStatus = $this->conexao->prepare($queryUpdateStatus);
                $stmtUpdateStatus->bind_param("i", $usuario_id);
                $stmtUpdateStatus->execute();

                $usuario_id = $row->id_usuario;
                $nome = $row->nome_usuario;
                $nomemae = $row->nome_materno;
                $tipoUser = $row->tipoUser;
                $data_nasc = $row->data_nasc;
                $email = $row->email;
                $cpf = $row->cpf;
                $celular = $row->celular;
                $telefone = $row->telefone;
                $cep = $row->cep;
                $logradouro = $row->logradouro;
                $status = $row->status;

            
                    //se o usuario for tipo admin cria sessao e adiciona role admin
                if($tipoUser === "admin"){
                    
                    $descricao_log = "Admin $nome foi logado.";
                    $_SESSION['usuario_id'] = $usuario_id;
                    $_SESSION["login"] = $login;
                    $_SESSION["nome"] = $nome;
                    $_SESSION["nomemae"] = $nomemae;
                    $_SESSION["tipoUser"] = $tipoUser;
                    $_SESSION['data_nasc'] = $data_nasc;
                    $_SESSION['email'] = $email;
                    $_SESSION['cpf']= $cpf;
                    $_SESSION['celular']= $celular;
                    $_SESSION['telefone']= $telefone;
                    $_SESSION['cep']= $cep;
                    $_SESSION['logradouro']= $logradouro;
                    $_SESSION['status']= $status;
                    
                    $_SESSION['role'] = 'admin';
                        print "<script> location.href='../dashboard'</script>";  
                
                        // $_SESSION['msg'] = "<p style='color: #ff0000'>login realizado com sucesso!</p>";
                        // return ["mensagem" => "login realizado com sucesso"];
                }else{
                    $_SESSION["login_user"] = $login;
                    // $_SESSION['msg'] = "<p style='color: #ff0000'>login realizado com sucesso!</p>";
                    // return ["mensagem" => "login realizado com sucesso"];
                  print "<script> location.href='../2FA'</script>";                  
                }
                
                if (!$stmtLog->execute()) {
                    die('Erro na execução da consulta: ' . $stmtLog->error);
                }

            } else {

                $_SESSION["login_error"] = "Dados inválidos. Tente novamente.";
                print "<script> location.href='../login';</script>";
            }
        }
    }

}



// Crie uma instância da classe LoginController, passando a conexão como argumento
$loginController = new LoginController($conexao);

// Chame o método login
$loginController->login();

?>
