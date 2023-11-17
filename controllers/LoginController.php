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

    //metodo responsavel por selecionar o id do usuario
    public static function select(int $id ){
        $conexao = new \PDO(dbDrive. ': host='. dbHost. '; dbname='. dbName, dbUserName, dbPassword);

        $sql = 'SELECT * FROM ' . self::$table . ' WHERE id_usuario = :id';
     
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
       
        if($stmt->rowCount() > 0 ){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }else {
            throw new \Exception("Erro sem usuario");
        }
    }

    // public static function selectAll(){
    //     //utilizando o objeto PDO /// contra \ para usar com variavis globais
    //     $connPdo = new \PDO(dbDrive. ': host='. dbHost. '; dbname='. dbName, dbUserName, dbPassword);

    //     //VARIAVEIS ESTATICA USA O SELF E NAO ESTATICAS O THIS

    //     $sql = 'SELECT * FROM ' . self::$table ;

    //     $stmt = $connPdo->prepare($sql);
    //     $stmt->execute();
       
    //     if($stmt->rowCount() > 0 ){
    //        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     }else {
    //         throw new \Exception("Erro sem usuario");
    //     }
    // }

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

                $nome = $row->nome_usuario;
                $tipoUser = $row->tipoUser;
                $data_nasc = $row->data_nasc;
                $email = $row->email;
                $cpf = $row->cpf;
                $celular = $row->celular;
                $telefone = $row->telefone;
                $cep = $row->cep;
                $logradouro = $row->logradouro;
                $status = $row->status;

                $_SESSION["login"] = $login;
                $_SESSION["nome"] = $nome;
                $_SESSION["tipoUser"] = $tipoUser;
                $_SESSION['data_nasc'] = $data_nasc;
                $_SESSION['email'] = $email;
                $_SESSION['cpf']= $cpf;
                $_SESSION['celular']= $celular;
                $_SESSION['telefone']= $telefone;
                $_SESSION['cep']= $cep;
                $_SESSION['logradouro']= $logradouro;
                $_SESSION['status']= $status;

                var_dump($_SESSION["login"]);
                var_dump($_SESSION["nome"]);
                var_dump($_SESSION["tipoUser"]);
                
                echo "<script>console.log('Login: " . $login . "');</script>";
                echo "<script>console.log('nome: " . $nome . "');</script>";
                echo "<script>console.log('tipoUser: " . $tipoUser . "');</script>";
                echo "<script>console.log('data_nasc: " . $data_nasc . "');</script>";
                
                print "<script> location.href='../dashboard'</script>";
            } else {
                //echo "Credenciais inválidas. Tente novamente.";
                //print "<script>alert('Credenciais inválidas. Tente novamente.')</script>";
                
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
