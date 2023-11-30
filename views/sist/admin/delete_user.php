<?php
require_once(__DIR__ . '../../../../config.php');

echo "Diretório Atual: " . __DIR__;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    // Excluir registros relacionados na tabela 'log'
    $conn->query("DELETE FROM log WHERE usuario_id = $id");

    // Em seguida, excluir o usuário
    $conn->query("DELETE FROM usuario WHERE id_usuario = $id");

    // Verificar se a exclusão foi bem-sucedida
    $errorInfo = $conn->errorInfo();
    if ($errorInfo[0] !== '00000') {
        echo json_encode(['success' => false, 'message' => 'Erro ao excluir usuário: ' . $errorInfo[2]]);
    } else {
        
        echo json_encode(['success' => true, 'message' => 'Usuário excluído com sucesso.']);
    }


    exit();
}

// Se algo der errado, envie uma resposta de erro
$response = ['success' => false, 'message' => 'Parâmetros ausentes.'];
echo json_encode($response);
?>
