<!-- rotas, chamada de métodos, atributos e funcões -->
<?php
    //importando os arquivos
    require_once 'core/core.php';
    require_once 'controllers/ServicoController.php';
    require_once 'controllers/ModeloDBController.php';
    require_once 'controllers/TabelaUsuarioController.php';
    require_once 'controllers/PerfilController.php';
    

    //query string
    $template = file_get_contents('template/estruturaSistema.html');
    
    ob_start();
        //faz a leitura do que o usuario acessa na url e carrega o controllers para exibir as págs
        $core = new Core;
        $core->start($_GET);
        $saida = ob_get_contents();
    ob_end_clean();
    //var_dump($saida);

    $templatePronto = str_replace('{{area_dinamica}}', $saida, $template);
    //layout fixo
    echo $templatePronto;
?>
