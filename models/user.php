<!-- consultas / regras de negocios -->
<?php
//include_once('../views/registro.php');
//include_once('../models/config.php');

class user
{
    

    public static function select_usuario($login)
    {
        // Criação da conexão
        $conn = new mysqli('localhost', 'root', '', 'gp_03_consultanumero');
    
        // Checa a conexão
        if ($conn->connect_error) {
            die("Erro de conexão com o banco de dados: " . $conn->connect_error);
        }
    
        // Monta a consulta SQL------------------------------------------------------------- models abaixo
        $login = $conn->real_escape_string($login); // Escapa o valor para evitar injeção de SQL
        $sql = "SELECT * FROM usuario WHERE login = '$login'";
    
        // Prepara e executa a consulta
        $result = $conn->query($sql);
    
        // Checa se a consulta foi bem-sucedida
        if ($result === false) {
            throw new \Exception("Erro na consulta: " . $conn->error);
        }
    
        // Inicializa um array para armazenar os resultados
        $resultsArray = [];
    
        // Obtém os resultados
        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }
    
        // Fecha a conexão
        $conn->close();
    
        // Retorna os resultados
        return $resultsArray;
    } 


    
    
}

// Uso do método





?>