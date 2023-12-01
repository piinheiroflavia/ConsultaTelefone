<?php
include_once(__DIR__ . '/../config.php');
session_start();
class ServicoNum {


     //só pode ser acessada dentro da classe
    private $conexao;

    public function __construct($conexao)
    {
     $this->conexao = $conexao;   
    }

    public function registerLog($phoneNumber) {
        // Logo antes da execução da consulta, adicione:
    echo "Executando a consulta...";


        $usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;
        $_SESSION['usuario_id'] = $usuario_id;

        var_dump($_SESSION['usuario_id']);
        
        $data_log = date('Y-m-d H:i:s');
        $status_log = 'ativo';
        $descricao_log = "Consulta no número: $phoneNumber .";

        // Consulta SQL para inserção
        $queryLog = "INSERT INTO log (usuario_id, data_log, status, descricao) VALUES (?, ?, ?, ?)";

        // Use prepared statement para a consulta de inserção
        $stmtLog = $this->conexao->prepare($queryLog);
        $stmtLog->bind_param("ssss", $usuario_id, $data_log, $status_log, $descricao_log);

        if ($stmtLog->execute()) {
            // Sucesso na inserção
            return 'Registro na tabela de log realizado com sucesso.';
        } else {
            // Erro na inserção
            return 'Erro ao registrar na tabela de log.';
        }

        // Feche a declaração preparada
        $stmtLog->close();
        // Logo após a execução da consulta, adicione:
        echo "Consulta executada com sucesso!";
    }
}
// Crie uma instância da classe ServicoNum, passando a conexão como parâmetro
$servicoNum = new ServicoNum($conexao);

// Verifique se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados do POST
    $phoneNumber = $_POST['phoneNumber'];

    // Registre no log
    $result = $servicoNum->registerLog($phoneNumber);

    // Retorne o resultado
    echo $result;
} else {
    // Se a requisição não for do tipo POST, retorne um erro
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Método não permitido';
}

?>
