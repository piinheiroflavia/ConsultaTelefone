<!-- rotas, chamada de métodos, atributos e funcões
<?php

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
            if ($currentPage !== 'home' && $currentPage !== 'registro' && $currentPage !== 'login' && $currentPage !== 'EnviarEmail' && $currentPage !== '2FA' && $currentPage !== 'atualizarSenha') {

                include "template/sistema.php"; 
     
            } else {
                include "views/{$currentPage}.php";
                include "template/links.php"; // Renderize o links.php
            }
        }
    }

    
?> 
