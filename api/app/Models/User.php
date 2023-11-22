<?php

    namespace App\Models;

use PDOException;

    class User
    {

        //classificao estatica da tabela
        private static $table = 'usuario';


        //metodo responsavel por selecionar o id do usuario
        public static function select(int $id ){
             //utilizando o objeto PDO /// contra \ para usar com variavis globais
             $connPdo = new \PDO(dbDrive. ': host='. dbHost. '; dbname='. dbName, dbUserName, dbPassword);

             //VARIAVEIS ESTATICA USA O SELF E NAO ESTATICAS/static O THIS

            $sql = 'SELECT * FROM ' . self::$table . ' WHERE id_usuario = :id';
          

             $stmt = $connPdo->prepare($sql);
             $stmt->bindValue(':id', $id);
             $stmt->execute();
            
             if($stmt->rowCount() > 0 ){
                 return $stmt->fetch(\PDO::FETCH_ASSOC);
             }else {
                 throw new \Exception("Erro sem usuario");
             }
         }

         public static function selectAll(){
             //utilizando o objeto PDO /// contra \ para usar com variavis globais
             $connPdo = new \PDO(dbDrive. ': host='. dbHost. '; dbname='. dbName, dbUserName, dbPassword);

             //VARIAVEIS ESTATICA USA O SELF E NAO ESTATICAS O THIS

             $sql = 'SELECT * FROM ' . self::$table ;

             $stmt = $connPdo->prepare($sql);
             $stmt->execute();
            
             if($stmt->rowCount() > 0 ){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
             }else {
                 throw new \Exception("Erro sem usuario");
             }
         }


        // public static function select($id = null) {
        //     $connPdo = new \PDO(dbDrive . ':host=' . dbHost . ';dbname=' . dbName, dbUserName, dbPassword);
        
        //     if ($id === null) {
        //         $sql = 'SELECT * FROM ' . self::$table;
        
        //         $stmt = $connPdo->prepare($sql);
        //         $stmt->execute();
        
        //         if ($stmt->rowCount() > 0) {
        //             return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        //         } else {
        //             throw new \Exception("Erro sem usuário");
        //         }
        //     } else {
        //         $sql = 'SELECT * FROM ' . self::$table . ' WHERE id_usuario = :id';
        
        //         $stmt = $connPdo->prepare($sql);
        //         $stmt->bindValue(':id', $id);
        //         $stmt->execute();
        
        //         if ($stmt->rowCount() > 0) {
        //             return $stmt->fetch(\PDO::FETCH_ASSOC);
        //         } else {
        //             throw new \Exception("Erro sem usuário");
        //         }
        //     }
        // }
        



        public static function insert($data)
        { 
            $connPdo = new \PDO(dbDrive. ': host='. dbHost. '; dbname='. dbName, dbUserName, dbPassword);

             $sql = 'INSERT INTO ' . self::$table. '(nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser) VALUES (:nu, :sx, :dn, :nm, :lg, :em, :cpf, :cl, :te, :cep, :ld, :br, :uf, :sh, :tu)';

            $stmt = $connPdo->prepare($sql);
            $stmt ->bindvalue(':nu', $data['nome_usuario']);
            $stmt ->bindvalue(':sx', $data['sexo']);
            $stmt ->bindvalue(':dn', $data['data_nasc']);
            $stmt ->bindvalue(':nm', $data['nome_materno']);
            $stmt ->bindvalue(':lg', $data['login']);
            $stmt ->bindvalue(':em', $data['email']);
            $stmt ->bindvalue(':cpf', $data['cpf']);
            $stmt ->bindvalue(':cl', $data['celular']);
            $stmt ->bindvalue(':te', $data['telefone']);
            $stmt ->bindvalue(':cep', $data['cep']);
            $stmt ->bindvalue(':ld', $data['logradouro']);
            $stmt ->bindvalue(':br', $data['bairro']);
            $stmt ->bindvalue(':uf', $data['uf']);
            $stmt ->bindvalue(':sh', $data['senha']);
            $stmt ->bindvalue(':tu', $data['tipoUser']);
            $stmt ->execute();

            if ($stmt->rowCount()> 0) {
                 return 'usuário(a) inserido com sucesso!';
            } else{
                throw new \Exception("Falha ao inserir usuário(a)!");
            }
        }

        public static function updateUser($data)
        { 
            try {
                $connPdo = new \PDO(dbDrive . ':host=' . dbHost . ';dbname=' . dbName, dbUserName, dbPassword);
        
                $sql = 'UPDATE ' . self::$table . ' SET nome_usuario = :nu, sexo = :sx, data_nasc = :dn, nome_materno = :nm, login = :lg, email = :em, cpf = :cpf, celular = :cl, telefone = :te, cep = :cep, logradouro = :ld, bairro = :br, uf = :uf, senha = :sh, tipoUser = :tu WHERE id_usuario = :id';
        
                $stmt = $connPdo->prepare($sql);
                $stmt->bindValue(':nu', isset($data['nome_usuario']) ? $data['nome_usuario'] : null);
                $stmt->bindValue(':sx', isset($data['sexo']) ? $data['sexo'] : null);
                $stmt->bindValue(':dn', isset($data['data_nasc']) ? $data['data_nasc'] : null);
                $stmt->bindValue(':nm', isset($data['nome_materno']) ? $data['nome_materno']: null);
                $stmt->bindValue(':lg', isset($data['login']) ? $data['login']: null);
                $stmt->bindValue(':em', isset($data['email']) ? $data['email']: null);
                $stmt->bindValue(':cpf',isset($data['cpf']) ?  $data['cpf']: null);
                $stmt->bindValue(':cl', isset($data['celular']) ? $data['celular']: null);
                $stmt->bindValue(':te', isset($data['telefone']) ? $data['telefone']: null);
                $stmt->bindValue(':cep',isset($data['cep']) ?  $data['cep']: null);
                $stmt->bindValue(':ld', isset($data['logradouro']) ? $data['logradouro']: null);
                $stmt->bindValue(':br', isset($data['bairro']) ? $data['bairro']: null);
                $stmt->bindValue(':uf', isset($data['uf']) ? $data['uf']: null);
                $stmt->bindValue(':sh', isset($data['senha']) ? $data['senha']: null);
                $stmt->bindValue(':tu', isset($data['tipoUser']) ? $data['tipoUser']: null);
               // $stmt->bindValue(':id', isset($data['id_usuario']) ? $data['id_usuario']: null);
                error_log ( "Parameters: " . print_r($data, true));
                $stmt->execute();
        
                if ($stmt->rowCount() > 0) {
                    return 'usuário(a) atualizado com sucesso!';
                } else {
                    throw new \Exception("Falha ao atualizar usuário(a)!");
                    error_log ( "Parameters: " . print_r($data, true));
                }
            } catch (\PDOException $e) {
                throw new \Exception("Erro no banco de dados: " . $e->getMessage());
                     error_log ( "Parameters: " . print_r($data, true));
            } catch (\Exception $e) {
                throw $e; // Propague a exceção original para o chamador
                     error_log ( "Parameters: " . print_r($data, true));
            }


        }

        public static function delete(int $id ){
            //utilizando o objeto PDO /// contra \ para usar com variavis globais
            $connPdo = new \PDO(dbDrive. ': host='. dbHost. '; dbname='. dbName, dbUserName, dbPassword);

            //VARIAVEIS ESTATICA USA O SELF E NAO ESTATICAS/static O THIS

            $sql = 'DELETE FROM ' . self::$table . ' WHERE id_usuario = :id';
         

            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $success = $stmt->execute();
   
            if ($success) {
                // Retorna uma mensagem ou status de sucesso
                return 'Usuário excluído com sucesso';
            } else {
                throw new \Exception("Erro ao excluir usuário");
            }
        }

        public static function login($email, $senha) {
            try {
                if (isset($email) && isset($senha)) {
                    $connPdo = new \PDO(dbDrive . ':host=' . dbHost . ';dbname=' . dbName, dbUserName, dbPassword);
                    $sql = 'SELECT email, senha FROM ' . self::$table . ' WHERE email = :email AND senha = :senha';
        
                    $stmt = $connPdo->prepare($sql);
                    $stmt->bindValue(':email', $email);
                    $stmt->bindValue(':senha', $senha);
                    $stmt->execute();
        
                    if ($stmt->rowCount() > 0) {
                        // Login bem-sucedido, pode retornar uma mensagem de sucesso
                        return 'Login com sucesso';
                    } else {
                        // Lançar exceção personalizada para representar que o login falhou
                        throw new \Exception("Credenciais inválidas");
                    }
                } else {
                    throw new \Exception("Dados de email e senha não foram fornecidos.");
                }
            } catch (\PDOException $e) {
                throw new \Exception("Credenciais inválidas. Verifique se o email e a senha estão corretos.");
            }
        }

           


    }

?>