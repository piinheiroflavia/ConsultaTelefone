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

    // ---------------------------------LOG--------------------------------------
    public static function selectAllLogs($conexao) {
        $result = $conexao->query("SELECT log.*, usuario.nome_usuario, usuario.tipoUser FROM log
        INNER JOIN usuario ON log.usuario_id = usuario.id_usuario");
    
        if ($result->num_rows > 0) {
            $logs = array();
    
            while ($row = $result->fetch_assoc()) {
                $logs[] = $row;
            }
    
            return $logs;
        } else {
            throw new \Exception("Erro sem logs");
        }
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

    public static function selectClientePorCPF($conexao, $cpf) {
        $query = "SELECT * FROM usuario WHERE cpf = '$cpf'";
        $result = mysqli_query($conexao, $query);

        return mysqli_fetch_assoc($result);
    }

    public static function updateCliente($conexao, $id, $dados) {
        $set = [];
        $tipos = "";
        $valores = [];
    
        foreach ($dados as $campo => $valor) {
            $set[] = "$campo = ?";
            $tipos .= "s";
            $valores[] = $valor;
        }
    
        $setStr = implode(', ', $set);
        $tipos .= "i";
        $valores[] = $id;
    
        $query = "UPDATE usuario SET $setStr WHERE id_usuario = ?";
        $stmt = $conexao->prepare($query);
    
        // Bind dos parâmetros
        $stmt->bind_param($tipos, ...$valores);
    
        // Execução da consulta
        return $stmt->execute();
    }
  
    public static function deleteCliente($conexao, $id)
    {
        $query = "DELETE FROM usuario WHERE id_usuario = $id";
        return mysqli_query($conexao, $query);
    }

    
    
}
?>