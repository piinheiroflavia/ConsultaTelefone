<!-- funciona como uma ligação geral das viws com o controller, ele vai lê as requições get e consegue trazer as pags em html que o usuario esta querendo visualizar  -->
<?php

    // class core
    // {

    //     public function start($urlGet)
    //     {
    //         //a variavel acao vai chamar todos os metodos dos controllers
    //         $acao = 'indexExibir';

    //         if(isset($urlGet['pagina'])){

    //             //variavel global urlGet pega pela url oq o usuario ta querendo acessar
    //             //ucfirst coloca a primeira letra da string maiúscula
    //             $pagController =   ucfirst($urlGet['pagina'].'Controller');

    //         }else{
    //             $pagController = 'ErroControler';
    //         }

 
    //         if(!class_exists($pagController)){
    //             $pagController = 'ErroController';
    //         }else


    //         //crie um array com metodos dinamicos
    //         call_user_func_array(array(new $pagController, $acao), array());

    //         //echo $pagController; 
            
    //     }
    // }
?>