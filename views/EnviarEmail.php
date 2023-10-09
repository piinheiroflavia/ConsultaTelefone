<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
    <link rel="stylesheet" href="../assests/css/style.css">
   <!-- MDB -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
   <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
   <!-- icone google -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

   <link rel="stylesheet" href="../assests/css/style.css">
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
    
    input {
        display: block;
        margin: 10px auto;
        width: 350px;
        height: 45px;
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
            <a href="./home.php" class="btnhome"><span class="material-symbols-outlined"  id="iconeHome">arrow_back</span></a>
            <a href="./login.php" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
        </div>
         <form  method="post" action="../controllers/EnviarEmailController.php">
            <div class="textLogin">
                <h3 >Digite seu email</h3>
            </div>

            <div class="col-md-12">
                <div class="form-outline">
                <input type="email" name="email" class="form-control" id="email" required />
                <label for="email" class="form-label">Login</label>
                </div>
            </div>

          <button type="submit" class="btnLogar" name="submit"><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button>
                

          <!-- <div class id="btn">
            <a href="../views/registro.php">
            <button type="button" class="btn btn-outline-secondary">CADASTRE-SE</button></a>
           </div> -->
          </form>
    </div> 
</body>
</html>