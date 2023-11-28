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
          .blocoDB1, .blocoDB2, .blocoDB3, .blocoDB4{
            background-color: #ffffff;
            padding: 10px;
            border-radius: 10px;
            border: solid 1px #e0e0e0;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            width: 90%;
          }
          #btnDB1, #btnDB2, #btnDB3, #btnDB4, #btnCopyScript{
            background-color: #47C9FF;
            color: #fff;
            padding: 3px 8px;
            border-radius: 10px 10px 0px 0px;
            border: none;
          }
          #btnDB1:hover,#btnDB2:hover,#btnDB3:hover, #btnCopyScript:hover{
            background-color: #0087ff;
          }
          #btnCopyScript:active{
            background-color: #0087ff;
          }
          /*fim parte do modelo db*/
    </style>
</head>
<body>
    <!-- MODELO DB -->
  <div class="container pt-4" id="modeloDB">
    <div>
      <h3 class="welcome-text" style="margin-bottom: 30px;">Sobre o Nosso Modelo<span class="text-black fw-bold" style="color: #81b4d4;" > Data Base</span></h3>
      <button id="btnDB1" onclick="clickAreaOne()">DER</button>
      <button id="btnDB2" onclick="clickAreaTwo()">Script da tabela usuário</button>
      <button id="btnDB3" onclick="clickAreaTree()">Script da tabela log</button>
      <button id="btnDB3" onclick="clickAreafour()">Script da tabela _2fa</button>
      <button id="btnCopyScript" >Copiar  Script</button>
      <textarea id="scriptTextArea" style="display: none;">
        <!-- Seu script do banco de dados aqui -->
        CREATE TABLE `gp_03_consultanumero`.`usuario` (
          `id_usuario` INT NOT NULL AUTO_INCREMENT,usuario
          `nome_usuario` VARCHAR(45) NOT NULL,
          `sexo` VARCHAR(45) NULL,
          `data_nasc` DATE NOT NULL,
          `nome_materno` VARCHAR(45) NOT NULL,
          `login` VARCHAR(45) NOT NULL,
          `email` VARCHAR(45) NOT NULL,
          `cpf` VARCHAR(45) NOT NULL,
          `celular` VARCHAR(45) NULL,
          `telefone` VARCHAR(45) NULL,
          `cep` INT NOT NULL,
          `logradouro` VARCHAR(45) NULL,
          `bairro` VARCHAR(45) NULL,
          `uf` VARCHAR(45) NULL,
          `senha` VARCHAR(45) NOT NULL,
          `tipoUser` VARCHAR(45) NOT NULL,
          `status` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`id_usuario`));

        
        CREATE TABLE `gp_03_consultanumero`.`_2fa` (
          `id_2fa` INT NOT NULL AUTO_INCREMENT,  
          `2fa_quest` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`id_2fa`));

        CREATE TABLE `gp_03_consultanumero`.`log` (
          `id_log` INT NOT NULL AUTO_INCREMENT,  
          `usuario_id` INT NOT NULL,
          `status` VARCHAR(45) NOT NULL,
            `descricao` VARCHAR(45) NOT NULL,
            `data_log` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id_log`),
          CONSTRAINT FK_LogUsuario FOREIGN KEY (`usuario_id`) REFERENCES `usuario`(`id_usuario`)
        );
    </textarea>
    </div>
    <hr style="margin: 0px 0px 20px 0px;">
   
    <div class="blocoDB1">
        <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/DER.png" alt="" srcset="" width="90%">
    </div>
    <div class="blocoDB2">
      <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/dbUsuario.png" alt="script do banco" srcset=""  >
    </div>
    <div class="blocoDB3">
      <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/dbLog.png" alt="script do banco" srcset=""> 
    
    </div>
    <div class="blocoDB4">
      <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/db_2fa.png" alt="script do banco" srcset=""> 

    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Script banco de dados</strong>
                <small>1s atrás</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Script copiado para a área de transferência!
            </div>
        </div>
    </div>
    <!--FIM DO CARD DE RESULTADO DO NÚMERO -->
    </div>
  </div> 

  <script>
    var btnDB1 = document.getElementById("btnDB1");
    var btnDB2 = document.getElementById("btnDB2");
    var btnDB3 = document.getElementById("btnDB3");
    var btnDB4 = document.getElementById("btnDB4");
    var blocoDB1 = document.querySelector(".blocoDB1");
    var blocoDB2 = document.querySelector(".blocoDB2");
    var blocoDB3 = document.querySelector(".blocoDB3");
    var blocoDB4 = document.querySelector(".blocoDB4");

    btnDB1.style.background = "#008aff";
    blocoDB2.style.display = "none";
    blocoDB3.style.display = "none";
    blocoDB4.style.display = "none";

    function clickAreaOne() {
        blocoDB3.style.display = "none";
        blocoDB4.style.display = "none";
        blocoDB2.style.display = "none";
        blocoDB1.style.display = "block";

        btnDB3.style.background = "#47C9FF";
        btnDB4.style.background = "#47C9FF";
        btnDB2.style.background = "#47C9FF";
        btnDB1.style.background = "#008aff";
    }
    function clickAreaTwo() {
        blocoDB2.style.display = "block";
        blocoDB1.style.display = "none";
        blocoDB3.style.display = "none";
        blocoDB4.style.display = "none";
  
        btnDB1.style.background = "#47C9FF";
        btnDB4.style.background = "#47C9FF";
        btnDB2.style.background = "#008aff";
        btnDB3.style.background = "#47C9FF";
    }
    function clickAreaTree() {
        blocoDB4.style.display = "none";
        blocoDB2.style.display = "none";
        blocoDB1.style.display = "none";
        blocoDB3.style.display = "block";
  
        btnDB1.style.background = "#47C9FF";
        btnDB2.style.background = "#47C9FF";
        btnDB4.style.background = "#47C9FF";
        btnDB3.style.background = "#008aff";
    }
    function clickAreafour() {
        blocoDB2.style.display = "none";
        blocoDB1.style.display = "none";
        blocoDB3.style.display = "none";
        blocoDB4.style.display = "block";
  
        btnDB1.style.background = "#47C9FF";
        btnDB2.style.background = "#47C9FF";
        btnDB3.style.background = "#47C9FF";
        btnDB4.style.background = "#008aff";
    }
    document.getElementById('btnCopyScript').addEventListener('click', function() {
            var scriptTextArea = document.getElementById('scriptTextArea');
            scriptTextArea.select();
            document.execCommand('copy');
            var toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        });
  </script>
</body>
</html>