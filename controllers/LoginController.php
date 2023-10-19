<?php

session_start();
// Estabeleça a conexão com o banco de dados aqui
include_once('config.php');
include_once('models/Client.php');

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
                print "<script> location.href='login.html';</script>";
            }

            //dados do formulário de login
            $login = $_POST['login'];
            $senha = $_POST['senha'];

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
                // Usuário existe e as credenciais são válidas, permita o acesso
                //echo "Login bem-sucedido!";
                $_SESSION["login"] = $login;
                $_SESSION["nome"] = $row->nome_usuario;
                $_SESSION["tipoUser"] = $row->tipoUser;

                print "<script> location.href='../?pagina'</script>";
            } else {
                //echo "Credenciais inválidas. Tente novamente.";
                //print "<script>alert('Credenciais inválidas. Tente novamente.')</script>";
                
                $_SESSION["login_error"] = "Dados inválidas. Tente novamente.";
                print "<script> location.href='../views/login.php';</script>";
            }
        }
    }
}

// Crie uma instância da classe LoginController, passando a conexão como argumento
$loginController = new LoginController($conexao);

// Chame o método login
$loginController->login();

?>
