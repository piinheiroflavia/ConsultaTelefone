<!-- consultas / regras de negocios -->
<?php
//include_once('../views/registro.php');
//include_once('../models/config.php');

class _2fa 
{
    private static $table = '_2fa';

    public static function select_2fa()
    {
        // Criação da conexão
        $conn = new mysqli('localhost', 'root', '', 'gp_03_consultanumero');

        // Checa a conexão
        if ($conn->connect_error) {
            die("Erro de conexão com o banco de dados: " . $conn->connect_error);
        }

        // Monta a consulta SQL------------------------------------------------------------- models abaixo
        $sql = 'SELECT * FROM ' . self::$table;

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
try {
    $resultados_2fa = _2fa::select_2fa();
  
} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage();
}



?>