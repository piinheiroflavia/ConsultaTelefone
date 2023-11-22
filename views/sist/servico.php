<?php
//ob_start();  

require_once('template/links.php');
require_once('config.php');

//// Verifique se a chave 'nome' está definida na sessão
// if (isset($_SESSION['nome'])) {
//     $nomeUsuario = $_SESSION['nome'];
//     //var_dump($_SESSION);
//     echo "</pre>";

// } else {
    
//     header("Location: login.php");
//     exit(); // Certifique-se de sair após redirecionar para evitar a execução adicional do código
// }
//ob_end_flush();  


?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviço</title>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    /*SERVIÇO*/
    /* input dois */
    .searchBox {
    display: flex;
    max-width: 230px;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    
    border-radius: 6px;
    position: relative;
    border: solid 1px #e0e0e0;
    border-bottom: var(--border-height) solid var(--border-before-color);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;  }

  .searchButton {
    color: rgb(0, 0, 0);
    position: absolute;
    right: 8px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--gradient-2, linear-gradient(90deg, #6dc1eb 0%, #009EFD 100%));
    border: 0;
    display: inline-block;
    transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  }

  .input-border {
    position: absolute;
    background: var(--border-after-color);
    width: 0%;
    height: 2px;
    bottom: 0;
    left: 0;
    transition: width 0.3s cubic-bezier(0.6, -0.28, 0.735, 0.045);
  }

  .input:focus {
    outline: none;
  }

  .input:focus + .input-border {
    width: 100%;
  }
  

  .input-border-alt {
    border-radius: 10px;
    height: 2px;
    background: linear-gradient(90deg, #FF6464 0%, #FFBF59 50%, #47C9FF 100%); 
    transition: width 0.4s cubic-bezier(0.42, 0, 0.58, 1.00);
  }

  .searchBox  :focus + .input-border-alt {
    width: 100%;
  }

  /*hover effect*/
  #btn:hover {
    color: #000000;
    background-color: #1A1A1A;
    box-shadow: rgba(207, 207, 207, 0.5) 0 10px 20px;
    transform: translateY(-3px);
    
  }
  /*button pressing effect*/
  #btn:active {
    box-shadow: none;
    transform: translateY(0);
  }

  .searchInput {
    border:#e0e0e0;
    border-radius: 10px;
    background: #fff;
    outline: none;
    color: rgb(0, 0, 0);
    font-size: 15px;
    padding: 13px 10px 15px 20px;
  }
  .material-symbols-outlined {
    font-size: 1.2rem;
  }
  .navbar-brand{
   margin-top: 5px; 
   margin-bottom: 2px; 
  }
  .linhaMenu{
    width: 40px;
    border: solid 1px #000000 ;
  }
  #spanMenu{
    margin-top: 5px;
  }
  #navbarSupportedContent{
    height: 50px;
  }
  .material-symbols-outlined{
    font-size: 1rem;
  }
  .opMenu{
    font-size: 0.9rem;
  }
  .navbar, .sidebar {
    box-shadow:none;
    border-right: solid 1px #dbdbdb ;
    border-bottom: solid 1px #dbdbdb ;

  }
  .bloco1{
    width: 70%;
    background-color: #ffffff;
    padding: 10px;
    border-radius: 10px;
    border: solid 1px #e0e0e0;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }
  #imgOpe{
    width: 20%;
  }
</style>
</head>
<body style="background-color: #47C9FF;">   
    <!-- SERVIÇO -->
  <div class="container pt-4" id="servico" >
    <div>
      <h3 class="welcome-text">Seja Bem Vindo, <span class="text-black fw-bold" style="color: #81b4d4;" ><?php  echo " $nomeUsuario"; ?></span></h3>
      <h5 class="welcome-sub-text">Consulte qualquer número de telefone e   celular de maneira rápida e conveniente.</h5>
    </div>
    <hr style=" margin-bottom: 20px; width: 70%;" >
      <!-- INPUT PARA ENTRADA DE NÚMERO -->
      <form method="post">
        <div class="search"  >
          <div class="searchBox">
            <input class="searchInput" id="phoneNumber" type="text" name="phoneNumber" placeholder="Digite o número.." >
            <span class="input-border input-border-alt" ></span>
          
            <button id="btn" class="searchButton" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">    

              <span class="material-symbols-outlined " style="color: #ffffff; margin-top: 6px;">
                search
              </span>       
            </button>
            <!-- <button type="reset">limpar</button> -->
          </div>
        </div>  
      </form>
    

    <br>


    <!-- CARD DE RESULTADO DO NÚMERO -->
      
        <div class="collapse" id="collapseExample" style="background:#fff; width:70%; border-radius: 10px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;">
          <div class="card-body"><br>

             <div class="row align-items-start">
                <div class="col align-items-center">       
                  <div id="result">
                    <p><strong>Número: </strong></p>
                    
                  </div>
                  <div class="result">
                    <p><strong>Tipo: </strong></p>
                  </div>
                  <div class="result">
                    <p><strong>Status: </strong></p> 
                 </div>
                 <div class="result">
                  <p><strong>Operadora: </strong></p>
                 </div>
                </div>
                <div class="col">       
                  <div class="result">
                    <p id="resNum"></p> 
                  </div>
                  <div class="result">
                    <p id="resTipo"></p>  
                  </div>
                  <div class="result">
                    <p id="resStatus"></p>  
                  </div>
                  <div class="result">
                    <p id="resOpe">
                    </p>
                    <img src="" alt="logo operadora" id="imgOpe">  
                  </div>
                </div>
              </div>
            </div> 

          </div>
        </div>
     
    
    
    <!--FIM DO CARD DE RESULTADO DO NÚMERO -->
    </div>
  </div> 

  <script>

var phoneNumber = document.getElementById('phoneNumber');
var btn = document.getElementById('btn');
var collapseExample = document.getElementById('collapseExample');

var resNum = document.querySelector("#resNum");
var resTipo = document.querySelector("#resTipo");
var resStatus = document.querySelector("#resStatus");
//var resOpe = document.querySelector("#resOpe");
var imgOpe = document.querySelector("#imgOpe");
btn.style.cursor = 'no-drop'
btn.disabled = true


phoneNumber.addEventListener('input',function(){
    if (phoneNumber == ' '){
      validaInput = true
      btn.disabled = true
      alert('test')
      console.log('nao')

    }else{
      btn.disabled = false;
      btn.style.cursor = 'pointer'
      console.log('sim')

    }
  });
btn.addEventListener('click', function(){
    var phoneNumber = document.querySelector('#phoneNumber').value;
      var apiKey = '2D44499B27DE43FAA68BCE92EC07D50A';
      var default_country = '55';

      $.ajax({
      url: 'https://api.veriphone.io/v2/verify',
      method: 'POST',
      data: {
        phone: phoneNumber,
        key: apiKey,
        default_country: default_country
      },
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(data) {

        var statusNum = data.phone_valid == 1 ? 'ativo' : 'cancelado';

        resNum.innerHTML =  data.local_number;
        resStatus.innerHTML =  statusNum;
        resTipo.innerHTML =  data.phone_type;
        //resOpe.innerHTML =  data.carrier;

        switch (data.carrier){
          case "Vivo":
            imgOpe.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Logo_VIVO.svg/512px-Logo_VIVO.svg.png'
            break;
          case "TIM":
            imgOpe.src = 'https://logodownload.org/wp-content/uploads/2015/02/tim-logo-2-1.png'
            break;
          case "Oi":
            resOpe.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Oi_logo_2022.png/699px-Oi_logo_2022.png'
            break;
          case "Claro":
            resOpe.src = 'https://logodownload.org/wp-content/uploads/2014/02/claro-logo-6.png'
            break;
            // default:
            //     resOpe.innerHTML = 'Operadora não identificada'; 
            //  break;
        }


      },
      error: function(jqXHR, textStatus, errorThrown) {
      console.error('Erro na solicitação: ' + textStatus, errorThrown);
      }
      });
  })



  </script>
</body>
</html>