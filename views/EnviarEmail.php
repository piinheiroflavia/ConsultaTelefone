<?php
session_start();    
    include_once('template/links.php');
    require_once('config.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>

    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/assests/css/style.css">

<style>
   
   
   @media screen  and (max-width: 530px){
    .sidebar{
        display: flex;
        flex-direction: column;
        width: 320px;
        padding: 0px 8px;
        background-color: #263a51;
    }
    }
  
    /*fim do responsivo*/
    .btnTop{
        margin: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
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
    margin-top: 15px;
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
        top:70%;
        cursor: pointer;
        right: 20px;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.874);
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
        background-color:#ffffff00;
        
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

<?php

if (isset($_SESSION['mensagem_UpSenha'])) {
    if ($_SESSION['email_existe']) {
        echo '<script>
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Esse email não existe",
            showConfirmButton: false,
            timer: 1900
          });
      </script>';
    } else {
        echo '<script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
          });
      </script>';
    }
    unset($_SESSION['mensagem_UpSenha']); // Limpe a mensagem da sessão
}
?>
                
    <div class="container text-center">
    <div class="sidebar ">
        <div class="btnTop">
            <a href="login" class="btnhome"><span class="material-symbols-outlined"  id="iconeHome">arrow_back</span></a>
            <a href="home" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
        </div>
       <!-- Adicione o componente de alerta do Bootstrap -->
    
        <form action="../../ConsultaTelefone/controllers/TrocarSenhaController.php?acao=verificarEmail" method="post">
            <div class="textLogin">
                <h3 >Digite seu email</h3>
            </div>
            <!--EMAIL-->
            <div class="input-container-cadastro" id="email-div">
                <input type="email" id="email" name="email"  class="input-cadastro" placeholder=" " required="required">

            <div class="vago"></div>
            <label for="email" class="placeholder" id="resEmail" style="background: #7fffd400;">Email</label>                   
                </div><br>
          <button type="submit" class="btnLogar" name="submit" value="Recuperar"><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button> 
         
         
          <!-- <div class id="btn">
            <a href="../views/registro.php">
            <button type="button" class="btn btn-outline-secondary">CADASTRE-SE</button></a>
           </div> -->
          </form>
    </div> 
    <!-- Adicione os scripts do Bootstrap e do SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Acessa a variável de sessão diretamente
        var loginError = <?php echo isset($_SESSION["mensagem_UpSenha"]) ? json_encode($_SESSION["mensagem_UpSenha"]) : "null"; ?>;
        
        if (loginError !== null) {
            var alertLogin = document.getElementById("alertLogin-error");
            alertLogin.style.fontSize = "0.9rem";
            alertLogin.style.backgroundColor = "#e92538";
            alertLogin.style.border = "solid 2px #ef3220";
            alertLogin.style.display = "block";
            alertLogin.textContent = loginError;
        console.log('ee')
            // Remove a variável de erro da sessão para que a mensagem não seja exibida novamente após atualizar a página
            <?php unset($_SESSION["mensagem_UpSenha"]); ?>
        }
    });
</script>

</body>
</html>