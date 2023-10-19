<?php
include_once('template/links.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    <h3 class="welcome-text" style="margin-bottom: 30px;">Histórico de <strong>Usuários</strong> </h3>
    <hr style=" margin-bottom: 20px;" >
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card mb-4">
               <!-- card-body -->
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

                    <div class="col-md-2 float-left" style=" margin-left: 570px;" >
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button id="showToastPlacement" class="btn d-block" style="background-color:#35aad4; color:#fff;     padding: 5px 22px;  width: 149px; ">Exportar PDF</button>
                    </div>
                  </div>
                </div>
                <!-- fim card-body -->
              </div>

              <div class="card mb-4">
                <h5 class="card-header">Usuários</h5>

                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Data Acesso</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Cpf</th>
                        <th>Celular</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                        <td>1</td>
                        <td>10/10/2023 20:50</td>
                        <td>Ana Pinheiro</td>
                        <td>Ativo</td>
                        <td>anapinheiro@gmail.com</td>
                        <td>000.000.000-00</td>
                        <td>21 00000-0000</td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>10/10/2023 20:50</td>
                        <td>Ana Pinheiro</td>
                        <td>Ativo</td>
                        <td>anapinheiro@gmail.com</td>
                        <td>000.000.000-00</td>
                        <td>21 00000-0000</td>
                        </tr>
                        <td>3</td>
                        <td>10/10/2023 20:50</td>
                        <td>Ana Pinheiro</td>
                        <td>Ativo</td>
                        <td>anapinheiro@gmail.com</td>
                        <td>000.000.000-00</td>
                        <td>21 00000-0000</td>
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

  <!-- <table class="table align-middle mb-0 bg-white">
    <thead class="bg-dark">
      <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Status</th>
        <th>Position</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">John Doe</p>
              <p class="text-muted mb-0">john.doe@gmail.com</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">Software engineer</p>
          <p class="text-muted mb-0">IT department</p>
        </td>
        <td>
          <span class="badge badge-success rounded-pill d-inline">Active</span>
        </td>
        <td>Senior</td>
        <td>
          <button type="button" class="btn btn-link btn-sm btn-rounded">
            Edit
          </button>
        </td>
      </tr>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                class="rounded-circle"
                alt=""
                style="width: 45px; height: 45px"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">Alex Ray</p>
              <p class="text-muted mb-0">alex.ray@gmail.com</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">Consultant</p>
          <p class="text-muted mb-0">Finance</p>
        </td>
        <td>
          <span class="badge badge-primary rounded-pill d-inline"
                >Onboarding</span
            >
        </td>
        <td>Junior</td>
        <td>
          <button
                  type="button"
                  class="btn btn-link btn-rounded btn-sm fw-bold"
                  data-mdb-ripple-color="dark"
                  >
            Edit
          </button>
        </td>
      </tr>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                class="rounded-circle"
                alt=""
                style="width: 45px; height: 45px"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">Kate Hunington</p>
              <p class="text-muted mb-0">kate.hunington@gmail.com</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">Designer</p>
          <p class="text-muted mb-0">UI/UX</p>
        </td>
        <td>
          <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
        </td>
        <td>Senior</td>
        <td>
          <button
                  type="button"
                  class="btn btn-link btn-rounded btn-sm fw-bold"
                  data-mdb-ripple-color="dark"
                  >
            Edit
          </button>
        </td>
      </tr>
    </tbody>
  </table> -->
</body>
</html>