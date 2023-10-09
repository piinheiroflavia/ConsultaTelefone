<?php
    echo('test home');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans&display=swap" rel="stylesheet">

    <style>
        *{
            overflow-x: hidden;
        }       
        #descicao{
            margin-top: 200px;
        }
        #imgHome{
            margin-top: 50px;
            -webkit-animation: slide-in-right 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-right 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
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
            color: #ff6600;
            font-family: 'Inria Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 600;
            margin: 40px 0px 10px 150px;
            -webkit-animation: slide-in-left 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-left 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        #subTitulo{
            font-size: 1.5rem;
            margin: 10px 50px 10px 150px;
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
            background-color: #2b44ff;
            color: #fff;
            padding: 30px 100px;
            border-radius: 5px;
            font-size: 1.3rem;
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

        .footer{
            padding: 3px;
            background-color: #2b44ff;
            color: #fff;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav class="navbar fixed-top p-2 bg-body border-bottom border-blue-600 shadow-sm">
    <div class="container-fluid">
        <img src="../template/Logotipo.png" alt="logo" height="50px">

        <div>
            <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./registro.html">Cadastre-se</a>
            </li>
            </ul>
        </div>
    </div>
    </nav>

    <main >
        <div class="row " >
            <div class="col-6" id="descicao" >
                <h2 id="titulo">Consulta de Número</h2>
                <p id="subTitulo">Obtenha informações sobre um número de telefone e celular de maneira fácil e rápida.</p>
            </div>
            <div class="col-6" id="imgHome">
                <img src="./home.png" alt="" style="width:900px" >
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
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Register for free</span>
          <button type="button" class="btn btn-outline-light btn-rounded">
            Sign up!
          </button>
        </p>
      </section>

    </div>
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #2b44ff;">
      © 2023 Copyright:
      <a class="text-white" href="#" target="_blank">Flavia Pinheiro</a> e <a class="text-white" href="#" target="_blank">Ana Beatriz</a> 
    </div>
    <!-- Copyright -->
  </footer>

</body>
</html>

