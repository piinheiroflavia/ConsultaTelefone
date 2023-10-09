
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
    rel="stylesheet"
    />
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    
    <!-- bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<style>
    /* input dois */
    .searchBox {
    display: flex;
    max-width: 230px;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    background: #ffffff;
    border-radius: 6px;
    position: relative;
    border: none;
    border-bottom: var(--border-height) solid var(--border-before-color);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

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
  button:hover {
    color: #000000;
    background-color: #1A1A1A;
    box-shadow: rgba(207, 207, 207, 0.5) 0 10px 20px;
    transform: translateY(-3px);
    
  }
  /*button pressing effect*/
  button:active {
    box-shadow: none;
    transform: translateY(0);
  }

  .searchInput {
    border: none;
    background: none;
    outline: none;
    color: rgb(0, 0, 0);
    font-size: 15px;
    padding: 13px 20px 15px 20px;
  }
  .material-symbols-outlined {
    font-size: 1.2rem;
  }

    </style>
</head>
<body>


<!--conteudo centro-->
<main style="margin: 82px 60px 0px 60px; ">
  <div class="container pt-4">
    <div>
      <!-- <h3 class="welcome-text">Seja Bem Vindo, <span class="text-black fw-bold"> Pinheiro</span></h3>
      <h5 class="welcome-sub-text">Consulte qualquer número de telefone e   celular de maneira rápida e conveniente.</h5> -->
    </div>
    <hr style=" margin-bottom: 60px;" >
   
    <!-- INPUT PARA ENTRADA DE NÚMERO -->
    <form method="post">
      <div class="search">
        <div class="searchBox">
          <input class="searchInput" id="phoneNumber" type="number" name="phoneNumber" placeholder="Digite o número.." >
          <span class="input-border input-border-alt"></span>
        
          <button id="btn" class="searchButton"  type="button" name="btn" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">    

            <span class="material-symbols-outlined  " style="color: #ffffff; margin-top: 6px;">
              search
            </span>       
          </button>
          <button type="reset">limpar</button>
        </div>
      </div>  
    </form>

    <br>


    <!-- CARD DE RESULTADO DO NÚMERO -->
    <div class="col-sm-6 mb-3 mb-sm-0 pt-4" id="collapseExample">
      <div class="row-sm-6 mb-3 mb-sm-0 pt-4">
        <div class="card" id="multiCollapseExample1">
          <div class="card-body"><br>

             <div class="row align-items-start">
              
              <div class="col">       
                <div id="result">
                      <!--// isset verifica o envio do form
                       /*if (isset($_POST['btn'])) {
                          //pega o numero do input e atribui a variavel $phone
                          $phone = $_POST['phoneNumber'];
                          $apiKey = '2D44499B27DE43FAA68BCE92EC07D50A';   
                          $defaultCountry = '55';
              
                          //lista para guardar os paramentros definidos
                          $listaNum = array(
                              'phone' => $phone,
                              'key' => $apiKey,
                              'default_country' => $defaultCountry
                          );
              
                          $options = array(
                              'http' => array(
                                  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                  'method'  => 'POST',
                                  'content' => http_build_query($listaNum),
                              ),
                          );
              
                          $context = stream_context_create($options);
                          //file_get_contents é usada para enviar a solicitação POST à URL
                          $result = file_get_contents('https://api.veriphone.io/v2/verify', false, $context);
                          $response = json_decode($result); -->
                          
                          <!-- echo '<p><strong>Número:</strong> ' . $response-> local_number . '</p>';
                          // if ($response-> phone_valid == 1 ) {
                          //   $statusNum = 'ativo';
                          // }else{
                          //   $statusNum = 'cancelado';
                          // }
                          echo '<p><strong>Status :</strong> ' . $statusNum . '</p>';
                          
                          // if ($response-> phone_valid == 1 ) {
                          //   $statusNum = 'Ativo';
                          // }else{
                          //   $statusNum = 'Cancelado';
                          // }
                          echo '<p><strong>Tipo:</strong> ' . $response-> phone_type. '</p>'; 
                      }*/-->
                  </div>
                
              
              
              </div>

              <div class="col-4">
                
              </div>
            </div> 

          </div>
        </div>
      </div>
    </div>
    
    <!--FIM DO CARD DE RESULTADO DO NÚMERO -->
  </div>
</main>
<!-- FIM DO CONTEUDO CENTRO-->

<script>
var phoneNumber = document.getElementById('phoneNumber');
var btn = document.getElementById('btn');
var collapseExample = document.getElementById('collapseExample');

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
        console.log('Número: ' + data.local_number);
        var statusNum = data.phone_valid == 1 ? 'ativo' : 'cancelado';
        console.log('Status: ' + statusNum);
        console.log('Tipo: ' + data.phone_type);
        console.log('Operadora: ' + data.carrier);
      },
      error: function(jqXHR, textStatus, errorThrown) {
      console.error('Erro na solicitação: ' + textStatus, errorThrown);
      }
      });
  })


</script>

</body>
</html>

