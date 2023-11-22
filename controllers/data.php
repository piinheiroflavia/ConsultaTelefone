<?php
include_once('../config.php');
include_once('../models/Client.php');
include_once('UserController.php');

$userController = new UserController($conexao);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $parametros = $_POST['parametros'] ?? [];

    $resultado = $userController->executarAcao($acao, $parametros);

    var_dump($dadosDataTable);

    if ($resultado) {
        $dadosDataTable = [
            'data' => $resultado // Assumindo que $resultado já é um array de dados
        ];

        echo json_encode($dadosDataTable);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>
