<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
   <!-- MDB -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
   <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
   <!-- icone google -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

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
    form {
        width: 300px;
        margin: 200px auto;
        text-align: center;
    }

    input {
        display: block;
        margin: 10px auto;
        width: 350px;
        height: 45px;
    }

    input[type="submit"] {
            background-color: #FAFAFA; /* Cor de fundo do botão */
            color: #0A94C1; /* Cor do texto do botão */
            padding: 10px 20px; /* Espaçamento interno do botão */
            border-radius: 5px; 
            cursor: pointer; /* Muda o cursor ao passar o mouse sobre o botão */
            width: 200px;
        }
        
</style> 

</head>

<body>
    <img src="../template/Logotipo.png" alt="logo" height="65px" class="m-2">
    <div class="container text-center">

    <div class="sidebar ">
        <div class="btnTop">
            <a href="./home.php" class="btnhome"><span class="material-symbols-outlined"  id="iconeHome">arrow_back</span></a>
            <a href="./login.php" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
        </div>
         <form  method="post" action="../controllers/EnviarEmailController.php">
            <div class="textLogin">
                <h3 >Digite seu email</h3>
            </div>
          <input type="email" name="email" placeholder="email" id="email">
            
          <button type="submit" class="btn btn-outline-secondary" name="submit">Enviar</button></a>

          <!-- <div class id="btn">
            <a href="../views/registro.php">
            <button type="button" class="btn btn-outline-secondary">CADASTRE-SE</button></a>
           </div> -->
          </form>
    </div> 
</body>
</html>