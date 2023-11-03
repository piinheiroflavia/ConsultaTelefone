<?php

    namespace App\Models;
    

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

        public static function update($data)
        { 
            $connPdo = new \PDO(dbDrive . ':host=' . dbHost . ';dbname=' . dbName, dbUserName, dbPassword);

            $sql = 'UPDATE ' . self::$table . ' SET nome_usuario = :nu, sexo = :sx, data_nasc = :dn, nome_materno = :nm, login = :lg, email = :em, cpf = :cpf, celular = :cl, telefone = :te, cep = :cep, logradouro = :ld, bairro = :br, uf = :uf, senha = :sh, tipoUser = :tu WHERE id_usuario = :id';

            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':nu', $data['nome_usuario']);
            $stmt->bindValue(':sx', $data['sexo']);
            $stmt->bindValue(':dn', $data['data_nasc']);
            $stmt->bindValue(':nm', $data['nome_materno']);
            $stmt->bindValue(':lg', $data['login']);
            $stmt->bindValue(':em', $data['email']);
            $stmt->bindValue(':cpf', $data['cpf']);
            $stmt->bindValue(':cl', $data['celular']);
            $stmt->bindValue(':te', $data['telefone']);
            $stmt->bindValue(':cep', $data['cep']);
            $stmt->bindValue(':ld', $data['logradouro']);
            $stmt->bindValue(':br', $data['bairro']);
            $stmt->bindValue(':uf', $data['uf']);
            $stmt->bindValue(':sh', $data['senha']);
            $stmt->bindValue(':tu', $data['tipoUser']);
            $stmt->bindValue(':id', $data['id_usuario']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'usuário(a) atualizado com sucesso!';
            } else {
                throw new \Exception("Falha ao atualizar usuário(a)!");
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