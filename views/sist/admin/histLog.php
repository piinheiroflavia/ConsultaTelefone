<?php
include_once("template/links.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      /* @media screen  and (max-width: 1200px){
        #btnPDF{
         
        }
      } */

      #iconSearch{
      background-color: #35aad4;
      margin: 5px;
      border: solid 3px #fff;
      padding: 7px;
      border-radius: 50px;
      color: #fff;
      }
      #iconPdf{
         margin-top: 3px; 
      }
    </style> 
</head>
<body>
    
  <!-- TABELA USUÁRIO -->
  <div class="container pt-4" id="tabelaUsuario">
    <h3 class="welcome-text" style="margin-bottom: 30px;">Histórico de <strong>Acesso dos Usuários</strong> </h3>
    <hr style=" margin-bottom: 20px;" >
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">  
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card mb-4">
                
                <div class="card-body">
                  <div class="row gx-3 gy-2 align-items-center" >
                    
                  <div class="col-md-2">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Pesquisar</label> 
                            <input
                            type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="digite aqui.."
                            aria-describedby="defaultFormControlHelp"
                            />  
                      </div>
                      
                    </div>                                 
                    <div class="col-md-2 float-left" >
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button id="showToastPlacement" class="btn d-block" style="border:none; padding: 0px 2px; width: 28px; box-shadow: none;"><span class="material-symbols-outlined" id="iconSearch">search</span></button>
                    </div>

                    <div class="col-md-2 float-left" id="btnPDF" style=" margin-left: 570px;">
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button id="showToastPlacement" class="btn d-block pdf " style="background-color:#35aad4; color:#fff;     padding: 5px 22px; width: 149px;">Exportar PDF</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-4">
                <h5 class="card-header">Acesso de Usuários</h5>    
                 
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Data Acesso</th>
                        <th>Nome</th>   
                        <th>Status</th>             
                        <th></th>  
                        <th></th>  
                        <th></th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                        <td>1</td>
                        <td>10/10/2023 20:50</td>
                        <td>Ana Pinheiro</td> 
                        <td>Ativo</td>        
                        <td></td>  
                        <td></td> 
                        <td></td>                                
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>10/10/2023 20:50</td>
                        <td>Ana Pinheiro</td> 
                        <td>Ativo</td>        
                        <td></td>  
                        <td></td> 
                        <td></td>                                
                        </tr>
                        <td>3</td>
                        <td>10/10/2023 20:50</td>
                        <td>Ana Pinheiro</td> 
                        <td>Ativo</td>        
                        <td></td>  
                        <td></td> 
                        <td></td>
                    </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

  </div> 
</body>
</html>