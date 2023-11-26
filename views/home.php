<?php
require_once('template/links.php');
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <style>
        @media screen  and (max-width: 630px){
            #bloco1Home{
                display: flex;
                flex-direction: column;
            }
            #imgHomeDiv{
                margin-top: 2px;
            }
        }
        @media screen  and (max-width: 800px){
            #bloco1Home{
                
                display: flex;
            }
            #imgHome{
                margin-top: 116px;
                width: 400px;
            }

        }

        
        *{
            overflow-x: hidden;
        }       
        #descicao{
            margin: 200px 0px 0px 83px;
            padding-right: 120px;
            display: flex;
            flex-direction: column;
        }
        #imgHomeDiv{
            display: flex;
            margin-top: 50px;
            -webkit-animation: slide-in-right 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-right 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        #imgHome{
            width: 500px;
        }
        @-webkit-keyframes slide-in-right {
        0% {
            -webkit-transform: translateX(1000px);
                    transform: translateX(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateX(0);
                    transform: translateX(0);
            opacity: 1;
        }
        }
        @keyframes slide-in-right {
        0% {
            -webkit-transform: translateX(1000px);
                    transform: translateX(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateX(0);
                    transform: translateX(0);
            opacity: 1;
        }
        }
        #titulo{
            color: #203440;
            font-family: 'Inria Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 600;
            -webkit-animation: slide-in-left 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-left 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        #subTitulo{
            font-size: 1rem;
            -webkit-animation: slide-in-left 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-left 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        
        @-webkit-keyframes slide-in-left {
        0% {
            -webkit-transform: translateX(-1000px);
                    transform: translateX(-1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateX(0);
                    transform: translateX(0);
            opacity: 1;
        }
        }
        @keyframes slide-in-left {
        0% {
            -webkit-transform: translateX(-1000px);
                    transform: translateX(-1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateX(0);
                    transform: translateX(0);
            opacity: 1;
        }
        }
        #paragSobre{
            background-color: #54c8e8;
            color: #fff;
            padding: 30px 100px;
            border-radius: 5px;
            font-size: 1.2rem;
            text-align: justify;
            margin: 40px 70px 20px 70px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            -webkit-animation: slide-in-bottom 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-bottom 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @-webkit-keyframes slide-in-bottom {
        0% {
            -webkit-transform: translateY(1000px);
                    transform: translateY(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            opacity: 1;
        }
        }
        @keyframes slide-in-bottom {
        0% {
            -webkit-transform: translateY(1000px);
                    transform: translateY(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            opacity: 1;
        }
        }

        #footer{
            padding: 3px;
            background-color: #001c38;
            height: 40px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: center;
            justify-content: center;;
        }
    </style>
</head>
<body>
    <nav class="navbar fixed-top p-2 bg-body border-bottom border-blue-600 shadow-sm">
    <div class="container-fluid">
        <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/Logotipo.png" alt="logo" height="70px">

        <div>
            <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registro">Cadastre-se</a>
            </li>
            </ul>
        </div>
    </div>
    </nav>

    <main >
        <div class="row " id="bloco1Home" >
            <div class="col" id="descicao" >
                <h2 id="titulo">Consulta de Número</h2>
                <p id="subTitulo">Explore com facilidade e rapidez informações abrangentes relacionadas a números de telefone e celulares. Tenha acesso a dados detalhados de forma simplificada</p>
            </div>
            <div class="col" id="imgHomeDiv">
                <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/Consulta-home.png" alt="" id="imgHome"  >
            </div>
        </div>
        <div>
            <p id="paragSobre" class="text-center " >Descubra rapidamente informações sobre qualquer número de telefone celular, sem necessidade de realizar uma ligação. Digitando o número do telefone com o DDD, nossa ferramenta fornecerá detalhes sobre a operadora associada, a localização do número e se foi feita uma portabilidade.</p>
        </div>
    </main>
    
    <!-- <footer class="footer ">
        <div class="container-fluid">
            <p>&copy; Desenvolvido por <a href="#" target="_blank">Flavia Pinheiro</a> e <a href="#" target="_blank">Ana Beatriz</a> &middot;</p>
        </div>
    </footer> -->
    <!-- Footer -->
  <footer class="text-center text-white" id="footer" >
   
    <!-- Copyright -->
    <div class="text-center p-3" style="font-size: 0.8rem;" >
      © 2023 Copyright:
      <a class="text-white" href="https://github.com/piinheiroflavia" target="_blank">Flavia Pinheiro</a> e <a class="text-white" href="https://github.com/PinheiiroAna" target="_blank">Ana Beatriz Pinheiro</a> 
    </div>
    <!-- Copyright -->
  </footer>

</body>
</html>

