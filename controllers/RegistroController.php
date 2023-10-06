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
            //$sexo = $_POST['sexo'];
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


            // Crie uma instância da classe Client
            $cliente = new Client();

            // Chame o método inserirCliente da instância do objeto
            if ($cliente->inserirCliente($this->conexao, $nome, $dataNascimento, $nomeMaterno, $login, $email, $cpf, $celular, $telefone, $cep, $logradouro, $bairro, $uf, $senha)) {
                // Redirecione para uma página de sucesso ou exiba uma mensagem
                echo "Registro bem-sucedido!";
            } else {
                // Exiba uma mensagem de erro ou redirecione para uma página de erro
                echo "Erro no registro.";
            }
        }
        
    }
}

//cria uma instância da classe RegistroController, passando a conexão como argumento
$registroController = new RegistroController($conexao);

//chama o método de registro
$registroController->registrar();


/*
$this->conexao é uma referência à propriedade conexao da classe LoginController. O uso de $this em uma classe permite acessar as propriedades e métodos dessa classe.

Quando cria uma instância da classe LoginController usando $loginController = new LoginController($conexao);, a conexão passada como argumento $conexao é armazenada na propriedade $this->conexao. Isso significa que pode usar $this->conexao em qualquer lugar dentro dos métodos da classe LoginController para acessar a conexão com o banco de dados.
*/

?>


