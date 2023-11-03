<?php
//retonar em formato json
    header('Content-Type: application/json');
    require_once '../vendor/autoload.php';


    //api/users/1
    if ($_GET['url']) {
        $url = explode('/', $_GET['url']);

        if ($url[0] === 'api'){
            $url = explode('/', $_GET['url']);

            if($url[0] === 'api'){
                //remove a primeira posição
                array_shift($url);
                //user passa a ser a posição 0
                //ucfirst deixa a primeira letra em minusculo
                $service = 'App\Service\\'.ucfirst($url[0]).'Service';
                array_shift($url);


                //váriavel criada para chamar o get
                //strtolower transforma td em minusculo
                $method = strtolower($_SERVER['REQUEST_METHOD']);
                //var_dump($method);

                try{
                    //chama o serviço do jeito que ela foi chamada
                   $response = call_user_func_array(array(new $service, $method), $url);
                   //$response = call_user_func_array(array(new $service, 'put'), [$id, $data]);


                   http_response_code(200);
                    echo json_encode(array('status' => 'sucess', 'data' => $response)); 
                    exit;
                }catch(\Exception $e){
                    http_response_code(404);
                    echo json_encode(array('status' => 'erro', 'data' => $e->getMessage(), JSON_UNESCAPED_UNICODE)); 
                    exit;
                }

            }
        }
    }

?>