<?php

    class AuthController {
        private $Client;

        public function __construct($Client) {
            $this->Client = $Client;
        }

        public function login($login, $password) {
            // Verificar credenciais no banco de dados
            $user = $this->Client->getUserByEmail($login);

            if ($user && password_verify($password, $user['password'])) {
                // Credenciais válidas, gerar token
                $token = $this->generateToken($user['id']);
                $senha_hash = password_hash($password, PASSWORD_DEFAULT);

                // Retornar o token para o cliente
                return $token;
            }

            // Credenciais inválidas
            return false;
        }

        private function generateToken($userId) {
            // Lógica de geração de token (pode ser JWT, por exemplo)
            // Retorne o token gerado
        }
    }


?>
