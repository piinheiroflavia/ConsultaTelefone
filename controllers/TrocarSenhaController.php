<?php
session_start();

include_once('../config.php');
include_once('../models/Client.php');

class TrocarSenhaController
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    public function trocarSenhaVerificarEmail()
    {
        if (isset($_POST['submit'])) {
            $email = $this->conexao->real_escape_string($_POST['email']);
            $query = "SELECT id_usuario, nome_usuario FROM usuario WHERE email = '$email'";

            // Executar a consulta SQL
            $result = $this->conexao->query($query);
          
            if (!$result) {
                // Lidar com erro na consulta
                die($this->conexao->error);
            }

            if ($result->num_rows == 0) {
                $_SESSION['mensagem_UpSenha'] = "O e-mail informado não existe no banco de dados.";

                
                header("Location: ../EnviarEmail");
                exit(); // Email não existe, redireciona imediatamente
            } else {
                $usuario = $result->fetch_assoc();
                $id_usuario = $usuario['id_usuario'];
                $nome_usuario = $usuario['nome_usuario'];
                
                $_SESSION['mensagem_UpSenha'] = "O e-mail informado existe no banco de dados.";
                $_SESSION['email_existe'] = true;
                header("Location: ../views/atualizarSenha.php?email=" . urlencode($email) . "&id=" . urlencode($id_usuario) . "&nome_usuario=" . urlencode($nome_usuario));
                exit(); // Email existe, redireciona imediatamente
            }
        }
    }


 }

// Crie uma instância da classe TrocarSenhaController, passando a conexão como argumento
$trocarSenhaController = new TrocarSenhaController($conexao);

// Se houver uma ação, execute-a
if (isset($_GET['acao'])) {
    if ($_GET['acao'] == 'verificarEmail') {
        $_SESSION['email_existe'] = $trocarSenhaController->trocarSenhaVerificarEmail();
    } elseif ($_GET['acao'] == 'trocarSenha') {
        //$trocarSenhaController->trocarSenha();
    }
}
?>
