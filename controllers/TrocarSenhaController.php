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

        public function trocarSenha()
        {
            if(isset($_POST['submit']))
            {
                $email= $_GET['email'];
                $novaSenha = $_POST['novaSenha'];

                $UpSql = "UPDATE usuario set senha = '$novaSenha'
                WHERE email = '$email' ";

                $resultado = $this->conexao->query($UpSql) or die ($this->conexao->error); 

                // Verifique se a atualização foi bem-sucedida (linhas afetadas é maior que 0)
                if ($this->conexao->affected_rows > 0) {
                    // Senha trocada com sucesso
                    echo "Senha trocada!";
                } else {
                    // Erro na troca de senha
                    echo "Erro na troca. Tente novamente.";
                }
            }
        }

    }


// Crie uma instância da classe TrocarSenhaController, passando a conexão como argumento
$trocarSenhaController = new TrocarSenhaController($conexao);

// Chame o método trocarSenha
$trocarSenhaController->trocarSenha();
?>
