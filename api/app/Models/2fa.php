<?php

namespace App\Models;

use PDOException;
//2FA



class _2fa
{


    //classificao estatica da tabela
    private static $table = '_2fa';


    public static function select_2fa()
    {
        //utilizando o objeto PDO /// contra \ para usar com variavis globais
        $connPdo = new \PDO(dbDrive . ': host=' . dbHost . '; dbname=' . dbName, dbUserName, dbPassword);

        //VARIAVEIS ESTATICA USA O SELF E NAO ESTATICAS/static O THIS

        $sql = 'SELECT * FROM  ' . self::$table ;


        $stmt = $connPdo->prepare($sql);
        $stmt->execute();
      
        if($stmt->rowCount() > 0 ){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }else {
            throw new \Exception("Erro sem 2fa");
        }
    }
}

?>