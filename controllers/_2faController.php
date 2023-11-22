<?php


// Estabeleça a conexão com o banco de dados aqui
include_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/../models/_2fa.php');
require_once(__DIR__ . '/../models/user.php');

class _2faController
{

    public function login_2fa()
    {
        
        session_destroy();
        if (isset($_POST)) {

            //inicio do codigo para logar o usuario
            //if (empty($_POST) or (empty($_POST['login']) or (empty($_POST['senha'])))) {
            //  print "<script> console.log('logado');</script>";
            //}

            $model_user = new user;
            $dados_usuario = $model_user->select_usuario($_POST["login_2fa"]);
            $tabela_usuario = $dados_usuario[0];

            //dados do formulário de login
            $login = $tabela_usuario['login'];
            $nome = $tabela_usuario['nome_usuario'];
            $nomemae = $tabela_usuario['nome_materno'];
            $tipoUser = $tabela_usuario['tipoUser'];
            $data_nasc = $tabela_usuario['data_nasc'];
            $email = $tabela_usuario['email'];
            $cpf = $tabela_usuario['cpf'];
            $celular = $tabela_usuario['celular'];
            $telefone = $tabela_usuario['telefone'];
            $cep = $tabela_usuario['cep'];
            $logradouro = $tabela_usuario['logradouro'];
            $status = $tabela_usuario['status'];


            //informaçoes vinda do login 
            // $qtd = $_POST;

            // Verificar se a consulta de POST vinda do login teve resultado
            //if ($qtd > 0) {


            //se o usuario for tipo admin cria sessao e adiciona role admin
            if ($tipoUser === "comun") {
                $pergunta = $_POST['pergunta_2fa'];
                $resposta = $_POST['resposta_2fa'];


                if ($pergunta == 'Qual o nome da Mãe?') {
                    $resposta_certa =  $nomemae;
                }
                if ($pergunta == 'Digite seu Cep?') {
                    $resposta_certa =  $cep;
                }
                if ($pergunta == 'Digite sua data de nascimento?') {
                    $resposta_certa = $data_nasc;
                }
                if ($resposta == $resposta_certa) {
                    // Verifica se a sessão já foi iniciada
                    if (!isset($_SESSION)) {
                        // Inicia a sessão
                        session_start();
                    }
                    $_SESSION["login"] = $login;
                    $_SESSION["nome"] = $nome;
                    $_SESSION["nomemae"] = $nomemae;
                    $_SESSION["tipoUser"] = $tipoUser;
                    $_SESSION['data_nasc'] = $data_nasc;
                    $_SESSION['email'] = $email;
                    $_SESSION['cpf'] = $cpf;
                    $_SESSION['celular'] = $celular;
                    $_SESSION['telefone'] = $telefone;
                    $_SESSION['cep'] = $cep;
                    $_SESSION['logradouro'] = $logradouro;
                    $_SESSION['status'] = $status;

                    $_SESSION['role'] = 'comun';
                    print "<script> location.href='../servico'</script>";
                }



                // }

                //var_dump($_SESSION["login"]);
                //var_dump($_SESSION["nome"]);
                //var_dump($_SESSION["tipoUser"]);

                // Verifique se o tipo de usuário é 'admin'
                //if ($tipoUser === 'admin') {

                // } else {
                // $_SESSION['role'] = 'comun';
                // print "<script> location.href='../dashbord'</script>";

                //}




            } else {
                //echo "Credenciais inválidas. Tente novamente.";
                //print "<script>alert('Credenciais inválidas. Tente novamente.')</script>";

                $_SESSION["login_error"] = "Dados inválidos. Tente novamente.";
                print "<script> location.href='../login';</script>";
            }
        }
    }
}



// Crie uma instância da classe 2faController
$_2faController = new _2faController();

// Chame o método login2fa
$_2faController->login_2fa();
