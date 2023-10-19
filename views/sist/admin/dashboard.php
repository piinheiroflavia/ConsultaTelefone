<?php
include_once('template/links.php');
require_once('config.php');

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  #grafic, #grafic2{
    -webkit-animation: scale-up-center 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
	  animation: scale-up-center 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
  }
  @-webkit-keyframes scale-up-center {
  0% {
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes scale-up-center {
  0% {
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

</style>
<body>
 <!-- SERVIÇO -->
 
    <div class="m-2">
      <h3 class="welcome-text">Seja Bem Vindo, <span class="text-black fw-bold" style="color: #81b4d4;" >Admin [nome]</span></h3>
      <h5 class="welcome-sub-text">Acompanhe seu resumo de desempenho esta semana.</h5>
      <hr style=" margin-bottom: 20px; width: 95%;" >
    </div>
    <!-- DASHBOARD -->
    <div class="body flex-grow-1 px-3 " style="width: 90%;">
        <div class="container-lg " >
          <div class="card ">
              <div class="example shadow-none ">
                <div class="tab-content rounded-bottom shadow-none">
                  <div class="tab-pane p-1 active preview"  role="tabpanel" id="preview-1009" style="background-color:#fff;box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;  border-radius:8px">

                    <div class="card-group"  style=" border-radius:8px; box-shadow:none">
                    <div class="card" style=" border-radius:8px; box-shadow:none">
                      <div class="card-body border" >                      
                        </div>
                    </div>
                    <div class="card" style=" border-radius:8px; box-shadow:none">
                        <div class="card-body border" >                                       
                    </div>
                      </div>
                      <div class="card" style=" border-radius:8px; box-shadow:none">
                        <div class="card-body border" id="grafic">
                          <div class="text-medium-emphasis text-end mb-4">
                            <svg class="icon icon-xxl">
                              <use xlink:href="<?php echo $consultaTelefonePath; ?>/template/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                            </svg>
                          </div>
                          <div class="fs-4 fw-semibold ">87</div><small class="text-medium-emphasis text-uppercase fw-semibold">Clientes Inativos</small>
                          <div class="progress progress-thin mt-3 mb-0">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="card"  style=" border-radius:8px; box-shadow:none">
                        <div class="card-body border" id="grafic2">
                          <div class="text-medium-emphasis text-end mb-4">
                            <svg class="icon icon-xxl">
                              <use xlink:href="<?php echo $consultaTelefonePath; ?>/template/vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>
                            </svg>
                          </div>
                          <div class="fs-4 fw-semibold">3</div><small class="text-medium-emphasis text-uppercase fw-semibold">Clientes Ativos</small>
                          <div class="progress progress-thin mt-3 mb-0">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>