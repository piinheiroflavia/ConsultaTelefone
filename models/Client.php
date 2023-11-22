<!-- consultas / regras de negocios -->
<?php
//include_once('../views/registro.php');
//include_once('../models/config.php');
class Client {
  
    public function inserirCliente($conexao, $nome, $sexo, $dataNascimento, $nomeMaterno, $login, $email, $cpf, $celular, $telefone, $cep, $logradouro, $bairro, $uf, $senha) 
    {
        $query = "INSERT INTO usuario (nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status ) VALUES ('$nome', '$sexo', '$dataNascimento', '$nomeMaterno', '$login', '$email', '$cpf', '$celular', '$telefone', '$cep', '$logradouro', '$bairro', '$uf', '$senha', 'comun', 'inativo')";
        return mysqli_query($conexao, $query);
    }

    public static function selectAllClientes($conexao) {
        $result = $conexao->query("SELECT * FROM usuario");
    
        if ($result->num_rows > 0) {
            $clientes = array();
    
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
    
            return $clientes;
        } else {
            throw new \Exception("Erro sem usuário");
        }
    }
    
    
    

    public static function selectClientePorLogin($conexao, $login) {
        $query = "SELECT * FROM usuario WHERE login = '$login'";
        $result = mysqli_query($conexao, $query);

        return mysqli_fetch_assoc($result);
    }

    // Em vez de receber todos os campos como parâmetros, podemos receber um array associativo contendo os campos que precisam ser atualizados
    public static function updateCliente($conexao, $id, $dados) {
        // // $dados é um array associativo contendo os campos a serem atualizados
        // $set = [];
        // foreach ($dados as $campo => $valor) {
        //     $set[] = "$campo = '$valor'";
        // }

        // $setStr = implode(', ', $set);

        // $query = "UPDATE usuario SET $setStr WHERE id_usuario = $id";

        // // Debug: imprime a consulta antes de executar
        // echo $query;

        // return mysqli_query($conexao, $query);
        
    }

    

    public static function deleteCliente($conexao, $id)
    {
        $query = "DELETE FROM usuario WHERE id_usuario = $id";
        return mysqli_query($conexao, $query);
    }

}
?>