<?php
include_once("template/links.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Inclua a biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Inclua a biblioteca DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    


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
                
                <!-- <div class="card-body">
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
              </div> -->

              <div class="card mb-4">
                <h5 class="card-header">Acesso de Usuários</h5>    
                 
                <div class="table-responsive text-nowrap" style="margin: 10px 30px">
                <div class="panel-body" style="width: 100% !important;">
                  <div>
                      <table id="tabelaUso" class="table table-hover display" style="width: 100% !important;">
                      </table>
                    </div>
                  </div>

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




   

    <script>
        // Certifique-se de que o DataTables seja inicializado após o carregamento da página
        $(document).ready(function() {

            var endpoint = 'http://localhost/ConsultaTelefone/api/public_html/api/user';
            // fetch(url).
            // then(response => response.json())
            // .then(data => {
             
            // })
            // .catch(erro =>{
            //     console.log('Erro ' + error.message);
            // })

            fetch(endpoint)
        .then(response => response.json())
        .then(data => {
            // Processar os dados e preencher a tabela
            var tabela = $('#tabelaUso').DataTable({
                renderer: "bootstrap",
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
                },
                data: data.data, // Usar os dados da API
                columns: [
                    { "data": "id_usuario", "title": "ID do usuário" },
                    { "data": "tipoUser", "title": "Tipo de usuário" },
                    { "data": "login", "title": "login" },
                    //{ "data": "nome_usuario", "title": "Nome do usuário" },
                    { "data": "data_nasc", "title": "Data Nascimento" },
                     { "data": "status", "title": "Status" },
                    { "data": "email", "title": "Email" },
                    { "data": "cpf", "title": "CPF" },
                    { "data": "celular", "title": "Celular" }
                ],
                "order": [[0, "desc"]],
                "pageLength": 10
            });
            console.log(data);
        })
        .catch(erro => {
            console.log('Erro ' + erro.message);
        });

    });
    </script>

</body>
</html>