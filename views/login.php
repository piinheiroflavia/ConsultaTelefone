<?php
    include_once('controllers/LoginController.php');
    include_once('template/links.php');
    include_once('config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    
    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/assests/css/style.css">
 <style>
/*começo do responsivo*/
     @media (max-width: 343px){
            .sidebar {
               right: -55px;
   
    }
        }
  
  /*fim do responsivo*/
        a {
            color: rgba(255, 255, 255, 1); /* Define a cor como branca  */
            text-align: end;
        } 
        

        .paragAlterarSenha{
            margin-top: 15px;
            font-size: 0.7rem;
            text-align: start;
        }
        .paragClickAqui:hover,  .paragClickNaoCad:hover{
            color: #d9dbdc;
        }
        .paragNaoCad{
            margin-top: 90px;
            font-size: 0.9rem;
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

    /*TELA CADASTRO*/


    .input1, .input2{
        display: flex;
        margin: 15px 5px;
        flex-direction: row;
        justify-content: space-around;
    }
    .input-container-cadastro{
    height: 40px;
    position: relative;
    margin-top: 40px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
        
    }
    input[type="date"]#data-nascimento{ 
        color:#ead8d800;
    }
    /* icone eyes */
    .icon2{
        position: absolute;
        transition: all 0.35s;
        top:60%;
        cursor: pointer;
        right: 20px;
        transform: translateY(-50%);
        color: #c2c5c6;
    } 
    #unlock{
        display: none;
    }
    .input-cadastro, #check-inline{
        display: flex;
        align-items: center;
    }
    .form-check input #feminino #masculino #outros [type="radio"]{ 
        color: rgba(255, 255, 255, 0);
        border: none;
    }
    .input-cadastro, #check-inline label{
        padding:5px;
        font-size: 1rem;
        color: #fff;
    }
    .input-cadastro{
        background-color: #fff;
        border:solid 1px #fff;
        caret-color: #d82a2a00;
        color: #000;
        border-bottom: 0.5px solid #fff;
        font-size: 15px;
        height: 100%;
        width: 100%;
        outline: 0;
        padding: 2px 5px ;  
        border-radius: 50px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        
    }
    #select-div{
        color: #000;
        background-color: #fff;
        border:solid 1px #fff;
        padding: 2px 5px ;  
        border-radius: 50px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;

    }
    #numero-casa-div,  #bairro-div,  #cidade-div,  #estado-div,  #cpf-cnpj-div,  #celular-div,  #telefone-div,  #senha-div,  #conf-senha-div,  #nome-materno-div,  #cep-div, #endereco-div,  #nome-div,  #nome-social-div,  #email-div{
        background-color: rgba(255, 255, 255, 0);
        border:0;
        caret-color: #d82a2a00;
        color:rgb(255, 255, 255);
        font-size: 18px;
        outline: 0;
    
    }
    .vago { 
        border-radius: 10px;
        height: 20px;
        left: 20px;
        position: absolute;
        top: -20px;
        transform: translateY(0);
        transition: transform 200ms;
        width: 96px;
    } 
    /*INPUT COM A BORDA*/
    .input-cadastro:focus,
    .input-cadastro:not(:placeholder-shown) {
        transform: translateY(6px);
        padding: 0px 10px;
        
    }
    .input-cadastro:focus ~ .vago,
    .input-cadastro:not(:placeholder-shown) ~ .vago {
        transform: translateY(8px);
    }
    /* label */
    .placeholder {
        opacity: 0.9; 
        font-weight: 500;
        font-size: 0.9rem;
        color: #000;
        line-height: 2px;
        pointer-events: none;
        position: absolute;
        left: 20px;
        transform-origin: 0 50%;
        transition: transform 200ms, color 200ms;
        top: 20px;             
    }
    /* efeito */
    .input-cadastro:focus ~ .placeholder,
    .input-cadastro:not(:placeholder-shown) ~ .placeholder {
        transform: translateY(-30px) translateX(1px) scale(0.75);
        font-weight: 700;
        
    }
    .input-cadastro:not(:placeholder-shown) ~ .placeholder {
        color: #fff;
        
    }  
    .input-cadastro:focus ~ .placeholder {
        color: #000 ;
        
    }
    #cadastro-lado1-btn{
        padding: 10px 40px 10px 29px;
        color:#2a72d800;
        background-color:rgba(229, 229, 229, 0.667);  
    }
    .cadastra-3{   
        background-color:#fff;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        margin: 0px 10px;
        text-align: center; 
        position: relative;
        transition: 0.6s;
        width: 30%;
        padding: 8px 5px;
        border: 2px solid #2a72d800;
        font-weight: 600;
        text-decoration: none;
        color: #2b44ff;
        
    }

    .cadastra-3:hover::after{
        font-family:"Font Awesome 5 Free";
        content: " \f061";
    }



</style> 

</head>

<body>
  
    <div class="d-flex align-items-center"  id="alertLogin-error">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    </div>
    <div class="sidebar ">
    <a href="home" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
        <form  method="post" action="../../ConsultaTelefone/controllers/LoginController.php">
            <div class="textLogin">
                <h3 >Login</h3>
                <h4 class="textAcesse">Acesse sua conta!</h4>
            </div>
                <!-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Comun</label>
                </div> -->
                <!--Login-->
                <div class="input-container-cadastro" id="login-div">
                    <input id="login" name="login" class="input-cadastro" type="text" placeholder=" " minlength="6" maxlength="6">
                    <!-- onkeyup="validLogin()" -->
                    <div class="vago"></div>
                    <label for="login" class="placeholder" id="resLogin" style="background: #7fffd400;">Login</label>                            
                </div>     
                <!--SENHA-->
                <div class="input-container-cadastro" id="senha-div">
                    <input id="Senha" name="senha" class="input-cadastro" type="password" placeholder=" " 
                    onkeyup="validSenha()" onkeypress="return ApenasLetras(event,this)" minlength="8" maxlength="8" >
                    <div class="vago"></div>
                    <label for="Senha" class="placeholder" id="resSenha" style="background: #7fffd400;">Senha</label>
                    <span class="icon2">
                        <i id="lock" class="fa-solid fa-eye-slash" onclick="showPassword()"></i>
                        <i id="unlock" class="fa-regular fa-eye" onclick="showPassword()"></i>
                    </span>
                </div>   
                <br> 
                
                <p class="paragAlterarSenha">Esqueceu a senha? <strong><a href="EnviarEmail" class="paragClickAqui" style="color:#fff;"> Clique aqui</a> </strong> </p> 
                <div>
                    <button type="submit" class="btnLogar" name="submit" ><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button>
                </div>
                
                <p class="paragNaoCad">Não possui cadastro? <strong><a href="registro" class="paragClickNaoCad" style="color:#fff;"> Cadastre-se aqui</a> </strong> </p> 
                
               

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
    <script src="../../ConsultaTelefone/assests/js/script.js"></script>

</body>

</html>