<!-- consultas / regras de negocios -->
<?php
//include_once('../views/registro.php');
//include_once('../models/config.php');
 
    class Client  {
  
    public function inserirCliente($conexao, $nome, $dataNascimento, $nomeMaterno, $login, $email, $cpf, $celular, $telefone, $cep, $logradouro, $bairro, $uf, $senha) {
     
        $query = "INSERT INTO usuario (nome_usuario, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser ) VALUES ('$nome',  '$dataNascimento', '$nomeMaterno', '$login', '$email', '$cpf', '$celular', '$telefone', '$cep', '$logradouro', '$bairro', '$uf', '$senha', 'comun')";

        return mysqli_query($conexao, $query);
    }
    }

?>