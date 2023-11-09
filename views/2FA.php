<?php
    require_once('template/links.php');
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

    <title>2FA</title>
    

   <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/assests/css/style.css">
    
<style>
        
    
    h2{
        margin-top: 200px; 
        width: 400px;
        color: black;   
        font-family: Arial; 
        text-align: left;
        font-size: 40px;

    }
    p{
         
        width: 400px; 
        color: black;  
        font-family: Arial;
        font-size: 23px;
        margin-top: 400px;
        margin-top: auto;
        margin-bottom: 25rem;

    }
     
    h1{
        font-family: Arial;
        text-align: left;
        

    }
    .btnTop{
        margin: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .input-container-cadastro {
    background-color: #fff;
    border: solid 1px #fff;
    caret-color: #d82a2a00;
    color: #000;
    border-bottom: 0.5px solid #fff;
    font-size: 20px;
    height: 100%;
    width: 95%;
    outline: 0;
 
    border-radius: 50px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    .input-cadastro:focus ~ .placeholder,
    .input-cadastro:not(:placeholder-shown) ~ .placeholder {
        transform: translateY(-30px) translateX(1px) scale(0.75);
        font-weight: 700;
        
    }
    .input-cadastro {
    background-color: #fff;
    border: solid 1px #fff;
    caret-color: #d82a2a00;
    color: #000;
    border-bottom: 0.5px solid #fff;
    font-size: 15px;
    height: 100%;
    width: 100%;
    outline: 0;
    padding: 9px 5px;
    border-radius: 50px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

</style> 

</head>

<body>
    <div class="d-flex align-items-center"  id="alertLogin-error">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    </div>
    <div class="container text-center">

    <div class="sidebar ">
        <div class="btnTop">
            <a href="home" class="btnhome"><span class="material-symbols-outlined"  id="iconeHome">arrow_back</span></a>
            <a href="login" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
        </div>
         <form  method="post" action="<?php echo $consultaTelefonePath; ?>/controllers/EnviarEmailController.php">
            <div class="textLogin">
                <h3 >Autentificação</h3>
            </div>
            <span>Digite o nome da sua mãe?</span>
            <br>
            <div class="input-container-cadastro" id="nome-div">
                <input id="nome" class="input-cadastro" type="text" placeholder="digite aqui.. "  required="required" onkeyup="validNome()" >
                <div class="vago"></div>                                       
            </div><br>    
          <!-- BUTTON DISABLED TROCAR DEPOIS  -->
          <button type="submit" class="btnLogar" name="submit" disabled><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button>
          </form>
    </div> 


    <title> <?php echo $title ?></title>
<main id="main2fa">

  <form id="form_2fa">
    <?php $indiceAletorio = array_rand($_2fa); //retira um indice aleatorio da entidade
    $_2faAleatorio - $_2fa[$indiceAleatorio]; // usa o indice sorteado para acessar a pergunta do 2fa 
    ?>
    <h4>
        <?php echo $_2faAleatorio['2fa_quest']; //printa a pergunta do 2fa
        ?>
    </h4><br>

    <input id="input_2fa" type="text" placeholder="Resposta"><br>

    <button type="submit">
        
    </button>
  </form>



</body>
</html>