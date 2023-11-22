<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
    
include_once('../config.php');


$receber_email = $_POST['email'];

 // Consulta SQL para verificar se o email existe ou não
 $sql = "SELECT email, login, senha from usuario
 WHERE email='$receber_email'";

$consultaEmail = $conexao->query($sql);
$qtdLinhas = $consultaEmail->num_rows;

//verifca a consulta do numero de linhas
if ($qtdLinhas > 0){
    //header("location:erroController.php");
    echo "esse email esta cadastrado no banco de dados";
}else{
    echo "esse email nao existe";

}



?>