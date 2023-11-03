<?php

    namespace App\Service;
    use App\Models\User;

    class UserService
    {
        public function get($id = null)
        {
            try{
                if ($id) {
                    return User::select($id); 
                } else {
                    return User::selectAll();
                }
            } catch (\Exception $e) {
                return ['status' => 'erro', 'data' => $e->getMessage()];
            }     
        }

        public function post()
        {
            $data = $_POST;

            return User::insert($data);
            //return $_POST;
        }

        public function put($id, $data) 
        {
            try {
                $data['id_usuario'] = $id;
                $response = User::update($data); // Se você está usando um método "update", deve chamá-lo aqui
                return ['status' => 'success', 'message' => $response];
            } catch (\Exception $e) {
                return ['status' => 'error', 'message' => $e->getMessage()];
            }
        }

        
        public function delete($id)
        {
            $response = User::delete($id);
        
            return $response;
        }

        public function login($email, $senha)
        {
            try {
                $result = User::login($email, $senha);
        
                if ($result == 'Login com sucesso') {
                    return ['status' => 'success', 'data' => 'Login bem sucedido'];
                } else {
                    return ['status' => 'erro', 'data' => 'Credenciais inválidas'];
                }
            } catch (\Exception $e) {
                return ['status' => 'erro', 'data' => $e->getMessage()];
            }
        }
        
    }

?>