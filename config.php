<!-- connexão com o banco de dados -->
<!--aqui que vai definir as constantes, senhas, usuarios-->
<?php
$dbDrive = 'mysql';
$dbhost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'gp_03_consultanumero';
    
$conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}


$consultaTelefonePath = '../../ConsultaTelefone/';
?>
