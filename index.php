<!-- rotas, chamada de métodos, atributos e funcões
<?php

    // pega a URL completa
    $currentURL = $_SERVER['REQUEST_URI'];

    // tira o domínio e o "ConsultaNumero/"
    $rota = str_replace('/ConsultaTelefone/', '', $currentURL);


    // Separa as partes da URL
    $parts = explode("/", $rota);

 // Se a URL for vazia, defina $currentPage e entra como home
if ($parts[0] == '') {
    $currentPage = 'home';    
} elseif (count($parts) > 0) {            
    $currentPage = $parts[0];
}

// Verifica se a página é a 'atualizarSenha' e se há um parâmetro 'email'
if ($currentPage === 'atualizarSenha' && isset($parts[1]) && $parts[1] === 'email' && isset($parts[2])) {
    // Inclua a página atualizarSenha.php e passe o parâmetro 'email'
    include "views/atualizarSenha.php";
    include "template/links.php";
    exit(); // Encerre o script para evitar que outras inclusões ocorram
}

// Continue a lógica original de inclusão de páginas
if ($currentPage !== 'home' && $currentPage !== 'registro' && $currentPage !== 'login' && $currentPage !== 'EnviarEmail' && $currentPage !== '2FA') {
    include "template/sistema.php"; 
} else {
    include "views/{$currentPage}.php";
    include "template/links.php";
} 
?> 
