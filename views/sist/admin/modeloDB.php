<?php
  require_once('template/links.php');
  require_once('config.php');

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo DB</title>

    <style>

        /*MODELO DB*/
          /*parte do modelo db*/
          .blocoDB1, .blocoDB2, .blocoDB3{
            background-color: #ffffff;
            padding: 10px;
            border-radius: 10px;
            border: solid 1px #e0e0e0;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            width: 90%;
          }
          #btnDB1, #btnDB2, #btnDB3{
            background-color: #47C9FF;
            color: #fff;
            padding: 3px 8px;
            border-radius: 10px 10px 0px 0px;
            border: none;
          }
          /*fim parte do modelo db*/
    </style>
</head>
<body>
    <!-- MODELO DB -->
  <div class="container pt-4" id="modeloDB">
    <div>
      <h3 class="welcome-text" style="margin-bottom: 30px;">Sobre o Nosso Modelo<span class="text-black fw-bold" style="color: #81b4d4;" > Data Base</span></h3>
      <button id="btnDB1" onclick="clickAreaOne()">MER</button>
      <button id="btnDB2" onclick="clickAreaTwo()">Script da tabela usuário</button>
      <button id="btnDB3" onclick="clickAreaTree()">Script da tabela log</button>
    </div>
    <hr style="margin: 0px 0px 20px 0px;">

    <div class="blocoDB1">
        <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/DER.png" alt="" srcset="" width="70%">
    </div>
    <div class="blocoDB2">
      <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/dbUsuario.png" alt="script do banco" srcset="">
    </div>
    <div class="blocoDB3">
      <!-- <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/dbUsuario.png" alt="script do banco" srcset=""> -->
      tabela log
    </div>
    <!--FIM DO CARD DE RESULTADO DO NÚMERO -->
    </div>
  </div> 

  <script>
    var btnDB1 = document.getElementById("btnDB1");
    var btnDB2 = document.getElementById("btnDB2");
    var btnDB3 = document.getElementById("btnDB3");
    var blocoDB1 = document.querySelector(".blocoDB1");
    var blocoDB2 = document.querySelector(".blocoDB2");
    var blocoDB3 = document.querySelector(".blocoDB3");

    btnDB1.style.background = "#008aff";
    blocoDB2.style.display = "none";
    blocoDB3.style.display = "none";

    function clickAreaOne() {
        blocoDB3.style.display = "none";
        blocoDB2.style.display = "none";
        blocoDB1.style.display = "block";

        btnDB3.style.background = "#47C9FF";
        btnDB2.style.background = "#47C9FF";
        btnDB1.style.background = "#008aff";
    }
    function clickAreaTwo() {
        blocoDB2.style.display = "block";
        blocoDB1.style.display = "none";
        blocoDB3.style.display = "none";
  
        btnDB1.style.background = "#47C9FF";
        btnDB2.style.background = "#008aff";
        btnDB3.style.background = "#47C9FF";
    }
    function clickAreaTree() {
        blocoDB2.style.display = "none";
        blocoDB1.style.display = "none";
        blocoDB3.style.display = "block";
  
        btnDB1.style.background = "#47C9FF";
        btnDB2.style.background = "#47C9FF";
        btnDB3.style.background = "#008aff";
    }
  </script>
</body>
</html>