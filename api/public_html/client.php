<?php

    $url = 'http://localhost/ConsultaTelefone/api/public_html/api';
    $class = '/user';
    $param = '/11';


    $response = file_get_contents($url.$class.$param);

    //echo $response;

    // $response = json_decode($response, 1);
    // var_dump($response['data'][11]['email']);
?>