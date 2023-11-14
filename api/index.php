<?php


    try{

        $connection = new PDO('mysql:host=localhost; port=3306; dbname=gp_03_consultanumero','root', '');

    } catch(Exception $error){
        echo "Ocorreu o seguinte erro : {$error}";

    }

?>
