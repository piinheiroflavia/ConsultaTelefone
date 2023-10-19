<!-- rotas, chamada de métodos, atributos e funcões
<?php
    //importando os arquivos
    require_once 'core/core.php';
    require_once 'controllers/ServicoController.php';
    require_once 'controllers/ModeloDBController.php';
    require_once 'controllers/TabelaUsuarioController.php';
    require_once 'controllers/PerfilController.php';
    require_once 'controllers/HistLogController.php';
    
    // pega a URL completa
    $currentURL = $_SERVER['REQUEST_URI'];

    // tira o domínio e o "ConsultaNumero/"
    $rota = str_replace('/ConsultaTelefone/', '', $currentURL);

    // Verifique se a chave 'url' está definida em $_GET
    if (isset($rota)) {
        // Separa as partes da URL
        $parts = explode("/", $rota);

        // Se a URL for vazia, defina $currentPage e entra como home
        if ($parts[0] == '') {
            $currentPage = 'home';    
            include "views/{$currentPage}.php";
            include "template/links.php";


        } elseif (count($parts) > 0) {            

            // Se tiver alguma coisa na URL que não seja 'home', 'registro', 'login' ou 'EnviarEmail', use o Dashboard.php
            $currentPage = $parts[0];
            if ($currentPage !== 'home' && $currentPage !== 'registro' && $currentPage !== 'login' && $currentPage !== 'EnviarEmail' && $currentPage !== '2FA') {

                include "template/sistema.php"; 
     
            } else {
                include "views/{$currentPage}.php";
                include "template/links.php"; // Renderize o links.php
            }
        }
    }
    //query string dentro do sistema
    //$template = file_get_contents('template/estruturaSistema.php');
                
    // ob_start();
    //                 //faz a leitura do que o usuario acessa na url e carrega o controllers para exibir as págs
    //                 $core = new Core;
    //                 $core->start($_GET);
    //                 $saida = ob_get_contents();
    //             ob_end_clean();
    //             //var_dump($saida);

    //             $templatePronto = str_replace('{{area_dinamica}}', $saida, $template);
    //             //layout fixo
    //             // echo $templatePronto;
    
?> 
