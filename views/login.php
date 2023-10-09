<?php
    include_once('../controllers/LoginController.php');
    include_once('../template/links.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    
    <link rel="stylesheet" href="../assests/css/style.css">
 <style>
  
   
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
        
       


</style> 

</head>

<body>
  
    <div class="d-flex align-items-center"  id="alertLogin-error">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    </div>
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

                <p class="paragAlterarSenha">Esqueceu a senha? <strong><a href="../views/EnviarEmail.php" class="paragClickAqui"> Clique aqui</a> </strong> </p> 

                
                <button type="submit" class="btnLogar" name="submit"><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button>

                
                <p class="paragNaoCad">Não possui cadastro? <strong><a href="../views/registro.php" class="paragClickNaoCad"> Cadastre-se aqui</a> </strong> </p> 
                
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