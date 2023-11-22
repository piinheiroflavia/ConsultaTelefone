<?php
    session_start();
    ob_start();

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
     $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

     if (!empty($dados['SendRecupSenha'])) {
         //var_dump($dados);
         $sql = "SELECT id_usuario, nome_usuario, email 
                     FROM usuario 
                     WHERE email =:email  
                     LIMIT 1";
         $result_usuario = $conn->prepare($sql);
         $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
         $result_usuario->execute();
 
         if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $chave_recuperar_senha = password_hash($row_usuario['id_usuario'], PASSWORD_DEFAULT);
            //echo "Chave $chave_recuperar_senha <br>";

            $query_up_usuario = "UPDATE usuario
                        SET recuperarSenha =:recuperarSenha 
                        WHERE id_usuario =:id_usuario 
                        LIMIT 1";
            $result_up_usuario = $conn->prepare($query_up_usuario);
            $result_up_usuario->bindParam(':recuperarSenha', $chave_recuperar_senha, PDO::PARAM_STR);
            $result_up_usuario->bindParam(':id_usuario', $row_usuario['id_usuario'], PDO::PARAM_INT);

            if ($result_up_usuario->execute()) {
                echo "http://localhost/ConsultaTelefone/views/atualizarSenha.php?chave=$chave_recuperar_senha";

            }else{
               $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Email não cadastrado!</p>";
            }
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Email não cadastrado!</p>";
        }
     }
            
    
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div class="d-flex align-items-center"  id="alertLogin-error">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    </div>
    <div class="container text-center">

    <div class="sidebar ">
        <div class="btnTop">
            <a href="login" class="btnhome"><span class="material-symbols-outlined"  id="iconeHome">arrow_back</span></a>
            <a href="home" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
        </div>
        <!-- action="<?php echo $consultaTelefonePath; ?>/controllers/EnviarEmailController.php" -->
         <form  method="post">
            <div class="textLogin">
                <h3 >Digite seu email</h3>
            </div>
            <!--EMAIL-->
            <div class="input-container-cadastro" id="email-div">
                <input id="email" name="email" class="input-cadastro" type="email" placeholder=" " required="required" onkeyup="validEmail(this.value)">
                <div class="vago"></div>
                <label for="email" class="placeholder" id="resEmail" style="background: #7fffd400;">Email</label>                   
                </div><br>
          <button type="submit" class="btnLogar" name="SendRecupSenha" value="Recuperar"><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button>
                

          <!-- <div class id="btn">
            <a href="../views/registro.php">
            <button type="button" class="btn btn-outline-secondary">CADASTRE-SE</button></a>
           </div> -->
          </form>
    </div> 
</body>
</html>