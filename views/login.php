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

 <style>
    body {
        width: 100%;
        height: 100%;
        background-image: url("../views/fundoo.png");
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */
        
    }
    .textLogin{
        margin-bottom: 30px;
        text-align: start;
    }
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

        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100%;
            width: 400px; /* Largura da barra lateral */
            background-image: linear-gradient(to top, #2b44ff, #0079ff, #009eff, #00bcff, #73d5f0);
            color: #fff; /* Cor do texto */        
            -webkit-animation: slide-in-right 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-in-right 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
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
            margin-top: 150px;
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
        #iconeHome, #iconeSeta {
            margin: 5px;
            border: solid 3px #fff;
            padding: 5px;
            border-radius: 50px;
            color: #fff;
        }
        #iconeHome:hover, #iconeSeta:hover {
            border: solid 3px #fff;
            background-color: #fff;
            color: #0079ff;
        }

</style> 

</head>

<body>
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

                <p class="paragNaoCad">Não possui cadastro? <strong><a href="../views/registro.html" class="paragClickNaoCad"> Cadastre-se aqui</a> </strong> </p> 
        </form>
    </div>


    
    <script>
    //  function logar() {

    //     var login = document.getElementById('login').value;
    //     var senha = document.getElementById('senha').value;


    //     if (login == 'comun' && senha == 'comun') {
    //         alert('sucesso');
            
    //     } else {
    //         alert("Usuario ou senha incorreta");
    //     }

    //  }
    </script>
</body>

</html>