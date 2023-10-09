<?php
    include_once('../controllers/LoginController.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Login</title>

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <!-- icone google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="./style.css">
 <style>
  
    form {
        width: 300px;
        margin: 130px auto;
        text-align: center;
    }

    input {
        display: block;
        margin: 10px auto;
        width: 350px;
        height: 45px;
    }

        a {
            color: rgba(255, 255, 255, 1); /* Define a cor como branca  */
            text-align: end;
        } 
        .form-outline .form-control{
            background-color: #fff;
            
        }
        .paragAlterarSenha{
            font-size: 0.7rem;
            text-align: start;
        }
        .paragClickAqui:hover,  .paragClickNaoCad:hover{
            color: #d9dbdc;
        }
        .paragNaoCad{
            margin-top: 20px;
            font-size: 0.7rem;
            text-align: center;
        }

        .btnhome{
            margin: 5px;
            display: flex;
            justify-content: flex-end;
        }
        .btnLogar{
            background-color: #73d5f000;
            border: none;
            border-radius: 50px;
            padding: 3px;
        }
        
        #alertLogin-error{
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
            -webkit-animation: scale-up-ver-top 0.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
	        animation: scale-up-ver-top 0.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
        }
        @-webkit-keyframes scale-up-ver-top {
        0% {
            -webkit-transform: scaleY(0.4);
                    transform: scaleY(0.4);
            -webkit-transform-origin: 100% 0%;
                    transform-origin: 100% 0%;
        }
        100% {
            -webkit-transform: scaleY(1);
                    transform: scaleY(1);
            -webkit-transform-origin: 100% 0%;
                    transform-origin: 100% 0%;
        }
        }
        @keyframes scale-up-ver-top {
        0% {
            -webkit-transform: scaleY(0.4);
                    transform: scaleY(0.4);
            -webkit-transform-origin: 100% 0%;
                    transform-origin: 100% 0%;
        }
        100% {
            -webkit-transform: scaleY(1);
                    transform: scaleY(1);
            -webkit-transform-origin: 100% 0%;
                    transform-origin: 100% 0%;
        }
        }


</style> 

</head>

<body>
    <img src="../template/Logotipo.png" alt="logo" height="65px" class="m-2">
    
    <div class="sidebar ">
    <a href="./home.php" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
        <form  method="post" action="../controllers/LoginController.php">
            <div class="textLogin">
                <h3 >Login</h3>
                <h4 class="textAcesse">Acesse sua conta!</h4>
            </div>

            <div class="col-md-12">
                <div class="form-outline">
                <input type="text" class="form-control" name="login" id="login"  required />
                <label for="login" class="form-label" style="color: #000;">Login</label>
                </div>
            </div>
            <div class="col-md-12   ">
                <div class="form-outline">
                <input type="password" class="form-control" name="senha" id="senha" required />
                <label for="senha" class="form-label" style="color: #000;">Senha</label>
                </div>
            </div>
<!--        <input type="text" name="login" placeholder="Login" id="login">
            <input type="password" name="senha" id="senha"> -->

                <p class="paragAlterarSenha">Esqueceu a senha? <strong><a href="../views/EnviarEmail.html" class="paragClickAqui"> Clique aqui</a> </strong> </p> 

                
                <button type="submit" class="btnLogar" name="submit"><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button>
                <div class="d-flex align-items-center"  id="alertLogin-error">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                </div>
                <p class="paragNaoCad">Não possui cadastro? <strong><a href="../views/registro.html" class="paragClickNaoCad"> Cadastre-se aqui</a> </strong> </p> 
                
        </form>
    </div>


    
    <script>
    
    var alertLogin =  document.getElementById("alertLogin-error");
    alertLogin.style.display = "none";

   document.addEventListener("DOMContentLoaded", function() {
    // Acessa a variável de sessão login_error diretamente
    var loginError = <?php echo isset($_SESSION["login_error"]) ? json_encode($_SESSION["login_error"]) : "null"; ?>;
    

    

    if (loginError !== null) {
        alertLogin.style.fontSize = "0.9rem"
        alertLogin.style.backgroundColor = "#e92538"
        alertLogin.style.border = "solid 2px #ef3220";
        alertLogin.style.display = "block";
        alertLogin.textContent = loginError;
        
        // Remove a variável de erro da sessão para que a mensagem não seja exibida novamente após atualizar a página
        <?php unset($_SESSION["login_error"]); ?>
    }
    });



    </script>
</body>

</html>